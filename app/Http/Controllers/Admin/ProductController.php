<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\BrandService;
use App\Http\Controllers\Admin\Services\CategoryService;
use App\Http\Controllers\Admin\Services\ColorService;
use App\Http\Controllers\Admin\Services\ProductService;
use App\Http\Controllers\Admin\Services\SizeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\getSubCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
      

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
     
        return view('admin.products.create');
    }

   

             'categories',
                'sizes',
                'colors',
                'brands',
                'subCategories'
            ));
    }

    public function Update(UpdateProductRequest $request)
    {
        $update_result = ProductService::Update($request);

        if ($update_result) {
            return redirect()
                ->back()
                ->with('succ', config('shop.msg.update'));
        }
        return redirect()
            ->back()
            ->with('fail', config('shop.msg.fail_update'));
    }
}