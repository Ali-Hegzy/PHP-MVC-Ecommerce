<?php

use Core\Database;
use Core\Sessions;

function dumbDie($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function basePath(string $path): string
{
    return BASE_PATH . $path;
}

function controller(string $path): string
{
    return "HTTP/controllers/$path.php";
}

function view(string $path, array $attributes = []): string
{
    extract($attributes);
    return require basePath("view/{$path}.view.php");
}

function classLink($class, $attributes = NULL)
{
    return new $class($attributes);
}

function redirect(string $path, array $attributes = [], array $old = [])
{
    Sessions::flash($attributes);
    Sessions::old($old);
    header("location: $path");
    exit();
}
