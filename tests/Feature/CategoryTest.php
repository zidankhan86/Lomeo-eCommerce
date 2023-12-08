<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use faker;
use Illuminate\Support\Facades\Hash;

class CategoryTest extends TestCase
{

    use RefreshDatabase ,WithFaker;

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



    public function test_categoty_for_backend_Store()
    {
        $user = User::create([
            "name"          => "fakeName",
            "email"         => "Fake@gmail.com",
            "last_name"     => "fakeLast",
            "phone"         => "01776718178",
            "password"      => Hash::make('123456'),
            "role"          => "admin",
            "image"         =>"nullable",
            "address"       =>"fake Dhaka"
        ]);

        $this->actingAs($user);

        Storage::fake('public');

        $data = [
            'name' => $this->faker->name,
            'image' => UploadedFile::fake()->image('category_image.jpg'),
            
        ];

        $response = $this->post(route('category.store'), $data);

        $response->assertStatus(302);

    }


}
