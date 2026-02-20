<?php

namespace Core;

class Validation
{

    public static function email($email)
    {
        return  filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function string($value, $min = 1, $max = INF)
    {
        return strlen($value) >= $min && strlen($value) <= $max;
    }
}
