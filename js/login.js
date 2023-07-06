const formLogin = document.querySelector('.formulaire-inner .login');
const continue_loginBtn = formLogin.querySelector(".field input[type='submit']");
const errorTextLogin = document.querySelector(".formulaire-container .error-text");
const successTextLogin = document.querySelector(".formulaire-container .success-text"); 

formLogin.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}

continue_loginBtn.onclick = () =>{

    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/login.php", true);
    xhr.responseType ="json";
    
    // xhr.onload = () =>{
    //     if(xhr.readyState === XMLHttpRequest.DONE){
    //         if(xhr.status === 200){
    //             let data = xhr.response;
                
    //             if(data == "success"){
    //                 //signaler que user is saving with success
    //                 // confirm("super !");
    //                 // errorTextLogin.style.display = "none";
                    
    //             }else{
    //                 errorTextLogin.textContent = data;
    //                 errorTextLogin.style.display = "block";
    //             }
    //         }
    //     }
    // }


    xhr.onreadystatechange = () =>{
        // console.log(xhr.response);
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.response);

            let data = xhr.response;
            if(data.success){
                
                // successTextLogin.textContent = (data.msg);
                // successTextLogin.style.display = "block";
                // errorTextLogin.style.display = "none";
                // alert("on a gagné !");
                window.location="/abonnes";
            }else{
                errorTextLogin.textContent = (data.msg);
                errorTextLogin.style.display = "block";
                // alert(data.msg); 
            }


        }else if(xhr.readyState == 4){
        console.log("erreur fatale");
        }
    }


    //we have to send the form data through ajax to php
    let formData = new FormData(formLogin);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}