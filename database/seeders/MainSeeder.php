<?php

namespace Database\Seeders;

use App\Models\Main;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Main::factory(10)->create();
    }
}
