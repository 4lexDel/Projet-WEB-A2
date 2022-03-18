<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style/style.css">
</head>

<body>

    <?php
    session_start();

    $auth = 0;

    if (!isset($_SESSION["AUTH"])) {
        if (isset($_POST["mdp"], $_POST["login"])) {
            try {
                // On se connecte à MySQL
                $mysqlClient = new PDO('mysql:host=localhost;dbname=projet_web_a2;charset=utf8', 'root', '');

                $stmt = $mysqlClient->prepare("SELECT * FROM users WHERE login=? AND password=?");

                $stmt->bindParam(1, $_POST["login"]);
                $stmt->bindParam(2, $_POST["mdp"]);

                $stmt->execute();

                $nbRow = $stmt->rowCount();           //Contenu des tables
                $nbCol = $stmt->columnCount();

                $data = $stmt->fetchAll();

                echo "Ligne : " . $nbRow . " Colonne : " . $nbCol;
                echo "<br>";
                print_r($data);

                $stmt->closeCursor();

                if ($nbRow > 0) {
                    $auth = 1;                                       //L'utilisateur est t'il existant ?
                    $_SESSION['auth'] = true;
                } else $auth = -1;
            } catch (Exception $e) {
                // En cas d'erreur, on affiche un message et on arrête tout
                die('Erreur : ' . $e->getMessage());
            }
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
                    <img class="mb-4" src="assets\img\logo.png" alt="" width="60" height="60">
                    <h1 class="h3 mb-3 fw-normal">Please login</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Login">
                        <label for="floatingInput">Login</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="mdp" placeholder="Password">
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

    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>