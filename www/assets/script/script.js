/*
window.onload = () => {

    document.querySelector('#inputPostal').addEventListener('input', function () {
        let valueCodePostal = this.value;

        if (valueCodePostal.length >= 5) {

            let url = 'https://geo.api.gouv.fr/communes?codePostal=' + valueCodePostal + '&fields=nom,population&format=json&geometry=centre';
            //alert(url);

            fetch(url).then(
                response => response.json().then(
                    data => {
                        console.log(data);
                        let affichage = '<ul>';

                        if (data.length > 0) {
                            for (let ville of data) {
                                affichage += '<li><strong>' + ville.nom + ' : </strong>'+ville.population+' habitants</li>';
                            }
                        }
                        else affichage += 'Aucune(s) ville(s) trouvée(s)';

                        affichage += '</ul>';

                        console.log('-----------');
                        console.log(affichage);

                        document.querySelector('#villes').innerHTML = affichage;
                    }
                )
            ).catch((err) => console.log('Erreur : '+ err));
        }
        else document.querySelector('#villes').innerHTML = '<ul><li>Aucune(s) ville(s) trouvée(s)</li><ul>';
    })
}
$(function(){
$("#Header").load("Header.html"); 
$("#Footer").load("Footer.html");
});*/
