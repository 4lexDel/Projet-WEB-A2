<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job catching</title>

    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="icon" href="../images/jc-icon-512.png">

    <link rel="manifest" href="../manifest.json">
    <meta name="theme-color" content="white"/> 
</head>

<body>

    <?php
    require_once "../bdd/controleur.php";

    session_start();

    $auth = 0;

    if (!isset($_SESSION["AUTH"])) {
        if (isset($_POST["mdp"], $_POST["login"])) {
            $data;
            $nbRow;
            $nbCol;

            $controleur = new Controleur();
            $controleur->selectUsersLogin($data, $nbRow, $nbCol, $_POST["login"], $_POST["mdp"]);

            if ($nbRow > 0) {
                $auth = 1;                                       //L'utilisateur est t'il existant ?
                $_SESSION['auth'] = true;

                $_SESSION['login'] = $data[0]["login"];
                $_SESSION['secondName'] = $data[0]["userSecondName"];             //On recup les données clients
                $_SESSION['firstName'] = $data[0]["userFirstName"];
                $_SESSION['role'] = $data[0]["role"];
                $_SESSION['idUser'] = $data[0]["idUser"];
            } else $auth = -1;

            /*echo "Ligne : " . $nbRow . " Colonne : " . $nbCol;
            echo "<br>";
            print_r($data);
            echo '<br> LOGIN : ' . $data[0]["login"];
            echo '<br> NOM : ' . $data[0]["userSecondName"];
            echo '<br> PRENOM : ' . $data[0]["userFirstName"];
            echo '<br> ROLE : ' . $data[0]["role"];*/
        }
    }
    if (isset($_SESSION['auth']) && $_SESSION['auth']) {
        header("Location: ./home.php");
        exit();
    }

    ?>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-3">
                <br><br><br><br><br>
                <form class="form-signin" action="login.php" method="post">
                    <img class="mb-4" src="../assets\img\logo.png" alt="" width="60" height="60">
                    <h1 class="h3 mb-3 fw-normal">Please login</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Login" required>
                        <label for="floatingInput">Login</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="mdp" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>

                    <!--<div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>-->
                    <br>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

                            </div>
                            <div class="col-sm-6">
                                <!--<button class="w-100 btn btn-lg btn-secondary" type="submit">Sign up</button>-->
                                <button type="button" class="w-100 btn btn-secondary btn-lg" id="SignInForm" onclick="window.location.href='signup.php';">Sign up</button>
                            </div>
                        </div>
                    </div>
                    <p class="mt-5 mb-3 text-muted">&copy; Projet WEB-A2 (2021-2022)</p>
                </form>

                <div class="content">
                    <?php
                    if ($auth == 1) echo '<div class="alert alert-success" role="alert">Connexion réussi !</div>';
                    elseif ($auth == -1) echo '<div class="alert alert-danger" role="alert">Echec de la connexion !</div>';
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../main.js" ></script>

</body>

</html>