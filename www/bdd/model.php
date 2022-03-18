<?php

class Model{
    private $mysqlClient;

    public function __construct(){
        $this->mysqlClient = new PDO('mysql:host=localhost;dbname=projet_web_a2;charset=utf8', 'root', '');
    }

    

}

?>