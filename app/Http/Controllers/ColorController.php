<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\ColorService;
use App\Http\Controllers\Controller;

use App\Models\Color;

class ColorController extends Controller
{
    /**
     * return  all data to view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $colors = ColorService::getWithPaginate();
        return view('admin.colors.index', compact('colors'));
    }
}