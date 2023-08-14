
//Button select image for user
const formComplete = document.querySelector('.formulaire-info form.complete-user');
const errorComplete = document.querySelector(".formulaire-info .complete-user .error-name");

//select file BTn 
// const fileUser  = document.querySelector('#file-user');
// const customImage  = document.querySelector('.custom-image');
// const customTxt  = document.querySelector('.custom-text');
//btn valider signup
const BtnComplete = document.querySelector(".field-user .complete-user-doc");

formComplete.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}

customImage.onclick = () =>{
    fileUser.click();  
}
fileUser.onchange = () =>{
    if(fileUser.value){
        customTxt.innerHTML = fileUser.value.match(/[\/\\]([\w\d\s.\-\(\)]+)$/)[1];
    }else{
        customTxt.innerHTML = "Aucun fichier choisi pour l'instant";
    }
} 

//traitement
BtnComplete.onclick = () =>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/complete.php", true);
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
                    errorComplete.textContent = data;
                    errorComplete.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formComplete);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}   