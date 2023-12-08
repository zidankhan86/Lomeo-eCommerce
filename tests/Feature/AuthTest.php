<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    public function test_login_page_route_for_admin_login_to_dashboard(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }


    public function test_for_login_process_backend_with_post_route_for_admin_login(): void
    {
        $user = User::create([
            'name'      => 'fakeName',
            'email'     => 'fake@gmail.com',
            'last_name' => 'fakeLast',
            'phone'     => '01776718178',
            'password'  => Hash::make('123456'),
            'role'      => 'admin',
            'image'     => null,
            'address'   => 'fake Dhaka',
        ]);

        $this->actingAs($user);

        $this->assertAuthenticated();

        $data = [
            'email' => $this->faker->email,
            'password' => Hash::make('123456'),
        ];

        $response = $this->post(route('login.authenticate'), $data);

        $response->assertStatus(302)->assertRedirect(route('home'));
    }



    public function test_with_wrong_password_for_admin_login(): void
    {
        $user = User::create([
            "name"      => "fakeName",
            "email"     => "Fake@gmail.com",
            "last_name" => "fakeLast",
            "phone"     => "01776718178",
            "password"  => Hash::make('1234564'),
            "role"      => "admin",
            "image"     =>"nullable",
            "address"   =>"fake Dhaka"
        ]);


        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }




    public function test_user_logout_from_backend(): void
{
    $user = User::create([
        "name"      => "fakeName",
        "email"     => "Fake@gmail.com",
        "last_name" => "fakeLast",
        "phone"     => "01776718178",
        "password"  => Hash::make('1234564'),
        "role"      => "admin",
        "image"     => "nullable",
        "address"   => "fake Dhaka"
    ]);

    $response = $this->actingAs($user)->get(route('logout'));

    $response->assertStatus(302);

    $this->assertGuest();

    $response->assertRedirect('/');

}


//Registration

public function test_frontend_registration_for_user_route(): void
    {
        $response = $this->get(route('register.page'));

        $response->assertStatus(200);
    }

public function test_frontend_registration_for_user_store_route(): void
    {
        $response = $this->post(route('register.store'));

        $response->assertStatus(302);
    }

    public function test_frontend_registration_for_user_to_store_data(): void
    {
        $data = [
            "name" => $this->faker->name,
            "email" => $this->faker->unique()->safeEmail,
            "last_name" => $this->faker->lastName,
            "phone" => $this->faker->phoneNumber,
            "password" => Hash::make('123456'),
            "role" => "admin",
            "image" => null,
            "address" => $this->faker->address,
        ];

        $response = $this->post(route('register.store'), $data);

        $response->assertStatus(302);
    }

    public function test_frontend_registration_for_user_list_route(): void
    {


        $response = $this->get(route('user.list'),);

        $response->assertStatus(302);
    }
}
