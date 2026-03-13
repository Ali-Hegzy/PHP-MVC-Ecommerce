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

        $date = date("Y-m-d_D h:i:s");
        $ip = $_SERVER["REMOTE_ADDR"];
        $route = $_SERVER["REQUEST_URI"];
        $responseCode = http_response_code();
        $method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

        if($route === "/favicon.ico"){
            fclose($file);
            return;
        }

        fwrite($file,"[{$date}] - INFO: [IP: {$ip}] [Route: {$route}] [{$responseCode} {$method}]\n");
        fclose($file);
    }
}
