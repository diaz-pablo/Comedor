<?php

namespace Database\Factories;

use App\Models\Starter;
use Illuminate\Database\Eloquent\Factories\Factory;

class StarterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Starter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3, true)
        ];
    }
}
