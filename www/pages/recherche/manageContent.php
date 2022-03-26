<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/controleur.php";

if(isset($_GET["type"], $_GET["id"], $_GET["objet"])){
    echo 'Requête de type : '.$_GET["type"].' concernant : '.$_GET["id"].' ('.$_GET["objet"].')';

    $controleur = new Controleur();
    
    switch ($_GET["objet"]) {
        case 'company':
            if($_GET["type"] == "delete") $controleur->deleteCompany($_GET["id"]);

            break;
    }
}

?>