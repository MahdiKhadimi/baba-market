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
}