<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            DefaultAdminUserSeeder::class,
            DefaultBarangaySeeder::class,
            CivilStatusSeeder::class,
            BlotterStatusSeeder::class,
            RecordSeeder::class
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

    }
    
}
