<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClassModel;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if data already exists
        if (ClassModel::count() > 0) {
            $this->command->info('Classes table already seeded. Skipping...');
            return;
        }

        // Use the factory to create class instances
        ClassModel::factory()->count(6)->create();

        $this->command->info('Class table seeded successfully.');
    }
}
