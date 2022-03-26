$(document).ready(function () {
  $('.deleteButton').each(function (index) {
    $(this).click(function () {
      var id = $(this).attr("data-id");
      var objet = $(this).attr("data-objet");

      sendAJAXRequest("delete", id, objet);
    });
  });

  $('.saveButton').each(function (index) {
    $(this).click(function () {
    });
  });
});

function sendAJAXRequest(type, id, objet) {
  console.log("ID : " + id);

  let request =
    $.ajax({
      type: "GET", //Méthode à employer POST ou GET 
      url: "./recherche/manageContent.php?type=" + type + "&id=" + id + "&objet=" + objet, //Cible du script coté serveur à appeler 
      method: "GET",
      /*beforeSend: function() {
          //Code à appeler avant l'appel ajax en lui même
      }*/
    });
  request.done(function (output) {
    //Code à jouer en cas d'éxécution sans erreur du script du PHP
    console.log("Youpi ca fonctionne !");
    console.log("Valeur recup en JQuery : " + output);
  });
  request.fail(function (error) {
    //Code à jouer en cas d'éxécution en erreur du script du PHP ou de ressource introuvable
    console.log("Snif ;(");
  });
  request.always(function () {
    //Code à jouer après done OU fail quoi qu'il arrive
    window.location.reload();
    console.log("Request !");
  });
}