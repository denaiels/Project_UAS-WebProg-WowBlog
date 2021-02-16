<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Daniel',
                'email' => 'daniel@wow.com',
                'phone' => '0123456789',
                'role' => 'admin',
                'password' => bcrypt('daniel')
            ],
            [
                'name' => 'Luwis',
                'email' => 'luwis@wow.com',
                'phone' => '1234567890',
                'role' => 'admin',
                'password' => bcrypt('luwis')
            ],
            [
                'name' => 'Steven',
                'email' => 'steven@wow.com',
                'phone' => '0987654321',
                'role' => 'user',
                'password' => bcrypt('steven')
            ],
            [
                'name' => 'Boban',
                'email' => 'boban@wow.com',
                'phone' => '1234567890',
                'role' => 'user',
                'password' => bcrypt('boban')
            ]
        ]);
    }
}
