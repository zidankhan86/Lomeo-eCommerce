<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{

    use RefreshDatabase;


    public function test_example(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }

    
}
