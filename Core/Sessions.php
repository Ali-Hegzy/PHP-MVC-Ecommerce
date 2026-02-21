<?php

namespace Core;

class Sessions
{

    public static function flash($attributes = [])
    {
        $_SESSION["_flash"] = $attributes;
    }

    public static function add($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function login($userName,$email)
    {
        Sessions::add("user", [
            "email" => $email,
            "userName" => $userName
        ]);
        session_regenerate_id(true);
    }
}
