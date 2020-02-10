<?php
namespace App;
use \PDO;


class DB
{
    private $dsn = "mysql:host=localhost;dbname=kilka_php";
    private $user = "root";
    private $passwd = "";

    private $handler;
    private $result;

    public function __construct()
    {
        $this->handler = new PDO($this->dsn, $this->user, $this->passwd);
    }
    public function query($query){
        $this->result = $this->handler->query($query);
    }

    public function get(){
        $this->result->execute();
        return $this->result->fetch();
    }

    public function getAll(){
        $this->result->execute();
        return $this->result->fetchAll();
    }


}