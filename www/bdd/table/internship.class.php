<?php

class Internship
{

    public function __construct()
    {
    }

    public function selectInternshipSearch(&$sqlClient, &$data, &$nbRow, &$nbCol, $searchInfo, $localitySelect, $skillSelect, $wageRange)
    {
        try {
            $stmt = $sqlClient->prepare("SELECT * 
            FROM intership
            INNER JOIN need ON need.idInternship = intership.idInternship 
            INNER JOIN skill ON skill.idSkill = need.idSkill 
            INNER JOIN locality ON locality.idLocality = intership.idLocality 
            INNER JOIN company ON company.idCompany = intership.idCompany 
            WHERE intership like ? AND city like ? AND skill like ? AND WageMonth >= ?");

            $stmt->bindValue(1, "%$searchInfo%");
            $stmt->bindValue(2, "%$localitySelect%");
            $stmt->bindValue(3, "%$skillSelect%");
            $stmt->bindValue(4, $wageRange);

            $stmt->execute();

            $nbRow = $stmt->rowCount();           //Contenu des tables
            $nbCol = $stmt->columnCount();

            $data = $stmt->fetchAll();

            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function insertNewInternship(&$sqlClient, $company, $internship, $StartDate, $EndDate, $WageMonth, $nbPlace, $descInternship, $locality, $skills){
        try {
            $stmt = $sqlClient->prepare(
            "   INSERT INTO intership(
                    intership,
                    startDate,
                    endDate,
                    WageMonth,
                    releaseDate,
                    nbPlace,
                    descInternship,
                    idCompany,
                    idLocality
                ) 
                values (
                    ?,
                    ?,
                    ?,
                    ?,
                    NOW(),
                    ?,
                    ?,
                    ?,
                    ?
                );
            ");
            $stmt->bindValue(1,"$internship");
            $stmt->bindValue(2,"$StartDate");
            $stmt->bindValue(3,"$EndDate");
            $stmt->bindValue(4,"$WageMonth");
            $stmt->bindValue(5,"$nbPlace");
            $stmt->bindValue(6,"$descInternship");
            $stmt->bindValue(7,"$company");
            $stmt->bindValue(8,"$locality");

            $stmt->execute();

            foreach ($skills as $skill) {
                $stmt = $sqlClient->prepare(
                    "   INSERT INTO need (
                            idSkill,
                            idInternship
                        )
                        Values (
                            ?,
                            (SELECT idInternship from intership order by idInternship DESC limit 1)       
                        );
                    ");
                $stmt->bindValue(1, $skill);
                $stmt->execute();
            }
            $stmt->closeCursor();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function selectSkills(&$sqlClient, &$data, &$nbRow, &$nbCol){
        try {
            $stmt = $sqlClient->prepare("SELECT * FROM Skill");
            
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

