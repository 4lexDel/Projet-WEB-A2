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
                    <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
                        <form style="margin: 1em;" method="post">
                            <div class="mb-3">
                                <label for="company" class="form-label">Entreprise</label>
                                <select name="company" class="form-control" required id="company">';
                                    foreach ($data as $row) {
                                        echo '<option value="' . $row["idCompany"].'"';
                                        if($row["idCompany"]==$line["idCompany"]){ echo ' selected ';}
                                        echo '>' . $row["company"] . '</option>';
                                    }
                                echo '</select>
                            </div>
                            <div class="mb-3">
                                <label for="intership" class="form-label">Nom du Stage</label>
                                <input name="intership" type="text" class="form-control" required id="intership" value="'.$line['intership'].'">
                            </div>
                            <div class="mb-3">
                                <label for="startDate" class="form-label">Date début</label>
                                <input name="startDate" type="date" class="form-control" required id="startDate" value="'.$line['startDate'].'">
                            </div>
                            <div class="mb-3">
                                <label for="endDate" class="form-label">Date Fin</label>
                                <input name="endDate" type="date" class="form-control" required id="endDate" value="'.$line['endDate'].'">
                            </div>
                            <div class="mb-3">
                                <label for="WageMonth" class="form-label">Salaire Mensuel</label>
                                <input name="WageMonth" type="number" class="form-control" required id="WageMonth" value="'.$line['WageMonth'].'">
                            </div>
                            <div class="mb-3">
                                <label for="nbPlace" class="form-label">Nombre de place</label>
                                <input name="nbPlace" type="number" class="form-control" required id="nbPlace" value="'.$line['nbPlace'].'">
                            </div>
                            <div class="mb-3">
                                <label for="city">Ville</label>
                                <select name="locality" id="locality" class="form-select col-md-2" required>';
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
                                <select name="skill[]" class="form-select" required id="skill" multiple>';
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
                                <textarea name="descInternship" class="form-control" required id="descInternship" style="resize: none;" oninput=\'this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"\' maxlength="400" value="'.$line['descInternship'].'"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>';
            }
        }
    }
}
?>