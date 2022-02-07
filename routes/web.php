<?php

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', [DashboardController::class , 'index'])
         ->name('index.admin.dashboard');

   /*
 |------------------------------
 | User
 |------------------------------
 |
 |
 |
 */
      Route::group(['prefix', 'user'], function () {
     
         Route::get('/add/wishlist/{product}', [UserController::class, 'addWishList'])
              ->name('add.wish.user')
              ->middleware('userauth');
     
        Route::get('/wishlist', [UserController::class, 'getUserWishList'])
              ->name('show.wish.user');
     
         Route::get('/wishlist/{wishlist}', [UserController::class, 'removeWishList'])
              ->name('del.wish.user')
              ->can('delete', 'wishlist');
     
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

    //show edit form
    Route::get('/category/edit/{category}', [CategoryController::class, 'ShowEdit'])
         ->name('show.edit.category');

    //update category
    Route::post('/category/edit' , [CategoryController::class , 'Update'])
        ->name('update.category');


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
    Route::get('/brand/edit/{brand}', [BrandController::class, 'ShowEdit'])
                  ->name('show.edit.brand');
         
    Route::post('/brand/update', [BrandController::class, 'Update'])
                  ->name('update.brand');
         

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

      //show eidt form
    Route::get('/color/edit/{color}'  , [ColorController::class , 'ShowEdit'])
        ->name('show.edit.color');

    Route::post('/color/update' , [ColorController::class , 'Update'])
        ->name('update.color');
    

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
    //show edit form
    Route::get('/edit/{size}', [SizeController::class, 'ShowEdit'])
         ->name('show.edit.size');

    Route::post('/edit', [SizeController::class, 'Update'])
         ->name('update.size');

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
  
    //store new state
  Route::post('/state', [StateController::class, 'store'])
  ->name('store.state');

 //get state By City Id
  Route::post('/city/state', [StateController::class, 'getByCityId'])
     ->name('get.state');


     /*
     |------------------------------
     | Didsount
     |------------------------------
     */
    //show discount
    Route::get('/discount', [DiscountController::class, 'index'])
    ->name('index.discount');

    //store new discount
    Route::post('/discount', [DiscountController::class, 'store'])
    ->name('store.discount');
   //show edit form
    Route::get('/discount/edit/{discount}', [DiscountController::class, 'ShowEdit'])
         ->name('show.edit.discount');

    //update
    Route::post('/discount/update', [DiscountController::class, 'Update'])
         ->name('update.discount');

   /*
     |------------------------------
     | Product
     |------------------------------
     */
    //all proudct
    Route::get('/product', [ProductController::class, 'index'])
         ->name('index.product');
    //show create form
    Route::get('product/create', [ProductController::class, 'create'])
         ->name('create.product');
   //show edit form
    Route::get('/product/{product}', [ProductController::class, 'ShowEdit'])
            ->name('show.edit.product');
  
     Route::post('/product/update', [ProductController::class, 'Update'])
           ->name('update.product');
  
    //save product to db
    Route::post('/product', [ProductController::class, 'store'])
         ->name('store.product');
         
      //get subcategory used by ajax in the create form
    Route::post('/product/subcategory', [ProductController::class, 'getSubCategory'])
    ->name('subcategory.product');

    //get product by id (more details)
    Route::get('/product/{product}/{slug}', [ProductController::class, 'getProductById'])
         ->name('get.product');

    //add new product to basket , increase count
    Route::post("/basket/add" , [UserController::class , 'addBasket'])
        ->name('add.basket.user')->middleware('userauth');

    //decrease proudct in basket cout field
    Route::post("/basket/dec" , [UserController::class , 'decCount'])
        ->name('dec.basket.user')->middleware('userauth');
        
         //remove basket
    Route::get('/basket/del/{basket}', [UserController::class, 'delBasket'])
        ->name('del.basket.user');

     Route::any('/basket/show/all', [UserController::class, 'showAllBasket'])->name('all.basket.user');

    

    Route::get('/basket/incr/{basket}' , [UserController::class , 'IncreaseCount'])
                 ->name('increase.basket.user');

     /*
     |------------------------------
     | Orders
     |------------------------------
     |
     */
    Route::get('/orders/all' , [OrderController::class, 'index'])
        ->name('index.order');

    Route::get('/orders/single/{order}' , [OrderController::class , 'SingleOrder'])
        ->name('single.order');

    Route::post('/order/change/status' , [OrderController::class , 'ChangeStatus'])
        ->name('change.status.order');
            
          /*
           |------------------------------
           | Register / Login
           |------------------------------
           */
          //show register view
          Route::view('/register', 'auth.register')
               ->name('show.register');
          
          
          Route::post('/register', [AuthController::class, 'register'])
               ->name('register');
          
          //show login view
          Route::view('/login', 'auth.login')
               ->name('show.login');
          
         
          //show otp view
          Route::view('/otp/verify', 'auth.otp')
               ->name('show.otp');
          
          Route::post('/optcheck', [AuthController::class, 'otpCheck'])
               ->name('otp.check');
          
          Route::view('/get/password', 'auth.password')
               ->name('get.password');
          
          Route::post('/set/password', [AuthController::class, 'setPassword'])
               ->name('set.password');
          
          
               //--------------------------------
               Route::group(['prefix' => 'dashboard' , 'middleware'=>'auth','adminauth'], function () {

              Route::view('/', 'admin.layouts.app');
          
            });             
          
/*
+ |------------------------------
+ | Admin Routes
+ |------------------------------
+ |
+ |
+ |
+ */

            //show address
      Route::any('/basket/show/address', [UserController::class, 'showAddress'])
         ->name('address.basket.user');

      Route::post('/basket/add/address', [UserController::class, 'AddAddress'])
         ->name('address.add.user');

      Route::post('/basket/get/state', [UserController::class, 'GetStateByCityId'])
         ->name('state.basket.user');

      //pay
       Route::get('/basket/pay/{order}', [UserController::class, 'Pay'])
         ->name('pay.user');



     Route::view('/t', 'singleproduct');
          


          Route::get('/cart/{id}/{title}/{cnt}', function ($id, $title, $cnt) {
          
              $cart[1] = ['id' => 1, 'title' => 'phone', 'cnt' => 2];
              $cart[2] = ['id' => 2, 'title' => 'tshirt', 'cnt' => 3];
          
              $cart = serialize($cart);
          
          
              $a = cookie('cart', $cart, 20);
          
              return redirect('/t')->withCookie($a);
             });
          


          Route::get('/l', function () {
              \Illuminate\Support\Facades\Session::flush();
              \Illuminate\Support\Facades\Auth::logout();
              return redirect(route('login'));
              return Brand::factory()->create();
          });



                       
     Route::view('/t' , 'home');

     Route::get('/logout', [AuthController::class, 'logout'])
              ->name('logout')
              ->middleware('userauth');
     