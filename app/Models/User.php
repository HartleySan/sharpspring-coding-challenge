<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class User extends Model {
        public static function get() {
            $userId = session('userId', null);

            if ($userId) {
                return self::find($userId);
            }

            return null;
        }

        public static function isLoggedIn() {
            return !!session('userId', null);
        }

        public function notes() {
            return $this->hasMany('App\Models\Note', 'owner_id');
        }
    }