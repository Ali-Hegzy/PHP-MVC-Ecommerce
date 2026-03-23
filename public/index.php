<?php

use Core\Functions;
use Core\Logger;
use Core\Middleware\Middleware;
use Core\Response;
use Core\Sessions;

session_start();

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require Functions::getBASE_PATH() . $class . ".php";
});

require Functions::basePath("routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$route = $router->route($uri, $method);

if (!$route) {
    Response::notFound();
    Logger::info();
    die();
}

$middleware = $route["middleware"];

if (Middleware::resolve($middleware)) {
    require Functions::basePath($route["controller"]);
} else {
    Response::forbidden();
}
Logger::info();

Sessions::unflash();