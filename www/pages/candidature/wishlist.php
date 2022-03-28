<div style="flex-direction: row; display: flex;flex-wrap: wrap;">
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 30%;">
        <!--Side Nav Bar Miniatures Stage-->
        <a href="#" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
            <svg class="bi me-2" width="30" height="24">
                <use xlink:href="#"></use>
            </svg>

            <span class="fs-5 fw-semibold">Offre de Stage</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea" style="max-height: 500px; margin-bottom: 10px; overflow:scroll; -webkit-overflow-scrolling: touch;">




            <!--

            <a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">NOM</strong>
                    <small>IKEA</small>
                </div>
                <div class="col-10 mb-1 small">debut 2022-04-04 fin 2022-07-04  publiée le 2022-02-02</div>
            </a>

            <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">Titre</strong>
                    <small class="text-muted">Element 2</small>
                </div>
                <div class="col-10 mb-1 small">Texte Descriptif</div>
            </a>
-->
            <?php

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);


            require "../bdd/controleur.php";



            $controleur = new Controleur();
            $string = '';
            $desc = '';
            $name = '';
            $controleur->select_wish_list_from_user($string, $desc, $name);

            echo $string;

            ?>


        </div>
    </div>

    <!--Infos Stage Précis-->
    <div style="width: 70%;background:white;">
        <!--Header Stage-->
        <div style="display:flex;justify-content: flex-start; margin-left: 1em;margin-top: 1em;">
            <img src="../assets/img/stage.png" alt="Stage.png" width="100px">
            <h1 display="inline" style="margin-left: 1em;"><?= $name; ?></h1>
        </div>
        <div style="display:flex;justify-content: space-evenly;margin-top: 1em;">
            <!--Boutons-->
            <div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Postuler
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-xxl-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">CV et Lettre de motivation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>



                            <form action="candidature.php" method="post">

                                <div class="modal-body">

                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" name="cv" style="height: 300px"></textarea>
                                        <label for="floatingTextarea">CV</label>
                                    </div>

                                    <br>

                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" name="lettre_de_motivation" style="height: 300px"></textarea>
                                        <label for="floatingTextarea">Lettre de Motivation</label>
                                    </div>

                                </div>

                                <!--
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                                    <button type="submit" class="btn btn-primary">Postuler</button>
                                </div>

                            </form>




                        </div>
                    </div>
                </div>
                
                <button href=" "type="button" class="btn btn-primary">Retirer</button>
            </div>

            <li style="display: inline;"></li>
        </div>

        <div style="margin: 1em;">
            
            <p>


                        -->
                                <?php
                                echo $desc;










                                if (isset($_POST["lettre_de_motivation"], $_POST["cv"], $_POST["nb_page"])) {
                                    $controleur->postuler($_POST["cv"], $_POST["lettre_de_motivation"], $_POST["nb_page"]);
                                }



                                if (isset($_GET["delete"], $_GET["page"])) {
                                    $controleur->delete_save($_GET["page"]);
                                }

                                ?>

                                </p>

                        </div>


                    </div>



                </div>