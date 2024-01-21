<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as EloquentModel;


class ClassModel extends EloquentModel
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'class_models';
    protected $fillable = ['class_name'];
    // Additional configuration or relationships can be added here

    public function students()
    {
        return $this->hasMany(StudentModel::class, 'class_id');
    }
}
