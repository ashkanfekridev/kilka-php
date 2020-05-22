<?php


namespace App\Http\Controllers;


use App\Response;

class loginController
{
    public function index(){
        return Response::view('auth/login');
    }
}