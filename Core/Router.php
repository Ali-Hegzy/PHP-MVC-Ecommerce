<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    public $routes = [];

    protected function add($route, $controller, $method)
    {
        $this->routes[] = [
            "route" => $route,
            "contoller" => controller($controller),
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

    public function route()
    {
        $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
        $method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

        foreach ($this->routes as $route) {
            if ($uri === $route["route"] && $method === $route["method"]) {

                $middleware = $route["middleware"];

                if (Middleware::resolve($middleware)) {
                    return require basePath($route["contoller"]);
                }

                http_response_code(403);
                return view("403");
            }
        }

        http_response_code(404);
        view("404");
    }
}
