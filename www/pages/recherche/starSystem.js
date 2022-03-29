  /////////////////////////////
  /* Javascript fonctions.js */
  /////////////////////////////

  $(document).ready(function() {

      ///////////
      // Notation
      ///////////
      var srcIn = '../assets/img/fullStar.png'; //image au survol
      var srcOut = '../assets/img/voidStar.png'; // image non survol�e

      // Obtenir id num�rique des �toiles au format star_numero
      function idNum(id) {
          var id = id.split('_');
          var id = id[1];
          return id;
      }

      // Survol des �toiles
      $('.rateBar').each(function(index) {
          $(this).hover(function() {
              $(this).find('.star').hover(function() {

                  var id = idNum($(this).attr('data-note')); // id num�rique de l'�toile survol�e
                  console.log(id);
                  var nbStars = $('.star').length; // Nombre d'�toiles de la classe .star
                  var i; // Variable d'incr�mentation

                  for (i = 1; i <= nbStars; i++) {
                      if (i < id) $(this).parent().find('.star:eq(' + i + ')').attr({ src: srcIn });
                      else if (i >= id) $(this).parent().find('.star:eq(' + i + ')').attr({ src: srcOut });
                      if (i == id) $(this).parent().find('.note').attr({ value: i }); // affectation de la note au formulaire
                  }
              }, function() {});
          });



      });
  });