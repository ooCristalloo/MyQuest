<?php

namespace App\Helpers;

class TextHelper
{
    public static function pluralize($number, $one, $two, $many)
    {
        if ($number % 10 == 1 && $number % 100 != 11) {
            return $one;
        } elseif ($number % 10 >= 2 && $number % 10 <= 4 && ($number % 100 < 10 || $number % 100 >= 20)) {
            return $two;
        } else {
            return $many;
        }
    }
}

