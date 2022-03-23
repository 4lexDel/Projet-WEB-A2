<?php

require_once "../bdd/table/users.class.php";
require_once "../bdd/table/locality.class.php";
require_once "../bdd/table/sector.class.php";
require_once "../bdd/table/schoolYear.class.php";
require_once "../bdd/table/skill.class.php";
require_once "../bdd/table/company.class.php";
require_once "../bdd/table/internship.class.php";


class Controleur{
    private $mysqlClient;

    private $_users; 
    private $_locality; 
    private $_sector;
    private $_schoolYear;
    private $_skill;
    private $_company;
    private $_intership;

    public function __construct(){
        $this->_users = new Users();
        $this->_locality = new Locality();
        $this->_sector = new Sector();
        $this->_schoolYear = new SchoolYear();
        $this->_skill = new Skill();
        $this->_company = new Company();
        $this->_intership = new Internship();

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

    public function selectUsersSearch(&$data, &$nbRow, &$nbCol, $role, $secondName, $firstName, $schoolYear){
        $this->_users->selectUsersSearch($this->mysqlClient, $data, $nbRow, $nbCol, $role, $secondName, $firstName, $schoolYear);
    }

    public function selectCompanySearch(&$data, &$nbRow, &$nbCol, $searchInfo, $localitySelect, $sectorSelect){
        $this->_company->selectCompanySearch($this->mysqlClient, $data, $nbRow, $nbCol, $searchInfo, $localitySelect, $sectorSelect);
    }

    public function selectInternshipSearch(&$data, &$nbRow, &$nbCol, $searchInfo, $localitySelect, $skillSelect, $wageRange){
        $this->_intership->selectInternshipSearch($this->mysqlClient, $data, $nbRow, $nbCol, $searchInfo, $localitySelect, $skillSelect, $wageRange);
    }

    public function select_wish_list_from_user(&$string, &$desc, &$name){
        $this->_users->select_wish_list_from_user($this->mysqlClient, $string, $desc, $name);
    }

    public function insertUser($secondName, $firstName, $login, $mdp, $role, &$userCreated){
        $this->_users->insertUser($this->mysqlClient, $secondName, $firstName, $login, $mdp, $role, $userCreated);
    }

    public function insertUserInPromo($secondName, $firstName, $login, $mdp, $promo, $role, &$userCreated){
        $this->_users->insertUserInPromo($this->mysqlClient, $secondName, $firstName, $login, $mdp, $promo, $role, $userCreated);
    }
    public function insertNewCompany($company, $eMail, $sector, $descCompany, $locality){
        $this->_company->insertNewCompany($this->mysqlClient,$company, $eMail, $sector, $descCompany, $locality);
    }
    public function selectUsersCompany(&$data, &$nbRow, &$nbCol){
        $this->_company->selectUsersCompany($this->mysqlClient, $data, $nbRow, $nbCol);
    }
    public function insertNewInternship($company, $internship, $StartDate, $EndDate, $WageMonth, $nbPlace, $descInternship, $locality){
        $this->_intership->insertNewInternship($this->mysqlClient, $company, $internship, $StartDate, $EndDate, $WageMonth, $nbPlace, $descInternship, $locality);
    }
    public function delete_save($id_user,$id_internship){
        $this->_users->delete_save($this->mysqlClient,$id_user,$id_internship);
    }
}
