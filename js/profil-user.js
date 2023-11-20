   //Button select image for user
const formProfil = document.querySelector('.content-main form.form-complete-user');
const errorProfil = document.querySelector(".content-main .error-profil");

let blur = document.querySelector('.abonnes-2 .profil');
let popup = document.querySelector('#profil .modal-box-user');
let Immat = document.querySelector('.vehicule .immat');

//variables form immat
let BtnImmatEnvoyer = document.querySelector('.buttons .btn-immat-envoyer');

//btn valider signup
const BtnImageProfil = document.querySelector(".content-main .image-profil");

formProfil.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}


//traitement
BtnImageProfil.onclick = () =>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/profil-user.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                if(data == "success"){
                    //signaler que user is saving with success
                    // confirm("super !");
                    window.location="/abonnes/profil";  
                }else{
                    errorProfil.textContent = data;
                    errorProfil.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formProfil);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}


//modify profil click and show form sending document
Immat.onclick = () =>{
    // alert('hhhh125487');
    // cfr modalTemoignage
    blur.classList.toggle('active');
    popup.classList.toggle('active');

}
//traitement AJAX - Immatriculation
BtnImmatEnvoyer.onclick = () =>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/pieces/immat.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                if(data == "success"){
                    //signaler que user is saving with success
                    // confirm("super !");
                    window.location="/abonnes/profil";  
                }else{
                    errorProfil.textContent = data;
                    errorProfil.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formProfil);//creating new formdata object
    xhr.send(formData); //sending the form data to php
} 

//input file button
const customImageImmat  = document.querySelector('.custom-image-immat');

customImageImmat.onclick = () =>{
    // fileUser.click(); 
    alert('zozor');
}