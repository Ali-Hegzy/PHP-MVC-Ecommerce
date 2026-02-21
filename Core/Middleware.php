<?php

namespace Core;

class Middleware
{

    public function auth()
    {
        if (isset($_SESSION["user"])) {
            return true;
        }

        return false;
    }
}
