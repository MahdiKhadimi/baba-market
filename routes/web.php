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

    /*
     |------------------------------
     | Size
     |------------------------------
     */
    //show all
    Route::get('/size', [SizeController::class, 'index'])
         ->name('index.size');

    //store new
    Route::post('/size', [SizeController::class, 'store'])
         ->name('store.size');

           /*
     |------------------------------
     | City /State
     |------------------------------
     |
     |
     |
     */
    //show all
    Route::get('/City', [CityController::class, 'index'])
    ->name('index.city');

//store new city
Route::post('/city', [CityController::class, 'store'])
    ->name('store.city');

//state view
Route::get('/city/state', [StateController::class, 'getAllCity'])
    ->name('index.state');

Route::get('/logout', [UserController::class,'logout'])->name('users.logout');