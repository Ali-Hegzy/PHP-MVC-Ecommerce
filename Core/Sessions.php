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

    public static function get($keys)
    {
        $arr = [];

        for ($i = 0; $i < sizeof($keys); $i++) {
            ($i === 0) ?
                $arr = $_SESSION[$keys[$i]] :
                $arr = $arr[$keys[$i]];
        }

        return $arr;
    }

    public static function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public static function login($userName, $email, $userId)
    {
        static::add("user", [
            "email" => $email,
            "userName" => $userName
        ]);
        session_regenerate_id(true);
        Logger::info("$email has been logged in");
    }

    public static function logout()
    {
        $email = static::get(["user","email"]);
        static::remove("user");
        session_regenerate_id(true);
        Logger::info("\"$email\" has been logged out");
    }

    public static function old($attributes = [])
    {
        $_SESSION["_flash"]["old"] = $attributes;
    }

    public static function getOld($key)
    {
        return $_SESSION["_flash"]["old"][$key] ?? "";
    }

    public static function unflash()
    {
        unset($_SESSION["_flash"]);
    }
}
