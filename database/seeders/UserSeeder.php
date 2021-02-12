<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Student;
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
            'email' => 'administrador@comedor.unsa',
            'email_verified_at' => now(),
        ]);

        User::factory(1)->create([
            'role_id' => Role::STUDENT_ID,
            'email' => 'estudiante@comedor.unsa',
            'email_verified_at' => now(),
        ])->each(function (User $user) {
            Student::factory(1)->create([
                'user_id' => $user->id,
                'status' => Student::ACTIVE,
            ]);
        });

        User::factory(98)
            ->create()
            ->each(function (User $user) {
                Student::factory(1)->create([
                   'user_id' => $user->id,
                ]);
            });
    }
}
