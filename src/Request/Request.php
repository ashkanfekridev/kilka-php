<?php


namespace App;


class Request
{
    public function uri(){
        return $_SERVER['REQUEST_URI'];
    }

    public function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}