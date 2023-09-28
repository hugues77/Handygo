const formUserPassword = document.querySelector('.formulaire-info form.password');
const BtnPassword = formUserPassword.querySelector(".password .field input[type='submit']");
const errorPassword = document.querySelector(".formulaire-info .password .error-name");

formUserPassword.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}

BtnPassword.onclick = () =>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/update-password.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;     
                // console.log(data);
                if(data == "success"){
                    //signaler que user is saving with success
                    // confirm("super !");
                    window.location="/logout_ref";
                }else{
                    errorPassword.textContent = data;
                    errorPassword.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formUserPassword);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}