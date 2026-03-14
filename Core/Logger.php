<?php

namespace Core;

class Logger
{
    private static function writeInLog($type, $msg)
    {
        $file = fopen(basePath("logs.txt"), "a");

        $date = date("Y-m-d_D h:i:s");
        $ip = $_SERVER["REMOTE_ADDR"];
        $route = $_SERVER["REQUEST_URI"];
        $responseCode = http_response_code();
        $method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

        if ($route === "/favicon.ico") {
            fclose($file);
            return;
        }

        ($msg === NULL) ?
            fwrite($file, "[{$date}] - {$type}: [IP: {$ip}] [Route: {$route}] [{$responseCode} {$method}] \n") :
            fwrite($file, "[{$date}] - {$type}: [IP: {$ip}] [Route: {$route}] [{$responseCode} {$method}] [Message: {$msg}]\n");

        fclose($file);
    }

    public static function warning($msg = NULL)
    {
        static::writeInLog("WARNING", $msg);
    }

    public static function info($msg = NULL)
    {
        static::writeInLog("INFO",$msg);
    }

    public static function debug($msg = NULL)
    {
        static::writeInLog("DEBUG",$msg);
    }

    public static function critical($msg = NULL)
    {
        static::writeInLog("CRITICAL",$msg);
    }
}
