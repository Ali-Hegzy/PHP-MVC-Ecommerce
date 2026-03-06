<?php

use Core\Middleware;
use Core\Router;

$router = classLink(Router::class);

$router->GET("/","index");
$router->GET("/about","about");

$router->GET("/products","products/index");

$router->GET("/register","register/create");
$router->POST("/signin","register/store");

$router->GET("/login","session/create");
$router->POST("/store","session/store");
$router->DELETE("/logout","session/delete");