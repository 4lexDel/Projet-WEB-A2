<?php
require_once "../bdd/controleur.php";
$data;
$nbRow;
$nbCol;
$IdUser;
$IdUser = $_SESSION['idUser'];
$controleur = new Controleur();
$controleur->getUserInfos($data, $nbRow, $nbCol, $IdUser);
echo    '
        <div style="text-align: -webkit-center;">
        <h3>Profil</h3>
        <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
            <form style="margin: 1em;">
                <div>
                    <label for="userSecondName" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="userSecondName" value="'.$data[0]["userSecondName"].'">
                </div>
                <div>
                    <label for="userFirstName" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="userFirstName" value="'.$data[0]["userFirstName"].'">
                </div>
                <div>
                    <label for="login" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" name="login" value="'.$data[0]["login"].'">
                </div>
                <div>
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="password" value="'.$data[0]["password"].'">
                </div>
                <div>
                    <label for="passwordval" class="form-label">Confirmer Mot de passe</label>
                    <input type="text" class="form-control" name="passwordval">
                </div>
                <div>
                    <label for="floatingInput" class="form-label">Promotion</label>
                    <select class="form-control" id="floatingInput" name="promo" placeholder="Quel est votre promotion ?">';
$reminder = $data[0]["idSchoolYear"];
$controleur->selectSchoolYear($data, $nbRow, $nbCol);
for ($j = 0; $j < $nbRow; $j++) {
    echo '<option value="' . $data[$j]["idSchoolYear"] . '" ';
        if ($reminder==$data[$j]["idSchoolYear"]) {echo'selected';}; 
    echo'>' . $data[$j]["schoolYear"] . '</option>';
}
                            echo '</select>
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
        ';
?>