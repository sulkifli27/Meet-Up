<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            [
                'name'    => "user1",
                'username'    => "user1",
                'password'    => bcrypt('secret')
            ],
            [
                'name'    => "user2",
                'username'    => "user2",
                'password'    => bcrypt('secret')
            ],
            [
                'name'    => "user3",
                'username'    => "user3",
                'password'    => bcrypt('secret')
            ],
            [
                'name'    => "user4",
                'username'    => "user4",
                'password'    => bcrypt('secret')
            ],
            [
                'name'    => "user5",
                'username'    => "user5",
                'password'    => bcrypt('secret')
            ],
        ]);
    }
}
