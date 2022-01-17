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

    'msg'=>[
        'create'=>'successfull created'
    ]

];