<?php
    require_once __DIR__ . '/View/viewHelper.php';

function jsonView($json)
{
    header("Content-Type: application/json; charset=UTF-8");
    return json_encode($json);
}

function redirect($location){
    header("LOCATION: " . $location);
}

function slug($str){
    return str_replace([' ', '(', ')'], '-',$str);
}