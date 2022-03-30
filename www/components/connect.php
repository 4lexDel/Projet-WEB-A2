<?php  
    // Mit en commentaire le temps de modifier les autres pages.
    session_start();

    if (isset($_POST["disconnect"])) {
        session_unset();
        /*if (isset($_SESSION["auth"])) unset($_SESSION["auth"]);
        if (isset($_SESSION["login"])) unset($_SESSION["login"]);
        if (isset($_SESSION["secondName"])) unset($_SESSION["secondName"]);
        if (isset($_SESSION["firstName"])) unset($_SESSION["firstName"]);
        if (isset($_SESSION["role"])) unset($_SESSION["role"]);
        if (isset($_SESSION["idUser"])) unset($_SESSION["idUser"]);*/
    }

    //$_SESSION['auth'] = true;
    if (!isset($_SESSION['auth'])) {
        header("Location: ./login.php");
        exit();
    }
?>