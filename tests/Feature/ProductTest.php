<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{

    use RefreshDatabase ,WithFaker;

    public function test_forntend_product_index(): void
         {
        $response = $this->get(route('product.page'));

        $response->assertStatus(200);
        }

    public function test_backend_product_create_page(): void
        {
        $response = $this->get(route('products.index'));

        $response->assertStatus(302);
        }


    public function test_backend_product_list(): void
        {
        $response = $this->get(route('product.list'));

        $response->assertStatus(302);
        }


    public function test_frontend_product_page(): void
        {
        $response = $this->get(route('product.page'));

        $response->assertStatus(200);

        }

        public function test_backend_product_store(): void
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

                'name'                  => 'fake name',
                'price'                 => '120',
                'image'                 => 'fake.japg',
                'long_description'      => $this->faker->paragraph,
                'short_description'     => $this->faker->paragraph,
                'thumbnail' => UploadedFile::fake()->image('thumbnail_image.jpg'),
                'stock'                 => '12',
                'status'                => '1',
                'discount'              => '3',
                'category_id'           => '1',

            ];

        $response = $this->post(route('product'), $data);

        $response->assertStatus(302);
        }




}
