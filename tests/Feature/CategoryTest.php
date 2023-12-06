<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_category_page(): void
    {
        $response = $this->get(route('category.form'));

        $response->assertStatus(302);
    }


    public function test_category_create_route(): void
    {
        $response = $this->post(route('category.store'));

        $response->assertStatus(302);
    }

    public function test_category_list_route(): void
    {
        $response = $this->get(route('category.list'));

        $response->assertStatus(302);
    }

}
