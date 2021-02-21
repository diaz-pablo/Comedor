<?php

namespace Database\Seeders;

use App\Models\Menu;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dates = CarbonPeriod::create('2021-01-01', '2021-03-31');

        $dates->forEach(function ($date) {
            Menu::factory(1)->create([
                'service_at' => $date->toDateString(),
                'publication_at' => $date->subDays(7)->toDateString()
            ]);
        });
    }
}
