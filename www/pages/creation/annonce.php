<?php
require_once($_SERVER["DOCUMENT_ROOT"]. "/bdd/controleur.php");
if (!isset($_SESSION["AUTH"])) {
    if (isset(
        $_POST["company"],
        $_POST["internship"],
        $_POST["StartDate"],
        $_POST["EndDate"],
        $_POST["WageMonth"],
        $_POST["nbPlace"],
        $_POST["descInternship"],
        $_POST["skill"])
    ) {
        echo $_POST["company"].'<br>';
        echo $_POST["internship"].'<br>';
        echo $_POST["StartDate"].'<br>';
        echo $_POST["EndDate"].'<br>';
        echo $_POST["WageMonth"].'<br>';
        echo $_POST["nbPlace"].'<br>';
        echo $_POST["descInternship"].'<br>';
        foreach ($_POST["skill"] as $skill) {               //Maybe ?
            echo $skill.'<br>';
        }
        echo $_SESSION["idUser"];

        $controleur = new Controleur();
        $controleur->insertNewInternship(
            $_POST["company"],
            $_POST["internship"],
            $_POST["StartDate"],
            $_POST["EndDate"],
            $_POST["WageMonth"],
            $_POST["nbPlace"],
            $_POST["descInternship"],
            $_POST["locality"],
            $_POST["skill"]
        );
    }
}
?>
<div style="text-align: -webkit-center;">
    <div style="display: flex; width: 45%;justify-content: center;flex-direction: column;text-align: center;">
        <form style="margin: 1em;" method="post">
            <div class="mb-3">
                <label for="company" class="form-label">Entreprise</label>
                <select name="company" class="form-control" required id="company">
                    <?php
                        $data;
                        $nbRow;
                        $nbCol;
                        $controleur = new Controleur();
                        $controleur->selectUsersCompany($data, $nbRow, $nbCol);
                        for ($j = 0; $j < $nbRow; $j++) {
                            echo '<option value="' . $data[$j]["idCompany"] . '">' . $data[$j]["company"] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="internship" class="form-label">Nom du Stage</label>
                <input name="internship" type="text" class="form-control" required id="internship" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="StartDate" class="form-label">Date début</label>
                <input name="StartDate" type="date" class="form-control" required id="StartDate">
            </div>
            <div class="mb-3">
                <label for="EndDate" class="form-label">Date Fin</label>
                <input name="EndDate" type="date" class="form-control" required id="EndDate">
            </div>
            <div class="mb-3">
                <label for="WageMonth" class="form-label">Salaire Mensuel</label>
                <input name="WageMonth" type="number" class="form-control" required id="WageMonth">
            </div>
            <div class="mb-3">
                <label for="nbPlace" class="form-label">Nombre de place</label>
                <input name="nbPlace" type="number" class="form-control" required id="nbPlace">
            </div>
            <div class="mb-3">
                <label for="city">Ville</label>
                <select name="locality" id="locality" class="form-select col-md-2" required>
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
                <label for="skill" class="form-label">Compétences</label>
                <select name="skill[]" class="form-select" required id="skill" multiple>
                    <?php
                        $data;
                        $nbRow;
                        $nbCol;
                        $controleur = new Controleur();
                        $controleur->selectSkills($data, $nbRow, $nbCol);
                        for ($j = 0; $j < $nbRow; $j++) {
                            echo '<option value="' . $data[$j]["idSkill"] . '">' . $data[$j]["skill"] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="descInternship" class="form-label">Description Stage</label>
                <textarea name="descInternship" class="form-control" required id="descInternship" style="resize: none;" oninput='this.style.height = "";this.style.height = this.scrollHeight+ 5 + "px"' maxlength="400"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>