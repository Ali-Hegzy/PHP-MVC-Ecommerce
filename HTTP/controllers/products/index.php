<?php

use Core\Database;
use Core\Functions;

$db = Functions::classLink(Database::class);

$products = $db->getAll("products");

Functions::view("products/index",[
    "products" => $products
]);