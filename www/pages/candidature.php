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
                    <?php include"./candidature/wishlist.php" ?>
                </div>
            </div>
            <div class="tab-pane fade" id="Candi" role="tabpanel" aria-labelledby="Candi-tab">
                <div class="form-floating">
                    <?php include"./candidature/candi.php" ?>
                </div>
            </div>
        </div>
        

        

    </main>
    <?php include "../components/footer.php" ?>
    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/script/script.js"></script>
</body>

</html>