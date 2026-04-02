<?php

use Core\Functions;
use Core\Router;

$router = Functions::classLink(Router::class);

$router->GET("/", "index");
$router->GET("/about", "about");

$router->GET("/register", "register/create")->only("guest");
$router->POST("/signin", "register/store");

$router->GET("/login", "session/create");
$router->POST("/store", "session/store");
$router->DELETE("/logout", "session/delete");

$router->GET("/products", "products/index")->only("auth");
$router->GET("/add-product", "products/create")->only("auth");
$router->POST("/store-product", "products/store")->only("auth");
