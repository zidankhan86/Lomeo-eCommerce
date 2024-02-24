<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Brand::class;

    public function definition(): array
    {

        $image = $this->faker->imageUrl(300, 300);
        $imageName = basename($image);
        Storage::disk('public')->put('/public/uploads/'.$imageName, file_get_contents($image));

        return [
            'name' => $this->faker->company,
            'image' => '/public/uploads/'.$imageName,
            'slug' => Str::slug($this->faker->company),
            'category_id' => Category::factory()->create()->id,
        ];
    }
}
