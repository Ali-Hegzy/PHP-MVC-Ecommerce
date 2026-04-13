<?php

use Core\Database;
use Core\File;
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
$available = $_POST["available"];
$image = $_FILES["image"];
$userId = Sessions::getUserId();

Validation::string($productName, "Enter valid product name", "name");
Validation::number($price, "Enter a valid price for the product", "price");
Validation::number($available, "Enter a valid available items", "available");
Validation::string($description, "Enter valid product description", "desc");
$store = Validation::file($image, ["png", "jpeg"], "Enter a valid file", "image", maxSize: (2 * 1024 * 1024));

$old = [
    "name" => $productName,
    "price" => $price,
    "description" => $description,
    "available" => $available
];
Validation::check("/add-product", $old);

$uploadPath = "images/products/" . date("Y/m/");
$targetDir = Functions::basePath("uploads/" . $uploadPath);
$imageSrc = $uploadPath . File::store($targetDir, $image);
if ($imageSrc === ($uploadPath . false)) {
    Validation::addError("There is an error in uploding the image", "image");
    Validation::check("/add-product", $old);
}

$db = Functions::classLink(Database::class);
$db->query("INSERT INTO `products` (`userId`, `name`, `description`, `imageSrc`, `price`, `available`) VALUES (:userId, :name, :description, :imageSrc, :price, :available)", [
    "userId" => $userId,
    "name" => $productName,
    "description" => $description,
    "imageSrc" => $imageSrc,
    "price" => $price,
    "available" => $available
]);

Functions::redirect("/add-product", attributes: [
    "success" => true
]);
