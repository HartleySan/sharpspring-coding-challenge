<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Utils\Utils;
    use App\Utils\ViewUtils;

    class UserController extends Controller {
        public function index() {
            $page = 'LogIn';

            return ViewUtils::getViewOrJson($page);
        }

        public function logIn() {
            $data = Utils::getRequestData();
            $email = $data->email ?? null;
            $password = $data->password ?? null;

            if (isset($email, $password)) {
                $user = User::where('email', $email)->
                    first();

                if ($user) {
                    if (password_verify($password, $user->password)) {
                        session([
                            'userId' => $user->id
                        ]);

                        return Utils::success();
                    }
                }
            }

            return Utils::error('Please enter a valid email address and password combination to log in.');
        }

        public function logOut() {
            session()->flush();

            return redirect('/');
        }
    }