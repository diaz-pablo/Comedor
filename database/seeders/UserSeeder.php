<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'role_id' => Role::ADMIN_ID,
            'email' => 'admin@comedor.unsa',
            'status' => User::ACTIVE,
            'email_verified_at' => now(),
            'deleted_at' => null,
        ]);

        User::factory(1)->create([
            'role_id' => Role::STUDENT_ID,
            'email' => 'student@comedor.unsa',
            'status' => User::ACTIVE,
            'email_verified_at' => now(),
            'deleted_at' => null,
        ]);

        User::factory(1000)->create();
    }
}
