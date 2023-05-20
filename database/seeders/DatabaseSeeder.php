<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'john_d',
            'email' => 'user1@example.com',
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'username' => 'jane_d',
            'email' => 'user2@example.com',
        ]);

        // DB::table('users')->insert([
        //     [
        //         'first_name' => 'Admin',
        //         'last_name' => 'Admin',
        //         'username' => 'admin',
        //         'email' => 'admin@example.com',
        //     ],
        //     [
        //         'first_name' => 'John',
        //         'last_name' => 'Doe',
        //         'username' => 'john_d',
        //         'email' => 'user1@example.com',
        //     ],
        //     [
        //         'first_name' => 'Jane',
        //         'last_name' => 'Doe',
        //         'username' => 'jane_d',
        //         'email' => 'user2@example.com',
        //     ]
        // ]);

        DB::table('roles')->insert([
            [
                'name' => 'admin'
            ],
            [
                'name' => 'user'
            ],
        ]);

        DB::table('barangays')->insert([
            [
                'name' => 'Bulilan Sur',
                'municipality' => 'Laguna',
                'province' => 'Pila'
            ],
            [
                'name' => 'Labuin',
                'municipality' => 'Laguna',
                'province' => 'Santa Cruz'
            ],
        ]);

        DB::table('user_roles')->insert([
            [
                'user_id' => 1,
                'role_id' => 1
            ],
            [
                'user_id' => 2,
                'role_id' => 2
            ],
            [
                'user_id' => 3,
                'role_id' => 2
            ],
        ]);

        DB::table('user_barangays')->insert([
            [
                'user_id' => 2,
                'barangay_id' => 1
            ],
            [
                'user_id' => 3,
                'barangay_id' => 2
            ],
        ]);
    }
}
