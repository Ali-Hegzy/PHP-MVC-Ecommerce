<?php

use Core\Database;
use Core\Functions;

$id = $_GET["prod"];

$db = Functions::classLink(Database::class);

$product = $db->query("SELECT * FROM `products` WHERE `id` = :id", [
    "id" => $id
])->findAbort();

Functions::view("products/show",[
    "product" => $product
]);