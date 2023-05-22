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

        \App\Models\Role::factory()->create([
            'name' => 'admin'
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'user'
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'contact_number' => '09123221234',
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => 'john_d',
            'email' => 'user1@example.com',
            'contact_number' => '09123221232'
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'username' => 'jane_d',
            'email' => 'user2@example.com',
            'contact_number' => '09123221235'
        ]);

        DB::table('barangays')->insert([
            [
                'name' => 'Bulilan Sur',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Labuin',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('user_roles')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('user_barangays')->insert([
            [
                'user_id' => 2,
                'barangay_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'barangay_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('civil_status')->insert([
            [
                'name' => 'single',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'married',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'divorced',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'separated',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'widowed',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('blotter_status')->insert([
            [
                'name' => 'settled',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'unresolved',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'dismissed',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'in prosecution',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('login_roles')->insert([
            [
                'name' => 'Secretary',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Barangay Chairman',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Committee in Charge',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
