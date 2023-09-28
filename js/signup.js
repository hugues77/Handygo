const form = document.querySelector('.formulaire-inner .signup');   
const continueBtn = form.querySelector(".field input[type='submit']");
const errorSignup = document.querySelector(".formulaire-container .error-signup");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting   
}

continueBtn.onclick = () =>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/signup.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                if(data == "success"){
                    //signaler que user is saving with success
                    // confirm("super !");
                    window.location="/informations/name";
                }else{
                    errorSignup.textContent = data;
                    errorSignup.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(form);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}

