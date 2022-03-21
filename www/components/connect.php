<?php  
    // Mit en commentaire le temps de modifier les autres pages.
    session_start();

    if (isset($_POST["disconnect"])) {
        if (isset($_SESSION["auth"])) unset($_SESSION["auth"]);
    }

    //$_SESSION['auth'] = true;
    if (!isset($_SESSION['auth'])) {
        header("Location: ./login.php");
        exit();
    }    
?>