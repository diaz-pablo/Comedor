<?php

namespace Database\Seeders;

use App\Models\Starter;
use Illuminate\Database\Seeder;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Starter::factory(10)->create();
    }
}
