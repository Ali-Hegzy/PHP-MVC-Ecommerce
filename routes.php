<?php

use Core\Router;

$router = new Router;

$router->GET("/","index");
$router->GET("/about","about");

$router->GET("/products","products/index");
