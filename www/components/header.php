<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-white">
    <ul class="nav col-6 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="bi me-2" src="../assets\img\logo.png" alt="" width="60" height="60">
        </a></li>
        <li><p>
            <?php
            if (isset($_SESSION["role"]) == true) echo $_SESSION["role"];
            ?>
        </p></li>
    </ul>

    <ul class="nav col-6 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="./home.php" class="nav-link px-4 link-secondary">Accueil</a></li>
        <li><a href="./recherche.php" class="nav-link px-4 link-dark">Recherche de stage</a></li>
        <li><a href="./candidature.php" class="nav-link px-4 link-dark">Mes candidatures</a></li>
        <li><a href="./creation.php" class="nav-link px-4 link-dark">Espace création</a></li>
    </ul>

    <div class="col-md-3 text-end">
        <!--
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
                -->
        <form class="bi me-3" action="home.php" method="post" style="display:flex; justify-content:space-around;">
            <!--<a href="./profil.php"><img class="bi me-2" src="../assets\img\profil.jpg" alt="" width="60" height="60"></a>-->
            <h3>
                <?php
                if (isset($_SESSION["secondName"], $_SESSION["firstName"]) == true) echo $_SESSION["secondName"] . " " . $_SESSION["firstName"];
                ?>
            </h3>
            <button class="btn btn-danger" type="submit" name="disconnect" value="true">Disconnect</button>
        </form>
    </div>
</header>