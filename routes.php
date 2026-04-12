<?php

use Core\Functions;
use Core\Router;

$router = Functions::classLink(Router::class);

$router->get("/", "index");
$router->get("/about", "about");

$router->get("/register", "register/create")->only("guest");
$router->post("/signin", "register/store");

$router->get("/login", "session/create");
$router->post("/store", "session/store");
$router->delete("/logout", "session/delete");

$router->get("/products", "products/index")->only("auth");
$router->get("/add-product", "products/create")->only("auth");
$router->post("/store-product", "products/store")->only("auth");
$router->get("/product", "products/show")->only("auth");
