<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $defaultAdminUsers = [
            [
                'first_name' => 'ABC',
                'last_name' => 'Officer',
                'username' => 'abc_pres',
                'email' => 'abc_officer@example.com',
                'contact_number' => '09123221234',
                'password' => bcrypt('abc@2024')
            ],
            [
                'first_name' => 'ABC',
                'last_name' => 'Secretary',
                'username' => 'abc_sec',
                'email' => 'abc_secretary@example.com',
                'contact_number' => '09123221234',
                'password' => bcrypt('abcsec@2024')
            ]
        ];

        foreach ($defaultAdminUsers as $user) {
            $createdUser = User::create($user);
            $createdUser->roles()->attach(1);
        }
    }
}
