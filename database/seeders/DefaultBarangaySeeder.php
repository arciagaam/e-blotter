<?php

namespace Database\Seeders;

use App\Models\Barangay;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultBarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultBarangaysWithSecretary = [
            [
                'barangay' => [
                    'name' => 'Bulilan Sur',
                    'captain_first_name' => 'Nilo',
                    'captain_last_name' => 'Ladanga',
                    'logo' => '',
                ],

                'puroks' => [
                    ['purok_number' => 1, 'name' => 'Burzagom Street'],
                    ['purok_number' => 2, 'name' => 'MH Del Pilar Street'],
                    ['purok_number' => 3, 'name' => 'Mabini Street'],
                    ['purok_number' => 4, 'name' => 'Sitio Street'],
                    ['purok_number' => 5, 'name' => 'Kalye Street'],
                    ['purok_number' => 6, 'name' => 'Villarica Street'],
                    ['purok_number' => 7, 'name' => 'Villa Street'],
                ],

                'secretary' =>  [
                    'first_name' => 'Hazel',
                    'last_name' => 'Platero',
                    'username' => 'bbsblotter',
                    'email' => 'bbsblotter@example.com',
                    'contact_number' => '09123221234',
                    'verified_at' => now(),
                    'password' => bcrypt('123bbs')
                ],
            ],

            [
                'barangay' => [
                    'name' => 'Sta Clara Sur',
                    'captain_first_name' => 'SCSCAPTFN',
                    'captain_last_name' => 'SCSCAPTLN',
                    'logo' => '',
                ],

                'puroks' => [
                    ['purok_number' => 1, 'name' => 'PK1 Street'],
                    ['purok_number' => 2, 'name' => 'PK2 Street'],
                    ['purok_number' => 3, 'name' => 'PK3 Street'],
                    ['purok_number' => 4, 'name' => 'PK4 Street'],
                    ['purok_number' => 5, 'name' => 'PK5 Street'],
                    ['purok_number' => 6, 'name' => 'PK6 Street'],
                    ['purok_number' => 7, 'name' => 'PK7 Street'],
                ],

                'secretary' =>  [
                    'first_name' => 'SCSFN',
                    'last_name' => 'SCSLN',
                    'username' => 'scsblotter',
                    'email' => 'scsblotter@example.com',
                    'verified_at' => now(),
                    'contact_number' => '09123221234',
                    'password' => bcrypt('123SCS')
                ],
            ],

            [
                'barangay' => [
                    'name' => 'Labuin',
                    'captain_first_name' => 'Jovir',
                    'captain_last_name' => 'Matienzo',
                    'logo' => '',
                ],

                'puroks' => [
                    ['purok_number' => 1, 'name' => 'Florida'],
                    ['purok_number' => 2, 'name' => 'Mapunso'],
                    ['purok_number' => 3, 'name' => 'Villa Sol 2'],
                    ['purok_number' => 4, 'name' => 'Villa Sol 1'],
                ],

                'secretary' =>  [
                    'first_name' => 'Bhaby',
                    'last_name' => 'Ambrocio',
                    'username' => 'labuinblotter',
                    'email' => 'labuin@example.com',
                    'verified_at' => now(),
                    'contact_number' => '09123221234',
                    'password' => bcrypt('123labuin')
                ],
            ]
                
        ];
        
        foreach($defaultBarangaysWithSecretary as $barangay) {
            $createdBarangay = Barangay::create($barangay['barangay']);
            $createdBarangay->puroks()->createMany($barangay['puroks']);

            $createdUser = User::create($barangay['secretary']);
            
            $createdUser->roles()->attach(2);
            $createdUser->barangays()->attach($createdBarangay->id);
        }
    }
}
