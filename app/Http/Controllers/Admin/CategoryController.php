<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\Admin\Services\CategoryService;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = CategoryService::getAll();
        $cats_paginate = Category::getWithPaginate();
        return view('admin.categories.index', compact('categories', 'cats_paginate'));
    }

    public function store(StoreCategoryRequest $request)
    {

        CategoryService::createNew($request);
        return redirect(route('index.category'))->with('success', config('shop.msg.create'));

    }

}