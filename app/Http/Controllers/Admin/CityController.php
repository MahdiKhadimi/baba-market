<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\CityService;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeCityRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = CityService::getAll();
        return view('admin.cities.index',compact('cities'));
    }


}