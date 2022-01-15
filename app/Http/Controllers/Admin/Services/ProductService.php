<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductGalleries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductService extends Controller
{

    /**
     * store new data to db
     * @param Request $request
     */
    public static function create(Request $request)
    {

          
          try {
            DB::beginTransaction();

            //save to db
            $product = Product::create($request->toArray());
           
            //set active
            $request['active'] = $request->has('active') ? true : false;

            //get upload image Name
            $request['image'] = uploadService::handle($request->file('cover'), config('shop.productCoverPath'), 'productCover');

            //save Gallery
            self::saveGalleriesImage($request, $product);

            //relation M:N COLOR
            $product->colors()
                    ->sync($request->colors);
            
             //attributes
            //get attributes which is not null
 
            $result = self::mergAndRemoveNullAttributes($request);

            //save attributes in the proudct_details table
            self::saveProductDetails($result, $product);


            //relation M:N SIZE
            $product->sizes()
                    ->sync($request->sizes);

            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    /*
     |------------------------------
     | Private Methods
     |------------------------------
     */

    /**
     * Merge attributes and remove the null title or null values
     *
     * @param Request $request
     * @return array
     */
    private static function mergAndRemoveNullAttributes(Request $request): array
    {
        $titles = $request->attr_titles;
        $values = $request->attr_values;

        $merg = array_combine($titles, $values);

        //remove if title or value was null or empty
        $result = collect($merg)
            ->reject(function ($value, $key) {
                return empty($value) || empty($key);
            })
            ->all();
        return $result;
    }

    /**
     * Save Multiple Image for Product Galery
     * @param Request $request
     * @param $product
     */
    private static function saveGalleriesImage(Request $request, $product): void
    {
        if ($request->hasFile('galleries')) {

            foreach ($request->file('galleries') as $image) {

                //upload and get name
                $imageName = uploadService::handle($image, config('shop.productGalleris'), 'gallery');


                $product->product_galleries()
                        ->create([
                            ProductGalleries::c_image => $imageName
                        ])/;

            }
        }


    }


    
    
}