<?php

namespace Core;

class Validation
{
    public static array $errors;

    public static function email(string $email, string $message = "Enter a valid Email", string $messageKey = "email"): void
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            static::$errors[$messageKey] = $message;
        }
    }

    public static function string(string $value, string $message, string $messageKey, int $min = 1, float $max = INF): void
    {
        if (! (strlen($value) >= $min && strlen($value) <= $max)) {
            static::$errors[$messageKey] = $message;
        }
    }

    public static function check(string $path, array $old): void
    {
        if (! empty(static::$errors)) {
            Functions::redirect($path, static::$errors, $old);
        }
    }

    public static function isAuth(): bool
    {
        return (bool) isset($_SESSION["user"]);
    }

    public static function number(string $value, string $message, string $messageKey, int $min = 1, float $max = INF): void
    {
        if ($value < $min || $value > $max) {
            static::$errors[$messageKey] = $message;
        }
    }

    public static function file(array $file, array $types = [], string $message, string $messageKey, int $minSize = 1, float $maxSize = INF): bool
    {
        $type = explode("/", $file["type"])[1];
        $size = $file["size"];
        $flag = 0;

        foreach ($types as $validType) {
            if ($type == $validType) {
                $flag = 0;
                break;
            }
            $flag = 1;
        }

        if ($flag) {
            return false;
            static::$errors[$messageKey] = $message;
        }

        if ($size < $minSize || $size > $maxSize) {
            return false;
            static::$errors[$messageKey] = $message;
        }

        return true;
    }
}
