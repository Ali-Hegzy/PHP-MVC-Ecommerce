<?php

namespace Core\Middleware;

class Guest
{
    public static function handle(): bool
    {
        return (!isset($_SESSION["user"])) ?  true : false;
    }
}
