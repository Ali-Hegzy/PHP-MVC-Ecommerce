<?php

use Core\Database;
use Core\Sessions;

function dumbDie($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function controller($path)
{
    return "HTTP/controllers/$path.php";
}

function view($path, $attributes = [])
{
    extract($attributes);
    return require basePath("view/{$path}.view.php");
}

function classLink($class, $attributes = NULL)
{
    return new $class($attributes);
}

function redirect($path, $attributes = [])
{
    Sessions::flash($attributes);
    header("location: $path");
    exit();
}
