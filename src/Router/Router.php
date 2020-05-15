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


    public function __construct($controllerNameSpace, $madelWareNameSpace = "")
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
            $response = $this->callAction($this->routes[$method][$url]);

            if (is_array($response)){
                return print(Response::json($response));
            }

            return $response;

        }
            throw new Exception("page not find!");
    }

    private function callAction($action)
    {
        if (is_callable($action)) {
            return call_user_func($action);
        } else {
            $action = explode('@', $action);

            if (method_exists($this->controllerNameSpace . '\\' . $action[0], $action[1])) {
                return call_user_func([$this->controllerNameSpace . '\\' . $action[0], $action[1]]);
            } else {
                throw new Exception("در ارتباط با کنترلر مشکلی وجود دارد!");
            }
        }


        throw new Exception("action fired!");


    }
}