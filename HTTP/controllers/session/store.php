<?php

use Core\Database;
use Core\Functions;
use Core\Logger;
use Core\Sessions;

$db = Functions::classLink(Database::class);

$email    = $_POST["email"];
$password = $_POST["password"];
$old = ["email" => $email];

if (!$db->isUserExist($email)) {
    Logger::warning("Wrong email");
    $error["error"] = "Not exist";
    Functions::redirect("/login", error: $error, old: $old);
}

// I will hash the password in the future إن شاء الله  
$orignalPass = $db->getPassword($email);

if (!($orignalPass === $password)) {
    Logger::warning("Wrong password");
    $error["error"] = "Not exist";
    Functions::redirect("/login", error: $error, old: $old);
}

$userName = $db->getUserName($email);

$userId = $db->query("SELECT `id` FROM `users` WHERE `email` = :email", [
    "email" => $email
])->fetch()["id"];

Sessions::login($userName, $email, $userId);
Logger::info("\"$email\" has been logged in");

Functions::redirect("/");
