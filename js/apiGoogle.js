
function apiGooglePlace(){

    var input  = document.getElementById('v-depart');
    var autocomplete =  new google.maps.places.Autocomplete(input);

    var input2  = document.getElementById('v-arrive');
    var autocomplete2 =  new google.maps.places.Autocomplete(input2);

    //autocomplete for search bouton (rechercher un trajet)
    var inputRech  = document.getElementById('v-dep');
    var autocompleteRech =  new google.maps.places.Autocomplete(inputRech);

    var inputRech2  = document.getElementById('v-arr');
    var autocompleteRech2 =  new google.maps.places.Autocomplete(inputRech2);
}


