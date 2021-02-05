<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role_id' => Role::STUDENT_ID,
            'document_number' => $this->faker->randomNumber(8, true),
            'surname' => $this->faker->lastName,
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'status' => $this->faker->randomElement([User::SUSPENDED, User::PENDING, User::ACTIVE]),
            'email_verified_at' => $this->faker->randomElement([null, now()]),
            'remember_token' => $this->faker->randomElement([null, Str::random(10)]),
            'deleted_at' => $this->faker->randomElement([null, now()])
        ];
    }
}
