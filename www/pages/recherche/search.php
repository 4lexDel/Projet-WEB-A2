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
                echo 'ID : ' . $data[$j]["idUser"] . " | " . $data[$j]["schoolYear"] . " - " . $data[$j]["role"];

                if ($_SESSION['role'] == "Administrateur" || $_SESSION['role'] == "Pilote" || $_SESSION['rank'] > 1) {
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
                echo '<h5 class="card-title">' . $data[$j]["userSecondName"] . " " . $data[$j]["userFirstName"] . '</h5>';
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
                echo 'ID : ' . $data[$j]["idUser"] . " | " . $data[$j]["schoolYear"] . " - " . $data[$j]["role"];
                echo "<div>";

                if ($_SESSION['role'] == "Administrateur" || $_SESSION['role'] == "Pilote") {
                ?>
                    <button data-objet="user" data-id=<?php echo $data[$j]["idUser"] ?> type="button" class="btn btn-outline-dark justify-content-left startModerateButton" data-bs-toggle="modal" data-bs-target="#selectRankModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg> Modération
                    </button>
                <?php
                }

                if ($_SESSION['role'] == "Administrateur" || $_SESSION['role'] == "Pilote" || $_SESSION['rank'] > 1) {
                ?>
                    <button data-objet="user" data-id=<?php echo $data[$j]["idUser"] ?> type="button" class="btn btn-outline-danger justify-content-left deleteButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                        </svg> Supprimer
                    </button>
            <?php
                }

                echo "</div>";
                echo "</div>";
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $data[$j]["userSecondName"] . " " . $data[$j]["userFirstName"] . '</h5>';
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }

            ?>
            <div class="modal fade" id="selectRankModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Délégation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <select name="rank" id="selectRank" class="form-select col-md-2">
                                <option value="1">Minimum</option>
                                <option value="2">Intermédiaire</option>
                                <option value="3">Maximum</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button data-objet="user" data-id="" id="moderateButton" type="button" class="btn btn-primary" data-bs-dismiss="modal">Appliquer</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            break;

        case "pilote":
            #secondName, #firstName, #schoolYearSelect

            $controleur->selectUsersSearch($data, $nbRow, $nbCol, "Pilote", $_GET['secondName'], $_GET['firstName'], $_GET['schoolYearSelect']);

            for ($j = 0; $j < $nbRow; $j++) {
                echo '<div class="card">';
                echo '<div class="card-header">';
                echo 'ID : ' . $data[$j]["idUser"] . " | " . $data[$j]["schoolYear"] . " - " . $data[$j]["role"];

                if ($_SESSION['role'] == "Administrateur" || $_SESSION['rank'] > 2) {
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
                echo '<h5 class="card-title">' . $data[$j]["userSecondName"] . " " . $data[$j]["userFirstName"] . '</h5>';
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }

            break;

        case "entreprise":
            #searchInfo, #localitySelect, #sectorSelect

            $controleur->selectCompanySearch($data, $nbRow, $nbCol, $_GET['searchInfo'], $_GET['localitySelect'], $_GET['sectorSelect']);

            $pathIMG = "../assets/img/fullStar.png";

            foreach ($data as $t_data) {

                echo '<div class="card">';
                echo '<div class="card-header">';
                echo 'ID : ' . $t_data["idCompany"] . " | " . $t_data["sector"];

                echo '<div>';
                ?>

                <button data-id=<?php echo $t_data["idCompany"] ?> type="button" class="btn btn-success justify-content-left mx-2 startNoteModal" data-bs-toggle="modal" data-bs-target="#evaluateModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg> Evaluer
                </button>

                <?php


                if ($_SESSION['role'] == "Administrateur" || $_SESSION['role'] == "Pilote" || $_SESSION['rank'] > 1) {
                ?>
                    <button data-objet="company" data-id=<?php echo $t_data["idCompany"] ?> type="button" class="btn btn-outline-danger justify-content-left deleteButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                        </svg> Supprimer
                    </button>
            <?php
                }
                echo '</div>';
                echo '</div>';

                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $t_data["company"] . " - " . $t_data["city"] . '</h5>';

                echo '<p class="card-text">' . $t_data["descCompany"] . '</p>';
                echo "</div>";
                echo '<div class="card-footer">';
                echo '<p>' . $t_data["email"] . '</p>';
                if ($t_data["gradeAVG"] == -1) echo "<p>Aucune(s) note(s) attribuée(s)</p>";
                else {
                    echo "<p>AVG note : " . (int)$t_data["gradeAVG"] . "/5 - Nb note(s) : " . $t_data["gradeNB"] . "</p>";
                }
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }

            ?>
            <div class="modal fade" id="evaluateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Evaluation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="rateBar">
                                <input type="hidden" name="note" value="5" class="px-2 note" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_1" class="star" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_2" class="star" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_3" class="star" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_4" class="star" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_5" class="star" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button data-objet="company" data-id="" id="evaluateButton" type="button" class="btn btn-primary" data-bs-dismiss="modal">Evaluate</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            /* for ($j = 0; $j < $nbRow; $j++) {
                echo '<div class="card">';
                echo '<div class="card-header">';
                echo $data[$j]["sector"];

                echo '<div class="rateBar">';

                $pathIMG = "../assets/img/fullStar.png";
                ?>

                <button type="button" class="btn btn-success justify-content-left mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                    </svg> Evaluer
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Evaluation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <input type="hidden" name="note" value="5" class="px-2 note" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_1" class="star" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_2" class="star" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_3" class="star" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_4" class="star" />
                                <img src="<?php echo $pathIMG ?>" data-note="star_5" class="star" />
                            </div>
                            <div class="modal-footer">
                                <button data-objet="company" data-id=<?php echo $data[$j]["idCompany"] ?> type="button" class="btn btn-primary evaluateButton" datda-bs-dismiss="modal">Evaluate</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php


                if ($_SESSION['role'] == "Administrateur" || $_SESSION['role'] == "Pilote") {
                ?>
                    <button data-objet="company" data-id=<?php echo $data[$j]["idCompany"] ?> type="button" class="btn btn-outline-danger justify-content-left deleteButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                        </svg> Supprimer
                    </button>
                <?php
                }
                echo '</div>';
                echo '</div>';

                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $data[$j]["company"] . " - " . $data[$j]["city"] . '</h5>';

                echo '<p class="card-text">' . $data[$j]["descCompany"] . '</p>';
                echo "</div>";
                echo '<div class="card-footer">' . $data[$j]["eMail"];
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }*/
            break;

        case "offreStage":
            #$searchInfo, $localitySelect, $sectorSelect, $skillSelect, $wageRange

            $controleur->selectInternshipSearch($data, $nbRow, $nbCol, $_GET['searchInfo'], $_GET['localitySelect'], $_GET['skillSelect'], $_GET['wageRange']);

            for ($j = 0; $j < $nbRow; $j++) {
                echo '<div class="card">';
                echo '<div class="card-header">';
                echo 'ID : ' . $data[$j]["idInternship"] . " | " . "<strong>" . $data[$j]["company"] . "</strong>" . "Publié le : " . $data[$j]["releaseDate"];

                echo '<div>';
            ?>
                <button data-objet="internship" data-id=<?php echo $data[$j]["idInternship"] ?> type="button" class="btn btn-primary saveButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"></path>
                        <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"></path>
                    </svg>
                    Sauvegarder
                </button>
                <?php
                if ($_SESSION['role'] == "Administrateur" || $_SESSION['role'] == "Pilote" || $_SESSION['rank'] > 1) {
                ?>
                    <button data-objet="internship" data-id=<?php echo $data[$j]["idInternship"] ?> type="button" class="btn btn-outline-danger justify-content-left deleteButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                        </svg> Supprimer
                    </button>
<?php
                }
                echo '</div>';
                echo '</div>';

                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $data[$j]["intership"] . " : " . $data[$j]["startDate"] . " - " . $data[$j]["endDate"] . '</h5>';
                echo '<p class="card-text">' . $data[$j]["descInternship"] . '</p>';
                echo "</div>";
                echo '<div class="card-footer">';
                echo '<p>Gratification : ' . $data[$j]["WageMonth"] . ' €</p>';
                echo '<p>Nb de place : ' . $data[$j]["nbPlace"] . '</p>';
                echo '<p>Contact : ' . $data[$j]["eMail"] . '</p>';
                echo "</div>";
                echo "</div>";
                echo '<br>';
            }
            break;
    }
}
?>