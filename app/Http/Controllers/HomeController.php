<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\Services\CategoryService;
use App\Http\Controllers\Admin\Services\CommentService;
use App\Http\Controllers\Admin\Services\MenueService;
use App\Http\Controllers\Admin\Services\ProductService;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

    public function index()
    {
        //TODO :if loged in get basket info

        //get all product by pagination
        $products = ProductService::getWithPagination();

        $data = MenueService::getMenuAndSetCache();


        return view('home', compact('products', 'data'));
    }

    public function getSingleProduct(Product $product, $slug)
    {
        $data = MenueService::getMenuAndSetCache();

         $comments = CommentService::getWithPagination($product);
        return view('singleproduct', compact('product' , 'data' ,'comments'));
    }

     /**
     * get category for show in the menu bar
     * with create cache
     * @return mixed
     */
    private function getMenuAndSetCache()
    {
        if (!Cache::has('data')) {

            $data = CategoryService::getMenue();
            Cache::add('data', $data);
        }
        $data = Cache::get('data', now()->addMonth());
      
    }

}