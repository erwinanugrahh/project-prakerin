<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logo = '/user/images/icon-image/';
        $skills = [
            ['logo'=>$logo.'rpl.png','name'=>'Rekayasa Perangkat Lunak', 'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repellat obcaecati laborum non, ullam, quam quisquam quo qui quas facere sit neque nobis officia debitis. Pariatur officia in ad ex, explicabo commodi sint libero magni mollitia voluptatem maiores, molestiae quidem aperiam, at expedita asperiores eaque facere? Libero atque nemo neque.'],
            ['logo'=>$logo.'tkj.png','name'=>'Teknik Komputer Jaringan', 'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repellat obcaecati laborum non, ullam, quam quisquam quo qui quas facere sit neque nobis officia debitis. Pariatur officia in ad ex, explicabo commodi sint libero magni mollitia voluptatem maiores, molestiae quidem aperiam, at expedita asperiores eaque facere? Libero atque nemo neque.'],
            ['logo'=>$logo.'mm.png','name'=>'Multi Media', 'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repellat obcaecati laborum non, ullam, quam quisquam quo qui quas facere sit neque nobis officia debitis. Pariatur officia in ad ex, explicabo commodi sint libero magni mollitia voluptatem maiores, molestiae quidem aperiam, at expedita asperiores eaque facere? Libero atque nemo neque.'],
            ['logo'=>$logo.'dpib.png','name'=>'Desain Pemodelan Infrastruktur dan Bangunan', 'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repellat obcaecati laborum non, ullam, quam quisquam quo qui quas facere sit neque nobis officia debitis. Pariatur officia in ad ex, explicabo commodi sint libero magni mollitia voluptatem maiores, molestiae quidem aperiam, at expedita asperiores eaque facere? Libero atque nemo neque.'],
            ['logo'=>$logo.'tbsm.png','name'=>'Teknik Bisnis Sepeda Motor','description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repellat obcaecati laborum non, ullam, quam quisquam quo qui quas facere sit neque nobis officia debitis. Pariatur officia in ad ex, explicabo commodi sint libero magni mollitia voluptatem maiores, molestiae quidem aperiam, at expedita asperiores eaque facere? Libero atque nemo neque.'],
            ['logo'=>$logo.'tkro.png','name'=>'Teknik Kendarangan Ringan Otomotif', 'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repellat obcaecati laborum non, ullam, quam quisquam quo qui quas facere sit neque nobis officia debitis. Pariatur officia in ad ex, explicabo commodi sint libero magni mollitia voluptatem maiores, molestiae quidem aperiam, at expedita asperiores eaque facere? Libero atque nemo neque.'],
            ['logo'=>$logo.'teklin.png','name'=>'Teknik Listrik Industri', 'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repellat obcaecati laborum non, ullam, quam quisquam quo qui quas facere sit neque nobis officia debitis. Pariatur officia in ad ex, explicabo commodi sint libero magni mollitia voluptatem maiores, molestiae quidem aperiam, at expedita asperiores eaque facere? Libero atque nemo neque.'],
            ['logo'=>$logo.'otkp.png','name'=>'Otomatisasi dan Tata Kelola Perkantoran', 'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repellat obcaecati laborum non, ullam, quam quisquam quo qui quas facere sit neque nobis officia debitis. Pariatur officia in ad ex, explicabo commodi sint libero magni mollitia voluptatem maiores, molestiae quidem aperiam, at expedita asperiores eaque facere? Libero atque nemo neque.'],
        ];
        foreach($skills as $skill){
            Skill::create($skill);
        }
    }
}
