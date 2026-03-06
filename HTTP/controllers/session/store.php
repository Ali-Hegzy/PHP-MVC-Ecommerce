<?php

use Core\Database;
use Core\Sessions;

$db = classLink(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

if(!$db->isUserExist($email)){
    $error["error"] = "Not exist";
    redirect("/login",$error);
}

$passCorrect = $db->query("SELECT `password` FROM `users` WHERE `email` = :email",[
    "email" => $email
])->fetch()["password"];

if(!($passCorrect === $password)){
    $error["error"] = "Not exist";
    redirect("/login",$error);
}

$userName = $db->query("SELECT `userName` FROM `users` WHERE `email` = :email",[
    "email" => $email
])->fetch()["userName"];

Sessions::login($userName,$email);

redirect("/");