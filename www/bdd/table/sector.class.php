<?php

class Sector{
    private $idSector;
    private $sector;

    public function __construct(){

    }

    public function selectSector(&$sqlClient, &$data, &$nbRow, &$nbCol){
        try {
            $stmt = $sqlClient->prepare("SELECT * FROM sector");
            
            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();
            
            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
    public function selectSectorComp(&$sqlClient, &$data, $idCompany){
        try {
            $stmt = $sqlClient->prepare("SELECT idSector FROM correspond where idCompany = ?");
            $stmt->bindValue(1, $idCompany);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
