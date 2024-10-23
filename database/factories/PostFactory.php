<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(); // Generate a fake sentence for the title
        
        return [
            'user_id' => User::factory(), // Associate with a user
            'title' => $title, // Use generated title
            'slug' => Str::slug($title, '-'), // Create a slug from the title
            'content' => $this->faker->paragraphs(3, true), // Generate 3 paragraphs of fake content
            'image' => $this->faker->optional()->imageUrl(640, 480, 'nature', true, 'Post Image'), // Optionally generate a fake image URL
        ];
    }
}
