<?php

use App\Http\Controllers\FoodMainController;
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


