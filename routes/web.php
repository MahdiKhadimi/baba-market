<?php

use Illuminate\Support\Facades\Route;
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





Route::get('/logout', [UserController::class,'logout'])->name('users.logout');