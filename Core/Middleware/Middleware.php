<?php

namespace Core\Middleware;

use Core\Logger;
use Exception;

class Middleware
{

    private const array MAP = [
        "guest" => Guest::class,
        "auth" => Auth::class
    ];

    public static function resolve(?string $key): bool
    {
        if ($key === NULL) return true;

        $middleware = static::MAP[$key] ?? NULL;

        if ($middleware === NULL) {
            throw new Exception("Undifined \"{$key}\" key");
        }

        return (new $middleware)::handle();
    }
}
