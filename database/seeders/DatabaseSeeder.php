<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Jangbe',
                'email' => 'ebe@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ],
            [
                'name' => 'Indra R',
                'email' => 'indra@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ],
            [
                'name' => 'Erwin A',
                'email' => 'erwinanugrah04@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ],
            [
                'name' => 'Asep D',
                'email' => 'asep@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ],
            [
                'name' => 'Nurfi',
                'email' => 'nurfi@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ],
        ];
        foreach($users as $user){
            User::create($user);
        }
    }
}
