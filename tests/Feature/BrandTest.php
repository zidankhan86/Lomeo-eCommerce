<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BrandTest extends TestCase
{
    use RefreshDatabase ,WithFaker;

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

    public function test_brand_for_backend_Store()
    {
        $user = User::create([
            'name' => 'fakeName',
            'email' => 'Fake@gmail.com',
            'last_name' => 'fakeLast',
            'phone' => '01776718178',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'image' => 'nullable',
            'address' => 'fake Dhaka',
        ]);

        $this->actingAs($user);

        Storage::fake('public');

        $data = [
            'name' => $this->faker->name,
            'image' => UploadedFile::fake()->image('fake_image.jpg'),

        ];

        $response = $this->post(route('brand.store'), $data);

        $response->assertStatus(302);

    }
}
