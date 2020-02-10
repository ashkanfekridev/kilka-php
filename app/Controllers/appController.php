<?php

use App\DB;

class appController
{
    public function index(){
        $db = new DB();
        $db->query('SELECT * FROM users');
        $users = $db->getAll();
        return print_r(jsonView($users));
    }
}