<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Category::factory(20)->create();
        // User::factory(10)->create();
        // Post::factory(20)->create();
        User::create([
            'name' => 'Super Admin',
            'phone' => '09881234567',
            'profile' => '/images/profiles/sa.png',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'Super Admin',
           ]);

    }
}
