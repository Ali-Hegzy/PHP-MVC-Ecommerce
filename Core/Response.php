<?php

namespace Core;

class Response
{
    private const NOT_FOUND = 404;
    private const FORBIDDEN = 403;

    public static function notFound()
    {
        http_response_code(static::NOT_FOUND);
        view("404");
    }

    public static function forbidden()
    {
        http_response_code(static::FORBIDDEN);
        view("403");
    }
}
