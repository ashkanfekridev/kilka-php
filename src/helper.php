<?php

function redirect($location){
    header("LOCATION: " . $location);
}

function slug($str){
    return str_replace([' ', '(', ')'], '-',$str);
}