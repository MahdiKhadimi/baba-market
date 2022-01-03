<?php


namespace App\Http\Controllers\Admin\Services;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{


    /**
     * get all category
     *
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return Category::all();
    }
}