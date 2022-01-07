<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreColorRequest;
use App\Http\Controllers\Admin\Services\ColorService;

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
    
    public function store(StoreColorRequest $request)
    {
        ColorService::create($request);
        return redirect(route('index.color'))->with('success', msg_succ());
    }

}