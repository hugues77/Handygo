const formPasswordForgot = document.querySelector('.formulaire-inner .password');
const BtnPasswordForgot = formPasswordForgot.querySelector(".formulaire-inner .password .field input[type='submit']");
const errorPasswordForgot = document.querySelector(".formulaire-container .error-signup");

formPasswordForgot.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}

BtnPasswordForgot.onclick = () =>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/password_forgot_user.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;     
                // console.log(data);
                if(data == "success"){
                    //signaler que user is saving with success
                    // confirm("super !");
                    window.location="/informations/forgot_password";
                }else{
                    errorPasswordForgot.textContent = data;
                    errorPasswordForgot.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formPasswordForgot);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}