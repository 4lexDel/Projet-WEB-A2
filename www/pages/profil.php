<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job catching</title>
    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/jqueryUI/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/style/style.css">

    <link rel="manifest" href="../manifest.json">
    <meta name="theme-color" content="white"/> 
    <link rel="icon" href="../images/jc-icon-512.png">
</head>

<body>
    <?php require_once "../components/connect.php" ?>
    <?php include "../components/header.php" ?>
    <?php include "./modifs/profil.php" ?>
    <?php include "./modifs/company.php" ?>
    <main>
        <!--
        <div style="text-align: -webkit-center;">
            <h3>Profil</h3>
            <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
                <form style="margin: 1em;">
                    <div>
                        <label for="userSecondName" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="userSecondName">
                    </div>
                    <div>
                        <label for="userFirstName" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="userFirstName">
                    </div>
                    <div>
                        <label for="login" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" id="login">
                    </div>
                    <div>
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="text" class="form-control" id="password">
                    </div>
                    <div>
                        <label for="passwordval" class="form-label">Confirmer Mot de passe</label>
                        <input type="text" class="form-control" id="passwordval">
                    </div>
                    <div>
                        <label for="floatingInput" class="form-label">Promotion</label>
                        <select class="form-control" id="floatingInput" name="promo" placeholder="Quel est votre promotion ?">
                                    <?php
                                    /*
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
                                    }*/
                                    ?>
                                </select>
                    </div>
                    <div style="display: flex;justify-content: space-evenly;margin-top: 1em;">
                        <li style="list-style: none;"></li>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
                                -->
        <?php include_once("./modifs/myUserInfo.php")?>
        <?php include_once("./modifs/myCompanies.php")?>
        <!--
        <br>
        <div style="text-align: -webkit-center;">
            <h3>Entreprise 2</h3>
            <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
                <form style="margin: 1em;">
                    <div>
                        <label for="company" class="form-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control" id="company">
                    </div>
                    <div>
                        <label for="eMail" class="form-label">EMail</label>
                        <input type="email" class="form-control" id="eMail">
                    </div>
                    <div>
                        <label for="descCompany" class="form-label">Description Entreprise</label>
                        <textarea name="descCompany" class="form-control" id="descCompany" style="resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"' maxlength="400"></textarea>
                    </div>
                    <div style="display: flex;justify-content: space-evenly;margin-top: 1em;">
                        <li style="list-style: none;"></li>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        -->
    </main>
    <?php include "../components/footer.php" ?>
    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/script/script.js"></script>
    <script src="../main.js" ></script>
</body>

</html>