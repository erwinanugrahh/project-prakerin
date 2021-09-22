<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Blog::truncate();
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = ['Pendidikan','Pengetahuan', 'Sosial','Umum'];
        foreach($categories as $cat){
            Category::create(['name'=>$cat]);
        }

        $faker = Faker::create('id_ID');
        $category_id = Category::all()->pluck('id');
        $user_id = User::all()->pluck('id');
        for($i=0;$i<15;$i++){
            Blog::create([
                'category_id'=>$category_id->random(),
                'title'=>$faker->sentence(10),
                'banner'=>'banner'.rand(1,5).'.png',
                'content'=>implode('<br><br>',$faker->paragraphs),
                'user_id'=>$user_id->random(),
                'status'=>'accepted'
            ]);
        }
    }
}
