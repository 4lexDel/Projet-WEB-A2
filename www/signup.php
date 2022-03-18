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
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- ajouter des parametres pour differencier le role   -->
            <div class="col-sm-4">
                <br><br><br>
                <form class="form-signin" action="login.php" method="post">                         <!--Alternative button js-->
                    <img class="mb-4" src="assets\img\logo.png" alt="" width="60" height="60">
                    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="student-tab" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="true">Etudiant</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="delegate-tab" data-bs-toggle="tab" data-bs-target="#delegate" type="button" role="tab" aria-controls="delegate" aria-selected="false">Délégué</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pilote-tab" data-bs-toggle="tab" data-bs-target="#pilote" type="button" role="tab" aria-controls="pilote" aria-selected="false">Pilote</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin" type="button" role="tab" aria-controls="admin" aria-selected="false">Administrateur</button>
                        </li>
                    </ul>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Login">
                        <label for="floatingInput">Login</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword1" name="mdp1" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword2" name="mdp2" placeholder="Confirm password">
                        <label for="floatingPassword">Confirm password</label>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="student" role="tabpanel" aria-labelledby="student-tab">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" name="promo" placeholder="Quel est votre promotion ?">
                                <label for="floatingInput">Promotion</label>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="delegate" role="tabpanel" aria-labelledby="delegate-tab">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" name="promo" placeholder="Quel est votre promotion ?">
                                <label for="floatingInput">Promotion</label>
                            </div>
                            Autorisation ?
                        </div>
                        <div class="tab-pane fade" id="pilote" role="tabpanel" aria-labelledby="pilote-tab">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" name="promo" placeholder="Quel promotion dirigez-vous ?">
                                <label for="floatingInput">Promotion</label>
                            </div>
                            AJOUT ?
                        </div>
                        <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            ADMIN
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <!--<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>-->
                                <button type="button" class="w-100 btn btn-primary btn-lg" id="SignInForm" onclick="window.location.href='login.php';">Login</button>

                            </div>
                            <div class="col-sm-6">
                                <button class="w-100 btn btn-lg btn-secondary" type="submit">Sign up</button>

                            </div>
                        </div>
                    </div>
                    <p class="mt-5 mb-3 text-muted">&copy; Projet WEB-A2 (2021-2022)</p>
                </form>

                <div class="content">

                </div>
            </div>





        </div>
    </div>


    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>



<!--
Ajouter signup
actualiser login

-->