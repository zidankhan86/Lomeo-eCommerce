<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition()
    {
        $imageName = null;

        $category = Category::factory()->create();
        $brand = Brand::factory()->create();

        return [
            'name' => $this->faker->word,
            'long_description' => $this->faker->paragraph,
            'short_description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'slug' => $this->faker->slug,
            'featured' => $this->faker->boolean,
            'thumbnail' => '20231130102039.jpg'.$imageName,
            'stock' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->boolean,
            'discount' => $this->faker->optional(0.5)->randomFloat(2, 5, 20),
            'category_id' => $category->id,
            'brand_id' => $brand->id,

        ];
    }
}
