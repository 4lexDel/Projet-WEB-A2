<?php

$path = "../bdd/controleur.php";
require_once($path);
if (!isset($_SESSION["AUTH"])) {
    if (isset(
        $_POST["userSecondName"], 
        $_POST["userFirstName"], 
        $_POST["login"], 
        $_POST["password"],
        $_POST["passwordval"],
        $_POST["promo"])
        && $_POST["password"]==$_POST["passwordval"]
    ) {
        $controleur = new Controleur();
        $controleur->updateProfil(
            $_POST["secondName"], 
            $_POST["firstName"], 
            $_POST["login"], 
            $_POST["password"],
            $_POST["promo"]
        );
    }
}
?>