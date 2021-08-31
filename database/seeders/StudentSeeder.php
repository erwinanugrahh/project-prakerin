<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\Student;
use App\Models\User;
use Faker\Generator as Faker;
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
        $faker = new Faker();
        $majors = [
            [1, 'RPL 2'],
            [1, 'TKJ 1'],
            [1, 'TKJ 2'],
            [1, 'TKJ 3'],
            [2, 'RPL 1'],
            [2, 'RPL 2'],
            [2, 'DPIB 1'],
        ];
        $major_ids = [1];
        foreach($majors as $major){
            $major_ids[] = Major::create([
                'level' => $major[0],
                'name' => $major[1]
            ])->id;
        }

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
                'nisn'=>'1010101032'.$i++,
                'name' => $student[0],
                'email' => $student[1],
                'phone' => null,
                'major_id' => $major_ids[array_rand($major_ids, 1)],
                'address' => 'Tasikmalaya'
            ]);
        }
    }
}
