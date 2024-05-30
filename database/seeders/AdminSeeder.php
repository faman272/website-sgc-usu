<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            // [
            //     'name' => 'Super Admin',
            //     'email' => 'superadmin@gmail.com',
            //     'password' => bcrypt('admin12345'),
            // ],
            // [
            //     'name' => 'Admin Shop',
            //     'email' => 'adminshop@gmail.com',
            //     'password' => bcrypt('admin12345'),
            // ],
            // [
            //     'name' => 'Admin Blog',
            //     'email' => 'adminblog@gmail.com',
            //     'password' => bcrypt('admin12345'),
            // ],
            [
                'name' => 'admin@gmail.com',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin12345'),
            ],
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }
    }
}
