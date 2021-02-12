<?php

namespace Database\Factories;

use App\Models\Dessert;
use Illuminate\Database\Eloquent\Factories\Factory;

class DessertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dessert::class;

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
