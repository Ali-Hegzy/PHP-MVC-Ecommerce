<?php


namespace Core\Middleware;

class Auth{
    public static function handle(){
        return (isset($_SESSION["user"])) ?  true : false ;
    }
}