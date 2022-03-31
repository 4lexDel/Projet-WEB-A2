<?php
$path = "../bdd/controleur.php";
require_once($path);
$data;
$nbRow;
$nbCol;
$datacompany;
$dataelse;
$datanother;
$controleur = new Controleur();
$id;
if (isset($_POST['idUser'])) {
    $id = $_POST['idUser'];
} else {
    $id = $_SESSION['idUser'];
}
$controleur->selectUsersCompany($data, $nbRow, $nbCol, $id);
if(isset($data)){
    foreach ($data as $company) {
        $controleur->selectInternshipIDCompany($datacompany, $company['idCompany']);
        if(isset($datacompany)){
            foreach ($datacompany as $line) {
                echo '<br>
                <div style="text-align: -webkit-center;">
                <form id="UpdateOffer'.$line['idInternship'].'" method="post"></form>
                <form id="DeleteOffer'.$line['idInternship'].'" method="post"><input type="text" name="idInternship" hidden value="'.$line['idInternship'].'" required></form>
                    <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
                        <div style="margin: 1em;">
                        <input form="UpdateOffer'.$line['idInternship'].'" type="text" name="idInternship" hidden value="'.$line['idInternship'].'" required>
                            <div class="mb-3">
                                <label for="company" class="form-label">Entreprise</label>
                                <select form="UpdateOffer'.$line['idInternship'].'" name="idCompany" class="form-control" required>';
                                    foreach ($data as $row) {
                                        echo '<option value="' . $row["idCompany"].'"';
                                        if($row["idCompany"]==$line["idCompany"]){ echo ' selected ';}
                                        echo '>' . $row["company"] . '</option>';
                                    }
                                echo '</select>
                            </div>
                            <div class="mb-3">
                                <label for="intership" class="form-label">Nom du Stage</label>
                                <input form="UpdateOffer'.$line['idInternship'].'" name="intership" type="text" class="form-control" required value="'.$line['intership'].'">
                            </div>
                            <div class="mb-3">
                                <label for="startDate" class="form-label">Date début</label>
                                <input form="UpdateOffer'.$line['idInternship'].'" name="startDate" type="date" class="form-control" required value="'.$line['startDate'].'">
                            </div>
                            <div class="mb-3">
                                <label for="endDate" class="form-label">Date Fin</label>
                                <input form="UpdateOffer'.$line['idInternship'].'" name="endDate" type="date" class="form-control" required value="'.$line['endDate'].'">
                            </div>
                            <div class="mb-3">
                                <label for="WageMonth" class="form-label">Salaire Mensuel</label>
                                <input form="UpdateOffer'.$line['idInternship'].'" name="WageMonth" type="number" class="form-control" required value="'.$line['WageMonth'].'">
                            </div>
                            <div class="mb-3">
                                <label for="nbPlace" class="form-label">Nombre de place</label>
                                <input form="UpdateOffer'.$line['idInternship'].'" name="nbPlace" type="number" class="form-control" required value="'.$line['nbPlace'].'">
                            </div>
                            <div class="mb-3">
                                <label for="city">Ville</label>
                                <select form="UpdateOffer'.$line['idInternship'].'" name="locality" class="form-select col-md-2" required>';
                                    $controleur->selectLocality($dataelse, $nbRow, $nbCol);
                                    foreach ($dataelse as $row) {
                                        echo '<option value="' . $row["idLocality"].'"';
                                        if($row["idLocality"]==$line["idLocality"]){ echo ' selected ';}
                                        echo '>' . $row["city"] . '</option>';
                                    }
                                echo '</select>
                            </div>
                            <div class="mb-3">
                                <label for="skill" class="form-label">Compétences</label>
                                <select form="UpdateOffer'.$line['idInternship'].'" name="skill[]" class="form-select" required multiple>';
                                    $controleur->selectSkills($dataelse, $nbRow, $nbCol);
                                    $controleur->selectSkillIdInt($datanother, $line['idInternship']);
                                    foreach ($dataelse as $row) {
                                        echo '<option value="' . $row["idSkill"].'"';
                                        
                                        foreach ($datanother as $skill) {
                                            if($row["idSkill"]==$skill["idSkill"]){ echo ' selected ';}
                                        }
                                        echo '>' . $row["skill"] . '</option>';
                                    
                                    }
                                echo '</select>
                            </div>
                            <div class="mb-3">
                                <label for="descInternship" class="form-label">Description Stage</label>
                                <textarea form="UpdateOffer'.$line['idInternship'].'" name="descInternship" class="form-control" required style="resize: none;" oninput=\'this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"\' maxlength="400">'.$line['descInternship'].'</textarea>
                            </div>
                            <button form="UpdateOffer'.$line['idInternship'].'" name="OfferUpd" value="1" type="submit" class="btn btn-primary">Accepter Changements</button>
                            <button form="DeleteOffer'.$line['idInternship'].'" name="OfferDel" value="1" type="submit" class="btn btn-danger">Supprimer Offre</button>
                        </div>
                    </div>
                </div>';
            }
        }
    }
}
?>