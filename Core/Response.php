<?php

namespace Core;

class Response
{
    private const int NOT_FOUND = 404;
    private const int FORBIDDEN = 403;

    public static function notFound(): void
    {
        http_response_code(static::NOT_FOUND);
        Functions::view("404");
    }

    public static function forbidden(): void
    {
        http_response_code(static::FORBIDDEN);
        Functions::view("403");
    }
}
