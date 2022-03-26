$(document).ready(function() {
    function hideForm() {
        //$('#searchInfo, #secondName, #firstName, #localitySelect, #schoolYearSelect, #sectorSelect, #wageRange').attr("disabled",true);
        $('#searchInfo, #secondName, #firstName, #localitySelect, #schoolYearSelect, #sectorSelect, #wageRange, #skillSelect').parent().hide();
        //$('#searchInfo, #secondName, #firstName, #localitySelect, #schoolYearSelect, #sectorSelect, #wageRange').parent().css("opacity", "0.3");
    }

    function showElement(element) {
        //element.attr("disabled",false);
        element.parent().show();
        //element.parent().css("opacity", "1");

    }

    updateForm(); //On l'appelle une premiere fois

    $("#objetSelect").change(function() {
        updateForm()
    });

    function updateForm() {
        console.log($("#objetSelect").val());

        switch ($("#objetSelect").val()) {
            case "etudiant":
                //nom, prenom, promo
                hideForm();
                showElement($('#secondName, #firstName, #schoolYearSelect'));
                break;

            case "delegue":
                hideForm();
                showElement($('#secondName, #firstName, #schoolYearSelect'));
                break;

            case "pilote":
                hideForm();
                showElement($('#secondName, #firstName, #schoolYearSelect'));
                break;

            case "entreprise":
                hideForm();
                showElement($('#localitySelect, #sectorSelect, #searchInfo'));
                break;

            case "offreStage":
                hideForm();
                showElement($('#localitySelect, #sectorSelect, #searchInfo, #wageRange, #skillSelect'));
                break;
        }
    }
});