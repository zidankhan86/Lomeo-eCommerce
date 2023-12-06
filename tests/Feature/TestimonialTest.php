<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestimonialTest extends TestCase
{
    
    public function test_for_testimonial_create_form(): void
    {
        $response = $this->get(route('testimonial.form'));

        $response->assertStatus(302);
    }

    public function test_for_testimonial_list_route(): void
    {
        $response = $this->get(route('testimonial.list'));

        $response->assertStatus(302);
    }
}
