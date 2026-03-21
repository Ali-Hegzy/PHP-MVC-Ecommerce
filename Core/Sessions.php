<?php

namespace Core;

class Sessions
{

    public static function flash($attributes = []) : void
    {
        $_SESSION["_flash"] = $attributes;
    }

    public static function add($key, $value) : void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(array $keys)
    {
        $arr = [];

        for ($i = 0; $i < sizeof($keys); $i++) {
            ($i === 0) ?
                $arr = $_SESSION[$keys[$i]] :
                $arr = $arr[$keys[$i]];
        }

        return $arr;
    }

    public static function remove($key) : void
    {
        unset($_SESSION[$key]);
    }

    public static function login($userName, $email, $userId) : void
    {
        static::add("user", [
            "email" => $email,
            "userName" => $userName
        ]);
        session_regenerate_id(true);
    }

    public static function logout() : void
    {
        static::remove("user");
        session_regenerate_id(true);
    }

    public static function old($attributes = []) : void
    {
        $_SESSION["_flash"]["old"] = $attributes;
    }

    public static function getOld($key)
    {
        return $_SESSION["_flash"]["old"][$key] ?? "";
    }

    public static function unflash() : void
    {
        unset($_SESSION["_flash"]);
    }
}
