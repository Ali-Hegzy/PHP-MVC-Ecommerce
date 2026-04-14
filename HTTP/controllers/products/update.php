<?php

use Core\Sessions;
use Core\Database;
use Core\Functions;
use Core\Validation;

$id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$available = $_POST["available"];
$image = $_FILES["image"];

$userId = Sessions::getUserId();

Validation::string($name, "Enter valid product name", "name");
Validation::number($price, "Enter a valid price for the product", "price");
Validation::number($available, "Enter a valid available items", "available");
Validation::string($description, "Enter valid product description", "desc");

$old = [
    "name" => $name,
    "price" => $price,
    "description" => $description,
    "available" => $available
];
Validation::check("/product/edit?prod=$id", $old);

$db = Functions::classLink(Database::class);
$db->query("UPDATE `products` SET `name` = :name, `description` = :description, `price` = :price, `available` = :available", [
    "name" => $name,
    "description" => $description,
    "price" => $price,
    "available" => $available
]);

Functions::redirect("/profile", [
    "editSuccess" => true
]);
