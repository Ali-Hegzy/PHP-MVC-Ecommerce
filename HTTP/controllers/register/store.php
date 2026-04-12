<?php

use Core\Database;
use Core\Functions;
use Core\Sessions;
use Core\Validation;

$email = $_POST["email"];
$password = $_POST["password"];
$userName = $_POST["userName"];

// Validation the inputs
Validation::email($email);
Validation::string($password, "password field must be more than 7 characters", "password", 8);
Validation::string($userName, "Fill the user name field", "userName");

$old = ["email" => $email, "userName" => $userName];
Validation::check("/register", $old);

$db = Functions::classLink(Database::class);

$res = $db->isUserExist($email);

if ($res) {
    $errors["email"] = "This email is already used";
    Functions::redirect("/register", error: $errors);
}

// Save the Data into the database
$db->query("INSERT INTO `users` (`email`,`password`,`userName`) VALUES (:email,:password,:userName)", [
    "email" => $email,
    "password" => $password,
    "userName" => $userName
]);

$userId = $db->query("SELECT `id` FROM `users` WHERE `email` = :email", [
    "email" => $email
])->find();

Sessions::login($userName, $email, $userId);

Functions::redirect("/");
