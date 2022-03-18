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
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-white">
        <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="bi me-2" src="../assets\img\logo.png" alt="" width="60" height="60">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="./home.php" class="nav-link px-4 link-secondary">Accueil</a></li>
            <li><a href="./recherche.php" class="nav-link px-4 link-dark">Recherche de stage</a></li>
            <li><a href="./candidature.php" class="nav-link px-4 link-dark">Mes candidatures</a></li>
        </ul>

        <div class="col-md-2 text-end">
                <!--
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
                -->
            <form class="bi me-2" action="home.php" method="post">
                <a href="./profil.php"><img class="bi me-2" src="assets\img\profil.jpg" alt="" width="60" height="60"></a>

                <button class="btn btn-danger" type="submit" name="disconnect" value="true">Disconnect</button>
            </form>
        </div>
    </header>