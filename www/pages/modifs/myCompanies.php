<?php
$path = "../bdd/controleur.php";
require_once($path);
    $data;
    $nbRow;
    $nbCol;
    $reminder1;
    $reminder2;
    $controleur = new Controleur();
    $controleur->selectUsersCompany($data, $nbRow, $nbCol);
    if ($nbRow) {
        echo '<br>
        <div style="text-align: -webkit-center;">
            <h3>Vos Entreprises</h3>
        </div>';
    }
    for ($j = 0; $j < $nbRow; $j++) {
        $controleur->selectSectorComp($reminder1, $data[$j]["idCompany"]);
        $controleur->selectLocalityComp($reminder2, $data[$j]["idCompany"]);
        echo '<br>
        <div style="text-align: -webkit-center;">
            <h3>'.$data[$j]["company"].'</h3>
            <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
                <form id="Update'.$j.'" method="post"></form>
                <form id="Delete'.$j.'" method="post"><input type="text" name="idCompany" name="idCompany" hidden value="'.$data[$j]["idCompany"].'" required></form>
                <div style="margin: 1em;">
                    <div class="mb-3">
                        <input form="Update'.$j.'" type="text" name="idCompany" name="idCompany" hidden value="'.$data[$j]["idCompany"].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Nom de l\'entreprise</label>
                        <input form="Update'.$j.'" type="text" class="form-control" name="company" value="'.$data[$j]["company"].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="eMail" class="form-label">EMail</label>
                        <input form="Update'.$j.'" type="email" class="form-control" name="eMail" value="'.$data[$j]["eMail"].'" required>
                    </div>
                    <div class="mb-3">
                        <label for="descCompany" class="form-label">Description Entreprise</label>
                        <textarea form="Update'.$j.'" name="descCompany" class="form-control" name="descCompany" style="resize: none;" oninput=\'this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"\' maxlength="400" required>'.$data[$j]["descCompany"].'</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Sector" class="form-label">Secteur</label>
                        <select form="Update'.$j.'" name="Sector[]" required class="form-select col-md-2" multiple required>';
                            $controleur->selectSector($data2, $nbRow2, $nbCol2);
                            for ($i = 0; $i < $nbRow2; $i++) {
                                echo '<option value="' . $data2[$i]["idSector"].'" ';
                                foreach ($reminder1 as $value) {
                                    if($data2[$i]["idSector"]==$value["idSector"]){ echo ' selected ';}
                                }
                                echo '>' . $data2[$i]["sector"] . '</option>';
                            }
                        echo '
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="city">Ville</label>
                        <select form="Update'.$j.'" name="locality[]" required class="form-select col-md-2" multiple required>';
                            $controleur->selectLocality($data2, $nbRow2, $nbCol2);
                            for ($i = 0; $i < $nbRow2; $i++) {
                                echo '<option value="' . $data2[$i]["idLocality"].'" ';
                                foreach ($reminder2 as $value) {
                                    if( $data2[$i]["idLocality"]==$value["idLocality"] ){ echo ' selected ';}
                                }
                                echo '>' . $data2[$i]["city"] . '</option>';
                            }
                            echo '
                        </select>
                    </div>
                    <div class="mb-3" style="display: flex;justify-content: space-evenly;">
                            <button form="Update'.$j.'" name="CompanyUpd" value="1" type="submit" class="btn btn-primary">Accepter Changements</button>
                            <button form="Delete'.$j.'" name="CompanyDel" value="1" type="submit" class="btn btn-danger">Supprimer Entreprise</button>
                    </div>
                </div>
            </div>
        </div>';
    }
?>
