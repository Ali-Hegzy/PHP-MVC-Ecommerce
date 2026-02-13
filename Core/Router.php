<?php

namespace Core;

use Core\Functions;

class Router
{
    public $routes = [];

    protected function add($route, $controller, $method)
    {
        $this->routes[] = [
            "route" => $route,
            "contoller" => $controller,
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

    public function route($uri){
        foreach($this->routes as $route){
            if($uri === $route["route"]){
                return require basePath($route["contoller"]);
            }
        }
    }
}
