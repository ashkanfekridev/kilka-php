<?php

namespace App\Http\Controllers;

use App\DB;
use App\Response;

class appController
{
    public function index(){

        $users = [
            ["name"=>"ashkan"],
            ["name"=>"joe"],
        ];

        return Response::view('wellcome', ['TITLE' => "WELLCOME", "text"=>'loremloremloremloremloremloremlorem', "users"=>$users]);

        return print_r(\App\Response::view('wellcome', ['a' => 'b']));

        $db = new DB();
        $db->query('SELECT * FROM users');
        $users = $db->rowCount();
        return print_r(jsonView($users));
    }
}