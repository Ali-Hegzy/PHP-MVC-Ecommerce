<?php


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

function controller($path){
    return "HTTP/controllers/$path.php";
}