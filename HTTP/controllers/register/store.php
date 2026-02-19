<?php

use Core\Database;

$errors = [];
$email = $_POST["email"];
$password = $_POST["password"];
$userName = $_POST["userName"];

if(empty($email) ||  filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors["email"] = "Email form must be vaild";
}

if(empty($password) || $password < 8){
    $errors["password"] = "password form must be vaild and more than 8 characters";
}

if(empty($userName)){
    $errors["userName"] = "Fill the user name filed";
}

if(! empty($errors)){
    view("register/create",[
        "errors" => $errors
    ]);
}

$db = classLink(Database::class);

$db->Query("INSERT INTO `users` (`email`,`password`) VALUES (:email,:password)",[
    "email" => $email,
    "password" => $password
]);

redirect("/");