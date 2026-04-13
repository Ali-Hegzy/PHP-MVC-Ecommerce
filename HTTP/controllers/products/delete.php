<?php

use Core\Database;
use Core\Functions;
use Core\Sessions;

$prodId = $_POST["id"];
$userID = Sessions::getUserId();

$db = Functions::classLink(Database::class);

$res = $db->query("DELETE FROM `products` WHERE `id` = :id AND `userId` = :userId", [
    "id" => $prodId,
    "userId" => $userID
]);

Functions::redirect("/profile",[
    "delSuccess" => true
]);

// we do not use view, Because it will make this controller act as the main controller of the view which will make errors and if we fix it the code will not be cleaned, in this case the profile/index controller was responsable to send the products list to the view, if this controller do that and also delete the product then the controller will do two things and each one is not related so better to use redirect.
// Functions::view("products/index",[
//     "delSuccess" => true
// ]);