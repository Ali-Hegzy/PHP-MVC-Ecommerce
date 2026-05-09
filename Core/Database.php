<?php

namespace Core;

use Exception;
use PDO;
use PDOStatement;

class Database
{
    public PDO $connect;
    public PDOStatement $statment;

    public function __construct(?array $attributes)
    {
        $config = (require Functions::basePath("configs.php"))["database"];

        $dsn = "mysql:" . http_build_query($config, "", ";");

        $this->connect = new PDO($dsn, $attributes["user"] ?? "root", $attributes["password"] ?? "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []): Database
    {
        $this->statment = $this->connect->prepare($query);
        $this->statment->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statment->fetch();
    }

    public function findAll(int $mode = PDO::FETCH_DEFAULT)
    {
        return $this->statment->fetchAll($mode);
    }

    public function getAll(string $table, int $mode = PDO::FETCH_ASSOC): array
    {
        $rows = $this->query("SELECT * FROM `$table`")->findAll($mode);
        return $rows;
    }

    public function findAbort()
    {
        $result = $this->find();

        if (!$result) {
            throw new Exception(code:404);
        }

        return $result;
    }

    // public function isFound($query,$params) : bool {
    //     $this->query($query,$params);

    //     return (bool) $this->statment->fetch();
    // }

    public function user(): array
    {
        $user = $this->find();

        if (!$user) {
            throw new Exception("Non existing user");
        }

        return $user;
    }

    public function isUserExist($email): bool
    {
        $user = $this->query("SELECT * FROM `users` WHERE `email` = :email",[
            "email" => $email
        ])->find();

        return (bool) $user;
    }

    public function getWhereEmail(string $email, string $column = '')
    {
        if ($column === '') {
            $this->query("SELECT * FROM `users` WHERE `email` = :email", [
                "email" => $email
            ]);
        } else {
            $this->query("SELECT `$column` FROM `users` WHERE `email` = :email", [
                "email" => $email
            ]);
        }
    }

    public function getWhereId(string $id, string $column = ''): void
    {
        if ($column === '') {
            $this->query("SELECT * FROM `users` WHERE `id` = :id", [
                "id" => $id
            ]);
        } else {
            $this->query("SELECT `$column` FROM `users` WHERE `id` = :id", [
                "id" => $id
            ]);
        }
    }

    public function getUserName(string $email): string
    {
        $this->getWhereEmail($email, "userName");
        return $this->user()["userName"];
    }

    public function getPassword(string $email): string
    {
        $this->getWhereEmail($email, "password");
        return $this->user()["password"];
    }

    public function getUser(string $id): array
    {
        $this->getWhereId($id);
        return $this->user();
    }
}
