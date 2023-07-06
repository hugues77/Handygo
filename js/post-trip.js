//Script for post-trip2
//Traitement pour form multi step for post-trip
//Déclaration des variables

const slidePage = document.querySelector(".slidepage");
const firtNextBtn = document.querySelector(".nextBtn");

const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");

const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");

const prevBtnFourth = document.querySelector(".prev-3");
const nextBtnFourth = document.querySelector(".next-3");

const prevBtnFifth = document.querySelector(".prev-4");
const submitBtn = document.querySelector(".submit");

const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");

//select the form and declaration for variable of form
const formOuter = document.querySelector('.form-outer form');

const itineraireBtn = formOuter.querySelector(".itineraire .nextBtn .button-1");
const dateBtn = formOuter.querySelector(".date .btns .button-2"); 
const bagageBtn = formOuter.querySelector(".bagage .btns .button-3");
const paiementBtn = formOuter.querySelector(".paiement .btns .button-4");
const confirmBtn = formOuter.querySelector(".confirmation .btns .button-5");


const getInfo = document.querySelector('.get-info-2 .timeline-body');

const errorPostTrip = document.querySelector(".form-outer .error-post-trip");


formOuter.onsubmit = (e)=>{
  e.preventDefault(); //preventing form from submiting 
}


let max = 5;
let current = 1;

//traitement de Keyup - rendre bouton active ou non avant de faire next
//JQuery
$(document).ready(function () {
  $(".input-1").keyup(function () {
    if ($(this).val() == "") {
      $(".button-1").css("disabled", "true");
      noPressEnter(document.body);
      // $(this).addClass("active");
    } else {
      // $(this).removeClass("error");
      $(".button-1").css("opacity", "1");
      $(".button-1").css("cursor", "pointer");
      $(".button-1").css("disabled", "false");
    }
  });

  $(".input-2").change(function () {
    if ($(this).val() == "") {
      $(".button-2").css("disabled", "true");
      // $(this).addClass("active");
    } else {
      $(this).removeClass("error");
      $(".button-2").css("opacity", "1");
      $(".button-2").css("cursor", "pointer");
      $(".button-2").css("disabled", "false");
    }
  });

  $(".input-3").keyup(function () {
    if ($(this).val() == "") {
      $(".button-3").css("disabled", "true");
      // $(this).addClass("active");
    } else {
      $(this).removeClass("error");
      $(".button-3").css("opacity", "1");
      $(".button-3").css("cursor", "pointer");
      $(".button-3").css("disabled", "false");
    }
  });

  $(".input-4").keyup(function () {
    if ($(this).val() == "") {
      $(".button-4").css("disabled", "true");
      // $(this).addClass("active");
    } else {
      $(this).removeClass("error");
      $(".button-4").css("opacity", "1");
      $(".button-4").css("cursor", "pointer");
      $(".button-4").css("disabled", "false");
    }
  });

  $(".input-5").keyup(function () {
    if ($(this).val() == "") {
      $(".button-5").css("disabled", "true");
      // $(this).addClass("active");
    } else {
      $(this).removeClass("error");
      $(".button-5").css("opacity", "1");
      $(".button-5").css("cursor", "pointer");
      $(".button-5").css("disabled", "false");
    }
  });
});

//Traitement des functions Ajax pour chaque step / page suivant
//bouton itineraire post trip
itineraireBtn.onclick = () =>{
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/post-trip/itineraire.php", true);
  xhr.onload = () =>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              // console.log(data);
              if(data == "success"){
                  slidePage.style.marginLeft = "-20%";
                
                  bullet[current - 1].classList.add("active");
                  progressText[current - 1].classList.add("active");
                  progressCheck[current - 1].classList.add("active");
                  current += 1;

                  errorPostTrip.style.display = "none";
                  
              }else{
                  errorPostTrip.textContent = data;
                  errorPostTrip.style.display = "block";
              }
          }
      }
  }
  //we have to send the form data through ajax to php
  let formData = new FormData(formOuter);//creating new formdata object
  xhr.send(formData); //sending the form data to php
}

