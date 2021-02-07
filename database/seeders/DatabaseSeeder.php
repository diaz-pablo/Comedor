<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('users');
        Storage::deleteDirectory('menus');

        Storage::makeDirectory('users');
        Storage::makeDirectory('menus');

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
