<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/controleur.php";

if(isset($_GET["type"], $_GET["id"], $_GET["objet"])){
    echo 'Requête de type : '.$_GET["type"].' concernant : '.$_GET["id"].' ('.$_GET["objet"].')';

    $controleur = new Controleur();
    
    switch ($_GET["objet"]) {
        case 'company':
            if($_GET["type"] == "delete") $controleur->deleteCompany($_GET["id"]);

            break;

            case 'internship':
                if($_GET["type"] == "save") $controleur->addToWishList($_GET["id"]);
                if($_GET["type"] == "delete") $controleur->deleteInternship($_GET["id"]);

                break;

                case 'user':
                if($_GET["type"] == "delete") $controleur->deleteUser($_GET["id"]);

                break;
    }
}
