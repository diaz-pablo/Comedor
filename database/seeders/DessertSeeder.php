<?php

namespace Database\Seeders;

use App\Models\Dessert;
use Illuminate\Database\Seeder;

class DessertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dessert::factory(10)->create();
    }
}
