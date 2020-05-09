<?php
$router->get('/', 'appController@index');

$router->get('/hello', function (){
    return print_r('hello');
});
