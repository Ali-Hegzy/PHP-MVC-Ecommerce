<?php

namespace Core;

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

    public function findAll()
    {
        return $this->statment->fetchAll();
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
            Response::notFound();
            die();
        }

        return $result;
    }

    // public function isFound($query,$params) : bool {
    //     $this->query($query,$params);

    //     return (bool) $this->statment->fetch();
    // }

    public function isUserExist(string $email): bool
    {
        $this->query("SELECT * FROM `users` WHERE `email` = :email", [
            "email" => $email
        ]);

        return (bool) $this->statment->fetch();
    }

    public function getUserName(string $email): string
    {
        $this->query("SELECT `userName` FROM `users` WHERE `email` = :email", [
            "email" => $email
        ]);

        return $this->statment->fetch()["userName"];
    }

    public function getPassword(string $email): string
    {
        $this->query("SELECT `password` FROM `users` WHERE `email` = :email", [
            "email" => $email
        ]);

        return $this->statment->fetch()["password"];
    }

    public function getUser(string $id)
    {
        $this->query("SELECT * FROM `users` WHERE `id` = :id",[
            "id" => $id
        ]);

        return $this->find();
    }
}
