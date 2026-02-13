<?php

use Core\Router;

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function($class){
    $class = str_replace("\\",DIRECTORY_SEPARATOR,$class);
    require BASE_PATH . $class . ".php";
});

require basePath("routes.php");

$uri = $_SERVER["REQUEST_URI"];

$router->route($uri);