<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title_ar' => 'إيقونة العدالة لأصحاب الحقوق والمظالم',
                'title_en' => 'An icon of justice for those with rights and injustices',

                'image' => asset('site/images/s1.png')
            ],
            [
                'title_ar' => 'رسالتنا السعي وراء الحق حيثما كان',
                'title_en' => 'Our mission is to pursue the truth wherever it may be',

                'image' => asset('site/images/s2.png')

            ],
            [
                'title_ar' => 'مكتب محاماه سعودي يتمتع بحضور قوي',
                'title_en' => 'A Saudi law firm with a strong presence',

                'image' => asset('site/images/s3.png'),

            ],

        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
