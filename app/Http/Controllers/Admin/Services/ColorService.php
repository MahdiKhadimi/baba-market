<?php

namespace App\Http\Controllers\Admin\Services;

use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateColorRequest;
use Symfony\Component\HttpFoundation\Request;

class ColorService extends Controller
{


    /**
     * return colors 
     *  @param null
     * @return mixed
     */
    public function getAll()
    {
        return Color::get();
    }

    /**
     * return data with pagination
     * @param null $perPage
     * @return mixed
     */
    public static function getWithPaginate($perPage = null)
    {
        return Color::paginate($perPage ?? config('shop.perPage'));
    }

      /**
     * store new data in db
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public static function create(Request $request)
    {
        return Color::query()
                    ->create($request->toArray());
    }
    
     /**
     * update color by id
     * @param $id
     * @param $name
     * @param $code
     */
    public static function update($id, $name, $code)
    {
        $color = Color::query()
                      ->find($id);
        return $color->update([
            'name' => $name,
            'code' => $code
        ]);
    }

}