<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user from environment variables
        // Using firstOrCreate to make this seeder idempotent (safe to run multiple times)
        $email = env('SIMRS_ADMIN_EMAIL');
        $password = env('SIMRS_ADMIN_PASSWORD');
        $name = env('SIMRS_ADMIN_NAME', 'Admin');
        $role = env('SIMRS_ADMIN_ROLE', 'admin');

        if (!$email || !$password) {
            $this->command->warn('Admin user not created: SIMRS_ADMIN_EMAIL and SIMRS_ADMIN_PASSWORD must be set in .env');
            return;
        }

        User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
                'role' => $role,
            ]
        );

        $this->command->info("Admin user created successfully (email: {$email})");
    }
}
