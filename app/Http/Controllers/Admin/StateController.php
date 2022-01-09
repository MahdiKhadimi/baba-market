<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeStateRequest;
use App\Http\Controllers\Admin\Services\CityService;
use App\Http\Controllers\Admin\Services\StateService;



class StateController extends Controller
{
    /**
     * get all city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAllCity()
    {

        $cities = CityService::getAll();
        return view('admin.cities.allstate' , compact('cities'));
    }

    /**
     * store new state to db
     *
     * @param storeStateRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(storeStateRequest $request)
    {
        StateService::create($request);
        return redirect(route('index.city'))->with('success-state', msg_succ());
    }

    
}