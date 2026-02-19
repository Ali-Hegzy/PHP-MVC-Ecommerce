<?php

use Core\Router;

$router = classLink(Router::class);

$router->GET("/","index");
$router->GET("/about","about");

$router->GET("/products","products/index");
