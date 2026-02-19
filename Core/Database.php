<?php

namespace Core;

use PDO;

class Database
{
    public $connect;
    public $statment;

    public function __construct($attributes)
    {
        $config = (require basePath("configs.php"))["database"];

        $dsn = "mysql:" . http_build_query($config, "", ";");

        $this->connect = new PDO($dsn, $attributes["user"] ?? "root", $attributes["password"] ?? "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statment = $this->connect->prepare($query);
        $this->statment->execute($params);

        return $this->statment;
    }
}
