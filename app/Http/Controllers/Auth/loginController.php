<?php


namespace App\Http\Controllers;


use App\Response;

class loginController
{
    public function index(){
        $template = new \App\Template();

        $users = [
            ["name"=>"ashkan"],
            ["name"=>"joe"],
        ];

//        return $users;

        return $template->render('wellcome', ['TITLE' => "WELLCOME", "text"=>'loremloremloremloremloremloremlorem', "users"=>$users]);
    }
}