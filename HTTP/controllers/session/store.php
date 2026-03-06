<?php

use Core\Database;
use Core\Sessions;

$db = classLink(Database::class);

$email    = $_POST["email"];
$password = $_POST["password"];
$old = ["email" => $email];

if(!$db->isUserExist($email)){
    $error["error"] = "Not exist";
    redirect("/login",$error,$old);
}

// I will hash the password in the future إن شاء الله  
$orignalPass = $db->getPassword($email);

if(!($passCorrect === $password)){
    $error["error"] = "Not exist";
    redirect("/login",$error,$old);
}

$userName = $db->getUserName($email);

Sessions::login($userName,$email);

redirect("/");