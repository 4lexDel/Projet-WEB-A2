<?php

class Users{

    public function __construct(){

    }

    public function selectUsers(){

    }

    public function selectUsersLogin(&$sqlClient, &$data, &$nbRow, &$nbCol, $login, $password){
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

    public function selectUsersSearch(&$sqlClient, &$data, &$nbRow, &$nbCol, $secondName, $firstName, $schoolYear){
        try {
            $stmt = $sqlClient->prepare("SELECT * FROM users NATURAL JOIN schoolYear WHERE userSecondName like '%?%' AND userFirstName like '%?%' schoolYear like '%?%'");

            $stmt->bindParam(1, $secondName);
            $stmt->bindParam(2, $firstName);
            $stmt->bindParam(3, $schoolYear);
            
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
