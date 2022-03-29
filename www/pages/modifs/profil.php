<?php

$path = "../bdd/controleur.php";
require_once($path);
if (!isset($_SESSION["AUTH"])) {
    if (isset(
        $_POST["secondName"], 
        $_POST["firstName"], 
        $_POST["login"], 
        $_POST["mdp1"], 
        $_POST["role"],
        $_POST["schoolyear"])
    ) {
        $controleur = new Controleur();
        $controleur->updateProfil(
            $_POST["secondName"], 
            $_POST["firstName"], 
            $_POST["login"], 
            $_POST["mdp1"], 
            $_POST["role"]
        );
    }
}
?>