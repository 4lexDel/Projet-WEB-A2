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

    <style> label, output {color:white; font-weight:bold;}</style>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <br><br>
            <div class="col-sm-3 element" style="border-radius:10px;margin:10px; background-color : rgb(140,140,140); ">
                <form action="" class="form-signin">
                    <div class="row justify-content-center">
                        <div style="background-color : rgb(140,140,140); margin:10px; padding:10px;">
                            <div class="col-mdd-2">
                                <label for="objet">Objet</label>
                                <br><br>
                                <select name="objet" id="objetSelect" class="form-select col-md-2">
                                    <option value="etudiant">Etudiant</option>
                                    <option value="delegue">Délégué</option>
                                    <option value="pilote">Pilote</option>
                                    <option value="entreprise">Entreprise</option>
                                    <option value="offreStage">Offre de stage</option>
                                </select>
                            </div>
                            <br>
                            <div class="row formSelect">
                                <div class="col-mdd-2">
                                    <div class="searchInfo">
                                        <label for="objet">Quoi ?</label>
                                        <br><br>
                                        <input type="text" name="searchInfo" id="searchInfo" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="col-mdd-2">
                                    <div class="secondName">
                                        <label for="objet">Nom</label>
                                        <br><br>
                                        <input type="text" name="secondName" id="secondName" class="form-control">
                                    </div>
                                    <br>
                                    <div class="firstName">
                                        <label for="objet">Prénom</label>
                                        <br><br>
                                        <input type="text" name="firstName" id="firstName" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="col-mdd-2">
                                    <div class="localitySelect">
                                        <label for="city">Ville</label>
                                        <br><br>
                                        <select name="localitySelect" id="localitySelect" class="form-select col-md-2">
                                            <option value="">Peu importe</option>

                                            <?php
                                            require "../bdd/controleur.php";
                                            $data;
                                            $nbRow;
                                            $nbCol;

                                            $controleur = new Controleur();
                                            $controleur->selectLocality($data, $nbRow, $nbCol);

                                            for ($j = 0; $j < $nbRow; $j++) {
                                                $value = $data[$j]["city"];
                                                echo '<option value="' . $value . '">' . $value . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="col-mdd-2">
                                    <div class="schoolYearSelect">
                                        <label for="schoolYearSelect">Promotion</label>
                                        <br><br>
                                        <select name="schoolYearSelect" id="schoolYearSelect" class="form-select col-md-2">
                                            <option value="">Peu importe</option>

                                            <?php
                                            $controleur->selectSchoolYear($data, $nbRow, $nbCol);

                                            for ($j = 0; $j < $nbRow; $j++) {
                                                $value = $data[$j]["schoolYear"];
                                                echo '<option value="' . $value . '">' . $value . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="col-mdd-2">
                                    <div class="sectorSelect">
                                        <label for="sector">Secteur d'activité</label>
                                        <br><br>
                                        <select name="sectorSelect" id="sectorSelect" class="form-select col-md-2">
                                            <option value="">Peu importe</option>

                                            <?php
                                            $controleur->selectSector($data, $nbRow, $nbCol);

                                            for ($j = 0; $j < $nbRow; $j++) {
                                                $value = $data[$j]["sector"];
                                                echo '<option value="' . $value . '">' . $value . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <div class="col-mdd-2">
                                    <div class="skillSelect">
                                        <label for="skill">Compétences</label>
                                        <br><br>
                                        <select name="skillSelect" id="skillSelect" class="form-select col-md-2">
                                            <option value="">Peu importe</option>

                                            <?php
                                            $controleur->selectSkill($data, $nbRow, $nbCol);

                                            for ($j = 0; $j < $nbRow; $j++) {
                                                $value = $data[$j]["skill"];
                                                echo '<option value="' . $value . '">' . $value . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="col-mdd-2">
                                    <div class="wageRange">
                                        <label for="wageRange">Salaire minimal : </label>

                                        <br><br>
                                        <input type="range" name="wageRange" id="wageRange" class="form-range" min="0" max="2000" step="100" value="0" oninput="this.nextElementSibling.value = this.value+' €'">
                                        <output>0 €</output>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-8 element" style="background-color : rgb(140,140,140); border-radius:10px;
                                                margin:10px; 
                                                padding:10px;
                                                display:flex;
                                                justify-content: space-evenly;
                                                align-items: center;
                                                overflow: auto;
                                                height:800px">
                
                <?php
                if (isset($_GET["objet"])) {
                    //echo $_GET["objet"];
                    switch ($_GET["objet"]) {
                        case "etudiant":                                                //FILTRER PAR ROLE
                            #secondName, #firstName, #schoolYearSelect

                            $controleur->selectUsersSearch($data, $nbRow, $nbCol, "Etudiant", $_GET['secondName'], $_GET['firstName'], $_GET['schoolYearSelect']);

                            for ($j = 0; $j < $nbRow; $j++) {
                                echo '<div class="card">';
                                echo '<div class="card-header">';
                                echo $data[$j]["schoolYear"] . " - ". $data[$j]["role"];

                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">'. $data[$j]["userSecondName"] . $data[$j]["userFirstName"] . '</h5>';
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo '<br>';
                            }

                            break;

                        case "delegue":
                            #secondName, #firstName, #schoolYearSelect
                            
                            $controleur->selectUsersSearch($data, $nbRow, $nbCol, "Délégué", $_GET['secondName'], $_GET['firstName'], $_GET['schoolYearSelect']);

                            for ($j = 0; $j < $nbRow; $j++) {
                                echo '<div class="card">';
                                echo '<div class="card-header">';
                                echo $data[$j]["schoolYear"] . " - ". $data[$j]["role"];

                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">'. $data[$j]["userSecondName"] . $data[$j]["userFirstName"] . '</h5>';
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo '<br>';
                            }

                            break;

                        case "pilote":
                            #secondName, #firstName, #schoolYearSelect

                            $controleur->selectUsersSearch($data, $nbRow, $nbCol, "Pilote", $_GET['secondName'], $_GET['firstName'], $_GET['schoolYearSelect']);

                            for ($j = 0; $j < $nbRow; $j++) {
                                echo '<div class="card">';
                                echo '<div class="card-header">';
                                echo $data[$j]["schoolYear"] . " - ". $data[$j]["role"];

                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">'. $data[$j]["userSecondName"] . $data[$j]["userFirstName"] . '</h5>';
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo '<br>';
                            }

                            break;

                        case "entreprise":
                            #searchInfo, #localitySelect, #sectorSelect

                            $controleur->selectCompanySearch($data, $nbRow, $nbCol, $_GET['searchInfo'], $_GET['localitySelect'], $_GET['sectorSelect']);

                            for ($j = 0; $j < $nbRow; $j++) {
                                echo '<div class="card">';
                                echo '<div class="card-header">';
                                echo $data[$j]["sector"];

                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">'. $data[$j]["company"] . " - ". $data[$j]["city"] . '</h5>';
                                echo '<p class="card-text">'.$data[$j]["descCompany"].'</p>';
                                echo '<div class="card-footer">'.$data[$j]["eMail"];
                                echo '</div>';
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo '<br>';
                            }
                            break;

                        case "offreStage":
                            #localitySelect, #sectorSelect, #searchInfo, #wageRange, #skillSelect
                            break;
                    }
                }
                ?>
            </div>
        </div>
    </div>





    <?php include "../components/footer.php" ?>
    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/script/script.js"></script>

    <script>
        $(document).ready(function() {
            function hideForm() {
                //$('#searchInfo, #secondName, #firstName, #localitySelect, #schoolYearSelect, #sectorSelect, #wageRange').attr("disabled",true);
                $('#searchInfo, #secondName, #firstName, #localitySelect, #schoolYearSelect, #sectorSelect, #wageRange, #skillSelect').parent().hide();
                //$('#searchInfo, #secondName, #firstName, #localitySelect, #schoolYearSelect, #sectorSelect, #wageRange').parent().css("opacity", "0.3");
            }

            function showElement(element) {
                //element.attr("disabled",false);
                element.parent().show();
                //element.parent().css("opacity", "1");

            }

            updateForm(); //On l'appelle une premiere fois

            $("#objetSelect").change(function() {
                updateForm()
            });

            function updateForm() {
                console.log($("#objetSelect").val());

                switch ($("#objetSelect").val()) {
                    case "etudiant":
                        //nom, prenom, promo
                        hideForm();
                        showElement($('#secondName, #firstName, #schoolYearSelect'));
                        break;

                    case "delegue":
                        hideForm();
                        showElement($('#secondName, #firstName, #schoolYearSelect'));
                        break;

                    case "pilote":
                        hideForm();
                        showElement($('#secondName, #firstName, #schoolYearSelect'));
                        break;

                    case "entreprise":
                        hideForm();
                        showElement($('#localitySelect, #sectorSelect, #searchInfo'));
                        break;

                    case "offreStage":
                        hideForm();
                        showElement($('#localitySelect, #sectorSelect, #searchInfo, #wageRange, #skillSelect'));
                        break;
                }
            }
        });
    </script>
</body>

</html>