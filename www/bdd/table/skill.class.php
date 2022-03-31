<?php

class Skill{

    public function __construct(){

    }

    public function selectSkill(&$sqlClient, &$data, &$nbRow, &$nbCol){
        try {
            $stmt = $sqlClient->prepare("SELECT * FROM skill");
            
            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }   
    }
    public function selectSkillIdInt(&$sqlClient, &$data, $id){
        try {
            echo 'OUI';
            $stmt = $sqlClient->prepare("SELECT * FROM need where idInternship=?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $data = $stmt->fetchAll();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }   
    }
}
