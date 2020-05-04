<?php
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/../src/helper.php';
    require_once __DIR__ . '/../config/config.php';
    use App\Router;
    use App\Request;
    $router = new Router();
    $request = new Request();

    $router->get('/', 'appController@index');


    $router->runRouter($request->uri(), $request->method());