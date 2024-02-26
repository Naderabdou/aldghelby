<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'title_ar' => 'لدينا دراية شاملة بالقوانين',
                'title_en' => 'We have a comprehensive knowledge of the laws',
                'desc_ar' => 'بسبب معرفتنا العميقة بالأنظمة السعودية والممزوجة بخبرتنا القانونية والعملية',
                'desc_en' => 'Due to our deep knowledge of the Saudi systems, combined with our legal and practical experience',
                'icon' => asset('site/images/a2.png')

            ],
            [
                'title_ar' => 'مكتب رائد في المجال القانوني',
                'title_en' => 'A leading office in the legal field',
                'desc_ar' => 'مكتب الدغيلبي محامون ومستشارون أحد المكاتب الرائدة في مجال تقديم الخدمات القانونية لعملائه',
                'desc_en' => 'Al-Daghilbi Lawyers and Consultants is one of the leading offices in providing legal services to its clients',
                'icon' => asset('site/images/a3.png')
            ],
            [
                'title_ar' => 'نتمتع بحضور قوي',
                'title_en' => 'We have a strong presence',
                'desc_ar' => 'وذلك بفضل خبرتنا القانونية ومعرفتنا باحتياجات الأعمال الدقيقة للعملاء  مما يسهل علينا الإنخراط في مجتمع الأعمال',
                'desc_en' => 'Thanks to our legal experience and our knowledge of the precise business needs of clients, which makes it easier for us to engage in the business community',
                'icon' => asset('site/images/a1.png')
            ]
        ];


        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}
