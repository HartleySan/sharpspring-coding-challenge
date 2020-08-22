<?php

    namespace App\Utils;

    class Utils {
        public static function getRequestData() {
            return self::arrToObj(request()->all());
        }

        public static function arrToObj($arr) {
            return json_decode(json_encode($arr));
        }

        public static function success($msg = null, $data = []) {
            return [
                'success' => true,
                'msg' => $msg,
                'data' => $data
            ];
        }

        public static function error($msg = null, $data = []) {
            return [
                'error' => true,
                'msg' => $msg,
                'data' => $data
            ];
        }
    }