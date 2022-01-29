<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateSizeRequest;
use App\Http\Controllers\Admin\Services\SizeService;

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

    public function ShowEdit(Size $size)
     {
            return view('admin.sizes.edit', compact('size'));
     }
    
        /**
         * Update Size
         */
        public function Update(UpdateSizeRequest $request)
        {
            $update_result = SizeService::update($request->id, $request->title);
    
            if ($update_result === false)
                return redirect()
                    ->back()
                    ->with('fail', config('shop.msg.fail_update'));
    
    
            return redirect()
                ->back()
                ->with('success', config('shop.msg.update'));
        }
    
}