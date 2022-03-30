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
                    <?php
                    if (!($_SESSION['role'] == "Etudiant")) {
                        echo '<li><a href="./creation.php" class="nav-link px-2 link-dark">Espace création</a></li>';
                    }
                    ?>
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
                        <button class="btn btn-danger" type="submit" name="disconnect" value="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>