<?php

$path = "../bdd/controleur.php";
require_once($path);
if (!isset($_SESSION["AUTH"])) {
    $controleur = new Controleur();
    if (isset($_POST["ProfileUpd"])) {
        if (isset(
            $_POST["idUser"],
            $_POST["userSecondName"], 
            $_POST["userFirstName"], 
            $_POST["login"], 
            $_POST["password"],
            $_POST["passwordval"],
            $_POST["promo"])
            && $_POST["password"]==$_POST["passwordval"]
        ) {
            $controleur->updateProfil(
                $_POST["idUser"],
                $_POST["userSecondName"], 
                $_POST["userFirstName"], 
                $_POST["login"], 
                $_POST["password"],
                $_POST["promo"]
            );
    }
    } elseif (isset($_POST["ProfileDel"])) {
        session_unset();
        $controleur->deleteUser($_POST["idUser"]);
        header("Location: ./login.php");
        exit();
    }
}
?>