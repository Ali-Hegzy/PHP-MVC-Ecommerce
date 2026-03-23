<?php

namespace Core;

use Core\Middleware\Middleware;
use Core\Response;

class Router
{
    public array $routes = [];

    protected function add(string $route, string $controller, string  $method): Router
    {
        $this->routes[] = [
            "route" => $route,
            "controller" => Functions::controller($controller),
            "method" => $method,
            "middleware" => NULL
        ];

        return $this;
    }

    public function GET(string $route, string  $controller): Router
    {
        return $this->add($route, $controller, "GET");
    }

    public function POST(string $route, string  $controller): Router
    {
        return $this->add($route, $controller, "POST");
    }

    public function DELETE(string $route, string  $controller): Router
    {
        return $this->add($route, $controller, "DELETE");
    }

    public function PUT(string $route, string  $controller): Router
    {
        return $this->add($route, $controller, "PUT");
    }

    public function PATCH(string $route, string  $controller): Router
    {
        return $this->add($route, $controller, "PATCH");
    }

    public function only(string $key): Router
    {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;

        return $this;
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($uri === $route["route"] && $method === $route["method"]) {
                return $route;
            }
        }

        return false;
    }
}
