<?php


namespace App;


class Router
{
    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }


    public function runRouter($url, $method)
    {
        if (array_key_exists($url, $this->routes[$method])) {
            $controller = explode('@', $this->routes[$method][$url])[0];
            $action = explode('@', $this->routes[$method][$url])[1];
            return $this->callAction($controller, $action);
        }
    }

    private function callAction($controller, $action)
    {

        if (! method_exists($controller, $action)) {
            return print_r("action not found!");
        }
        $controller = new $controller();
        return $controller->$action();
    }


}