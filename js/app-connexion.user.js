// Script pour form connexion utilisateurs
const loginForm = document.querySelector("form.login");
const signupForm = document.querySelector("form.signup");
const PasswordForm = document.querySelector("form.password");

const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector(".signup-link a");
const loginLink = document.querySelector(".login-link a");
const passwordLink = document.querySelector(".pass-link a");

const loginText = document.querySelector(".title-text .login");
const signupText = document.querySelector(".title-text .signup");
const passwordText = document.querySelector(".title-text .password");

// traitement
signupBtn.onclick = (()=>{
    loginForm.style.marginLeft = "-25%";
    loginText.style.marginLeft = "-25%";
});

loginBtn.onclick = (()=>{
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
});

PasswordForm.onclick = (()=>{
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-50%";
});

signupLink.onclick = (()=>{
    signupBtn.click();
    return false;
});
loginLink.onclick = (()=>{
    loginBtn.click();
    return false;
});
passwordLink.onclick = (()=>{
    PasswordForm.click();
    return false;
});