<?php

use Core\Router;

$router = new Router;

$router->get("/",controller("index"));
$router->get("/about",controller("about"));
