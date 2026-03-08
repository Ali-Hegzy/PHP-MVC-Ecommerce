<?php

use Core\Sessions;

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function($class){
    $class = str_replace("\\",DIRECTORY_SEPARATOR,$class);
    require BASE_PATH . $class . ".php";
});

require basePath("routes.php");

$config = "user>userName";
$str = str_replace(">","[",$config);
$str = str_replace("=","]",$str) . ']';

extract(["str" => $str]);

// dumbDie();

$router->route();

Sessions::unflash();