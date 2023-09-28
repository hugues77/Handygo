const formUserName = document.querySelector('.formulaire-info .name');
const BtnName = formUserName.querySelector(".field input[type='submit']");
const errorName = document.querySelector(".formulaire-info .error-name");

formUserName.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}

BtnName.onclick = () =>{
    //let's start Ajax 
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/name-user.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                if(data == "success"){
                    //signaler que user is saving with success
                    // confirm("super !");
                    window.location="/informations/naissance";
                }else{
                    errorName.textContent = data;
                    errorName.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formUserName);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}