<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-1">
                <h1>HOME</h1>
                <br><br><br><br><br><br>

                <br><br><br><br><br><br>

                <form action="home.php" class="form-inline">


                    <select name="object" id="object">
                        <option disabled selected value>Object ?</option>
                        <option value="entreprises">Entreprises</option>
                        <option value="stages">Stages</option>
                        <option value="pilotes">Pilotes</option>
                        <option value="delegues">Délégués</option>
                        <option value="etudiants">Etudiants</option>
                    </select>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Quoi ?</span>
                        </div>
                        <input name="what" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Où ?</span>
                        </div>
                        <input name="where" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>





                    <button type="submit" class="btn btn-primary">Rechercher</button>

                </form>



            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>