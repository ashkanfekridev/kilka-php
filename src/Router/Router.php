<?php


namespace App;
use Exception;


class Router
{
    private $routes = [
        'GET' => [],
        'POST' => []
    ];


    private $controllerNameSpace;
    private $madelWareNameSpace;


    public function __construct($controllerNameSpace = "App\\Controller", $madelWareNameSpace = "")
    {
        $this->controllerNameSpace = $controllerNameSpace;
        $this->madelWareNameSpace = $madelWareNameSpace;
    }


    public function addRoute($type, $uri, $action)
    {
        $uri = trim($uri, '/');
        $this->routes[$type][$uri] = $action;
    }


    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
    }


    public function runRouter($url, $method)
    {
        if (array_key_exists($url, $this->routes[$method])) {
            return $this->callAction($this->routes[$method][$url]);
        }
        throw new Exception("page not find!");

    }

    private function callAction($action)
    {
        if (is_callable($action)) {
            return call_user_func($action);
        } elseif(is_array($action = explode('@', $action))) {
            if (method_exists($action[0], $action[1])) {
                return call_user_func([$action[0], $action[1]]);
            }
        }
        throw new Exception("action fired!");


    }
}