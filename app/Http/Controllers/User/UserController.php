<?php

namespace App\Http\Controllers\User;

use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    


    /**
     * Store new WishList for logedIn User if Product Not Exist in wishlist table
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addWishList(Product $product)
    {
        $result = WishListService::saveForUser(Auth::id(), $product);

        if ($result == false) {

            return redirect()
                ->back()
                ->with('succ-add-wishlist', config('shop.msg.was_exist_wishlist'));
        }

        return redirect()
            ->back()
            ->with('succ-add-wishlist', config('shop.msg.add_wishlist'));
    }

    /**
     * get logedIn User WishList
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getUserWishList()
    {
        $wishlists = WishListService::getFor(Auth::id());

        $data = $this->menue;
        return view('user.wishlist', compact('wishlists', 'data'));
    }

    /**
     * delete a wishlist
     */
    public function removeWishList(Wishlist $wishlist)
    {
        WishListService::remove($wishlist->id);

        return redirect(route('show.wish.user'))->with('succ', config('shop.msg.delete'));
    }

    


    









    public function Pay($order)
    {

        $order = OrderServices::getOrder($order, Auth::id());

        if (empty($order)) {
            return abort(404);
        }

        self::CheckInventry($order);

        if ($order->discount_total) {

            //discount must pay
            $pay_request = Toman::fakeRequest()
                                ->successful()
                                ->withTransactionId(Str::random(4) . rand(1111, 9999));

        } else {
            //total must pay
            $pay_request = Toman::fakeRequest()
                                ->successful()
                                ->withTransactionId(Str::random(4) . rand(1111, 9999));

        }

        $data = $this->menue;
        if ($pay_request->successful()) {


            OrderServices::SuccessfullPaid($order, $pay_request);

            self::ReduceInventry($order);

            return view('user.order_result', compact('order', 'data'));
        }

        if ($pay_request->failed()) {
            $order->update([
                'status' => Order::status_fail,
            ]);
        }

    }

 
}