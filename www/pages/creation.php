<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job catching</title>
    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendors/jqueryUI/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/style/style.css">

    <link rel="manifest" href="../manifest.json">
    <meta name="theme-color" content="white"/> 
    <link rel="icon" href="../images/jc-icon-512.png">
</head>

<body>
    <?php require_once $_SERVER["DOCUMENT_ROOT"]. "/components/connect.php"; ?>
    <?php include_once $_SERVER["DOCUMENT_ROOT"]. "/components/header.php"; ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="justify-content: space-evenly;">
        <li class="nav-item" role="presentation" style="Width: 50%;text-align: center;">
            <button class="nav-link active" id="Entreprise-tab" data-bs-toggle="tab" data-bs-target="#Entreprise" type="button" role="tab" aria-controls="Entreprise" aria-selected="true" style="width: 100%">Entreprise</button>
        </li>
        <li class="nav-item" role="presentation" style="Width: 50%;text-align: center;">
            <button class="nav-link" id="Annonce-tab" data-bs-toggle="tab" data-bs-target="#Annonce" type="button" role="tab" aria-controls="Annonce" aria-selected="false" style="width: 100%">Mes Annonce</button>
        </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active" id="Entreprise" role="tabpanel" aria-labelledby="Entreprise-tab">
            <div class="form-floating">
                <?php include_once $_SERVER["DOCUMENT_ROOT"]. "/pages/creation/entreprise.php"; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="Annonce" role="tabpanel" aria-labelledby="Annonce-tab">
            <div class="form-floating">
                <?php include_once $_SERVER["DOCUMENT_ROOT"]. "/pages/creation/annonce.php"; ?>
            </div>
        </div>
    </div>
    <?php include_once "../components/footer.php" ?>
    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/script/script.js"></script>
    <script src="../main.js" ></script>
</body>

</html>