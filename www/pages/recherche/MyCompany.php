<?php
$path = "../bdd/controleur.php";
require_once($path);
    $data;
    $nbRow;
    $nbCol;
    $controleur = new Controleur();
    $controleur->selectUsersCompany($data, $nbRow, $nbCol);
    for ($j = 0; $j < $nbRow; $j++) {
        echo '<br>
        <div style="text-align: -webkit-center;">
            <h3>'.$data[$j]["company"].'</h3>
            <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
                <form style="margin: 1em;">
                    <div>
                        <input type="text" name="idCompany" id="idCompany" hidden value="'.$data[$j]["idCompany"].'">
                    </div>
                    <div>
                        <label for="company" class="form-label">Nom de l\'entreprise</label>
                        <input type="text" class="form-control" id="company" value="'.$data[$j]["company"].'">
                    </div>
                    <div>
                        <label for="eMail" class="form-label">EMail</label>
                        <input type="email" class="form-control" id="eMail" value="'.$data[$j]["eMail"].'">
                    </div>
                    <div>
                        <label for="descCompany" class="form-label">Description Entreprise</label>
                        <textarea name="descCompany" class="form-control" id="descCompany" style="resize: none;" oninput=\'this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"\' maxlength="400">'.$data[$j]["descCompany"].'</textarea>
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
        </div>';
    }
?>
