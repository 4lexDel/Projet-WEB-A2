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
    public function insertNewCompany(&$sqlClient, $company, $eMail, $sector, $descCompany, $locality)
    {
        try {
            $stmt = $sqlClient->prepare(
                "INSERT INTO company(company, nbCESIStudent, eMail, descCompany, idUser) values (? , 0, ? , ?, ?);"
            );
            $stmt->bindValue(1, "$company");
            $stmt->bindValue(2, "$eMail");
            $stmt->bindValue(3, "$descCompany");
            $idUser = $_SESSION['idUser'];
            $stmt->bindValue(4, "$idUser");
            $stmt->execute();

            $stmt = $sqlClient->prepare(
                "INSERT INTO correspond(idCompany, idSector) values ((SELECT idCompany from company order by idCompany DESC limit 1),?);"
            );
            foreach ($sector as $domaine) {
                $stmt->bindValue(1, $domaine);
                $stmt->execute();
            }
            $stmt = $sqlClient->prepare(
                "INSERT INTO locate(idLocality ,idCompany) values (? ,(SELECT idCompany from company order by idCompany DESC limit 1));"
            );
            foreach ($locality as $ville) {
                $stmt->bindValue(1, $ville);
                $stmt->execute();
            }
            

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function selectUsersCompany(&$sqlClient, &$data, &$nbRow, &$nbCol)
    {
        try {
            $stmt = $sqlClient->prepare(
                "SELECT * from company where idUser = ?"
            );
            $idUser = $_SESSION['idUser'];
            $stmt->bindValue(1, "$idUser");

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteCompany(&$sqlClient, $id)
    {
        try {
            $stmt = $sqlClient->prepare(
                "DELETE FROM correspond where idCompany = ?"
            );
            $stmt->bindValue(1, "$id");                         //correspond
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "DELETE FROM locate where idCompany = ?"
            );                                                  //locate
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "DELETE FROM evaluate where idCompany = ?"          //evaluate
            );
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "DELETE FROM intership where idCompany = ?"          //internship
            );
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $sqlClient->prepare(
                "DELETE FROM company where idCompany = ?"       //company
            );
            $stmt->bindValue(1, "$id");
            $stmt->execute();
            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function updateCompany(&$sqlClient, $idCompany,$company,$eMail,$Sector,$descCompany,$locality){
        try {
            $stmt = $sqlClient->prepare(
                "UPDATE company
                set company=?, 
                eMail=?, 
                descCompany=?
                where idCompany=?"
            );
            $stmt->bindValue(1, "$company");
            $stmt->bindValue(2, "$eMail");
            $stmt->bindValue(3, "$descCompany");
            $stmt->bindValue(4, "$idCompany");
            $stmt->execute();

            $stmt = $sqlClient->prepare("DELETE from correspond where idCompany = ?");
            $stmt->bindValue(1, $idCompany);
            $stmt->execute();

            $stmt = $sqlClient->prepare(
                "INSERT INTO correspond(idCompany, idSector) values (?,?);"
            );
            $stmt->bindValue(1, $idCompany);
            foreach ($Sector as $domaine) {
                
                $stmt->bindValue(2, $domaine);
                $stmt->execute();
            }

            $stmt = $sqlClient->prepare("DELETE from locate where idCompany = ?");
            $stmt->bindValue(1, $idCompany);
            $stmt->execute();

            $stmt = $sqlClient->prepare(
                "INSERT INTO locate(idLocality ,idCompany) values (?,?);"
            );
            $stmt->bindValue(2, $idCompany);
            foreach ($locality as $ville) {
                $stmt->bindValue(1, $ville);
                $stmt->execute();
            }
            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
