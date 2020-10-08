<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Drake',
            'email' => 'drake.s.deaton@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
