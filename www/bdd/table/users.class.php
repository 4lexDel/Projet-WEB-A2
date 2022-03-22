<?php

class Users
{

    public function __construct()
    {
    }

    public function selectUsers()
    {
    }

    public function selectUsersLogin(&$sqlClient, &$data, &$nbRow, &$nbCol, $login, $password)
    {
        try {
            $stmt = $sqlClient->prepare("SELECT * FROM users NATURAL JOIN role WHERE login=? AND password=?");

            $stmt->bindParam(1, $login);
            $stmt->bindParam(2, $password);

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            /*echo "Ligne : " . $nbRow . " Colonne : " . $nbCol;
            echo "<br>";
            print_r($data);*/

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function selectUsersSearch(&$sqlClient, &$data, &$nbRow, &$nbCol, $role, $secondName, $firstName, $schoolYear)
    {
        try {
            $stmt = $sqlClient->prepare("SELECT * 
            FROM users
            INNER JOIN belong ON users.idUser = belong.idUser 
            INNER JOIN schoolYear ON belong.idSchoolYear = schoolYear.idSchoolYear 
            INNER JOIN role ON users.idRole = role.idRole 
            WHERE userSecondName like ? AND userFirstName like ? AND schoolYear like ? AND role = ?");

            $stmt->bindValue(1, "%$secondName%");
            $stmt->bindValue(2, "%$firstName%");
            $stmt->bindValue(3, "%$schoolYear%");
            $stmt->bindValue(4, "$role");

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function select_wish_list_from_user(&$sqlClient, &$data, &$nbRow, &$nbCol, $user_id){
        try {
            $stmt = $sqlClient->prepare('SELECT `intership`,`startDate`,`endDate`,`releaseDate`,`nbPlace`,`descInternship`,`company` FROM `intership` INNER JOIN `save` ON intership.idInternship = save.idInternship INNER JOIN `company` on company.idCompany = intership.idCompany WHERE save.idUser = ?;');
            
            $stmt->bindParam(1, $user_id);
            
            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }


    
}
