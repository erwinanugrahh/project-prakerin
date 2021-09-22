<?php

use App\Models\Setting;

if(!function_exists('teacher')){
    function teacher()
    {
        return auth()->user()->teacher;
    }
}

if(!function_exists('student')){
    function student()
    {
        return auth()->user()->student;
    }
}

if(!function_exists('setting')){
    function setting($key)
    {
        $settings = [
            'setting_web' => [
                'key'=>'setting_web',
                'website_name'=>'SMK IDEAN TASIKMALAYA',
                'phone'=>'+628979394991',
                'website_for'=>'smk',
                'email'=>'jangebe91@gmail.com',
                'zip'=>46462,
                'address'=>'Singaparna, Tasikmalaya'
            ],
            'about_us' => [
                'key'=>'about_us',
                'about_us'=>'We deliver landmark projects',
                'description'=>'We are rethoric question ran over her cheek When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. ',
                'visi'=>'Lorem ipsum dolor sit amet',
                'misi'=>'Lorem ipsum dolor sit amet',
                'skills'=>[
                    ['icon'=>'fas fa-trophy',    'title'=>"We've Repution for Excellence"],
                    ['icon'=>'fas fa-sliders-h', 'title'=>"We Build Partnerships"],
                    ['icon'=>'fas fa-thumbs-up', 'title'=>"Guided by Commitment"],
                    ['icon'=>'fas fa-users',     'title'=>"A Team of Professionals"],
                ]
            ],
            'category_gallery' =>[
                'key' => 'category_gallery',
                'items' => ['Bangunan','Ekstrakulikuler']
            ]
        ];
        $data = Setting::find($key);
        if(is_null($data)||empty($data)){
            return $settings[$key];
        }
        return array_merge(json_decode($data->value, true), ['key'=>$key]);
    }
}
