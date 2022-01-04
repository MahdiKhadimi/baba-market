<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandService extends Controller
{

    public static function getWithPaginate($perPage = null)
    {
        return Brand::query()
                    ->paginate($perPage ?? config('shop.perPage'));
    }

    public static function getAll()
    {
        return Brand::all();
    }
}