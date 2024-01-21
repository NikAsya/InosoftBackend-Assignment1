<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;

class StudentModel extends EloquentModel
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'student_models';
    protected $fillable = ['first_name', 'last_name', 'class_id', 'gender'];

    public function grades()
    {
        return $this->hasMany(GradeModel::class, 'student_id');
    }

    protected static function newFactory()
    {
        return \Database\Factories\StudentModelFactory::new();
    }

    public function studentClass()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    // Additional configuration or relationships can be added here

}
