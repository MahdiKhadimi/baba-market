<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::get();

        return view('admin.categories.index', compact('categories', 'cats_paginate'));
    }


}