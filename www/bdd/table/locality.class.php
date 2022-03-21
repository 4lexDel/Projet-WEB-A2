<?php

class Locality{
    private $idLocality;
    private $idCity;

    public function __construct(){

    }

    public function selectLocality(&$sqlClient, &$data, &$nbRow, &$nbCol){
        try {
            $stmt = $sqlClient->prepare("SELECT * FROM locality");
            
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
