// //Bouton Radio pour section bagages
// $("#choix_oui").click(function () {
//   if ($(this).prop("checked") == true) {
//     $(".field.document").css("display", "block");
//     $(".cont_ts .color_bag").css("color", "#000");
//     $(".bagage_w .color_bag").css("color", "#000");
//   }
// });

// $("#choix_no").click(function () {
//   if ($(this).prop("checked") == true) {
//     $(".field.document").css("display", "none");
//     $(".cont_ts .color_bag").css("color", "crimson");
//   }
// });

// // desactiver le lien href, bagage
// $(".field_t .label").click(function (event) {
//   event.preventDefault();
// });

// indiquer le format de bagage
// $(".field_t.format_t").click(function () {
//   $(".cont_ts").hide();
//   $(this).hide();
//   $(".bagage_w").css("display", "block");
//   $(".format_b").css("display", "block");
// });

// $(".format_b").click(function () {
//   $(".bagage_w").hide();
//   $(this).hide();
//   $(".cont_ts").css("display", "block");
//   $(".format_t").css("display", "block");
// });

//  Proposer les paiements

//Traitement incremmentation prix Bagages / Page post trip
let modPlus = document.querySelector(".m_plus");
let modMinus = document.querySelector(".m_minus");
let modNum = document.querySelector("#m_qtyBox");

// let a = 1;

modPlus.addEventListener("click", () => {
  // a++;
  // a = (a < 10) ? "0" + a : a;
  // num.innerHTML =  a;
  modNum.value = parseInt(modNum.value) + 100;
  modNum.value = modNum.value < 10 ? "0" + modNum.value : modNum.value;
});

modMinus.addEventListener("click", () => {
  if (modNum.value > 0) {
    modNum.value = parseInt(modNum.value) - 100;
    modNum.value = modNum.value < 10 ? "0" + modNum.value : modNum.value;
  }
});

//Traitement incremmentation prix Courriers

// let modPlus2 = document.querySelector(".plus2");
// let modMinus2 = document.querySelector(".minus2");
// let modNum2 = document.querySelector("#qtyBox2");

// modPlus2.addEventListener("click", () => {
//   modNum2.value = parseInt(modNum2.value) + 1;
//   modNum2.value = modNum2.value < 10 ? "0" + modNum2.value : modNum2.value;
// });

// modMinus2.addEventListener("click", () => {
//   if (modNum2.value > 0) {
//     modNum2.value = parseInt(modNum2.value) - 1;
//     modNum2.value = modNum2.value < 10 ? "0" + modNum2.value : modNum2.value;
//   }
// });

//Compteur des caractères pour Textarea Confirmation page modify trip
let TextareaMod = document.querySelector(
  "form .trip-confirm .descrip-voy textarea"
);
let CountMod = document.querySelector("form .trip-confirm p .count");

function countLettersMod() {
  let textDesMod = TextareaMod.value;
  let textLenghtMod = TextareaMod.value.length;
  CountMod.innerText = `${textLenghtMod}`;
}

//Bouton Radio pour section Confirmation adresse voyage
// $("#no-voy-mod").click(function () {
//   if ($(this).prop("checked") == true) {
//     $(".adresse-voy").css("display", "block");
//   }
// });

// $("#oui-voy-mod").click(function () {
//   if ($(this).prop("checked") == true) {
//     $(".adresse-voy").css("display", "none");
//   }
// });

//Affichage de body-title (1)
$("#on-1").click(function () {
  $(this).hide();
  $(".body-trip-1").css("display", "block");
  $(".title-trip-1").addClass("active");
  $(".off-1").show();
});

//fermeture de body-title (1)
$(".off-1").click(function () {
  $(this).hide();
  $(".body-trip-1").css("display", "none");
  $(".title-trip-1").removeClass("active");
  $("#on-1").show();
});

//Affichage de body-title (2)
$("#on-2").click(function () {
  $(this).hide();
  $(".body-trip-2").css("display", "block");
  $(".title-trip-2").addClass("active");
  $(".off-2").show();
});

//fermeture de body-title (2)
$(".off-2").click(function () {
  $(this).hide();
  $(".body-trip-2").css("display", "none");
  $(".title-trip-2").removeClass("active");
  $("#on-2").show();
});

//Affichage de body-title (3)
$("#on-3").click(function () {
  $(this).hide();
  $(".body-trip-3").css("display", "block");
  $(".title-trip-3").addClass("active");
  $(".off-3").show();
});

//fermeture de body-title (2)
$(".off-3").click(function () {
  $(this).hide();
  $(".body-trip-3").css("display", "none");
  $(".title-trip-3").removeClass("active");
  $("#on-3").show();
});

