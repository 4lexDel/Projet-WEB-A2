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
                    <div class="mb-3">
                        <label for="Sector" class="form-label">Secteur</label>
                        <select name="Sector" id="Sector" required class="form-select col-md-2" multiple>';
                            
                            $data2;
                            $nbRow2;
                            $nbCol2;

                            $controleur = new Controleur();
                            $controleur->selectSector($data2, $nbRow2, $nbCol2);

                            for ($j = 0; $j < $nbRow2; $j++) {
                                echo '<option value="' . $data2[$j]["idSector"] . '">' . $data2[$j]["sector"] . '</option>';
                            }
                        echo '
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="city">Ville</label>
                        <select name="locality" id="locality" required class="form-select col-md-2" multiple>';
                            $data3;
                            $nbRow3;
                            $nbCol3;
                            $controleur = new Controleur();
                            $controleur->selectLocality($data3, $nbRow3, $nbCol3);

                            for ($j = 0; $j < $nbRow3; $j++) {
                                echo '<option value="' . $data3[$j]["idLocality"] . '">' . $data3[$j]["city"] . '</option>';
                            }
                            echo '
                        </select>
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
