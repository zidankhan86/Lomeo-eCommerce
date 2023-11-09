<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\ProductController as FrontendProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Frontend

//Pages
Route::get('/',[FrontendHomeController::class,'index'])->name('home');
Route::get('/product/page',[FrontendProductController::class,'index'])->name('product.page');

Route::get('/product/details/{id}',[FrontendProductController::class,'show'])->name('details');

Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('/category',[CategoryController::class,'index'])->name('category');

Route::get('/products/cart', [ProductController::class,'cart'])->name('cart');


//Auth
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/store',[AuthController::class,'store'])->name('store');

//Register
Route::get('/registration',[RegistrationController::class,'index'])->name('registration');
Route::post('/registration/store',[RegistrationController::class,'store'])->name('registration.store');

//Backend

//Middleware
Route::group(['middleware'=>'auth'],function(){

    Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/remove-from-cart/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

    //Pages
    Route::get('/app',[HomeController::class,'index'])->name('app');
    Route::get('/product', [ProductController::class,'index'])->name('products.index');
    Route::get('/logout',[TestController::class,'logout'])->name('logout');
    Route::get('/form',[TestController::class,'form'])->name('form');
    Route::get('/setting',[SettingController::class,'index'])->name('setting');
    Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change.password');

    Route::get('/user-list',[AuthController::class,'list'])->name('user.list');
    Route::get('/category-list',[CategoryController::class,'list'])->name('category.list');
    Route::get('/category-form',[CategoryController::class,'create'])->name('category.form');
    Route::get('/product-list', [ProductController::class,'list'])->name('product.list');
    Route::get('/brand-list', [BrandController::class,'list'])->name('brand.list');
    Route::get('/brand-form', [BrandController::class,'create'])->name('brand.create');
    Route::get('/product-gallery/{id}', [ProductController::class,'gallery'])->name('product.gallery');
    //Edit
    Route::get('/brand-form/{id}', [BrandController::class,'edit'])->name('brand.edit');
    Route::get('/product/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::get('/category-form/{id}',[CategoryController::class,'edit'])->name('category.edit');

    //Post
    Route::post('/update-password/{id}',[ChangePasswordController::class,'update'])->name('update.password');
    Route::post('/product', [ProductController::class,'store'])->name('product');
    Route::post('/category-store',[CategoryController::class,'store'])->name('category.store');
    Route::post('/brand-store', [BrandController::class,'store'])->name('brand.store');
    Route::post('/brand-update/{id}', [BrandController::class,'update'])->name('brand.update');
    Route::post('/product/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::post('/product-gallery-store', [ProductController::class,'galleryStore'])->name('gallery.store');
    Route::post('/category-update/{id}',[CategoryController::class,'update'])->name('category.update');

    //profile
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    //post
    Route::post('/registration/update{id}',[RegistrationController::class,'update'])->name('registration.update');
});
