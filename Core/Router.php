<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    public $routes = [];

    protected function add($route, $controller, $method, $middleware)
    {
        $this->routes[] = [
            "route" => $route,
            "contoller" => controller($controller),
            "method" => $method,
            "middleware" => $middleware
        ];
    }

    public function GET($route, $controller, $middleware = NULL)
    {
        $this->add($route, $controller, "GET", $middleware);
    }

    public function POST($route, $controller, $middleware = NULL)
    {
        $this->add($route, $controller, "POST", $middleware);
    }

    public function DELETE($route, $controller, $middleware = NULL)
    {
        $this->add($route, $controller, "DELETE", $middleware);
    }

    public function PUT($route, $controller, $middleware = NULL)
    {
        $this->add($route, $controller, "PUT", $middleware);
    }

    public function PATCH($route, $controller, $middleware = NULL)
    {
        $this->add($route, $controller, "PATCH", $middleware);
    }

    public function route()
    {
        $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
        $method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

        foreach ($this->routes as $route) {
            if ($uri === $route["route"] && $method === $route["method"]) {

                $middleware = $route["middleware"];

                return (Middleware::resolve($middleware)) ?
                    require basePath($route["contoller"]) :
                    view(403);
            }
        }

        view("404");
    }
}
