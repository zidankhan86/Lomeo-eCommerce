<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HeroTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_hero_backend_hero_form_route(): void
    {
        $response = $this->get(route('hero.form'));

        $response->assertStatus(302);
    }


    public function test_hero_backend_hero_list_page_route(): void
    {
        $response = $this->get(route('hero.list'));

        $response->assertStatus(302);
    }
}
