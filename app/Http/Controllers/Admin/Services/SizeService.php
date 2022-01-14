<?php

namespace App\Http\Controllers\Admin\Services;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSizeRequest;

class SizeService extends Controller
{

  /**
   * @param null
   * @return \Illuminate\Database\Eloquent\Collection
   */
   public function getAll()
   {
       return Size::get();
   }


    /**
     * return  data with pagination
     *
     * @param null $perPage
     * @return mixed
     */
    public static function getWithPagination($perPage = null)
    {
        return Size::paginate($perPage ?? config('shop.perPage'));
    }

    
    /**
     * store new size in db
     * @param \App\Http\Requests\StoreSizeRequest $request
     */
    public static function create(Request $request)
    {
        return Size::create($request->toArray());
    }
 
    /**
     * store new size to db
     * @param StoreSizeRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreSizeRequest $request)
    {
        SizeService::create($request);
        return redirect(route('index.size'))->with('success', msg_succ());
    }

    
}