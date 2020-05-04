<?php

use App\DB;

class appController
{
    public function index(){

        return print_r(\App\Response::view('wellcome', ['a' => 'b']));

        $db = new DB();
        $db->query('SELECT * FROM users');
        $users = $db->rowCount();
        return print_r(jsonView($users));
    }
}