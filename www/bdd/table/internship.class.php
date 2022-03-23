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
}

