<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $blogs = [
        [
            'title_ar' => 'مكتب محاماه سعودي يتمتع بحضور قوي',
            'title_en' => 'A Saudi law firm with a strong presence',
            'desc_ar' => 'مكتب محاماه سعودي يتمتع بحضور قوي',
            'desc_en' => 'A Saudi law firm with a strong presence',
        ] ,
        [
            'title_ar' => 'مكتب محاماه سعودي يتمتع بحضور قوي',
            'title_en' => 'A Saudi law firm with a strong presence',
            'desc_ar' => 'مكتب محاماه سعودي يتمتع بحضور قوي',
            'desc_en' => 'A Saudi law firm with a strong presence',
        ] ,
        [
            'title_ar' => 'مكتب محاماه سعودي يتمتع بحضور قوي',
            'title_en' => 'A Saudi law firm with a strong presence',
            'desc_ar' => 'مكتب محاماه سعودي يتمتع بحضور قوي',
            'desc_en' => 'A Saudi law firm with a strong presence',
        ] ,

    ];




    foreach ($blogs as $blog) {
        Blog::create($blog);
    }
    }

};
