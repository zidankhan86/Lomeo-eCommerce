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

    public function test_forntend_product_index(): void
         {
        $response = $this->get(route('product.page'));

        $response->assertStatus(200);
        }

    public function test_backend_product_create(): void
        {
        $response = $this->get(route('products.index'));

        $response->assertStatus(302);
        }


    public function test_backend_product_list(): void
        {
        $response = $this->get(route('product.list'));

        $response->assertStatus(302);
        }


    public function test_frontend_product_page(): void
        {
        $response = $this->get(route('product.page'));

        $response->assertStatus(200);

        }


            

}
