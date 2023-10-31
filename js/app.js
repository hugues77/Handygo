
// Traitement Navbar Abonées - Menu vertical
const toggle = document.querySelector(".toggle");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector(".home_content"); 

const round_profil = document.querySelector(".round-profil");
const infoProfil = document.querySelector(".mesinfos i");
const infoProfil1 = document.querySelector(".mesinfos1 i");
const infoTrajet = document.querySelector(".mesinfos-trajets i");

toggle.onclick = function () {
  sidebar.classList.toggle("active"); 
  main.classList.toggle("active");  
  round_profil.classList.toggle("active");  
  infoProfil.classList.toggle("active");  
  infoProfil1.classList.toggle("active");  
  infoTrajet.classList.toggle("active");  
};


//Show photo de profil user - topbar-3
// $('.round-profil').click(function(){
//   $('.home_content .btn-profil').css("display","block");
//   $('.home_content .btn-profil').css("display","grid");
// });

//Traitement Espace abonnes- page member-2
let toggleBtn = document.querySelector('.topbar-main .toggle');
let navigation = document.querySelector('.topbar-4 .navigation');
let topbarMain = document.querySelector('.home-main'); 

let espace = document.querySelector('.espace');
let IonEspace = document.querySelector('.icon-espace');

toggleBtn.onclick = function(){
  navigation.classList.toggle('active');
  topbarMain.classList.toggle('active');

  espace.classList.toggle('active');

}

IonEspace.onclick = function () {
  navigation.style.display = "none";
  location.reload();
}








