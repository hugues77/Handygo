// Incrementation/Decrementation prix  bagage / Page confirmation trip 
const plusBag_upd = document.querySelector(".plus_bag.upd");
const plusCr_upd = document.querySelector(".plus_cr.upd");
const minusBag_upd = document.querySelector(".minus_bag.upd");
const minusCr_upd = document.querySelector(".minus_cr.upd");

const numBag_upd = document.querySelector("#qtyBox_bag_upd");
const numCr_upd = document.querySelector("#qtyBox_cr_upd");

const formConfirm_upd = document.querySelector('form.form-confirm.upd');

const getvalBag_upd = document.querySelector('form .p-total .p-total-bag-upd');
const getvalDoc_upd = document.querySelector('form .p-total .p-total-doc-upd');



const update_reservation = document.querySelector('form .confirm .btn-update-reservation');

// const errorReservation = document.querySelector(".reservation .error-text-reservation");
// const formConfirm = document.querySelector('form.form-confirm');

formConfirm_upd.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}


plusBag_upd.addEventListener("click", ()=>{

    numBag_upd.value = parseInt(numBag_upd.value) + 1;
    numBag_upd.value = (numBag_upd.value < 10) ? "0"+numBag_upd.value : numBag_upd.value;

    if(numBag_upd.value > 0){
        // alert('zoba zoba');
        //traitement pour enregistrer le nbre de kg choisie
        
        //let's start Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/confirmReservation/bagage_upd.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    getvalBag_upd.innerHTML = data;  

                    // console.log(data);
                    // if(data == "success"){
                    //     //signaler que user is saving with success
                    //     confirm("super !");
                    //     // window.location="/abonnes";  
                    // }else{
                    //     // errorNaissance.textContent = data;
                    //     // errorNaissance.style.display = "block";
                    // }
                }
            }
        }
        //we have to send the form data through ajax to php
        let formData = new FormData(formConfirm_upd);//creating new formdata object
        xhr.send(formData); //sending the form data to php
       
    }
    

});

plusCr_upd.addEventListener("click", ()=>{

    numCr_upd.value = parseInt(numCr_upd.value) + 1;
    numCr_upd.value = (numCr_upd.value < 10) ? "0"+numCr_upd.value : numCr_upd.value;

    if(numCr_upd.value > 0){
        // alert('zoba zoba');
        //traitement pour enregistrer le nbre de kg choisie
        
        //let's start Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/confirmReservation/courrier_upd.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    getvalDoc_upd.innerHTML = data;  

                    // console.log(data);
                    // if(data == "success"){
                    //     //signaler que user is saving with success
                    //     confirm("super !");
                    //     // window.location="/abonnes";  
                    // }else{
                    //     // errorNaissance.textContent = data;
                    //     // errorNaissance.style.display = "block";
                    // }
                }
            }
        }
        //we have to send the form data through ajax to php
        let formData = new FormData(formConfirm_upd);//creating new formdata object
        xhr.send(formData); //sending the form data to php
       
    }

});

minusBag_upd.addEventListener("click", ()=>{
    if(numBag_upd.value > 0){
        numBag_upd.value = parseInt(numBag_upd.value) - 1;
        numBag_upd.value = (numBag_upd.value < 10) ? "0"+numBag_upd.value : numBag_upd.value;

        //traitement pour choisir / plus ou moins le nbre de kg choisie
        
        //let's start Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/confirmReservation/bagage_upd.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    getvalBag_upd.innerHTML = data;  

                    // console.log(data);
                    // if(data == "success"){
                    //     //signaler que user is saving with success
                    //     confirm("super !");
                    //     // window.location="/abonnes";  
                    // }else{
                    //     // errorNaissance.textContent = data;
                    //     // errorNaissance.style.display = "block";
                    // }
                }
            }
        }
        //we have to send the form data through ajax to php
        let formData = new FormData(formConfirm_upd);//creating new formdata object
        xhr.send(formData); //sending the form data to php
    }
  });

minusCr_upd.addEventListener("click", ()=>{
    
    if(numCr_upd.value > 0){
        numCr_upd.value = parseInt(numCr_upd.value) - 1;
        numCr_upd.value = (numCr_upd.value < 10) ? "0"+ numCr_upd.value : numCr_upd.value;

        //traitement pour choisir / plus ou moins le nbre de document choisi
        
        //let's start Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/confirmReservation/courrier_upd.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    getvalDoc_upd.innerHTML = data;  

                    // console.log(data);
                    // if(data == "success"){
                    //     //signaler que user is saving with success
                    //     confirm("super !");
                    //     // window.location="/abonnes";  
                    // }else{
                    //     // errorNaissance.textContent = data;
                    //     // errorNaissance.style.display = "block";
                    // }
                }
            }
        }
        //we have to send the form data through ajax to php
        let formData = new FormData(formConfirm_upd);//creating new formdata object
        xhr.send(formData); //sending the form data to php
    }
});

//traitement update reservation trip
update_reservation.addEventListener("click", ()=>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/confirmReservation/update_reservation.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // getvalBag.innerHTML = data;  
                if(data == "success"){
                    //signaler que user is saving with success
                    // confirm("super !");
                    window.location="/abonnes";  
                }else{
                    errorReservation.textContent = data;
                    errorReservation.style.display = "block";
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formConfirm_upd);//creating new formdata object
    xhr.send(formData); //sending the form data to php

});

