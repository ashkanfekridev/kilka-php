<?php


class appController
{
    public function index(){
        return jsonView(['a'=>'hello']);
        return view('wellcome');
    }
}