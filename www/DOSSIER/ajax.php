<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>AJAX</h1>

    <div class="content">
        <h2>VALUE 1</h2>
        <button data-value="111" class="ajaxButton">Bouton 1 utilisant AJAX</button>
    </div>

    <div class="content">
        <h2>VALUE 2</h2>
        <button data-value="222" class="ajaxButton">Bouton 2 utilisant AJAX</button>
    </div>

    <div class="content">
        <h2 value="Value 3">VALUE 3</h2>
        <button data-value="333" class="ajaxButton">Bouton 3 utilisant AJAX</button>
    </div>


    <script src="../assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ajaxButton').each(function(index) {
                $(this).click(function() {
                    //var element = $(this).parent();
                    //var value = element.find("h2").val();
                    var value = $(this).attr("data-value");

                    console.log("TEST : "+value);

                    let request =
                        $.ajax({
                            type: "GET", //Méthode à employer POST ou GET 
                            url: "action.php?value="+value, //Cible du script coté serveur à appeler 
                            method : "GET",
                            /*beforeSend: function() {
                                //Code à appeler avant l'appel ajax en lui même
                            }*/
                        });
                    request.done(function(output) {
                        //Code à jouer en cas d'éxécution sans erreur du script du PHP
                        console.log("Youpi ca fonctionne !");
                        console.log("Valeur recup en JQuery : "+output);
                    });
                    request.fail(function(error) {
                        //Code à jouer en cas d'éxécution en erreur du script du PHP ou de ressource introuvable
                        console.log("Snif ;(");
                    });
                    request.always(function() {
                        //Code à jouer après done OU fail quoi qu'il arrive
                        console.log("Request !");
                    });
                });
            });
        });
    </script>
</body>

</html>