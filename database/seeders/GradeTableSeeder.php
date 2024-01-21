<?php

namespace Database\Seeders;

use App\Models\GradeModel;
use App\Models\SubjectModel;
use App\Models\StudentModel;
use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all subjects and students
        $subjects = SubjectModel::all();
        $students = StudentModel::all();

        foreach ($students as $student) {
            foreach ($subjects as $subject) {
                $data = [
                    'student_id' => $student->getKey(),
                    'subject' => $subject->subject_name,
                    'exercises' => rand(20, 100),
                    'weekly_exams' => rand(20, 100),
                    'mid_semester_exam' => rand(20, 100),
                    'end_semester_exam' => rand(20, 100),
                ];

                // Check if the record already exists
                $existingRecord = GradeModel::where('student_id', $student->getKey())
                    ->where('subject', $subject->subject_name)
                    ->exists();

                if (!$existingRecord) {
                    // Insert data into the grades table
                    try {
                        GradeModel::create($data);
                    } catch (\Exception $e) {
                        dd($e->getMessage());
                    }
                }
            }
        }
    }
}
