   //Button select image for user
const formProfil = document.querySelector('.home_content form.profil');
const errorProfil = document.querySelector(".home_content form .error-name");


//btn valider signup
const BtnImageProfil = document.querySelector(".home_content .image-profil");

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