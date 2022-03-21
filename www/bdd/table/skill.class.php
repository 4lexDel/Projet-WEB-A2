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
}
