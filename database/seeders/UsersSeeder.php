<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
            'name' => 'cashier',
            'email' => 'cashier@yuhu.com',
            'role' => 'cashier',
            'password' => bcrypt('12345')

            ],

            [
            'name' => 'admin',
            'email' => 'admin@yuhu.com',
            'role' => 'admin',
            'password' => bcrypt('123456')

            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}