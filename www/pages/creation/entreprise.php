<?php

$path = "../bdd/controleur.php";
require_once($path);
if (!isset($_SESSION["AUTH"])) {
    if (isset(
        $_POST["company"],
        $_POST["eMail"],
        $_POST["descCompany"],
        $_POST["Sector"],
        $_POST["locality"])
    ) {
        echo $_POST["company"].'<br>';
        echo $_POST["eMail"].'<br>';
        echo $_POST["descCompany"].'<br>';
        echo $_POST["Sector"].'<br>';
        echo $_POST["locality"].'<br>';
        echo $_SESSION["idUser"];

        $controleur = new Controleur();
        $controleur->insertNewCompany(
            $_POST["company"],
            $_POST["eMail"],
            $_POST["Sector"],
            $_POST["descCompany"], 
            $_POST["locality"]
        );
    }
}
?>
<div style="text-align: -webkit-center;">
    <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
        <form style="margin: 1em;" method="post">
            <div class="mb-3">
                <label for="company" class="form-label">Nom de l'Entreprise</label>
                <input name="company" type="text" class="form-control" id="company" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="eMail" class="form-label">Email Entreprise</label>
                <input name="eMail" type="email" class="form-control" id="eMail">
            </div>
            <div class="mb-3">
                <label for="Sector" class="form-label">Secteur</label>
                <select name="Sector" id="Sector" class="form-control">
                    <option value="1">Secteur 1</option>
                    <option value="2">Secteur 2</option>
                    <option value="3">Secteur 3</option>
                </select>
            </div>
            <div class="locality">
                <label for="city">Ville</label>
                <select name="locality" id="locality" class="form-select col-md-2">
                    <?php
                    $data;
                    $nbRow;
                    $nbCol;

                    $controleur = new Controleur();
                    $controleur->selectLocality($data, $nbRow, $nbCol);

                    for ($j = 0; $j < $nbRow; $j++) {
                        echo '<option value="' . $data[$j]["idLocality"] . '">' . $data[$j]["city"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="descCompany" class="form-label">Description Entreprise</label>
                <textarea name="descCompany" class="form-control" id="descCompany" style="resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"' maxlength="400"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Créer !</button>
        </form>
    </div>
</div>