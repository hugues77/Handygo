const formUserInfo = document.querySelector('.formulaire-info .info-user');
const BtnInfoUser = formUserInfo.querySelector(".formulaire-info .btn-complete-user");

const errorInfo = document.querySelector(".formulaire-info .info-user .error-name");

formUserInfo.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting  
}

BtnInfoUser.onclick = () =>{      
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/information-user.php", true);
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
                    errorInfo.textContent = data;
                    errorInfo.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formUserInfo);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}