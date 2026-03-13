<?php

namespace Core\Middleware;

class Guest{
    public static function handle(){
        return (!isset($_SESSION["user"])) ?  true : false ;
    }
}