//bouton date post trip
dateBtn.onclick = () =>{
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/post-trip/date.php", true);
  xhr.onload = () =>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              // console.log(data);
              if(data == "success"){
                  slidePage.style.marginLeft = "-40%";
                
                  bullet[current - 1].classList.add("active");
                  progressText[current - 1].classList.add("active");
                  progressCheck[current - 1].classList.add("active");
                  current += 1;

                  errorPostTrip.style.display = "none";
                  
            }else{
              errorPostTrip.textContent = data;
              errorPostTrip.style.display = "block";
            }
          }
      }
  }
  //we have to send the form data through ajax to php
  let formData = new FormData(formOuter);//creating new formdata object
  xhr.send(formData); //sending the form data to php
}

//bouton bagages post trip
bagageBtn.onclick = () =>{
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/post-trip/bagage.php", true);
  xhr.onload = () =>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              // console.log(data);
              if(data == "success"){
                  slidePage.style.marginLeft = "-60%";
                
                  bullet[current - 1].classList.add("active");
                  progressText[current - 1].classList.add("active");
                  progressCheck[current - 1].classList.add("active");
                  current += 1;

                  errorPostTrip.style.display = "none";
              }else{
                errorPostTrip.textContent = data;
                errorPostTrip.style.display = "block";
              }
          }
      }
  }
  //we have to send the form data through ajax to php
  let formData = new FormData(formOuter);//creating new formdata object
  xhr.send(formData); //sending the form data to php
}

//bouton paiement post trip
paiementBtn.onclick = () =>{
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/post-trip/paiement.php", true);
  xhr.onload = () =>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              // console.log(data);
              if(data == "success"){
                  slidePage.style.marginLeft = "-80%";
                
                  bullet[current - 1].classList.add("active");
                  progressText[current - 1].classList.add("active");
                  progressCheck[current - 1].classList.add("active");
                  current += 1;

                  errorPostTrip.style.display = "none";

              }else{
                errorPostTrip.textContent = data;
                errorPostTrip.style.display = "block";
              } 
          }
      }
  }
  //we have to send the form data through ajax to php
  let formData = new FormData(formOuter);//creating new formdata object
  xhr.send(formData); //sending the form data to php
}

//bouton Confirmation post trip
confirmBtn.onclick = () =>{
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/post-trip/confirm.php", true);
  xhr.onload = () =>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              // console.log(data);
              if(data == "success"){
                  // slidePage.style.marginLeft = "-75%";
                
                  bullet[current - 1].classList.add("active");
                  progressText[current - 1].classList.add("active");
                  progressCheck[current - 1].classList.add("active");
                  current += 1;
                
                  errorPostTrip.style.display = "none";

                  setTimeout(function () {
                    let confirm = prompt("Etes-vous sur de valider votre trajet ? Entrer le code envoyé par mobile.");
                    if(confirm == null || confirm ==""){
                      alert('Trajet non publier et enregistré dans le brouillon !');
                      window.location="/";
                    }else{
                      window.location="/logout_ref";
                    }
                  }, 800);
              }else{
                errorPostTrip.textContent = data;
                errorPostTrip.style.display = "block";
              }
          }
      }
  }
  //we have to send the form data through ajax to php
  let formData = new FormData(formOuter);//creating new formdata object
  xhr.send(formData); //sending the form data to php
}

