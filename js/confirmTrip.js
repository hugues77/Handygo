// Incrementation/Decrementation prix  bagage / Page confirmation trip 
const plusBag = document.querySelector(".plus_bag");
const plusCr = document.querySelector(".plus_cr");
const minusBag = document.querySelector(".minus_bag");
const minusCr = document.querySelector(".minus_cr");

const numBag = document.querySelector("#qtyBox_bag");
const numCr = document.querySelector("#qtyBox_cr");

const formConfirm = document.querySelector('form.form-confirm');

const getvalBag = document.querySelector('form .p-total .p-total-bag');
const getvalDoc = document.querySelector('form .p-total .p-total-doc');

const BtnReserver = document.querySelector('form .confirm .btn-reservation');

const errorReservation = document.querySelector(".reservation .error-text-reservation");

formConfirm.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}

//traitement des boutons incrementation / decrementation (Nbre de kg et documents)

plusBag.addEventListener("click", ()=>{

    numBag.value = parseInt(numBag.value) + 1;
    numBag.value = (numBag.value < 10) ? "0"+numBag.value : numBag.value;

    if(numBag.value > 0){
        // alert('zoba zoba');
        //traitement pour enregistrer le nbre de kg choisie
        
        //let's start Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/confirmReservation/bagage.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    getvalBag.innerHTML = data;  

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
        let formData = new FormData(formConfirm);//creating new formdata object
        xhr.send(formData); //sending the form data to php
       
    }
    

});

plusCr.addEventListener("click", ()=>{

    numCr.value = parseInt(numCr.value) + 1;
    numCr.value = (numCr.value < 10) ? "0"+numCr.value : numCr.value;

    if(numCr.value > 0){
        // alert('zoba zoba');
        //traitement pour enregistrer le nbre de kg choisie
        
        //let's start Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/confirmReservation/courrier.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    getvalDoc.innerHTML = data;  

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
        let formData = new FormData(formConfirm);//creating new formdata object
        xhr.send(formData); //sending the form data to php
       
    }

});

minusBag.addEventListener("click", ()=>{
    if(numBag.value > 0){
        numBag.value = parseInt(numBag.value) - 1;
        numBag.value = (numBag.value < 10) ? "0"+numBag.value : numBag.value;

        //traitement pour choisir / plus ou moins le nbre de kg choisie
        
        //let's start Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/confirmReservation/bagage.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    getvalBag.innerHTML = data;  

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
        let formData = new FormData(formConfirm);//creating new formdata object
        xhr.send(formData); //sending the form data to php
    }
  });

minusCr.addEventListener("click", ()=>{
    
    if(numCr.value > 0){
        numCr.value = parseInt(numCr.value) - 1;
        numCr.value = (numCr.value < 10) ? "0"+ numCr.value : numCr.value;

        //traitement pour choisir / plus ou moins le nbre de document choisi
        
        //let's start Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/confirmReservation/courrier.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    getvalDoc.innerHTML = data;  

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
        let formData = new FormData(formConfirm);//creating new formdata object
        xhr.send(formData); //sending the form data to php
    }
});

//traitement reservation trajets
BtnReserver.addEventListener("click", ()=>{

        // alert('zoba zoba');
        //traitement pour enregistrer la réservation du colis
        
        //let's start Ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../ajax/confirmReservation/reservation.php", true);
        xhr.onload = () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
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
        let formData = new FormData(formConfirm);//creating new formdata object
        xhr.send(formData); //sending the form data to php

});

