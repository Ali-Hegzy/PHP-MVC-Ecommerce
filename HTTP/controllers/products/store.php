<?php

use Core\Functions;
use Core\Sessions;
use Core\Validation;

$productName = $_POST["name"];
$price = $_POST["price"];
$description = $_POST["description"];
$image = $_FILES["image"];
$userId = Sessions::get(["user", "userId"]);

Validation::string($productName, "Enter valid product name", "name");
Validation::number($price, "Enter a valid price for the product", "price");
Validation::string($description, "Enter valid product description", "desc");
$store = Validation::file($image, ["png", "jpeg"], "Enter valid file", "image");

$old = [
    "name" => $productName,
    "price" => $price,
    "description" => $description
];
Validation::check("/add-product", $old);
