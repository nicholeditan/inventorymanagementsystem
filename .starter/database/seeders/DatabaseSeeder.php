<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // firstOrCreate avoids duplicates if setup runs again.
        Student::firstOrCreate(
            ['name' => 'Juan Dela Cruz', 'course' => 'BSIT'],
            ['year_level' => 2],
        );

        Student::firstOrCreate(
            ['name' => 'Maria Santos', 'course' => 'BSCS'],
            ['year_level' => 2],
        );
    }
}
