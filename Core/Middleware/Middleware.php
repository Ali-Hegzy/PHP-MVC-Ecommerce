<?php

namespace Core\Middleware;

use Exception;

class Middleware
{

    private const MAP = [
        "guest" => Guest::class,
        "auth" => Auth::class
    ];

    public static function resolve($key) {

        if($key === NULL) return true;

        $middleware = static::MAP[$key] ?? NULL;

        if($middleware === NULL){
            throw new Exception("Undifined \"{$key}\" key");
        }

        return (new $middleware)::handle();
    }

    public static function log()
    {

        $file = fopen(basePath("logs.txt"),"a");
        $ip = $_SERVER["REMOTE_ADDR"];
        $deviceInfo = $_SERVER["HTTP_USER_AGENT"];
        $browser = $_SERVER["HTTP_SEC_CH_UA"];
        $route = $_SERVER["REQUEST_URI"] ;

        if($route === "/favicon.ico"){
            fclose($file);
            return;
        }

        fwrite($file,"Logs: {$ip} || {$deviceInfo} || {$browser} || {$route}\n");
        fclose($file);
    }
}
