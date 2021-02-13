<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "ac_managment";
    public $pdo;

    public function __construct()
    {
        if (!isset($this->pdo)) {
            try {
                $link = new PDO("mysql:host=".$this->host."; dbname=". $this->dbname, $this->user, $this->pass);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;
            } catch (PDOException $e) {
                die("Failed to connect with database" . $e->getMessage());
            } 
        }
    }

    public function test(){
        echo "hello";
    }
  

}
