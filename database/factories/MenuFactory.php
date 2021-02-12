<?php

namespace Database\Factories;

use App\Models\Dessert;
use App\Models\Main;
use App\Models\Menu;
use App\Models\Role;
use App\Models\Starter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::where('role_id', Role::ADMIN_ID)->first()->id,
            'starter_id' => Starter::all()->random()->id,
            'main_id' => Main::all()->random()->id,
            'dessert_id' => Dessert::all()->random()->id,
            'service_at' => $this->faker->date(),
            'publication_at' => $this->faker->date(),
            'available_quantity' => $this->faker->numberBetween(0, 500),
        ];
    }
}