//Affichage de body-title (4)
$("#on-4").click(function () {
  $(this).hide();
  $(".body-trip-4").css("display", "block");
  $(".title-trip-4").addClass("active");
  $(".off-4").show();
});

//fermeture de body-title (2)
$(".off-4").click(function () {
  $(this).hide();
  $(".body-trip-4").css("display", "none");
  $(".title-trip-4").removeClass("active");
  $("#on-4").show();
});

//Affichage de body-title (5)
$("#on-5").click(function () {
  $(this).hide();
  $(".body-trip-5").css("display", "block");
  $(".title-trip-5").addClass("active");
  $(".off-5").show();
});

//fermeture de body-title (5)
$(".off-5").click(function () {
  $(this).hide();
  $(".body-trip-5").css("display", "none");
  $(".title-trip-5").removeClass("active");
  $("#on-5").show();
});

// traitement formulaire modify trip
const update_trip_itiner = document.querySelector(
  "form .trip-itineraire .btn-itineraire"
);
const update_trip_date = document.querySelector("form .trip-date .btn-date");
const update_trip_bagage = document.querySelector(
  "form .trip-bagage .btn-bagage"
);
const update_trip_paiement = document.querySelector(
  "form .trip-paiement .btn-paiement"
);
const update_trip_confirmation = document.querySelector(
  "form .trip-confirm .btn-confirmation"
);

const errorModifyPostTrip = document.querySelector(
  ".form-modify-trip .error-post-trip"
);

// const errorReservation = document.querySelector(".reservation .error-text-reservation");
// const formConfirm = document.querySelector('form.form-confirm');

formConfirm.onsubmit = (e) => {
  e.preventDefault(); //preventing form from submiting
};
//refresh page modify trip
function cancelBtn() {
  window.location.reload();
}

//traitement update reservation trip
update_trip_itiner.addEventListener("click", () => {
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/updateTrip/modify-itineraire.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        // alert(data);
        if (data == "success") {
          //signaler que user is update with success
          confirm("Mise à jour de l'itinérare éffectuée avec succès !");
          // window.location="/";
          window.location.reload();
        } else {
          errorModifyPostTrip.textContent = data;
          errorModifyPostTrip.style.display = "block";
        }
      }
    }
  };
  //we have to send the form data through ajax to php
  let formData = new FormData(formConfirm); //creating new formdata object
  xhr.send(formData); //sending the form data to php
});

update_trip_date.addEventListener("click", () => {
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/updateTrip/modify-date.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        // alert(data);
        if (data == "success") {
          //signaler que user is update with success
          confirm("Mise à jour de mes dates éffectuées avec succès !");
          // window.location="/";
          window.location.reload();
        } else {
          errorModifyPostTrip.textContent = data;
          errorModifyPostTrip.style.display = "block";
        }
      }
    }
  };
  //we have to send the form data through ajax to php
  let formData = new FormData(formConfirm); //creating new formdata object
  xhr.send(formData); //sending the form data to php
});

update_trip_bagage.addEventListener("click", () => {
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/updateTrip/modify-bagage.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        // alert(data);
        if (data == "success") {
          //signaler que user is update with success
          confirm("Mise à jour de mes bagages éffectuées avec succès !");
          window.location.reload();
          // window.location="/";
        } else {
          errorModifyPostTrip.textContent = data;
          errorModifyPostTrip.style.display = "block";
        }
      }
    }
  };
  //we have to send the form data through ajax to php
  let formData = new FormData(formConfirm); //creating new formdata object
  xhr.send(formData); //sending the form data to php
});

update_trip_paiement.addEventListener("click", () => {
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/updateTrip/modify-paiement.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        // alert(data);
        if (data == "success") {
          //signaler que user is update with success
          confirm("Mise à jour de paiements éffectuées avec succès !");
          // window.location="/";
          window.location.reload();
        } else {
          errorModifyPostTrip.textContent = data;
          errorModifyPostTrip.style.display = "block";
        }
      }
    }
  };
  //we have to send the form data through ajax to php
  let formData = new FormData(formConfirm); //creating new formdata object
  xhr.send(formData); //sending the form data to php
});

update_trip_confirmation.addEventListener("click", () => {
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/updateTrip/modify-confirm.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        // alert(data);
        if (data == "success") {
          //signaler que user is update with success
          confirm("Mise à jour de mon trajet éffectuées avec succès !");
          // window.location="/";
          window.location.reload();
        } else {
          errorModifyPostTrip.textContent = data;
          errorModifyPostTrip.style.display = "block";
        }
      }
    }
  };
  //we have to send the form data through ajax to php
  let formData = new FormData(formConfirm); //creating new formdata object
  xhr.send(formData); //sending the form data to php
});
