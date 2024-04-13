<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    \App\Models\User::factory()->create([
        'name' => 'User',
        'email' => 'user@user.com',
    ]);
    \App\Models\User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
    ]);

    \App\Models\Role::create([
        'nom' => 'Admin',
        'description' => 'admin role',
    ]);
    \App\Models\Role::create([
        'nom' => 'User',
        'description' => 'user role',
    ]);

    \App\Models\Permission::create([
        'nom' => 'add user',
        'description' => 'user can add a new user',
    ]);
    \App\Models\Permission::create([
        'nom' => 'view user',
        'description' => 'user can view the user information',
    ]);
}
}