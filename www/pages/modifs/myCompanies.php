<?php
$path = "../bdd/controleur.php";
require_once($path);
    $data;
    $nbRow;
    $nbCol;
    $controleur = new Controleur();
    $controleur->selectUsersCompany($data, $nbRow, $nbCol);
    if ($nbRow) {
        echo '<br>
        <div style="text-align: -webkit-center;">
            <h3>Vos Entreprises</h3>
        </div>';
    }
    for ($j = 0; $j < $nbRow; $j++) {
        echo '<br>
        <div style="text-align: -webkit-center;">
            <h3>'.$data[$j]["company"].'</h3>
            <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
                <form style="margin: 1em;">
                    <div class="mb-3">
                        <input type="text" name="idCompany" name="idCompany" hidden value="'.$data[$j]["idCompany"].'">
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Nom de l\'entreprise</label>
                        <input type="text" class="form-control" name="company" value="'.$data[$j]["company"].'">
                    </div>
                    <div class="mb-3">
                        <label for="eMail" class="form-label">EMail</label>
                        <input type="email" class="form-control" name="eMail" value="'.$data[$j]["eMail"].'">
                    </div>
                    <div class="mb-3">
                        <label for="descCompany" class="form-label">Description Entreprise</label>
                        <textarea name="descCompany" class="form-control" name="descCompany" style="resize: none;" oninput=\'this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"\' maxlength="400">'.$data[$j]["descCompany"].'</textarea>
                    </div>
                    <div class="mb-3" style="display: flex;justify-content: space-evenly;">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>';
    }
?>
