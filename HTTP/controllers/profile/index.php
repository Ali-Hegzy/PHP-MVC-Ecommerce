<?php

use Core\Database;
use Core\Functions;
use Core\Sessions;

$id = Sessions::getUserId();

$db = Functions::classLink(Database::class);
$user = $db->getUser($id);

$products = $db->query("SELECT * FROM `products` WHERE `userID` = :id",[
    "id" => $id
])->findAll();

Functions::view("profile/index",[
    "user" => $user,
    "products" => $products
]);