<?php

namespace Core;

class Router
{
    public $routes = [];

    protected function add($route, $controller, $method)
    {
        $this->routes[] = [
            "route" => $route,
            "contoller" => controller($controller),
            "method" => $method
        ];
    }

    public function GET($route, $controller)
    {
        $this->add($route, $controller, "GET");
    }

    public function POST($route, $controller)
    {
        $this->add($route, $controller, "POST");
    }

    public function DELETE($route, $controller)
    {
        $this->add($route, $controller, "DELETE");
    }

    public function PUT($route, $controller)
    {
        $this->add($route, $controller, "PUT");
    }

    public function PATCH($route, $controller)
    {
        $this->add($route, $controller, "PATCH");
    }

    public function route()
    {
        $uri = $_SERVER["REQUEST_URI"];
        $method = $_SERVER["REQUEST_METHOD"];
        foreach ($this->routes as $route) {
            if ($uri === $route["route"] && $method === $route["method"]) {
                return require basePath($route["contoller"]);
            }
        }

        view("404");
    }
}
