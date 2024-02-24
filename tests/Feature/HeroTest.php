<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HeroTest extends TestCase
{
    use RefreshDatabase,WithFaker;

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

    public function test_hero_backend_hero_store_data(): void
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
            'discount' => '140',

        ];

        $response = $this->post(route('hero.store'), $data);

        $response->assertStatus(302);
    }
}
