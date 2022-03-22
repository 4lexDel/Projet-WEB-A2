<?php

require_once "../bdd/table/users.class.php";
require_once "../bdd/table/locality.class.php";
require_once "../bdd/table/sector.class.php";
require_once "../bdd/table/schoolYear.class.php";
require_once "../bdd/table/wish_list.class.php";
require_once "../bdd/table/skill.class.php";
require_once "../bdd/table/company.class.php";


class Controleur{
    private $mysqlClient;

    private $_users; 
    private $_locality; 
    private $_sector;
    private $_schoolYear;
    private $_skill;
    private $_company;

    public function __construct(){
        $this->_users = new Users();
        $this->_locality = new Locality();
        $this->_sector = new Sector();
        $this->_schoolYear = new SchoolYear();
        $this->_skill = new Skill();
        $this->_company = new Company();
        $this->_users_wish = new wish_list();

        try {
            $this->mysqlClient = new PDO('mysql:host=localhost;dbname=bddweb;charset=utf8', 'root', '');
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

    public function selectSkill(&$data, &$nbRow, &$nbCol){
        $this->_skill->selectSkill($this->mysqlClient, $data, $nbRow, $nbCol);
    }

    public function selectUsersSearch(&$data, &$nbRow, &$nbCol, $searchInfo, $localitySelect, $sectorSelect){
        $this->_users->selectUsersSearch($this->mysqlClient, $data, $nbRow, $nbCol, $role, $secondName, $firstName, $schoolYear);
    }

    public function selectCompanySearch(&$data, &$nbRow, &$nbCol, $role, $secondName, $firstName, $schoolYear){
        $this->_company->selectCompanySearch($this->mysqlClient, $data, $nbRow, $nbCol, $searchInfo, $localitySelect, $sectorSelect);
    }

    public function select_wish_list_from_user(&$data, &$nbRow, &$nbCol, $user_id){
        $this->_users_wish->select_wish_list_from_user($this->mysqlClient, $data, $nbRow, $nbCol, $user_id);
        

    }
}
