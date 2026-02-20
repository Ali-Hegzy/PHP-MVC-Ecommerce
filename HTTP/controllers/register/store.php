<?php

use Core\Database;
use Core\Validation;

$errors = [];
$email = $_POST["email"];
$password = $_POST["password"];
$userName = $_POST["userName"];

if (! Validation::email($email)) {
    $errors["email"] = "Email field must be vaild";
}

if (! Validation::string($password, 8)) {
    $errors["password"] = "password field must be vaild and more than 8 characters";
}

if (! Validation::string($userName)) {
    $errors["userName"] = "Fill the user name field";
}

if (! empty($errors)) {
    view("register/create", [
        "errors" => $errors
    ]);
    die();
}

$db = classLink(Database::class);

$db->Query("INSERT INTO `users` (`email`,`password`,`userName`) VALUES (:email,:password,:userName)", [
    "email" => $email,
    "password" => $password,
    "userName" => $userName
]);

redirect("/");
