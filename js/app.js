
// Traitement Navbar Abonées - Menu vertical
const toggle = document.querySelector(".toggle");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector(".home_content");

toggle.onclick = function () {
  sidebar.classList.toggle("active"); 
  main.classList.toggle("active"); 
};
// searchBtn.onclick = function () {
//   sidebar.classList.toggle("active");
// };

