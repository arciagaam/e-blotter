<?php

namespace Database\Seeders;

use App\Models\BlotterStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlotterStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blotterStatuses = [
            ['name' => 'settled'],
            ['name' => 'unresolved'],
            ['name' => 'kp cases'],
            ['name' => 'endorsed'],
            ['name' => 'blotter cases'],
            ['name' => 'dismissed'],
        ];

        foreach($blotterStatuses as $blotterStatus) {
            BlotterStatus::create($blotterStatus);
        }
    }
}
