<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->words(3, true);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'user_id' => '1',
            'category_id' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->words(5, true),
            'active' => $this->faker->numberBetween(0, 1),
            'feature' => $this->faker->numberBetween(0, 1),
        ];
    }
}
