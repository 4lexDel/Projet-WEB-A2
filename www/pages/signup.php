<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/jqueryUI/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>

    <?php
    require "../bdd/controleur.php";

    session_start();

    $userCreated = 0;

    if (isset($_POST["submit"])) {
        if ($_POST["mdp1"] == $_POST["mdp2"]) {
            $userCreated = 1;

            $controleur = new Controleur();

            switch ($_POST["role"]) {
                case '1':   //Admin/pilote
                case '3':
                    //$second = htmlspecialchars($_POST["secondName"]);
                    $controleur->insertUser($_POST["secondName"], $_POST["firstName"], $_POST["login"], $_POST["mdp1"], $_POST["role"], $userCreated);

                    break;

                default:
                    //Del/etudiant/
                    #secondName, firstName, login, mdp1, mdp2, promo
                    $controleur->insertUserInPromo($_POST["secondName"], $_POST["firstName"], $_POST["login"], $_POST["mdp1"], $_POST["promo"], $_POST["role"], $userCreated);

                    break;
            }

            
        } else $userCreated = -1;
    }


    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- ajouter des parametres pour differencier le role   -->
            <div class="col-sm-4">
                <br><br><br>
                <form class="form-signin" action="signup.php" method="post">
                    <!--Alternative button js-->
                    <img class="mb-4" src="../assets\img\logo.png" alt="" width="60" height="60">
                    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

                    <ul class="nav nav-tabs role" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button value="2" class="nav-link active" id="student-tab" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="true">Etudiant</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button value="4" class="nav-link" id="delegate-tab" data-bs-toggle="tab" data-bs-target="#delegate" type="button" role="tab" aria-controls="delegate" aria-selected="false">Délégué</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button value="3" class="nav-link" id="pilote-tab" data-bs-toggle="tab" data-bs-target="#pilote" type="button" role="tab" aria-controls="pilote" aria-selected="false">Pilote</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button value="1" class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button" role="tab" aria-controls="admin" aria-selected="false">Administrateur</button>
                        </li>
                    </ul>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="secondName" name="secondName" placeholder="Second name" required>
                        <label for="floatingInput">Second name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" required>
                        <label for="floatingInput">First name</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
                        <label for="floatingInput">Login</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword1" name="mdp1" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword2" name="mdp2" placeholder="Confirm password" required>
                        <label for="floatingPassword">Confirm password</label>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">
                            <div class="form-floating">
                                <select class="form-control" id="floatingInput" name="promo" placeholder="Quel est votre promotion ?">
                                    <?php
                                    require_once "../bdd/controleur.php";

                                    $data;
                                    $nbRow;
                                    $nbCol;

                                    $controleur = new Controleur();
                                    $controleur->selectSchoolYear($data, $nbRow, $nbCol);

                                    for ($j = 0; $j < $nbRow; $j++) {
                                        $id = $data[$j]["idSchoolYear"];
                                        $value = $data[$j]["schoolYear"];
                                        echo '<option value="' . $id . '">' . $value . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="delegate" role="tabpanel" aria-labelledby="delegate-tab">
                            <div class="form-floating">
                                <select class="form-control" id="floatingInput" name="promo" placeholder="Quel est votre promotion ?">
                                    <!--<nom>test</nom>-->
                                    <!--<libellé>Quel promotion dirigez-vous ?</libellé>-->
                                    <?php
                                    $controleur->selectSchoolYear($data, $nbRow, $nbCol);

                                    for ($j = 0; $j < $nbRow; $j++) {
                                        $id = $data[$j]["idSchoolYear"];
                                        $value = $data[$j]["schoolYear"];
                                        echo '<option value="' . $id . '">' . $value . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--Autorisation ?-->
                        </div>
                        <div class="tab-pane fade" id="pilote" role="tabpanel" aria-labelledby="pilote-tab">

                            <!--AJOUT ?-->
                        </div>
                        <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <!--ADMIN-->
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <!--<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>-->
                                <button type="button" class="w-100 btn btn-secondary btn-lg" id="SignInForm" onclick="window.location.href='login.php';">Back to login</button>

                            </div>
                            <div class="col-sm-6">
                                <input type="hidden" name="role" id="roleInput" value="">
                                <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign up</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="content">
                        <?php
                        if ($userCreated == 1) echo '<div class="alert alert-success" role="alert">Création réussi !</div>';
                        elseif ($userCreated == -1) echo '<div class="alert alert-danger" role="alert">Erreur saisie mot de passe !</div>';
                        elseif ($userCreated == -2) echo '<div class="alert alert-danger" role="alert">Utilisateur déja existant !</div>';
                        ?>
                    </div>
                    <p class="mt-5 mb-3 text-muted">&copy; Projet WEB-A2 (2021-2022)</p>
                </form>
            </div>
        </div>
    </div>


    <script src="../assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#roleInput").val("2");

            $(".role button").click(function() {
                $(".role button").each(function(i, obj) {
                    if ($(obj).hasClass("active")) {
                        //console.log($(obj).val());
                        $("#roleInput").val($(obj).val());
                    }
                });
            });

        });
    </script>
</body>

</html>



<!--
Ajouter signup
actualiser login

-->