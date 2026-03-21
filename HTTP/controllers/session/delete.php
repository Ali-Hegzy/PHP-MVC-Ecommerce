<?php

use Core\Logger;
use Core\Sessions;

$email = Sessions::get(["user","email"]);
Logger::info("\"$email\" has beed logged out");
Sessions::logout();
redirect("/");