<?php

namespace Core;

class Validation
{
    public static $errors;

    public static function email($email, $message, $messageKey = "email")
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            static::$errors[$messageKey] = $message;
        }
    }

    public static function string($value, $message, $messageKey, $min = 1, $max = INF)
    {
        if (! (strlen($value) >= $min && strlen($value) <= $max)) {
            static::$errors[$messageKey] = $message;
        }
    }

    public static function check($path,$old){
        if(! empty(static::$errors)){
            redirect($path,static::$errors,$old);
        }
    }

}
