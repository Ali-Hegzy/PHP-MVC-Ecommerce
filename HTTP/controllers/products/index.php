<?php

use Core\Database;

$db = classLink(Database::class);

$prods = $db->query("SELECT * FROM `users`")->fetch();

dumbDie($prods);