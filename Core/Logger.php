<?php

namespace Core;

class Logger
{
    private static function writeInLog(string $type, string $msg): void
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

        ($msg === "") ?
            fwrite($file, "[{$date}] - {$type}: [IP: {$ip}] [Route: {$route}] [{$responseCode} {$method}] \n") :
            fwrite($file, "[{$date}] - {$type}: [IP: {$ip}] [Route: {$route}] [{$responseCode} {$method}] [Message: {$msg}]\n");

        fclose($file);
    }

    public static function warning(string $msg = ""): void
    {
        static::writeInLog("WARNING", $msg);
    }

    public static function info(string $msg = ""): void
    {
        static::writeInLog("INFO", $msg);
    }
}
