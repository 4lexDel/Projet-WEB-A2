<div style="flex-direction: row; display: flex;flex-wrap: wrap;">
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 30%;">
        <!--Side Nav Bar Miniatures Stage-->
        <a href="#" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
            <svg class="bi me-2" width="30" height="24">
                <use xlink:href="#"></use>
            </svg>
            <span class="fs-5 fw-semibold">List group</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea" style="max-height: 500px; margin-bottom: 10px; overflow:scroll; -webkit-overflow-scrolling: touch;">

            <!--
            <a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">Titre</strong>
                    <small>Element 1</small>
                </div>
                <div class="col-10 mb-1 small">Texte Descriptif</div>
            </a>
-->

            <?php

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);


            //require "../bdd/controleur.php";



            $controleur = new Controleur();
            $string = '';
            $desc = '';
            $name = '';
            $controleur->select_candidature_from_user($string, $desc, $name);

            echo $string;

            ?>



        </div>
    </div>
    <!--Infos Stage Précis-->
    <div style="width: 70%;background:white; height:500px;">
        <!--Header Stage-->
        <!--
        <div style="display:flex;justify-content: flex-start; margin-left: 1em;margin-top: 1em;">
            <img src="../assets/img/stage.png" alt="Stage.png" width="100px">
            <h1 display="inline" style="margin-left: 1em;">Titre</h1>
        </div>
        <div style="display:flex;justify-content: space-evenly;margin-top: 1em;">
            
            <form action="candidature.php" method="post">
                <div>
                    <button type="submit" class="btn btn-primary">Retirer</button>
                    <input type="hidden"  name="nb_page" value="2" >
                </div>
            </form>
           
            <li style="display: inline;">Statut :</li>
        </div>
        <div style="margin: 1em;">
            
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
            
                -->



        <?php
        echo $desc;



        if (isset($_GET["delete"], $_GET["page_candi"])) {
            $controleur->delete_candidature_save($_GET["page_candi"]);
        }





        ?>

        </p>


    </div>
</div>
</div>