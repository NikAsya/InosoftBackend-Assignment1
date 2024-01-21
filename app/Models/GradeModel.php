<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;


class GradeModel extends EloquentModel
{
    protected $connection = 'mongodb';
    protected $collection = 'grade';

    protected $fillable = ['student_id', 'subject', 'exercises', 'weekly_exams', 'mid_semester_exam', 'end_semester_exam'];

    // Additional configuration or relationships can be added here
    public function students()
    {
        return $this->belongsTo(StudentModel::class, 'student_id');
    }

    public function calculateAverage(): float
    {
        $exercisesWeight = 0.15;
        $weeklyExamsWeight = 0.20;
        $midSemesterExamWeight = 0.25;
        $endSemesterExamWeight = 0.40;

        $average = (
            $exercisesWeight * $this->exercises +
            $weeklyExamsWeight * $this->weekly_exams +
            $midSemesterExamWeight * $this->mid_semester_exam +
            $endSemesterExamWeight * $this->end_semester_exam
        );

        return $average;
    }
}
