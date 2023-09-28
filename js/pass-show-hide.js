const pswrdField = document.querySelector("form .field input[type='password']");
const toggleBtn = document.querySelector("form .field i");

const pswrdField2 = document.querySelector("form .field.psw input[type='password']");
const toggleBtn2 = document.querySelector("form.signup .field i.psw");

const pswrdField3 = document.querySelector("form .field.psw-i input[type='password']");
const toggleBtn3 = document.querySelector("form.signup .field i.psw-i");

toggleBtn.onclick = () =>{
    if(pswrdField.type == "password"){
        pswrdField.type = "text";
        toggleBtn.classList.add("active");
    }else{
        pswrdField.type = "password";
        toggleBtn.classList.remove('active'); 
    }
}

toggleBtn2.onclick = () =>{
    if(pswrdField2.type == "password"){
        pswrdField2.type = "text";
        toggleBtn2.classList.add("active");
    }else{
        pswrdField2.type = "password";
        toggleBtn2.classList.remove('active'); 
    }
}

toggleBtn3.onclick = () =>{
    if(pswrdField3.type == "password"){
        pswrdField3.type = "text";
        toggleBtn3.classList.add("active");
    }else{
        pswrdField3.type = "password";
        toggleBtn3.classList.remove('active'); 
    }
}