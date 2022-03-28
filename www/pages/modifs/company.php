<?php

$path = "../bdd/controleur.php";
require_once($path);
if (!isset($_SESSION["AUTH"])) {
    if (isset(
        $_POST["idCompany"],
        $_POST["company"],
        $_POST["eMail"],
        $_POST["descCompany"],
        $_POST["Sector"],
        $_POST["locality"])
    ) {
        $controleur = new Controleur();
        $controleur->UpdateCompany(
            $_POST["idCompany"],
            $_POST["company"],
            $_POST["eMail"],
            $_POST["Sector"],
            $_POST["descCompany"], 
            $_POST["locality"]
        );
    }
}
?>