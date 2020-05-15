<?php

namespace App\Http\Controllers;

use App\DB;

class appController
{
    public function index(){
        $template = new \App\Template();

        $users = [
            ["name"=>"ashkan"],
            ["name"=>"joe"],
        ];

        return $template->render('wellcome', ['TITLE' => "WELLCOME", "text"=>'loremloremloremloremloremloremlorem', "users"=>$users]);

        return print_r(\App\Response::view('wellcome', ['a' => 'b']));

        $db = new DB();
        $db->query('SELECT * FROM users');
        $users = $db->rowCount();
        return print_r(jsonView($users));
    }
}