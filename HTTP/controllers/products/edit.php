<?php 

use Core\Database;
use Core\Functions;
use Core\Response;

$id = $_GET["prod"] ?? NULL;

$db = Functions::classLink(Database::class);

try{
    $product = $db->query("SELECT * FROM `products` WHERE `id` = :id", [
        "id" => $id
    ])->findAbort();
    
    Functions::view("/products/edit",[
        "product" => $product
    ]);
}
catch (Exception $e){
    Response::notFound();
}