//Boutons Precedent pour chaque step /page précedent
prevBtnSec.addEventListener("click", function () {

   //let's start Ajax
   let xhr = new XMLHttpRequest();
   xhr.open("POST", "../ajax/retour/back-itineraire.php", true);
   xhr.onload = () =>{
       if(xhr.readyState === XMLHttpRequest.DONE){
           if(xhr.status === 200){
               let data = xhr.response;
               // console.log(data);
               if(data == "success"){
                  slidePage.style.marginLeft = "0%";

                 
                  bullet[current - 2].classList.remove("active");
                  progressText[current - 2].classList.remove("active");
                  progressCheck[current - 2].classList.remove("active");
                  current -= 1;
          
               }else{
                   errorPostTrip.textContent = data;
                   errorPostTrip.style.display = "block";
               }
           }
       }
   }
   //we have to send the form data through ajax to php
   let formData = new FormData(formOuter);//creating new formdata object
   xhr.send(formData); //sending the form data to php
});

prevBtnThird.addEventListener("click", function () {
     //let's start Ajax
     let xhr = new XMLHttpRequest();
     xhr.open("POST", "../ajax/retour/back-date.php", true);
     xhr.onload = () =>{
         if(xhr.readyState === XMLHttpRequest.DONE){
             if(xhr.status === 200){
                 let data = xhr.response;
                 // console.log(data);
                 if(data == "success"){
                  slidePage.style.marginLeft = "-20%";

                  bullet[current - 2].classList.remove("active");
                  progressText[current - 2].classList.remove("active");
                  progressCheck[current - 2].classList.remove("active");
                  current -= 1;
            
                 }else{
                     errorPostTrip.textContent = data;
                     errorPostTrip.style.display = "block";
                 }
             }
         }
     }
     //we have to send the form data through ajax to php
     let formData = new FormData(formOuter);//creating new formdata object
     xhr.send(formData); //sending the form data to php
});

prevBtnFourth.addEventListener("click", function () {
     //let's start Ajax
     let xhr = new XMLHttpRequest();
     xhr.open("POST", "../ajax/retour/back-bagage.php", true);
     xhr.onload = () =>{
         if(xhr.readyState === XMLHttpRequest.DONE){
             if(xhr.status === 200){
                 let data = xhr.response;
                 // console.log(data);
                 if(data == "success"){
                  slidePage.style.marginLeft = "-40%";

                  bullet[current - 2].classList.remove("active");
                  progressText[current - 2].classList.remove("active");
                  progressCheck[current - 2].classList.remove("active");
                  current -= 1;
            
                 }else{
                     errorPostTrip.textContent = data;
                     errorPostTrip.style.display = "block";
                 }
             }
         }
     }
     //we have to send the form data through ajax to php
     let formData = new FormData(formOuter);//creating new formdata object
     xhr.send(formData); //sending the form data to php

});

prevBtnFifth.addEventListener("click", function () {
       //let's start Ajax
       let xhr = new XMLHttpRequest();
       xhr.open("POST", "../ajax/retour/back-paiement.php", true);
       xhr.onload = () =>{
           if(xhr.readyState === XMLHttpRequest.DONE){
               if(xhr.status === 200){
                   let data = xhr.response;
                   // console.log(data);
                   if(data == "success"){
                    slidePage.style.marginLeft = "-60%";

                    bullet[current - 2].classList.remove("active");
                    progressText[current - 2].classList.remove("active");
                    progressCheck[current - 2].classList.remove("active");
                    current -= 1;
              
                   }else{
                       errorPostTrip.textContent = data;
                       errorPostTrip.style.display = "block";
                   }
               }
           }
       }
       //we have to send the form data through ajax to php
       let formData = new FormData(formOuter);//creating new formdata object
       xhr.send(formData); //sending the form data to php

});

//Bouton Radio pour section bagages
$("#oui").click(function(){
    if($(this).prop("checked") == true){
        $('.document').css('display','block');
        $('.color_bag').css('color','#000');
    }
  });

$("#no").click(function(){
  if($(this).prop("checked") == true){
      $('.document').css('display','none');
      $('.color_bag').css('color','crimson');
  }
});

