<?php


namespace App;


class Request
{
    public function uri(){
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}