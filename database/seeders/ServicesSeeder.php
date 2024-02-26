<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name_ar' => 'إعداد وصياغة العقود',
                'name_en' => 'Preparing and drafting contracts',
                'desc_ar' => 'حيث نقدم خدمات المرافعة لدي جميع المحاكم بدرجاتها المختلفة، المحكمة العليا محاكم الاستئناف المحاكم الابتدائية واللجان شبه القضائية',
                'desc_en' => 'We provide pleading services before all courts at their various levels, the Supreme Court, the Courts of Appeal, the Courts of First Instance, and quasi-judicial committees',
                'image' =>  asset('site/images/s1.png'),
            ],
            [
                'name_ar' => 'الترافع والتقاضي',
                'name_en' => 'Pleading and litigation',
                'desc_ar' => 'يعتبر الترافع والتقاضي قسم من أقسام المكتب الأساسية والفرعية لقسم الشؤون القانونية ، والقائمون عليه محامون واستشاريون متخصصون في الترافع والتقاضي',
                'desc_en' => 'Pleading and litigation is considered a section of the basic and subsidiary departments of the legal affairs department, and those in charge are lawyers and consultants specialized in pleading and litigation',
                'image' =>  asset('site/images/s2.png'),
            ],
            [
                'name_ar' => 'العلامات التجارية',
                'name_en' => 'Trademarks',
                'desc_ar' => 'نقدم خدمات تسجيل العلامات التجارية والتصاميم الصناعية وحقوق المؤلف والحقوق المجاورة والبراءات والنماذج الصناعية والأسرار التجارية والمظاهر التجارية',
                'desc_en' => 'We provide services for registering trademarks, industrial designs, copyright, neighboring rights, patents, industrial models, trade secrets, and commercial appearances',
                'image' =>  asset('site/images/s3.png'),
            ],
            [
                'name_ar' => 'القضايا الأسرية والأحوال الشخصية',
                'name_en' => 'Family and personal status cases',
                'desc_ar' => 'تعتبر القضايا الأسرية والأحوال الشخصية قسم من أقسام المكتب الفرعية لقسم الشؤون القانونية ، والقائمون عليه محامون واستشاريون متخصصون في القضايا الأسرية والأحوال الشخصية',
                'desc_en' => 'Family and personal status cases are considered a section of the subsidiary departments of the legal affairs department, and those in charge are lawyers and consultants specialized in family and personal status cases',
                'image' =>  asset('site/images/s4.png'),
            ],
            [
                'name_ar' => 'المرافعة لدي المحاكم',
                'name_en' => 'Pleading before the courts',
                'desc_ar' => 'حيث نقدم خدمات المرافعة لدي جميع المحاكم بدرجاتها المختلفة، المحكمة العليا محاكم الاستئناف المحاكم الابتدائية واللجان شبه القضائية',
                'desc_en' => 'We provide pleading services before all courts at their various levels, the Supreme Court, the Courts of Appeal, the Courts of First Instance, and quasi-judicial committees',
                'image' =>  asset('site/images/s5.png'),
            ],
            [
                'name_ar' => 'معاملات الشركات والمؤسسات',
                'name_en' => 'Companies and institutions transactions',
                'desc_ar' => 'خدماتنا التي تتعلق بالأعمال التجارية علي المستوي المحلي والإقليمي والدولي تشمل إنشاء وترجمة وإعداد وصياغة عقود الشراكات والإنشاء وتسوية خلافات المؤسسات ومراجعات كافة الاتفاقيات ومراجعة اللوائح والسياسات والقوانين الداخلية للشركات والمؤسسات',
                'desc_en' => 'Our services related to business at the local, regional, and international levels include establishing, translating, preparing, and drafting partnership and establishment contracts, settling corporate disputes, reviewing all agreements, reviewing regulations, policies, and internal laws of companies and institutions',
                'image' =>  asset('site/images/s6.png'),
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
