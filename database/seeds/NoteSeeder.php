<?php

use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Note::insert([
            [
                'owner_id' => 1,
                'title' => 'Note test #1',
                'body' => 'Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body. Testing with a really, really long body.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'owner_id' => 1,
                'title' => 'Note test #2',
                'body' => 'Testing with newlines.
Testing with newlines.
Testing with newlines.
Testing with newlines.
Testing with newlines.
Testing with newlines.
Testing with newlines.
Testing with newlines.
Testing with newlines.
Testing with newlines.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'owner_id' => 1,
                'title' => 'Note test #3',
                'body' => strip_tags('Testing with script tags and a JS alert. No alert should pop up on the screen. <script>alert(123);</script>'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'owner_id' => 1,
                'title' => 'Note test #4',
                'body' => "Just a regular ol' note.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'owner_id' => 1,
                'title' => 'Note test #5',
                'body' => "Just another regular ol' note.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'owner_id' => 1,
                'title' => 'Note test #6',
                'body' => 'This note contains characters from a non-Latin language. これは日本語です。',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'owner_id' => 2,
                'title' => 'Test note for the 2nd user',
                'body' => 'Just testing.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'owner_id' => 2,
                'title' => 'Another test note for the 2nd user',
                'body' => 'Just more testing.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'owner_id' => 1,
                'title' => "This note is in the DB after the 2nd user's notes.",
                'body' => 'Yeah, that.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
