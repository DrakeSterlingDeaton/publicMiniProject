<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class messagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::all()->pluck('id')[0];

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '1',
            'message' => 'Do a git push.',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '1',
            'message' => 'Maybe do a git push.',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '2',
            'message' => 'Consider git pushing.',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '2',
            'message' => 'A git push would be good.',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '3',
            'message' => 'Have you considered a push?',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '3',
            'message' => 'Please push.',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '4',
            'message' => 'Push?',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '4',
            'message' => 'Maybe push right now',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '5',
            'message' => 'Definitely push.',
        ]);

    }
}
