<?php

use App\DB;

class appController
{
    public function index(){
        $template = new \App\Template();

        return print_r($template->render('wellcome', ['TITLE' => "WELLCOME", "text"=>'loremloremloremloremloremloremlorem']));

        return print_r(\App\Response::view('wellcome', ['a' => 'b']));

        $db = new DB();
        $db->query('SELECT * FROM users');
        $users = $db->rowCount();
        return print_r(jsonView($users));
    }
}