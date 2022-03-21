<?php

require_once "../bdd/table/users.class.php";
require_once "../bdd/table/locality.class.php";
require_once "../bdd/table/sector.class.php";
require_once "../bdd/table/schoolYear.class.php";
require_once "../bdd/table/candidature.class.php";


class Controleur{
    private $mysqlClient;

    private $_users; 
    private $_locality; 
    private $_sector;
    private $_schoolYear;

    public function __construct(){
        $this->_users = new Users();
        $this->_locality = new Locality();
        $this->_sector = new Sector();
        $this->_schoolYear = new SchoolYear();

        try {
            $this->mysqlClient = new PDO('mysql:host=localhost;dbname=projet_web_a2;charset=utf8', 'root', '');
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
    
    public function selectSector(&$data, &$nbRow, &$nbCol){
        $this->_sector->selectSector($this->mysqlClient, $data, $nbRow, $nbCol);
    }

    public function selectSchoolYear(&$data, &$nbRow, &$nbCol){
        $this->_schoolYear->selectSchoolYear($this->mysqlClient, $data, $nbRow, $nbCol);
    }

    
}
