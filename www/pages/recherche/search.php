<?php
if (isset($_GET["objet"])) {
    //echo $_GET["objet"];
    switch ($_GET["objet"]) {
        case "etudiant":                                                //FILTRER PAR ROLE
            #secondName, #firstName, #schoolYearSelect

            $controleur->selectUsersSearch($data, $nbRow, $nbCol, "Etudiant", $_GET['secondName'], $_GET['firstName'], $_GET['schoolYearSelect']);

            for ($j = 0; $j < $nbRow; $j++) {
                echo '<div class="card">';
                echo '<div class="card-header">';
                echo $data[$j]["schoolYear"] . " - " . $data[$j]["role"];

                if ($_SESSION['role'] == "Administrateur") {
?>
                    <button data-objet="user" data-id=<?php echo $data[$j]["idUser"] ?> type="button" class="btn btn-outline-danger justify-content-left deleteButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                        </svg> Supprimer
                    </button>
                <?php
                }

                echo "</div>";
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $data[$j]["userSecondName"] . $data[$j]["userFirstName"] . '</h5>';
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }

            break;

        case "delegue":
            #secondName, #firstName, #schoolYearSelect

            $controleur->selectUsersSearch($data, $nbRow, $nbCol, "Délégué", $_GET['secondName'], $_GET['firstName'], $_GET['schoolYearSelect']);

            for ($j = 0; $j < $nbRow; $j++) {
                echo '<div class="card">';
                echo '<div class="card-header">';
                echo $data[$j]["schoolYear"] . " - " . $data[$j]["role"];
                echo "</div>";
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $data[$j]["userSecondName"] . $data[$j]["userFirstName"] . '</h5>';
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }

            break;

        case "pilote":
            #secondName, #firstName, #schoolYearSelect

            $controleur->selectUsersSearch($data, $nbRow, $nbCol, "Pilote", $_GET['secondName'], $_GET['firstName'], $_GET['schoolYearSelect']);

            for ($j = 0; $j < $nbRow; $j++) {
                echo '<div class="card">';
                echo '<div class="card-header">';
                echo $data[$j]["schoolYear"] . " - " . $data[$j]["role"];
                echo "</div>";
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $data[$j]["userSecondName"] . $data[$j]["userFirstName"] . '</h5>';
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }

            break;

        case "entreprise":
            #searchInfo, #localitySelect, #sectorSelect

            $controleur->selectCompanySearch($data, $nbRow, $nbCol, $_GET['searchInfo'], $_GET['localitySelect'], $_GET['sectorSelect']);

            for ($j = 0; $j < $nbRow; $j++) {
                echo '<div class="card">';
                echo '<div class="card-header">';
                echo $data[$j]["sector"];

                if ($_SESSION['role'] == "Administrateur") {
                ?>
                    <button data-objet="company" data-id=<?php echo $data[$j]["idCompany"] ?> type="button" class="btn btn-outline-danger justify-content-left deleteButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                        </svg> Supprimer
                    </button>
                <?php
                }
                echo '</div>';

                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $data[$j]["company"] . " - " . $data[$j]["city"] . '</h5>';

                echo '<p class="card-text">' . $data[$j]["descCompany"] . '</p>';
                echo "</div>";
                echo '<div class="card-footer">' . $data[$j]["eMail"];
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }
            break;

        case "offreStage":
            #$searchInfo, $localitySelect, $sectorSelect, $skillSelect, $wageRange

            $controleur->selectInternshipSearch($data, $nbRow, $nbCol, $_GET['searchInfo'], $_GET['localitySelect'], $_GET['skillSelect'], $_GET['wageRange']);

            for ($j = 0; $j < $nbRow; $j++) {
                echo '<div class="card">';
                echo '<div class="card-header">';
                echo "<strong>" . $data[$j]["company"] . "</strong>" . "Publié le : " . $data[$j]["releaseDate"];
                ?>
                <button data-objet="internship" data-id=<?php echo $data[$j]["idInternship"] ?> type="button" class="btn btn-primary saveButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"></path>
                        <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"></path>
                    </svg>
                    Ajouter à ma wishlist
                </button>
<?php
                echo '</div>';

                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $data[$j]["intership"] . " : " . $data[$j]["startDate"] . " - " . $data[$j]["endDate"] . '</h5>';
                echo '<p class="card-text">' . $data[$j]["descInternship"] . '</p>';
                echo "</div>";
                echo '<div class="card-footer">';
                echo '<p>Gratification : ' . $data[$j]["WageMonth"] . ' €</p>';
                echo '<p>Contact : ' . $data[$j]["eMail"] . '</p>';
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }
            break;
    }
}
?>