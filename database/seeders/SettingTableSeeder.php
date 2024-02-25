<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  Setting::insert([
            [
                'key'      => 'logo',
                'neckname' => 'الشعار',
                'type'     => 'file',
                'value'    => 'setting/logo.png',
            ],
            [
                'key'      => 'main_image',
                'neckname' => 'الصورة الرئيسية',
                'type'     => 'file',
                'value'    => 'setting/main_image.png',
            ],
            [
                'key'      => 'about_image',
                'neckname' => 'صورة السيرة الذاتية',
                'type'     => 'file',
                'value'    => 'setting/about_image.jpg',
            ],
            [
                'key'      => 'fullname',
                'neckname' => 'الاسم بصفحة السيرة الذاتية',
                'type'     => 'text',
                'value'    => 'على بن إبراهيم الحمد النملة',
            ],
            [
                'key'      => 'main_fullname',
                'neckname' => 'الاسم بالصفحة الرئيسية',
                'type'     => 'text',
                'value'    => 'أ. د علي بن إبراهيم النملة',
            ],
            [
                'key'      => 'birthplace',
                'neckname' => 'مكان الميلاد',
                'type'     => 'text',
                'value'    => 'البكيرية بمنطقة القصيم بالمملكة العربية السعودية',
            ],
            [
                'key'      => 'birthdate',
                'neckname' => 'تاريخ الميلاد',
                'type'     => 'text',
                'value'    => '1/2/1372 هـ الموافق 19/10/1952 م',
            ],
            // [
            //     'key'      => 'phone',
            //     'neckname' => 'رقم الجوال',
            //     'type'     => 'number',
            //     'value'    => '+96685874558',
            // ],
            [
                'key'      => 'public_education',
                'neckname' => 'التعليم العام',
                'type'     => 'text',
                'value'    => 'الرياض 1378 - 1390هـ',
            ],
            [
                'key'      => 'universty',
                'neckname' => 'الدراسة الجامعية',
                'type'     => 'text',
                'value'    => 'جامعة الإمام محمَّد بن سعود الإسلامية في المملكة العربية السعودية. 1394هـ/ 1974م. التخصُّص: اللغة العربية',
            ],
            [
                'key'      => 'masters',
                'neckname' => 'الماجستير',
                'type'     => 'text',
                'value'    => 'جامعة فلوريدا الحكومية بمدينة تالاهـاسي من ولاية فلوريدا في الولايات المتَّحدة الأمريكية، 1399هـ/ 1979م. التخصُّص: المكتبات والمعلومات',
            ],
            [
                'key'      => 'Phd',
                'neckname' => 'الدكتوراه',
                'type'     => 'text',
                'value'    => 'جامعة كيس وسترن رزرف بكليفلاند، أوهـايو في الولايات المتَّحدة الأمريكية، 1404هـ/ 1984م. التخصُّص: المعلومات والمكتبات',
            ],
            [
                'key'      => 'about',
                'neckname' => 'السيرة الذاتية',
                'type'     => 'textarea',
                'value'    => 'وزير العمل والشؤون الاجتماعية في المملكة العربية السعودية، 1420 - 1425هـ/ 1999 - 2004م.من مواليد مدينة البكيرية في منطقة القصيم بالسعودية عام 1372 هـ / 1952م. تولى وزارة العمل والشؤون الاجتماعية السعودية (وزارة العمل والتنمية الاجتماعية حاليا) ثم وزيرا للشؤون الاجتماعية. يعمل حاليا أستاذا في جامعة الإمام محمد بن سعود الإسلامية بالرياض رئيس مجلس إدارة دار موسوعة الإسلام.
                عضو عدد من جمعيات القطاع الخيري (الثالث) , و باحث في الشأن الاجتماعي والاستشراقي والاستغرابي والتنصيري والعلاقات الفكرية والحضارية بين الشرق والغرب. أستاذ المكتبات والمعلومات بكلية علوم الحاسب الآلي بجامعة الإمام محمد بن سعود الإسلامية بالمملكة العربية السعودية، 1428هـ/ 2007م – 1434هـ',
            ],
            [
                'key'      => 'features',
                'neckname' => 'الحياة العملية',
                'type'     => 'json',
                'value'    => '["باحث في معهـد العلوم العربية والإسلامية بفرانكفورت بألمانيا، 1405 - 1406هـ/ 1985 - 1986م","مدير الشؤون الدراسية بالملحقية الثقافية السعودية في واشنطن، بالولايات المتَّحدة الأمريكية، 1409 - 1410هـ/ 1989م","مدير عام الهـيئة العامَّة لجمع التبرُّعات للمجاهـدين الأفغان، 1410 - 1412هـ/ 1990 - 1992م", "عضو مجلس الشورى بالمملكة العربية السعودية، 1414هـ - 1420هـ/ 1994 - 1999م", "وزير العمل والشؤون الاجتماعية في المملكة العربية السعودية، 1420 - 1425هـ/ 1999 - 2004م", "وزير الشؤون الاجتماعية بالمملكة العربية السعودية، 1425هـ/ 2005م","أستاذ المكتبات والمعلومات بكلية علوم الحاسب الآلي بجامعة الإمام محمد بن سعود الإسلامية بالمملكة العربية السعودية، 1428هـ/ 2007م – 1434هـ/ 2013م", "رئيس مجلس إدارة دار موسوعة الإسلام. عضو عدد من جمعيات القطاع الخيري (الثالث).باحث في الشأن الاجتماعي والاستشراقي والاستغرابي والتنصيري والعلاقات الفكرية والحضارية بين الشرق والغرب"]',
            ]
        ]);*/



        Setting::insert([

            [
                'key'      => 'main_fullname_ar',
                'neckname' => 'الاسم بالعربي بالصفحة الرئيسية',
                'type'     => 'text',
                'value'    => 'الدغيلبي للمحاماة',
            ],
            [
                'key'      => 'main_fullname_en',
                'neckname' => 'الاسم بالانجليزي بالصفحة الرئيسية',
                'type'     => 'text',
                'value'    => 'The Daghloubi Law',
            ],


            [

                'key'      => 'logo_ar',
                'neckname' => 'الشعار باللغه العربية',
                'type'     => 'file',
                'value'    => 'setting/logo.png',
            ],

            [

                'key'      => 'logo_main_ar',
                'neckname' => ' الشعار التابع للصفحة الرئيسية بالعربي',
                'type'     => 'file',
                'value'    => 'setting/logo.png',
            ],

            [

                'key'      => 'logo_en',
                'neckname' => 'الشعار باللغه الانجليزيه',
                'type'     => 'file',
                'value'    => 'setting/logo.png',
            ],

            [

                'key'      => 'logo_main_en',
                'neckname' => 'الشعار التابع للصفحة الرئيسية بالانجليزي',
                'type'     => 'file',
                'value'    => 'setting/logo.png',
            ],

            [
                'key'      => 'home_about_ar',
                'neckname' => 'وصف عن المكتب الرئيسية باللغة العربيه',
                'type'     => 'textarea',
                'value'    => 'نحن مكتب سعودي يتمتع بحضور قوي ومميز في المملكة العربية السعودية ولدي العملاء ، وذلك بفضل خبرتنا القانونية ومعرفتنا باحتياجات الأعمال الدقيقة للعملاء ، مما يسهل علينا الإنخراط في مجتمع الأعمال والاستشمار في الشرق الأوسط. حيث يتعامل المكتب مع العديد من المنشآت القانونية والعالمية لتلبية احتياجات أعمال العملاء.',

            ],
            [
                'key'      => 'home_about_en',
                'neckname' => 'وصف المكتب الرئيسية باللغة الانجليزيه',
                'type'     => 'textarea',
                'value'    => "We are a Saudi office with a strong and distinctive presence in the Kingdom of Saudi Arabia, boasting a clientele base thanks to our legal expertise and understanding of clients' precise business needs. This enables us to actively engage in the business community and invest in the Middle East. Our office deals with numerous local and international entities to meet clients' business requirements",
            ],

            [
                'key'      => 'footer_desc_ar',
                'neckname' => 'وصف الفوتر باللغة العربيه',
                'type'     => 'textarea',
                'value'    => 'مكتب الدغيلبي محامون ومستشارون أحد المكاتب الرائدة في مجال تقديم الخدمات القانونية لعملائه في المملكة العربية السعودية وخارجها                '
            ],

            [
                'key'      => 'footer_desc_en',
                'neckname' => 'وصف الفوتر باللغة الانجليزيه',
                'type'     => 'textarea',
                'value'    => 'The Daghloubi Law Firm is one of the leading offices in providing legal services to its clients in the Kingdom of Saudi Arabia and beyond.'
            ],


            // [

            //     'key'      => 'footer_image',
            //     'neckname' => 'صورة الفوتر',
            //     'type'     => 'file',
            //     'value'    => 'setting/logo.png',
            // ],



            // [
            //     'key'      => 'phone',
            //     'neckname' => 'رقم الجوال',
            //     'type'     => 'number',
            //     'value'    => '+96685874558',
            // ],
            [
                'key'      => 'about_desc_header_ar',
                'neckname' => 'عنوان نبذا عنا الاول باللغة العربيه',
                'type'     => 'text',
                'value'    => 'حيث يقدم المكتب خدماته القانونية لشريحة عريضة من العملاء من خلال فريق من أمهر المحامين والمستشارين القانونيين في المملكة العربية السعودية. تبعاً لذلك ، وإيماناُ من إدارة المكتب بضرورة التماشي مع أفضل التجارب الدولية والمحلية في تقديم الخدمات المميزة للعملاء علي كافة الأصعدة ، فقد تم تحويل المكتب ليكون شركة مهنية بمسمي ( مكتب الدغيلبي محامون ومستشارون ) والذي تبعه تغيير شامل ومتكامل في آليات العمل وسهولة التواصل بهدف خدمة العملاء بالشكل الأفضل وتحقيق رضاهم علي كافة الأصعدةإن معرفتنا العميقة بالأنظمة السعودية والممزوجة بخبرتنا القانونية والعملية ، تمنحنا دراية شاملة ومتطورة في تقديم استشارات قانونية قيَمة علي أعلي مستوي وباستراتيجية ونظرة تخدم رغبات العميل وأهدافه. إذ نعمل مع عملائنا عن قرب لإنجاز أعمالهم بهدف تكييف خدماتنا علي شكل حلول مواتيه تلبَي متطلبات أعمالهم
                '
            ],
            [
                'key'      => 'about_desc_header_en',
                'neckname' => 'عنوان نبذا عنا الاول باللغة الانجليزيه',
                'type'     => 'text',
                'value'    => "The office provides its legal services to a broad spectrum of clients through a team of skilled lawyers and legal advisors in the Kingdom of Saudi Arabia. Consequently, and believing in the management's need to align with the best international and local experiences in providing distinguished services to clients on all levels, the office has been transformed into a professional company under the name 'Daghloubi Law Firm Lawyers and Consultants.' This transformation was followed by a comprehensive and integrated change in the working mechanisms and ease of communication, with the aim of serving clients in the best possible manner and achieving their satisfaction on all fronts.
                Our deep knowledge of Saudi regulations, coupled with our legal and practical experience, gives us a comprehensive and advanced understanding to provide valuable legal consultations at the highest level, with a strategy and vision that serve the client's desires and objectives. We work closely with our clients to accomplish their tasks, aiming to adapt our services into favorable solutions that meet their business requirements."
            ],
            [

                'key'      => 'years_of_history',
                'neckname' => 'سنوات تاريخنا',
                'type'     => 'number',
                'value'    => '80',
            ],

            [

                'key'      => 'years_of_experience',
                'neckname' => 'سنوات من الخبرة',
                'type'     => 'number',
                'value'    => '10',
            ],

            [

                'key'      => 'number_of_lawyers',
                'neckname' => 'كام محامي في الفريق',
                'type'     => 'number',
                'value'    => '200',
            ],


            [

                'key'      => 'number_of_success_cases',
                'neckname' => 'كام قضية ناجحة',
                'type'     => 'number',
                'value'    => '80',
            ],

            [

                'key'      => 'image_about_header',
                'neckname' => 'الصوره الاوله لنبذا عنا',
                'type'     => 'file',
                'value'    => 'setting/logo.png',
            ],

            [
                'key'      => 'vision_ar',
                'neckname' => 'رؤيتنا باللغه العربي',
                'type'     => 'textarea',
                'value'    => 'توفير منظومة قانونية تكون نواه مميزة متخصصة في مجال القانون التجاري والشركات وقانون الأحوال الشخصية حسب متطلبات العصر عن طريق جلب الخبرات والكفاءات المميزة
                '
            ],
            [
                'key'      => 'vision_en',
                'neckname' => 'رؤيتنا باللغه الانجليزيه',
                'type'     => 'textarea',
                'value'    => 'Providing a legal system that serves as a distinctive core specialized in the fields of commercial law, corporate law, and personal status law according to contemporary requirements by attracting exceptional expertise and competencies.
                '
            ],

            [
                'key'      => 'message_ar',
                'neckname' => 'رسالتنا باللغه العربيه',
                'type'     => 'textarea',
                'value'    => 'السعي وراء الحق حيثما كان وتحقيق العدالة اينما حان وقتها من خلال نشر الثقافة القانونية والمساهمة في إيصالها إلي كافة أفراد المجتمع بطريقة واضحة
                '
            ],
            [
                'key'      => 'message_en',
                'neckname' => 'رسالتنا باللغه الانجليزيه',
                'type'     => 'textarea',
                'value'    => 'The pursuit of justice wherever it may be and the achievement of fairness whenever the time arises through disseminating legal culture and contributing to its delivery to all members of society in a clear manner.
                '
            ],
            [

                'key'      => 'goals_ar',
                'neckname' => 'اهدفنا باللغه العربيه',
                'type'     => 'textarea',
                'value'    => 'توفير أعلي مستوي من الجودة للخدمات القانونية التي تتيح لنا أن نكون جزءا أساسيا في نجاح عملائنا ، ولرفع مستوي ممارسة القانون في المملكة العربية السعودية
            '
            ],

            [
                'key'      => 'goals_en',
                'neckname' => 'اهدفنا باللغه الانجليزيه',
                'type'     => 'textarea',
                'value'    => "Providing the highest level of quality in legal services that enables us to be an integral part of our clients' success and to elevate the practice of law in the Kingdom of Saudi Arabia.
            "
            ],
            [
                'key'      => 'cover_video_about',
                'neckname' => 'صور غلاف الفيديو نبذا عنا',
                'type'     => 'file',
                'value'    => 'setting/logo.png',
            ],
            [
                'key'      => 'link_video_about',
                'neckname' => 'رابط فيديو نبذا عنا',
                'type'     => 'text',
                'value'    => 'setting/logo.png',
            ],
            [
                'key'      => 'about_down_ar',
                'neckname' => 'وصف نبذا التاني عنا باللغة العربيه',
                'type'     => 'textarea',
                'value'    => ' المسائل القانونية المتشعبة والمعقدة، وذلك
                انطلاقاً من فهمنا الشامل لسوق الأعمال والإطار التنظيمي والثقافة المحلية. بل
                ونمثل العديد من العملاء في المملكة العربية السعودية ودول مجلس التعاون
                الخليجي بالإضافة إلي مجموعة من العملاء الدوليين. حيث مثَل المكتب العديد من
                الشركات الدولية الرائدة إلي جانب العديد من المؤسسات الصغيرة والمتوسطة في
                كافة أعمالهم القانونية في المملكة العربية السعودية بدءاً من التأسيس ومروراً
                بالهيكلة القانونية وحتي مرحلة التشغيل الفعلي'
            ],
            [
                'key'      => 'about_down_en',
                'neckname' => 'وصف نبذا التاني عنا باللغة الانجليزيه',
                'type'     => 'textarea',
                'value'    => 'Handling complex and intricate legal issues stems from our comprehensive understanding of the business market, regulatory framework, and local culture. Moreover, we represent numerous clients in the Kingdom of Saudi Arabia and the Gulf Cooperation Council countries, as well as a variety of international clients. Our firm has represented many leading international companies alongside numerous small and medium-sized enterprises in all their legal matters in the Kingdom of Saudi Arabia, starting from establishment, through legal structuring, to actual operation.'
            ],


            [
                'key'      => 'image_about_footer',
                'neckname' => 'الصوره التانيه لنبذا عنا',
                'type'     => 'file',
                'value'    => 'setting/logo.png',
            ],





            // [
            //     'key'      => 'desc_contact_ar',
            //     'neckname' => 'وصف تواصل معنا باللغه العربيه',
            //     'type'     => 'textarea',
            //     'value'    =>  'نعمل مع عملائنا كشركاء ونتفهم احتياجاتهم وحاجة عملائهم لنقدم لهم خدمات راقية وسريعة وذلك بعد القيام بدراسة شاملة يتم فيها وضع استراتيجية وخطة متكاملة تكون قابلة للتنفيذ يتم فيها تحديد الأولويات والوقت المطلوب والتكلفة المناسبة',
            // ],


            // [
            //     'key'      => 'desc_contact_en',
            //     'neckname' => 'وصف تواصل معنا باللغه الانجليزيه',
            //     'type'     => 'textarea',
            //     'value'    =>  'نعمل مع عملائنا كشركاء ونتفهم احتياجاتهم وحاجة عملائهم لنقدم لهم خدمات راقية وسريعة وذلك بعد القيام بدراسة شاملة يتم فيها وضع استراتيجية وخطة متكاملة تكون قابلة للتنفيذ يتم فيها تحديد الأولويات والوقت المطلوب والتكلفة المناسبة',
            // ],





            [
                'key'      => 'clients_desc_ar',
                'neckname' => 'وصف اراء عملائنا باللغه العربيه',
                'type'     => 'textarea',
                'value'    => 'نحن مكتب سعودي يتمتع بحضور قوي ومميز في المملكة العربية السعودية ولدي العملاء ، وذلك بفضل خبرتنا القانونية ومعرفتنا باحتياجات الأعمال الدقيقة للعملاء ،
                '
            ],
            [
                'key'      => 'clients_desc_en',
                'neckname' => 'وصف اراء عملائنا باللغه الانجليزيه',
                'type'     => 'textarea',
                'value'    => "We are a Saudi office with a strong and distinctive presence in the Kingdom of Saudi Arabia, boasting a clientele base thanks to our legal expertise and understanding of clients' precise business needs."
            ],

            // end feature //





            // SEO
            [
                'key' => 'seo_title_ar',
                'neckname' => 'عنوان SEO بالعربية',
                'type' => 'text',
                'value' => 'شركة المكين للاستشار'
            ],

            [
                'key' => 'seo_title_en',
                'neckname' => 'عنوان SEO بالانجليزية',
                'type' => 'text',
                'value' => 'Makin Consultations Company'
            ],

            [
                'key' => 'keyword_ar',
                'neckname' => 'الكلمات المفتاحية بالعربى',
                'type' => 'keyword',
                'value' => json_encode(['للاستشارات'])
            ],
            [
                'key' => 'keyword_en',
                'neckname' => 'الكلمات المفتاحية بالانجليزية',
                'type' => 'keyword',
                'value' => json_encode(['consultations'])
            ],

            [
                'key' => 'desc_seo_ar',
                'neckname' => 'محتوى SEO بالعربية',
                'type' => 'textarea',
                'value' => 'نصنع المفهوم للاستشارات الأمثل والبصمة السعودية المتميزة في كل منتجاتنا وخدماتنا'
            ],
            [
                'key' => 'desc_seo_en',
                'neckname' => 'محتوى SEO بالانجليزية',
                'type' => 'textarea',
                'value' => 'We create the optimal consultations concept and the distinct Saudi footprint in all our products and services'
            ],



            // [
            //     'key'      => 'about_app_ar',
            //     'neckname' => 'عن التطبيق باللغه العربيه',
            //     'type'     => 'textarea',
            //     'value'    => 'وزير العمل والشؤون الاجتماعية في المملكة العربية السعودية، 1420 - 1425هـ/ 1999 - 2004م.من مواليد مدينة البكيرية في منطقة القصيم بالسعودية عام 1372 هـ / 1952م. تولى وزارة العمل والشؤون الاجتماعية السعودية (وزارة العمل والتنمية الاجتماعية حاليا) ثم وزيرا للشؤون الاجتماعية. يعمل حاليا أستاذا في جامعة الإمام محمد بن سعود الإسلامية بالرياض رئيس مجلس إدارة دار موسوعة الإسلام.
            //     عضو عدد من جمعيات القطاع الخيري (الثالث) , و باحث في الشأن الاجتماعي والاستشراقي والاستغرابي والتنصيري والعلاقات الفكرية والحضارية بين الشرق والغرب. أستاذ المكتبات والمعلومات بكلية علوم الحاسب الآلي بجامعة الإمام محمد بن سعود الإسلامية بالمملكة العربية السعودية، 1428هـ/ 2007م – 1434هـ',
            // ],
            // [
            //     'key'      => 'about_app_en',
            //     'neckname' => 'عن التطبيق باللغه الانجليزيه',
            //     'type'     => 'textarea',
            //     'value'    =>' sad'
            //     ],
            [
                'key'      => 'phone',
                'neckname' => 'رقم الجوال',
                'type'     => 'number',
                'value'    => '0566772077',
            ],
            [
                'key'      => 'phone_other',
                'neckname' => 'رقم الجوال الاخر',
                'type'     => 'number',
                'value'    => '0114903977',
            ],


            [
                'key'      => 'email',
                'neckname' => 'البريد الالكتروني',
                'type'     => 'email',
                'value'    => 'info@aldgelbelawfirm.com.sa',
            ],

            [
                'key'      => 'website',
                'neckname' => 'الموقع الالكتروني',
                'type'     => 'text',
                'value'    => 'www.dev.com',
            ],






            [
                'key' => 'facebook',
                'neckname' => 'فيسبوك',
                'type' => 'text',
                'value' => 'https://facebook.com',
            ],
            [
                'key' => 'instagram',
                'neckname' => 'انستاجرام',
                'type' => 'text',
                'value' => 'https://instagram.com',
            ],
            [
                'key' => 'snapchat',
                'neckname' => 'سناب شات',
                'type' => 'text',
                'value' => 'https://linkedin.com',
            ],
            [
                'key' => 'twitter',
                'neckname' => 'تويتر',
                'type' => 'text',
                'value' => 'https://twitter.com',
            ],
            [
                'key' => 'address',
                'neckname' => 'الموقع الحالي',
                'type' => 'address',
                'value' => 'المملكة العربية السعودية – الرياض – برج الفيصلية – الدور رقم 18',
            ],

            [
                'key' => 'lat',
                'neckname' => 'lat',
                'type' => 'hidden',
                'value' => '24.71517',
            ],

            [
                'key' => 'lng',
                'neckname' => 'lng',
                'type' => 'hidden',
                'value' => '46.6789',
            ],





        ]);
    }
}
