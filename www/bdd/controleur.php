<?php

require_once "../bdd/table/users.php";
require_once "../bdd/table/locality.php";

class Controleur{
    private $mysqlClient;

    private $_users; 
    private $_locality; 

    public function __construct(){
        $this->_users = new Users();
        $this->_locality = new Locality();

        try {
            $this->mysqlClient = new PDO('mysql:host=localhost;dbname=projet_a2_web;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function selectUsersLogin(&$data, &$nbRow, &$nbCol, $login, $password){
        $this->_users->selectUsersLogin($this->mysqlClient, $data, $nbRow, $nbCol, $login, $password);
    }

    public function selectLocality(&$data, &$nbRow, &$nbCol){
        $this->_locality->selectLocality($this->mysqlClient, $data, $nbRow, $nbCol);
    }
    
}
