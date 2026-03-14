<?php

namespace Core\Middleware;

use Core\Logger;
use Exception;

class Middleware
{

    private const MAP = [
        "guest" => Guest::class,
        "auth" => Auth::class
    ];

    public static function resolve($key) {

        if($key === NULL) return true;

        $middleware = static::MAP[$key] ?? NULL;

        if($middleware === NULL){
            throw new Exception("Undifined \"{$key}\" key");
        }

        return (new $middleware)::handle();
    }
}
