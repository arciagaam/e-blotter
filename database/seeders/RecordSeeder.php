<?php

namespace Database\Seeders;

use App\Models\Barangay;
use App\Models\Record;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $barangays = Barangay::all();

        foreach($barangays as $barangay) {
            $now = time();
            $startDate = date('Y-m-d', strtotime('-7 days', $now));
            $datesArray = [];
    
            for($i = 0; $i <= 7; $i++) {
                $startDate = date('Y-m-d', strtotime('+1 days', strtotime($startDate)));
                array_push($datesArray, $startDate);
            }

    
            for ($i = 0; $i <= 100; $i++) {
    
                $purok = rand(1, 7);

                $record = Record::create([
                    'barangay_id' => $barangay->id,
                    'blotter_status_id' => rand(1, 6),
                    'barangay_blotter_number' => $i + 1,
                    'purok' => $purok,
                    'case' => "Theft",
                    'narrative' => "Nagnakaw",
                    'reliefs' => "Bayaran ang ninakaw",
                    'created_at' => $datesArray[array_rand($datesArray)],
                    'updated_at' => now()
                ]);
    
                DB::table('victims')->insert([
                    "record_id" => $record->id,
                    "civil_status_id" => 1,
                    "first_name" => fake()->firstName(),
                    "last_name" => fake()->lastName(),
                    "age" => 21,
                    "sex" => 1,
                    "contact_number" => "9612345678",
                    "purok" => $purok,
                    "barangay" => "Doon",
                    "municipality" => "Pila",
                    "province" => "Laguna",
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
    
                DB::table('suspects')->insert([
                    "record_id" => $record->id,
                    "first_name" => fake()->firstName(),
                    "last_name" => fake()->lastName(),
                    "sex" => 2,
                    "barangay" => "Doon",
                    "municipality" => "Pila",
                    "province" => "Laguna",
                    "created_at" => now(),
                    "updated_at" => now(),
                ]);
                
                $startDate = date('Y-m-d', strtotime('-1 day', strtotime($startDate)));
            }
        }
    }
}
