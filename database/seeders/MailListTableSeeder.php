<?php

namespace Database\Seeders;

use App\Models\MailList;
use App\Models\Subscribe;
use Illuminate\Database\Seeder;

class MailListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Subscribe::factory()->count(100)->create();

        /*Subscribe::insert([
            'fullname' => 'kamal',
            'email' => 'kamal@gmail.com',
            'created_at' => now(),
        ]);*/
    }
}
