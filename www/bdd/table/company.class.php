<?php

class Company
{

    public function __construct()
    {
    }

    public function selectCompanySearch(&$sqlClient, &$data, &$nbRow, &$nbCol, $searchInfo, $localitySelect, $sectorSelect)
    {
        try {
            $stmt = $sqlClient->prepare("SELECT * 
            FROM company
            INNER JOIN correspond ON company.idCompany = correspond.idCompany 
            INNER JOIN sector ON sector.idSector = correspond.idSector
            INNER JOIN locate ON locate.idCompany = company.idCompany
            INNER JOIN locality ON locality.idLocality = locate.idLocality
            WHERE company.company like ? AND locality.city like ? AND sector.sector like ?");

            $stmt->bindValue(1, "%$searchInfo%");
            $stmt->bindValue(2, "%$localitySelect%");
            $stmt->bindValue(3, "%$sectorSelect%");

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function insertNewCompany(&$sqlClient, $company, $eMail, $sector, $descCompany)
    {
        try {
            $stmt = $sqlClient->prepare(
            "INSERT INTO company(company, nbCESIStudent, eMail, descCompany, idUser) values (? , 0, ? , ?, ?);");
            $stmt->bindValue(1, "$company");
            $stmt->bindValue(2, "$eMail");
            $stmt->bindValue(3, "$descCompany");
            $idUser = $_SESSION['idUser'];
            $stmt->bindValue(4, "$idUser");
            $stmt->execute();
            
            $stmt = $sqlClient->prepare(
            "INSERT INTO correspond(idCompany, idSector) values ((SELECT idCompany from company order by idCompany DESC limit 1),?);");
            $stmt->bindValue(1, $sector);

            $stmt->execute();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
