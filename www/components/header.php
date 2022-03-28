<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-white">
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-2">
        <ul class="nav col-12 justify-content-center">
        <li><a href="#" class="d-flex align-items-center col-sm-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="bi me-2" src="../assets\img\logo.png" alt="" width="60" height="60">
        </a></li>
        <li>
            <?php
            if (isset($_SESSION["role"]) == true) echo $_SESSION["role"];
            ?>
        </li>
    </ul>
        </div>
        <div class="col-lg-7">
        <ul class="nav mb-2 justify-content-center">
        <li><a href="./home.php" class="nav-link px-2 link-secondary">Accueil</a></li>
        <li><a href="./recherche.php" class="nav-link px-2 link-dark">Recherche de stage</a></li>
        <li><a href="./candidature.php" class="nav-link px-2 link-dark">Mes candidatures</a></li>
        <li><a href="./creation.php" class="nav-link px-2 link-dark">Espace création</a></li>
    </ul>
        </div>
        <div class="col-lg-3">
        <div class="text-end">

        <form class="bi me-3" action="home.php" method="post" style="display:flex; justify-content:space-around;">
            <!--<a href="./profil.php"><img class="bi me-2" src="../assets\img\profil.jpg" alt="" width="60" height="60"></a>-->
            <h3>
                <?php
                if (isset($_SESSION["secondName"], $_SESSION["firstName"]) == true) echo '<a href="./profil.php" style="text-decoration:none; color:black;">' . $_SESSION["secondName"] . " " . $_SESSION["firstName"] . '</a>';
                ?>
            </h3>
            <button class="btn btn-danger" type="submit" name="disconnect" value="true">Disconnect</button>
        </form>
    </div>
        </div>
    </div>
</div>
</header>
