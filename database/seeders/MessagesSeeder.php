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
            'user_id' => 1,
            'rating' => '1',
            'message' => 'Do a git push.',
        ]);

        Message::create([
            'sender' => 'Rob',
            'user_id' => 2,
            'rating' => '1',
            'message' => 'Maybe do a git push.',
        ]);

        Message::create([
            'sender' => 'Sarah',
            'user_id' => 3,
            'rating' => '2',
            'message' => 'Consider git pushing.',
        ]);

        Message::create([
            'sender' => 'Rob',
            'user_id' => 2,
            'rating' => '2',
            'message' => 'Have you even made a repo yet?',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '3',
            'message' => 'GitLab? GitHub? BitBucket? Anything?',
        ]);

        Message::create([
            'sender' => 'Drake',
            'user_id' => $user_id,
            'rating' => '3',
            'message' => 'What are you waiting for?',
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
            'message' => 'Definitely do a git push.',
        ]);

    }
}
