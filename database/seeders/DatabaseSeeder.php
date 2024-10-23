<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 users
        User::factory(5)->create()->each(function ($user) {
            // For each user, create 3 posts
            Post::factory(3)->create([
                'user_id' => $user->id, // Associate posts with the user
            ]);
        });
    }
}
