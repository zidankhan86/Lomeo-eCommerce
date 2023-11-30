<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    
    public function definition(): array
    {
        return [
        'name' => $this->faker->name,
        'slug' => Str::slug($this->faker->name),
        'image' => $this->faker->imageUrl(300, 300),
        'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
