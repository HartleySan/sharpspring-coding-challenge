<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Note extends Model {
        public function owner() {
            return $this->hasOne('App\Models\User', 'id', 'owner_id');
        }
    }