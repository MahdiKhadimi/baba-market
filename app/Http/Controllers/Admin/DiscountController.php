<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\DiscountService;
use App\Http\Controllers\Controller;
use App\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = DiscountService::getWithPagination();
        return view('admin.discounts.index', compact('discounts'));
    }


}