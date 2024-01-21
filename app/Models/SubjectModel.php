<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;

class SubjectModel extends EloquentModel
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'subject';
    protected $fillable = [
        'name',
        // other fields, if any
    ];

    // Additional configuration or relationships can be added here
    public function grades()
    {
        return $this->hasMany(GradeModel::class, 'subject_id');
    }
}
