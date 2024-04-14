<?php


use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create dummy users
        User::create([
            'nom' => 'John',
            'prénom' => 'Doe',
            'email' => 'john@example.com',
            'telephone' => '123456789',
            'login' => 'john_doe',
            'password' => bcrypt('password1'),
        ]);

        User::create([
            'nom' => 'Jane',
            'prénom' => 'Doe',
            'email' => 'jane@example.com',
            'telephone' => '987654321',
            'login' => 'jane_doe',
            'password' => bcrypt('password2'),
        ]);

        // Add more user creations as needed
    }
}
