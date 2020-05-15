<?php
$router->get('/', 'appController@index');

$router->get('/hello', function (){
    return print_r('hello');
});

//$router->get('login', function (){
//    return print_r('dfe');
//});
$router->get('login', 'loginController@index');
