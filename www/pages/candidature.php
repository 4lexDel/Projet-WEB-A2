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
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);



        if (isset($_GET["wish"])) {

            if ($_GET["wish"] == 1) {

                $wish_nav = 'active';
                $candi_nav = '';
                $wish_tab = 'show active';
                $candi_tab = '';
            }
            if ($_GET["wish"] == 0) {

                $wish_nav = '';
                $candi_nav = 'active';
                $wish_tab = '';
                $candi_tab = 'show active';
            }
        } else {

            $wish_nav = '';
            $candi_nav = 'active';
            $wish_tab = '';
            $candi_tab = 'show active';
        }



        echo '

        <ul class="nav nav-tabs" id="myTab" role="tablist" style="justify-content: space-evenly;">
            <li class="nav-item" role="presentation" style="Width: 50%;text-align: center;">
                <button class="nav-link ' . $wish_nav . '" id="Wishlist-tab" data-bs-toggle="tab" data-bs-target="#Wishlist" type="button" role="tab" aria-controls="Wishlist" aria-selected="true" style="width: 100%">Wishlist</button>
            </li>
            <li class="nav-item" role="presentation" style="Width: 50%;text-align: center;">
                <button class="nav-link ' . $candi_nav . '" id="Candi-tab" data-bs-toggle="tab" data-bs-target="#Candi" type="button" role="tab" aria-controls="Candi" aria-selected="false" style="width: 100%">Mes Candidatures</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent" >

            <div class="tab-pane fade ' . $wish_tab . '" id="Wishlist" role="tabpanel" aria-labelledby="Wishlist-tab">

                <div class="form-floating">
                ';
        include "./candidature/wishlist.php";
        echo '
                </div>

            </div>

            <div class="tab-pane fade ' . $candi_tab . '" id="Candi" role="tabpanel" aria-labelledby="Candi-tab">

                <div class="form-floating">
                ';
        include "./candidature/candi.php";
        echo '
                </div>

            </div>

        </div>';
        ?>



    </main>
    <?php include "../components/footer.php" ?>
    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/script/script.js"></script>
</body>

</html>