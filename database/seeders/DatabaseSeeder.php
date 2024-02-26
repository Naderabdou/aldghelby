<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(FeatureTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        

    }
}
