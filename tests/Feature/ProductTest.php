<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{

    use RefreshDatabase;
    public function test_index(): void
         {
        $response = $this->get(route('product.page'));

        $response->assertStatus(200);
        }

    public function test_create(): void
        {
        $response = $this->get(route('products.index'));

        //302 status code
        $response->assertStatus(302);
        }

        use RefreshDatabase;

        public function test_edit_returns_view_with_product_and_related_data(): void
        {
            
            $product = Product::factory()->create();
            $category = Category::factory()->create();
            $brand = Brand::factory()->create();


            $product->category()->associate($category);
            $product->brand()->associate($brand);
            $product->save();


            $response = $this->get(route('product.edit', ['id' => $product->id]));

            $response->assertStatus(302);
            $response->assertStatus(200);

            $response->assertViewIs('backend.pages.productEdit');


        }




}
