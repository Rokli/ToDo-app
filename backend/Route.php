<?php

class Route{
    private $routes;

    public function __construct(){
        $this->routes = require __DIR__ . "/../core/route.php";
    }
    public function route(){
        
        $request = $_SERVER['REQUEST_URI'];
        $request = strtok($request, '?');
        
        $route = $this->routes[$request];
        $nameController = $route["controller"];
        $method = $route["method"];

        $controller = new $nameController();
        $controller->$method();
    }
}
?>






