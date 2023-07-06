// Traitement pour bouton Voir Plus - Prochains voyage
$(document).ready(function () {
  $(".prochains .serv-content .card1").slice(0, 2).show();

  $(".btn").on("click", function () {
    $(".prochains .serv-content .card1:hidden").slice(0, 2).slideDown();
    if($(".prochains .serv-content .card1:hidden").length == 0){
      $(".btn").fadeOut();
    }
  });
});
