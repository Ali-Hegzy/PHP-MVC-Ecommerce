<?php

use Core\Database;
use Core\Sessions;
use Core\Validation;

$errors = [];
$email = $_POST["email"];
$password = $_POST["password"];
$userName = $_POST["userName"];

// Validation the inputs
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
    $old = ["email" => $email, "userName" => $userName];
    redirect("/register", $errors, $old);
}

$db = classLink(Database::class);

$res = $db->isUserExist($email);

if ($res) {
    $errors["email"] = "This email is already used";
    redirect("/register", $errors);
}

// Save the Data into the database
$db->query("INSERT INTO `users` (`email`,`password`,`userName`) VALUES (:email,:password,:userName)", [
    "email" => $email,
    "password" => $password,
    "userName" => $userName
]);

Sessions::login($userName, $email);

redirect("/");
