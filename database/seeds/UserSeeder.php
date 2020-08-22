<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => password_hash('$sh4rpspr1nG$', PASSWORD_DEFAULT),
                'created_at' => '2015-10-12 02:40:15',
                'updated_at' => '2015-10-12 02:40:15'
            ],
            [
                'name' => 'Jonathan Hartley',
                'email' => 'jonathan.hartley@test.com',
                'password' => password_hash('test', PASSWORD_DEFAULT),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mr. No-Notes',
                'email' => 'no.notes@test.com',
                'password' => password_hash('test', PASSWORD_DEFAULT),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
