<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestimonialTest extends TestCase
{

    use RefreshDatabase,WithFaker;

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

    public function test_testimonials_create_data_for_backend()
    {
        $user = User::create([
            "name"      => "fakeName",
            "email"     => "Fake@gmail.com",
            "last_name" => "fakeLast",
            "phone"     => "01776718178",
            "password"  => Hash::make('123456'),
            "role"      => "admin",
            "image"     =>"nullable",
            "address"   =>"fake Dhaka"
        ]);

        $this->actingAs($user);

        Storage::fake('public');

        $data = [
            'name'          => $this->faker->name,
            'image'         => UploadedFile::fake()->image('Fake_image.jpg'),
            'drscription'   =>'fake description',
            'positon'       =>'CEO'
        ];

        $response = $this->post(route('testimonial.store'), $data);

        $response->assertStatus(302);

    }
}
