<?php

use Core\Database;
$config = (require basePath("configs.php"))["database"];

$db = new Database($config);

dumbDie($db->query("SELECT * FROM `users`")->fetch());