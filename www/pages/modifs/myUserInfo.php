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
                    <input type="text" class="form-control" name="userSecondName" value="'.$data[0]["userSecondName"].'" required>
                </div>
                <div>
                    <label for="userFirstName" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="userFirstName" value="'.$data[0]["userFirstName"].'" required>
                </div>
                <div>
                    <label for="login" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" name="login" value="'.$data[0]["login"].'" required>
                </div>
                <div>
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="password" value="'.$data[0]["password"].'" required>
                </div>
                <div>
                    <label for="passwordval" class="form-label">Confirmer Mot de passe</label>
                    <input type="text" class="form-control" name="passwordval" required>
                </div>
                <div>
                    <label for="floatingInput" class="form-label">Promotion</label>
                    <select class="form-control" id="floatingInput" name="promo" placeholder="Quel est votre promotion ?" required>';
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
                    <button type="submit" class="btn btn-primary">Accepter Changements</button>
                    <button type="submit" class="btn btn-danger">Supprimer Compte</button>
                </div>

            </form>
        </div>
        </div>
        ';
?>