<?php

namespace Core;
use Core\Sessions;

class Functions
{
    public static function dumbDie($value): void
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();
    }

    public static function basePath(string $path): string
    {
        return BASE_PATH . $path;
    }

    public static function controller(string $path): string
    {
        return "HTTP/controllers/$path.php";
    }

    public static function view(string $path, array $attributes = []): string
    {
        extract($attributes);
        return require static::basePath("view/{$path}.view.php");
    }

    public static function classLink($class, $attributes = NULL)
    {
        return new $class($attributes);
    }

    public static function redirect(string $path, array $attributes = [], array $old = [])
    {
        Sessions::flash($attributes);
        Sessions::old($old);
        header("location: $path");
        exit();
    }
}
