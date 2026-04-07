<?php

use Core\Functions;
use Core\Sessions;
use Core\Validation;

/**
 * Check the size, as if the size is greater than the "get_ini(post_max_size)" the $_POST will be empty which cause many warning and errors
 */
$validSize = 5;
if ($_SERVER['CONTENT_LENGTH'] > $validSize * 1024 * 1024) {
    Validation::addError("Enter a valid file size, below {$validSize} MB", "image");
    Validation::check("/add-product");
}

$productName = $_POST["name"];
$price = $_POST["price"];
$description = $_POST["description"];
$image = $_FILES["image"];
$userId = Sessions::get(["user", "userId"]);

Validation::string($productName, "Enter valid product name", "name");
Validation::number($price, "Enter a valid price for the product", "price");
Validation::string($description, "Enter valid product description", "desc");
$store = Validation::file($image, ["png", "jpeg"], "Enter a valid file", "image", maxSize: (2 * 1024 * 1024));

$old = [
    "name" => $productName,
    "price" => $price,
    "description" => $description
];
Validation::check("/add-product", $old);

//Store
if ($store) {
}
