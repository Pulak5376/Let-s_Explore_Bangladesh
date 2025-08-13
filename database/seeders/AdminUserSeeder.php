<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $name = 'Sabbir';
        $email = 'ahmed15-4916@diu.edu.bd';
        $role = 'admin';

        if (!User::where('email', $email)->where('role', $role)->exists()) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('4916'),
                'role' => $role,
            ]);
            $this->command->info("Admin user created successfully!");
        } else {
            $this->command->info("Admin user already exists.");
        }
    }
}
