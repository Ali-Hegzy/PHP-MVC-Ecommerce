<?php

namespace Core;

class Sessions
{

    public static function add(string $key,mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(array $keys): string
    {
        $arr = [];

        for ($i = 0; $i < sizeof($keys); $i++) {
            ($i === 0) ?
                $arr = $_SESSION[$keys[$i]] :
                $arr = $arr[$keys[$i]];
        }

        return $arr;
    }

    public static function getUserId(): string
    {
        return $_SESSION["user"]["userId"];
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function login(string $userName,string $email,string $userId): void
    {
        static::add("user", [
            "email" => $email,
            "userName" => $userName,
            "userId" => $userId
        ]);
        session_regenerate_id(true);
    }

    public static function logout(): void
    {
        static::remove("user");
        session_regenerate_id(true);
    }

    public static function old(array $attributes = []): void
    {
        $_SESSION["_flash"]["old"] = $attributes;
    }

    public static function getOld(string $key): string
    {
        return $_SESSION["_flash"]["old"][$key] ?? "";
    }

    public static function flash(array $attributes = []): void
    {
        $_SESSION["_flash"] = $attributes;
    }

    public static function unflash(): void
    {
        unset($_SESSION["_flash"]);
    }

    public static function getFlash(string $key): string|array
    {
        return $_SESSION["_flash"][$key] ?? "";
    }

    public static function addError(mixed $value) : void
    {
        $_SESSION["_flash"]["error"] = $value;
    }

    public static function getError(string $key): string|array
    {
        return $_SESSION["_flash"]["error"][$key] ?? "";
    }

}
