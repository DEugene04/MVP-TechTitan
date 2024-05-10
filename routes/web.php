<?php

use App\Http\Controllers\FoodMainController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/add-menu', [FoodMainController::class, 'add']);

Route::post('/store-menu', [FoodMainController::class, 'store']);

Route::get('/', [FoodMainController::class, 'showMenu']); // untuk show all menu di homepage

Route::get('/add-menu', [FoodMainController::class, 'read2']); // untuk show data DB di admin page

Route::get('/edit-menu/{id}', [FoodMainController::class, 'edit']); // untuk edit datanya
Route::patch('/update-menu/{id}', [FoodMainController::class, 'update']); // untuk update datanya

Route::delete('/delete-menu/{id}', [FoodMainController::class, 'delete']); // Delete file di DB

Route::get('/search', [FoodMainController::class, 'search'])->name('search'); // route untuk search bar

// Routing for Register and Login
Route::controller(RegisterController::class)->group(function(){
    Route::get('register', 'register')->name('register'); // return view display register page
    Route::post('register', 'registerSave')->name('registerSave'); // untuk save user register credential di DB

    Route::get('login', 'login')->name('login'); // return view display login page
    Route::post('login', 'loginAction')->name('login.action'); // untuk bisa login user dan auth
});

// Cartpage Routing
Route::get('/cartPage', [FoodMainController::class, 'showCart']); //untuk bisa display cartpagenyaa beserta seluruh datanya

Route::post('/addcart/{id}', [FoodMainController::class, 'addcart']); // pas user click add to cart, data dari product yang dipecet smw ke store ke dbnya cart

Route::delete('/delete-cart/{id}', [FoodMainController::class, 'deleteCart']); // Delete file di DB

// Checkout routing
Route::get('/checkout', [FoodMainController::class, 'checkout']);

Route::post('confirmOrder', [FoodMainController::class, 'confirmOrder'])->middleware(['auth', 'verified']);