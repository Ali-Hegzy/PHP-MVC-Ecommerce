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
}
