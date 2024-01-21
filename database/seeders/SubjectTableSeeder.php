<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['subject_name' => 'Laravel', 'teacher' => 'Hasbi', 'description' => 'Memplajari pengunaan Laravel'],
            ['subject_name' => 'OOP', 'teacher' => 'TJ', 'description' => 'Memplajari Object Oriented Programming'],
            ['subject_name' => 'PHP', 'teacher' => 'Ardian & Fadel', 'description' => 'Memplajari PHP serta Logika pengelolaan aritmatika'],
            ['subject_name' => 'GIT', 'teacher' => 'Haidar & Hapiz', 'description' => 'Memplajari command line dan GIT repository'],
            ['subject_name' => 'Database', 'teacher' => 'Isa, Diaz & Fuad', 'description' => 'Memplajari Database logic, life cycle via MongoDB '],

            // Add more subjects as needed
        ];

        foreach ($subjects as $subject) {
            DB::table('subject')->insert($subject);
        }
    }
}
