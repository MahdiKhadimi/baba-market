<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\SizeService;
use App\Http\Controllers\Controller;

use App\Models\Size;

class SizeController extends Controller
{
    /**
     * return data with pagination to view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sizes = SizeService::getWithPagination();
        return view('admin.sizes.index', compact('sizes'));
    }
  
}

