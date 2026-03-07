<?php

namespace Core\Middleware;

class Guest{
    public static function handle(){
        return (!$_SESSION["user"]) ?  true : false ;
    }
}