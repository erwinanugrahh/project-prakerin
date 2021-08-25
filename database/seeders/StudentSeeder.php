<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            ['Hilmi Aidzil', 'hilmi@gmail.com'],
            ['Sadam Alzani', 'sadam@gmail.com'],
            ['Adi Tri N', 'adi@gmail.com'],
            ['Reviandi', 'revi@gmail.com'],
            ['Dida Fathan Q', 'dida@gmail.com'],
            ['Panji R', 'panji@gmail.com'],
            ['Iqbal Nugraha', 'iqbal@gmail.com'],
            ['Attariz A', 'atta@gmail.com'],
            ['Iman Ruhiman', 'iman@gmail.com'],
            ['Asep Rizki', 'asepr@gmail.com']
        ];

        $i=0;
        foreach($students as $student){
            $user_id = User::create([
                'name' => $student[0],
                'email' => $student[1],
                'password' => bcrypt('passwordsiswa'),
                'role' => 'student'
            ])->id;

            Student::create([
                'user_id' => $user_id,
                'nisn'=>'1010101'.$i++,
                'name' => $student[0],
                'email' => $student[1],
                'phone' => null,
                'major_id' => 1,
                'address' => 'Tasikmalaya'
            ]);
        }
    }
}
