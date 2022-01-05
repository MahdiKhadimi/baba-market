<?php

use Illuminate\Support\Str;


if (!function_exists('SLUG')) {
    /**
     * generate slug
     * @param $text
     * @return string
     */
    function SLUG($text)
    {
        return Str::lower(Str::replace(' ', '-', $text));
    }
    if (!function_exists('UNIQ')) {

        /**
         * create a unique text with given prefix
         */
        function UNIQ($prefix)
        {
            return uniqid($prefix . '-' . md5(now()) . '-');
        }
    }
    
    
    if (!function_exists('msg_succ')) {
        /**
         * return successfully created message
         */
        function msg_succ()
        {
            return config('shop.msg.create');
        }
    }
}