//Bouton Radio pour section Confirmation adresse voyage
$("#no-voy").click(function(){
  if($(this).prop("checked") == true){
      $('.adresse-voy').css('display','block');
  }
});

$("#oui-voy").click(function(){
if($(this).prop("checked") == true){
    $('.adresse-voy').css('display','none');
}
});

$(".format_t").click(function(){
  $(".cont_ts").hide();
  $(this).hide();
  $('.bagage_w').css('display','block');
  $('.format_b').css('display','block');
});

$(".format_b").click(function(){
  $(".bagage_w").hide();
  $(this).hide();
  $('.cont_ts').css('display','block');
  $('.format_t').css('display','block');
});

$("button.prix").click(function(){
  $(".ancien_p").css('display','none');
  $(this).css('display','none');
  $('.nouveau_p').css('display','flex');
});

//Traitement incremmentation prix Bagages / Page post trip
const plus = document.querySelector(".plus");
const minus = document.querySelector(".minus");
const num = document.querySelector("#qtyBox");

// let a = 1;

plus.addEventListener("click", ()=>{
  $(".button-4").css("opacity", "1");
  $(".button-4").css("cursor", "pointer");
  $(".button-4").css("disabled", "false");
  // a++;
  // a = (a < 10) ? "0" + a : a;
  // num.innerHTML =  a;
  num.value = parseInt(num.value) + 1;
  num.value = (num.value < 10) ? "0"+num.value : num.value;

});

minus.addEventListener("click", ()=>{
  $(".button-4").css("opacity", "1");
  $(".button-4").css("cursor", "pointer");
  $(".button-4").css("disabled", "false");
  if(num.value > 0){
    num.value = parseInt(num.value) - 1;
    num.value = (num.value < 10) ? "0"+num.value : num.value;
  }
});

//Traitement incremmentation prix Courriers 
const plus2 = document.querySelector(".plus2");
const minus2 = document.querySelector(".minus2");
const num2 = document.querySelector("#qtyBox2");

plus2.addEventListener("click", ()=>{
  $(".button-4").css("opacity", "1");
  $(".button-4").css("cursor", "pointer");
  $(".button-4").css("disabled", "false");

  num2.value = parseInt(num2.value) + 1;
  num2.value = (num2.value < 10) ? "0"+num2.value : num2.value;

});

minus2.addEventListener("click", ()=>{
  $(".button-4").css("opacity", "1");
  $(".button-4").css("cursor", "pointer");
  $(".button-4").css("disabled", "false");
  if(num2.value > 0){
    num2.value = parseInt(num2.value) - 1;
    num2.value = (num2.value < 10) ? "0"+num2.value : num2.value;
  }
});




//Compteur des caractères pour Textarea Confirmation page
const Textarea = document.querySelector("form .descrip-voy textarea");
const Count = document.querySelector("form p .count");

function countLetters(){
  const textDes = Textarea.value;
  const textLenght = Textarea.value.length;
  Count.innerText = `${textLenght}`;
}


//informations for post trip, showing the registration of itineraire
// function postTripShow(){
//   //informations for post trip, showing the registration of itineraire

//     //let's start Ajax
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "../ajax/post-trip/get-info.php", true); 
//     xhr.onload = () =>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 let data = xhr.response;
//                 getInfo.innerHTML = data; 
//             }
//         }
//     }
  
//     //we have to send the form data through ajax to php
//     let formData = new FormData(formOuter);//creating new formdata object
//     xhr.send(formData); //sending the form data to php
  
// }

//informations for post trip, showing the registration of itineraire
setInterval(()=>{
  //let's start Ajax
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../ajax/post-trip/get-info.php", true); 
  xhr.onload = () =>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              getInfo.innerHTML = data; 
          }
      }
  }

  //we have to send the form data through ajax to php
  let formData = new FormData(formOuter);//creating new formdata object
  xhr.send(formData); //sending the form data to php
}, 500); //this function will frequently after 500ms


