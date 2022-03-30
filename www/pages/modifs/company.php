<?php

$path = "../bdd/controleur.php";
require_once($path);
$controleur = new Controleur();
if (!isset($_SESSION["AUTH"])) { 
    if(isset($_POST["CompanyUpd"])){
        if (isset(
        $_POST["idCompany"],
        $_POST["company"],
        $_POST["eMail"],
        $_POST["descCompany"],
        $_POST["Sector"],
        $_POST["locality"])
        ){
            $controleur->updateCompany(
                $_POST["idCompany"],
                $_POST["company"],
                $_POST["eMail"],
                $_POST["Sector"],
                $_POST["descCompany"], 
                $_POST["locality"]
            );
        }
    } elseif (isset($_POST["CompanyDel"])) {
        $controleur->deleteCompany($_POST["idCompany"]);
    }
}

?>