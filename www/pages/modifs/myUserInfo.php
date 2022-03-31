<?php
require_once "../bdd/controleur.php";
$data;
$nbRow;
$nbCol;
$id;
if (isset($_POST['idUser'])) {
    $id = $_POST['idUser'];
} else {
    $id = $_SESSION['idUser'];
}
$controleur = new Controleur();
$controleur->getUserInfos($data, $nbRow, $nbCol, $id);
echo    '
        <div style="text-align: -webkit-center;">
        <h3>Profil</h3>
        <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
            <form id="Update" method="post"></form>
            <form id="Delete" method="post">
                <input type="text" name="idUser" hidden value="'.$data[0]["idUser"].'" required>
            </form>
            <div style="margin: 1em;">
                <input form="Update" type="text" name="idUser" hidden value="'.$data[0]["idUser"].'" required>
                <div>
                    <label for="userSecondName" class="form-label">Nom</label>
                    <input form="Update" type="text" class="form-control" name="userSecondName" value="'.$data[0]["userSecondName"].'" required>
                </div>
                <div>
                    <label for="userFirstName" class="form-label">Prénom</label>
                    <input form="Update" type="text" class="form-control" name="userFirstName" value="'.$data[0]["userFirstName"].'" required>
                </div>
                <div>
                    <label for="login" class="form-label">Pseudo</label>
                    <input form="Update" type="text" class="form-control" name="login" value="'.$data[0]["login"].'" required>
                </div>
                <div>
                    <label for="password" class="form-label">Mot de passe</label>
                    <input form="Update" type="password" class="form-control" name="password" value="'.$data[0]["password"].'" required>
                </div>
                <div>
                    <label for="floatingInput" class="form-label">Promotion</label>
                    <select form="Update" form="Update" class="form-control" id="floatingInput" name="promo" placeholder="Quel est votre promotion ?" required>';
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
                    <button form="Update" name="ProfileUpd" value="1" type="submit" class="btn btn-primary">Accepter Changements</button>
                    <button form="Delete" name="ProfileDel" value="1" type="submit" class="btn btn-danger">Supprimer Compte</button>
                </div>

            </div>
        </div>
        </div>
        ';
?>