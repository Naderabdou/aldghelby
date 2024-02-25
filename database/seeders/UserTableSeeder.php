<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                'name' => 'مؤسس النظام',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'isVerified' => 1,
            ]
        );
    }
}
