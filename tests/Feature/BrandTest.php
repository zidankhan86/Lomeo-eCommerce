<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrandTest extends TestCase
{
    use RefreshDatabase;

    public function test_brand_form_page(): void
    {
        $response = $this->get(route('brand.create'));

        $response->assertStatus(302);
    }

    

    public function test_brand_list_page(): void
    {
        $response = $this->get(route('brand.list'));

        $response->assertStatus(302);
    }




    public function test_brand_frontend_page(): void
    {
        $response = $this->get(route('brand.page'));

        $response->assertStatus(200);
    }
}
