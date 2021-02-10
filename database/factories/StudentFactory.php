<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => null,
            'document_number' => $this->faker->randomNumber(8, true),
            'status' => $this->faker->randomElement([
                Student::SUSPENDED,
                Student::PENDING, Student::PENDING,
                Student::ACTIVE, Student::ACTIVE, Student::ACTIVE
            ]),
        ];
    }
}
