<?php

$path = "../bdd/controleur.php";
require_once($path);
if (!isset($_SESSION["AUTH"])) {
    $controleur = new Controleur();
    if (isset($_POST["OfferUpd"])) {
        if (isset(
        $_POST["idInternship"],
        $_POST["intership"],
        $_POST["startDate"],
        $_POST["endDate"],
        $_POST["WageMonth"],
        $_POST["nbPlace"],
        $_POST["locality"],
        $_POST["skill"],
        $_POST["descInternship"],
        $_POST["idCompany"]
        )) {
            $controleur->updateInternship(
                $_POST["idInternship"],
                $_POST["intership"],
                $_POST["startDate"],
                $_POST["endDate"],
                $_POST["WageMonth"],
                $_POST["nbPlace"],
                $_POST["locality"],
                $_POST["skill"],
                $_POST["descInternship"],
                $_POST["idCompany"]
            );
    }
    } elseif (isset($_POST["OfferDel"])) {
        $controleur->deleteInternship($_POST["idInternship"]);
    }
}
?>