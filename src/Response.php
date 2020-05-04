<?php


namespace App;


class Response
{
    public static function json($json){
        header("Content-Type: application/json; charset=UTF-8");
        return json_encode($json);
    }
    public static function view($view, $data=[]){
        foreach ($data as $key=>$value){
            ${$key} = $value;
        }
        require_once VIEW_DIR . $view . '.php';
    }

}