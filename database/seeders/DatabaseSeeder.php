<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call your seeder classes here
        $this->call(ClassTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(StudentTableSeeder::class);
        $this->call(GradeTableSeeder::class);


        // You can also add other seeders if needed
        // $this->call(OtherSeeder::class);
    }
}
