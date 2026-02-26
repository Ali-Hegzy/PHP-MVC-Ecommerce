<?php

use Core\Database;
use Core\Sessions;
use Core\Validation;

$email = $_POST["email"];
$password = $_POST["password"];
$userName = $_POST["userName"];

// Validation the inputs
Validation::email($email, "Email field must be vaild");
Validation::string($password, "password field must be more than 7 characters", "password",8);
Validation::string($userName, "Fill the user name field", "userName");

$old = ["email" => $email, "userName" => $userName];
Validation::check("/register",$old);


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
