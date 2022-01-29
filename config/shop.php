<?php
return [
    /*
     |------------------------------
     | for pagination
     |------------------------------
     |
     |
     |
     */
    'perPage'           => 10,


    /*
     |------------------------------
     | OTP config
     |------------------------------
     */
    'otp_sec' =>120 , // every otp is valid unitil specified second
    'otp_wait'=>'Wait until 120 seconds' ,
    'otp_succ' =>'YOUR OTP CODE IS :',


    /*
     |------------------------------
     | Upload Image Path
     |------------------------------
     |
     |
     |
     */


    'brandImagePath'    => 'images\\brands\\',
    'discountImagePath'    => 'images\\discounts\\',// path for save discount images

    'msg'               => [
         'create'             => 'successfully created',
         'delete'             => 'successfully Delete',
         'fail'               => 'UserName | Password is Invalid',
         'fail_update' => 'Faile While Updating',
         'add_wishlist'       => 'product successfully added to your wishlist ',
         'was_exist_wishlist' => 'product was exist in your wishlist',
         'add_basket' => 'Product Successfully Added To Your Basket',
         'increase_count' => 'Product Successfully Increased +1',
         'dec_count_succ' => 'Product Successfully Decreased -1',
         'dec_count_fail' => 'Product Failed Decreased -1',
         'coupon_expired' => 'The Coupon Code Is Not Valid!',
         'ail_status_order' => 'somthing goes wrong!',
        'fail_update_order_status' => 'Fail while Updating Order Status / try a again ...',
         'empty_search' =>'The Order Search Result Was Empty'

    ],
        

];