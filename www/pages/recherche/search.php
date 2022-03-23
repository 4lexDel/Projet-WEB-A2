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

                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $data[$j]["userSecondName"] . $data[$j]["userFirstName"] . '</h5>';
                                echo "</div>";
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

                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $data[$j]["userSecondName"] . $data[$j]["userFirstName"] . '</h5>';
                                echo "</div>";
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

                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $data[$j]["userSecondName"] . $data[$j]["userFirstName"] . '</h5>';
                                echo "</div>";
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

                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $data[$j]["company"] . " - " . $data[$j]["city"] . '</h5>';
                                echo '<p class="card-text">' . $data[$j]["descCompany"] . '</p>';
                                echo '<div class="card-footer">' . $data[$j]["eMail"];
                                echo '</div>';
                                echo "</div>";
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
                                echo "<strong>" . $data[$j]["company"] . "</strong>" . " - Publié le : " . $data[$j]["releaseDate"];

                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $data[$j]["intership"] . " : " . $data[$j]["startDate"] . " - " . $data[$j]["endDate"] . '</h5>';
                                echo '<p class="card-text">' . $data[$j]["descInternship"] . '</p>';
                                echo '<div class="card-footer">';
                                echo '<p>Gratification : ' . $data[$j]["WageMonth"] . ' €</p>';
                                echo '<p>Contact : ' . $data[$j]["eMail"] . '</p>';
                                echo '</div>';
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo '<br>';
                            }
                            break;
                    }
                }
                ?>