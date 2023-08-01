//boite modale - temoignages
const btnTemoignage = document.querySelector('.teams .btn-temoignage');
const modalTemoignage = document.querySelector('.teams .modal-box');
const mHome = document.querySelector('.teams');

const btnFermer = document.querySelector('.modal-box .buttons .btn-fermer');
const BtnEnvoyer = document.querySelector('.modal-box .buttons .btn-envoyer');

const formteams = document.querySelector('.teams form.teams-modal');
const errorteams = document.querySelector(".teams .modal-box .error");



btnTemoignage.addEventListener('click', ()=> mHome.classList.add("active"));

btnFermer.addEventListener('click', ()=>{
    mHome.classList.remove('active');
    errorteams.style.display="none";
});

formteams.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}

//traitement
BtnEnvoyer.onclick = () =>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/temoignage-teams.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                if(data == "success"){
                    //signaler que user is saving with success
                    // confirm("super !");
                    window.location="/#teams";
                    modalTemoignage.style.display="none";  
                }else{
                    errorteams.textContent = data;
                    errorteams.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formteams);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}