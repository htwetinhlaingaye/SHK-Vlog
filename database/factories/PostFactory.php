<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'title'=>$this->faker->word,
            'image'=>$this->faker->imageUrl,
            'description'=>$this->faker->paragraph,
            'category_id'=>rand(1,10),
            'user_id'=>rand(1,2),
        ];
    }
}
