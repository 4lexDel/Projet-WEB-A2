<?php

class SchoolYear{
    private $idSchoolYear;
    private $schoolYear;

    public function __construct(){

    }

    public function selectSchoolYear(&$sqlClient, &$data, &$nbRow, &$nbCol){
        try {
            $stmt = $sqlClient->prepare("SELECT * FROM schoolYear");
            
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
