<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Services\DashboardService;

class DashboardController extends Controller
{
    //
        public function index()
        {
            $data = DashboardService::getInformation();
            
                    return view('admin.dashboard.index', compact(
                        'data'
                   ));      
       } 
}