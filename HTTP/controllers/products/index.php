<?php

use Core\Database;

$db = classLink(Database::class);

$products = $db->getAll("products");

view("products/index",[
    "products" => $products
]);