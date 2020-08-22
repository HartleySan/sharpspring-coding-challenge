<?php

    namespace App\Utils;

    use App\Models\User;
    use App\Utils\Utils;

    class ViewUtils {
        public static function getViewOrJson($page, $data = []) {
            $responseData = self::getResponseData($page, $data);

            if (request()->ajax()) {
                return $responseData;
            }

            ob_start(['self', 'formatBuffer']);

            return view('app', [
                'data' => $responseData
            ]);
        }

        public static function getResponseData($page, $data = []) {
            return Utils::arrToObj([
                'meta' => [
                    'page' => $page
                ],
                'user' => User::get(),
                'data' => $data
            ]);
        }

        public static function formatBuffer($buffer) {
            $buffer = preg_replace('!>\s+<!', ">\n<", $buffer);

            $buffer = preg_replace_callback('!<(script|style)>([\s\S]*?)</\1>!', function ($matches) {
                $tag = $matches[1];
                $formattedStyles = trim(preg_replace('!\s+!', ' ', $matches[2]));

                return "<$tag>\n$formattedStyles\n</$tag>";
            }, $buffer);

            return $buffer;
        }
    }