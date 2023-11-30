<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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

        $response->assertStatus(200);
    }


}
