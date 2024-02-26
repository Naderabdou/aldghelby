<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $clients = [
            [
                'name_ar' => 'محمد احمد',
                'name_en' => 'Mohamed Ahmed',
                'desc_ar' => 'هذا الموقع رائع وسهل الاستخدام',
                'desc_en' => 'This site is great and easy to use',
            ]
            ];
    }
}
