<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/table/users.class.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/table/locality.class.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/table/sector.class.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/table/schoolYear.class.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/table/skill.class.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/table/company.class.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/table/internship.class.php";


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

    public function select_candidature_from_user(&$string, &$desc, &$name){
        $this->_users->select_candidature_from_user($this->mysqlClient, $string, $desc, $name);
    }

    public function addToWishList($id){
        $this->_users->addToWishList($this->mysqlClient, $id);
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

    public function selectUsersCompany(&$data, &$nbRow, &$nbCol, $id){
        $this->_company->selectUsersCompany($this->mysqlClient, $data, $nbRow, $nbCol, $id);
    }

    public function insertNewInternship($company, $internship, $StartDate, $EndDate, $WageMonth, $nbPlace, $descInternship, $locality, $skill){
        $this->_intership->insertNewInternship($this->mysqlClient, $company, $internship, $StartDate, $EndDate, $WageMonth, $nbPlace, $descInternship, $locality, $skill);
    }

    public function delete_save($id_page){
        $this->_users->delete_save($this->mysqlClient, $id_page);
    }

    public function delete_candidature_save($id_page){
        $this->_users->delete_candidature_save($this->mysqlClient, $id_page);
    }

    public function postuler($cv,$lettre_de_motivation,$id_page){
        $this->_users->postuler($this->mysqlClient, $cv, $lettre_de_motivation, $id_page);
    }

    public function deleteCompany($id){
        $this->_company->deleteCompany($this->mysqlClient, $id);
    }

    public function deleteUser($id){
        $this->_company->DeleteUserCompanies($this->mysqlClient, $id);
        $this->_users->deleteUser($this->mysqlClient, $id);
    }
    public function deleteInternship($id){
        $this->_intership->deleteInternship($this->mysqlClient, $id);
    }

    public function selectSkills(&$data, &$nbRow, &$nbCol){
        $this->_intership->selectSkills($this->mysqlClient, $data, $nbRow, $nbCol);
    }

    public function getUserInfos(&$data, &$nbRow, &$nbCol, $id){
        $this->_users->getUserInfos($this->mysqlClient, $data, $nbRow, $nbCol, $id);
    }

    public function updateProfil($id,$secondName,$firstName,$login,$password,$promo){
        $this->_users->updateProfil($this->mysqlClient,$id,$secondName,$firstName,$login,$password,$promo);
    }
    
    public function updateCompany($idCompany,$company,$eMail,$Sector,$descCompany,$locality){
        $this->_company->updateCompany($this->mysqlClient,$idCompany,$company,$eMail,$Sector,$descCompany,$locality);
    }

    public function selectLocalityComp(&$data, $idCompany){
        $this->_locality->selectLocalityComp($this->mysqlClient, $data, $idCompany);
    }

    public function selectSectorComp(&$data, $idCompany){
        $this->_sector->selectSectorComp($this->mysqlClient, $data, $idCompany);
    }

    public function evaluateCompany($id, $grade){
        $this->_company->evaluateCompany($this->mysqlClient, $id, $grade);
    }

    public function updateUserRank($id, $rank){
        $this->_users->updateUserRank($this->mysqlClient, $id, $rank);
    }
}