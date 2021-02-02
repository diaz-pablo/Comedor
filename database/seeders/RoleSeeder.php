<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(1)->create([
            'name' => Role::ADMIN_NAME,
            'display_name' => 'Administrador'
        ]);

        Role::factory(1)->create([
            'name' => Role::STUDENT_NAME,
            'display_name' => 'Estudiante'
        ]);
    }
}
