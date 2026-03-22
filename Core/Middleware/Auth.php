<?php


namespace Core\Middleware;

class Auth
{
    public static function handle(): bool
    {
        return (isset($_SESSION["user"])) ?  true : false;
    }
}
