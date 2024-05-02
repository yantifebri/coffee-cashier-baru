<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $User = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admincafe'),
                'level' => 1
            ],

            [
                'name' => 'Kasir1',
                'email' => 'kasir1@gmail.com',
                'password' => bcrypt('kasirsatu'),
                'level' => 2
            ],

            [
                'name' => 'Kasir2',
                'email' => 'kasir2@gmail.com',
                'password' => bcrypt('kasirdua'),
                'level' => 2
            ],

        ];
        foreach ($User as $key => $value) {
            User::create($value);
        }
    }
}
