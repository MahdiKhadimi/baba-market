<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DiscountService extends Controller
{
   
       /**
     * store data in db
     * @param Request $request
     */
    public static function create(Request $request)
    {
        if ($request->hasFile('image'))
            $imageName = uploadService::handle($request->file('image'), config('shop.discountImagePath'), 'discount');


        Discount::create([
            'title'      => $request->title,
            'percent'    => $request->percent,
            'image'      => $imageName ?? null,
            'started_at' => $request->started_at,
            'end_at'     => $request->end_at
        ]);

    }
}