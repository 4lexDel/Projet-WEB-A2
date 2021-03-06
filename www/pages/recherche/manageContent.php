<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/bdd/controleur.php";

if(isset($_GET["type"], $_GET["id"], $_GET["objet"])){
    echo 'Requête de type : '.$_GET["type"].' concernant : '.$_GET["id"].' ('.$_GET["objet"].')';

    $controleur = new Controleur();
    
    switch ($_GET["objet"]) {
        case 'company':
            if($_GET["type"] == "delete") $controleur->deleteCompany($_GET["id"]);
            if($_GET["type"] == "evaluate") {
                echo "EVALUATE : ".$_GET["id"]." | Note : ".$_GET["value"]."/5";
                $controleur->evaluateCompany($_GET["id"], $_GET["value"]);
            }

            break;

            case 'internship':
                if($_GET["type"] == "save") $controleur->addToWishList($_GET["id"]);
                if($_GET["type"] == "delete") $controleur->deleteInternship($_GET["id"]);

                break;

                case 'user':
                    if($_GET["type"] == "delete") $controleur->deleteUser($_GET["id"]);
                    if($_GET["type"] == "moderate") {
                        echo "Moderate : ".$_GET["id"]." | Rank : ".$_GET["value"];
                        $controleur->updateUserRank($_GET["id"], $_GET["value"]);
                    }

                break;
    }
}
