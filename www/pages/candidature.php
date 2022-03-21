<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/jqueryUI/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
    <?php require "../components/connect.php" ?>
    <?php include "../components/header.php" ?>
    <main>


        <?php
        $data;
        $nbRow;
        $nbCol;

        require "../bdd/controleur.php";
        

        // retourne le save des offres des satges en prenant en compte le user 

        $controleur = new Controleur();
        $controleur->select_wish_list_from_user($data, $nbRow, $nbCol, $_SESSION['idUser']);


        //print_r ($data);
        for ($row=0; $row < $nbRow; $row++) {
            for ($col=0; $col < $nbCol; $col++) { 

                echo $data[$row][$col];
                
            }
        }







        ?>



        <ul class="nav nav-tabs" id="myTab" role="tablist" style="justify-content: space-evenly;">
            <li class="nav-item" role="presentation" style="Width: 50%;text-align: center;">
                <button class="nav-link active" id="Wishlist-tab" data-bs-toggle="tab" data-bs-target="#Wishlist" type="button" role="tab" aria-controls="Wishlist" aria-selected="true" style="width: 100%">Wishlist</button>
            </li>
            <li class="nav-item" role="presentation" style="Width: 50%;text-align: center;">
                <button class="nav-link" id="Candi-tab" data-bs-toggle="tab" data-bs-target="#Candi" type="button" role="tab" aria-controls="Candi" aria-selected="false" style="width: 100%">Mes Candidatures</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Wishlist" role="tabpanel" aria-labelledby="Wishlist-tab">
                <div class="form-floating">
                </div>
            </div>
            <div class="tab-pane fade" id="Candi" role="tabpanel" aria-labelledby="Candi-tab">
                <div class="form-floating">
                </div>
            </div>
        </div>
        <div style="flex-direction: row; display: flex;flex-wrap: wrap;">
            <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 30%;">
                <!--Side Nav Bar Miniatures Stage-->
                <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                    <svg class="bi me-2" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-5 fw-semibold">List group</span>
                </a>
                <div class="list-group list-group-flush border-bottom scrollarea" style="max-height: 500px; margin-bottom: 10px; overflow:scroll; -webkit-overflow-scrolling: touch;">
                    <a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small>Element 1</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 2</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 3</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>

                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 4</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 5</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 6</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 7</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 8</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 9</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 10</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 11</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <strong class="mb-1">Titre</strong>
                            <small class="text-muted">Element 12</small>
                        </div>
                        <div class="col-10 mb-1 small">Texte Descriptif</div>
                    </a>
                </div>
            </div>
            <!--Infos Stage Précis-->
            <div style="width: 70%;background:white;">
                <!--Header Stage-->
                <div style="display:flex;justify-content: flex-start; margin-left: 1em;margin-top: 1em;">
                    <img src="../assets/img/stage.png" alt="Stage.png" width="100px">
                    <h1 display="inline" style="margin-left: 1em;">Titre</h1>
                </div>
                <div style="display:flex;justify-content: space-evenly;margin-top: 1em;">
                    <!--Boutons-->
                    <div>
                        <button type="button" class="btn btn-primary">Primary</button>
                        <button type="button" class="btn btn-primary">Primary</button>
                    </div>
                    <!--Informations Statut-->
                    <li style="display: inline;">Statut :</li>
                </div>
                <div style="margin: 1em;">
                    <!--Description du stage-->
                    <p>
                        Les loutres (Lutrinae) sont une sous-famille de mammifères carnivores de la famille des mustélidés. Il existe plusieurs espèces de loutres, caractérisées par de courtes pattes, des doigts griffus et palmés (aux pattes avant et arrière) et une longue queue.
                        Cette sous-famille a été décrite pour la première fois en 1838 par le zoologiste Charles-Lucien Bonaparte.
                        Dans de nombreux pays, les loutres ont disparu de tout ou partie de leur aire naturelle de répartition, de même que les castors qui partageaient leur milieu de vie. Ces deux espèces-clé font l'objet depuis un siècle environ de protection et de programmes ou projets de réintroduction2 ou confortement de populations par translocation3. La loutre étant particulièrement discrète elle fait souvent l'objet d'un suivi par recherche d'indice (poils, marquage de territoire, pièges photographiques) et d'un suivi télémétrique par puce électronique4,5.
                        Grâce à de puissantes pattes palmées (avant et arrière), la loutre est une excellente nageuse, mais elle se déplace aussi volontiers à terre, le long des berges ou à proximité.
                        La fourrure de la loutre se compose de poils qui s'emboîtent les uns dans les autres[réf. souhaitée].
                        Contrairement à l'ours blanc ou au dauphin, la loutre ne dispose pas d'une épaisse couche de graisse sous la peau. C'est son pelage, composé de poils courts et longs emboîtés qui l'isole du froid. Une étude thermographique a montré que par température excessive, la loutre d'Europe dissipe sa chaleur plutôt par les pattes, alors que la loutre géante le fait par tout le corps et notamment la queue6.
                        Elle peut vivre jusqu'à 20 ans en captivité. Mais en milieu naturel son espérance de vie varie entre 5 et 10 ans. La loutre est un animal souvent solitaire. Les loutrons restent avec leur mère huit mois en moyenne et parfois jusqu'à dix-huit mois7.
                        Habitat et comportement
                        La loutre peut rester en apnée jusqu’à huit minutes sous l’eau.

                </div>
            </div>
        </div>

        </p>

    </main>
    <?php include "../components/footer.php" ?>
    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/script/script.js"></script>
</body>

</html>