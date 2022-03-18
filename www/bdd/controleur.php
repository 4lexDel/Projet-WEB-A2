<?php

require_once "../bdd/table/users.php";

class Controleur{
    private $mysqlClient;
    private $stmt;

    private $_users; 

    public function __construct(){
        $this->_users = new Users();

        try {
            $this->mysqlClient = new PDO('mysql:host=localhost;dbname=projet_web_a2;charset=utf8', 'root', '');
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function selectUsersLogin(&$data, &$nbRow, &$nbCol, $login, $password){
        $this->_users->selectUsersLogin($this->mysqlClient, $data, $nbRow, $nbCol, $login, $password);
    }

}
