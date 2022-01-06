<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    /*
     |------------------------------
     | category
     |------------------------------
     */
    //show all
    Route::get('/category', [CategoryController::class, 'index'])
         ->name('index.category');
          //store new
    Route::post('/category', [CategoryController::class, 'store'])
    ->name('store.category');


     /*
     |------------------------------
     | Brand
     |------------------------------
     */
    //show all
    Route::get('/brand', [BrandController::class, 'index'])
         ->name('index.brand');

    //store new
    Route::post('/brand', [BrandController::class, 'store'])
         ->name('store.brand');


 /*
     |------------------------------
     | Color
     |------------------------------
     */
    //show all
    Route::get('/color', [ColorController::class, 'index'])
         ->name('index.color');

    //store new
    Route::post('/color', [ColorController::class, 'store'])
         ->name('store.color');


Route::get('/logout', [UserController::class,'logout'])->name('users.logout');