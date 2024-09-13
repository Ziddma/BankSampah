<?php

// database/seeders/UserSeeder.php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin', // Assigning 'admin' role
        ]);

        User::factory()->create([
            'name' => 'Regular',
            'last_name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 'user', // Assigning 'user' role
        ]);
    }
}
