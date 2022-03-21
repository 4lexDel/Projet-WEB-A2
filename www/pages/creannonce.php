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
        <div style="background: white;display: flex; width: 50%;justify-content: center;flex-direction: column;">
            <form style="margin: 1em;">
                <div class="mb-3">
                    <label for="Entreprise" class="form-label">Nom de l'entreprise</label>
                    <input type="email" class="form-control" id="Entreprise" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="NbStagiaire" class="form-label">Nombre de stagiaires</label>
                    <input type="password" class="form-control" id="NbStagiaire">
                </div>
                <div class="mb-3">
                    <label for="EmailEntreprise" class="form-label">Email Entreprise</label>
                    <input type="password" class="form-control" id="EmailEntreprise">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
    <?php include "../components/footer.php" ?>
    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/script/script.js"></script>
</body>

</html>