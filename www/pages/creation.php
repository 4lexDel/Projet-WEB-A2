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
    <?php require "../components/connect.php" ?>
    <?php include "../components/header.php" ?>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <br><br>
            <form action="" class="form-signin">
                <div class="row">
                    <div class="col-md-2">
                        <label for="objet">Objet</label>
                        <br><br>
                        <select name="objet" id="objetSelect" class="form-select col-md-2">
                            <option value="etudiant" data-bs-target="#test1">Etudiant</option>
                            <option value="delegue" data-bs-target="#test2">Délégué</option>
                            <option value="pilote">Pilote</option>
                            <option value="entreprise">Entreprise</option>
                            <option value="offreStage">Offre de stage</option>
                        </select>
                    </div>
                    <div class="col-md-2 formSelect">
                        <div class="searchInfo">
                            <label for="objet">Quoi ?</label>
                            <br><br>
                            <input type="text" name="searchInfo" id="searchInfoText" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2 formSelect">
                        <div class="localitySelect">
                            <label for="objet">Ville</label>
                            <br><br>
                            <select name="citySelect" id="citySelect" class="form-select col-md-2">
                                <option value="all">Peu importe</option>

                                <?php
                                require "../bdd/controleur.php";
                                $data;
                                $nbRow;
                                $nbCol;

                                $controleur = new Controleur();
                                $controleur->selectLocality($data, $nbRow, $nbCol);

                                for ($j = 0; $j < $nbRow; $j++) {
                                    $value = $data[$j][$nbCol - 1];
                                    echo '<option value="' . $value . '">' . $value . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-2">
                        <button class="w-100 btn btn-lg btn-primary" type="submit">création</button>
                    </div>
                    <!--<div class="col-sm-6">
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    </div>-->
                </div>
            </form>
            <br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br>
        </div>
    </div>





    <?php include "../components/footer.php" ?>
    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/script/script.js"></script>

    <script>
        $(document).ready(function() {
            $("#objetSelect").change(function() {
                switch ($("#objetSelect").val) {
                    case "etudiant":
                        //nom, prenom, promo
                        break;

                    case "delegue":

                        break;

                    case "pilote":

                        break;

                    case "entreprise":

                        break;

                    case "offreStage":

                        break;
                }

                $(".formSelect").html(`
                
                
                
                `);
            });
        });
    </script>
</body>

</html>