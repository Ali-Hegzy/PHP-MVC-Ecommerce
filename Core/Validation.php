<?php

namespace Core;

class Validation
{
    private static array $errors;

    public static function addError(string $message, string $messageKey): void
    {
        static::$errors[$messageKey] = $message;
    }

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

    public static function check(string $path, array $old = []): void
    {
        if (! empty(static::$errors)) {
            Functions::redirect($path, error: static::$errors, old: $old);
        }
    }

    public static function isAuth(): bool
    {
        return (bool) isset($_SESSION["user"]);
    }

    public static function number(string $value, string $message, string $messageKey, float $min = 0.01, float $max = INF): void
    {
        if ($value < $min || $value > $max) {
            static::$errors[$messageKey] = $message;
        }
    }

    public static function file(array $file, array $types, string $message, string $messageKey, int $minSize = 1, float $maxSize = INF): bool
    {
        if ($file["error"]) {
            static::$errors[$messageKey] = $message;
            return false;
        }

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
            static::$errors[$messageKey] = $message;
            return false;
        }

        if ($size < $minSize || $size > $maxSize) {
            static::$errors[$messageKey] = $message;
            return false;
        }

        return true;
    }
}
