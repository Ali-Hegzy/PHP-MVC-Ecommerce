<?php

namespace Core;

use Core\Middleware\Middleware;
use Core\Response;

class Router
{
    public $routes = [];

    protected function add($route, $controller, $method)
    {
        $this->routes[] = [
            "route" => $route,
            "controller" => controller($controller),
            "method" => $method,
            "middleware" => NULL
        ];

        return $this;
    }

    public function GET($route, $controller)
    {
        return $this->add($route, $controller, "GET");
    }

    public function POST($route, $controller)
    {
        return $this->add($route, $controller, "POST");
    }

    public function DELETE($route, $controller)
    {
        return $this->add($route, $controller, "DELETE");
    }

    public function PUT($route, $controller)
    {
        return $this->add($route, $controller, "PUT");
    }

    public function PATCH($route, $controller)
    {
        return $this->add($route, $controller, "PATCH");
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($uri === $route["route"] && $method === $route["method"]) {
                return $route;
            }
        }

        return false;
    }
}
