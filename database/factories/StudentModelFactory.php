<?php

namespace Database\Factories;

use App\Models\StudentModel;
use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class StudentModelFactory extends Factory
{
    protected $model = StudentModel::class;

    private $names = ['Aniq', 'Winda', 'Rhaka', 'Bunga', 'Nikko', 'Urel'];

    public function definition()
    {
        return [
            'first_name' => $this->faker->randomElement($this->names),
            'last_name' => $this->faker->lastName,
            'class_id' => function () {
                return ClassModel::factory()->create()->id;
            },
            'gender' => $this->faker->randomElement(['Male', 'Female']),
        ];
    }
}
