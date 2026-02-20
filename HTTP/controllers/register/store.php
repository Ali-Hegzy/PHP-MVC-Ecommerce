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
    $errors["password"] = "password field must be more than 8 characters";
}

if (! Validation::string($userName)) {
    $errors["userName"] = "Fill the user name field";
}

if (! empty($errors)) {
    redirect("/register",$errors);
}

$db = classLink(Database::class);

$res = $db->query("SELECT * FROM `users` WHERE `email` = :email",[
    "email" => $email
])->fetch();

if($res){
    $errors["email"] = "This email is already used";

    redirect("/register",$errors);
}

$db->query("INSERT INTO `users` (`email`,`password`,`userName`) VALUES (:email,:password,:userName)", [
    "email" => $email,
    "password" => $password,
    "userName" => $userName
]);

redirect("/");
