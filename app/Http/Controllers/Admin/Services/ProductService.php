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


            //set active
            $request['active'] = $request->has('active') ? true : false;

            //get upload image Name
            $request['image'] = uploadService::handle($request->file('cover'), config('shop.productCoverPath'), 'productCover');


            //save to db
            $product = Product::create($request->toArray());

            //relation M:N COLOR
            $product->colors()
                    ->sync($request->colors);
                    //attributes
+            $result = self::mergAndRemoveNullAttributes($request);
+
+            //save attributes in the proudct_details table
+            self::saveProductDetails($result, $product);


            //relation M:N SIZE
            $product->sizes()
                    ->sync($request->sizes);

            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
    
    
}