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
            'first_name' => 'ABC',
            'last_name' => 'Officer',
            'username' => 'abc_officer',
            'email' => 'abc_officer@example.com',
            'contact_number' => '09123221234',
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'ABC',
            'last_name' => 'Secretary',
            'username' => 'abc_secretary',
            'email' => 'abc_secretary@example.com',
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
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 4,
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        DB::table('user_barangays')->insert([
            [
                'user_id' => 3,
                'barangay_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 4,
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
                'name' => 'separated',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'widowed',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // [
            //     'name' => 'divorced',
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ],
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

        DB::table('kp_forms')->insert([
            [
                'number' => '1',
                'name' => 'Notice to Constitute the Lupon',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '2',
                'name' => 'Appointment Letter',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '3',
                'name' => 'Notice of Appointment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '4',
                'name' => 'List of Appointed Lupon Members',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '5',
                'name' => 'Lupon Member Oath Statement',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '6',
                'name' => 'Withdrawal of Appointment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '7',
                'name' => "Complainant's Form",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '8',
                'name' => 'Notice of Hearing',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '9',
                'name' => 'Summon for the Respondent',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '10',
                'name' => 'Notice for Constitution of Pangkat',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '11',
                'name' => 'Notice to Chosen Pangkat Member',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '12',
                'name' => 'Notice of Hearing (Conciliation Proceedings)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '13',
                'name' => 'Subpoena Letter',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '14',
                'name' => 'Agreement for Arbitration',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '15',
                'name' => 'Arbitration Award',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '16',
                'name' => 'Amicable Settlement',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '17',
                'name' => 'Repudiation',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '18',
                'name' => 'Notice of Hearing for Complainant',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '19',
                'name' => 'Notice of Hearing for Respondent',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '20',
                'name' => 'Certification to File Action (from Lupon Secretary)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '21',
                'name' => 'Certification to File Action (from Pangkat Secretary)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '22',
                'name' => 'Certification to File Action',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '23',
                'name' => 'Certification to Bar Action',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '24',
                'name' => 'Certification to Bar Counterclaim',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '25',
                'name' => 'Motion for Execution',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '26',
                'name' => 'Notice of Hearing (Re: Motion for Execution)',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '27',
                'name' => 'Notice of Execution',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'number' => '28',
                'name' => 'Monthly Transmittal of Final Reports',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);

        $now = time();
        $startDate = date('Y-m-d', strtotime('-24 days', $now));

        for ($i = 0; $i <= 24; $i++) {
            DB::table("records")->insert([
                [
                    'barangay_id' => 1,
                    'blotter_status_id' => 1,
                    'barangay_blotter_number' => $i + 1,
                    'purok' => "1",
                    'case' => "Theft",
                    'narrative' => "Nagnakaw",
                    'reliefs' => "Bayaran ang ninakaw",
                    'created_at' => $startDate,
                    'updated_at' => now()
                ]
            ]);
            
            $startDate = date('Y-m-d', strtotime('+1 day', strtotime($startDate)));
        }
    }
}
