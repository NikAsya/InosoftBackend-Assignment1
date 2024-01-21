<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentModel;

class StudentTableSeeder extends Seeder
{
    public function run(): void
    {
        // Get all classes
        $classes = \App\Models\ClassModel::all();

        // Check if there are classes
        if ($classes->isEmpty()) {
            $this->command->error('No classes found. Please seed classes first.');
            return;
        }

        // Use the StudentFactory to create students with valid class references
        StudentModel::factory(50)->create([
            'class_id' => function () use ($classes) {
                return $classes->random()->id;
            },
        ]);
    }
}
