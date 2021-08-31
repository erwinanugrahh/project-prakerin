<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
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
                'role' => 'blogger'
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
                'role' => 'teacher'
            ],
            [
                'name' => 'Nurfi',
                'email' => 'nurfi@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'student'
            ],
        ];
        foreach($users as $user){
            User::create($user);
        }
        Major::create(['level'=>1,'name' => 'RPL 1']);
        Subject::create(['name'=>'Programan Web Pemrograman Bergerak']);

        $teacher = [
            'nip'        => '12345678901',
            'user_id'    => 4,
            'name'       => 'Asep D',
            'email'      => 'asep@gmail.com',
            'subject_id' => 1,
            'major_id'   => 1
        ];
        $student = [
            'user_id'  => 5,
            'nisn'     => '12345678901',
            'name'     => 'Nurfi',
            'email'    => 'nurfi@gmail.com',
            'phone'    => '08932352381',
            'major_id' => 1,
            'address'  => 'Tasimalaya'
        ];

        Teacher::create($teacher);
        Student::create($student);
    }
}
