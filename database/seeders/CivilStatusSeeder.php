<?php

namespace Database\Seeders;

use App\Models\CivilStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CivilStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $civilStatuses = [
            ['name' => 'single'],
            ['name' => 'married'],
            ['name' => 'separated'],
            ['name' => 'widowed']
        ];
        
        foreach($civilStatuses as $civilStatus) {
            CivilStatus::create($civilStatus);
        }
    }
}
