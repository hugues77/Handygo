const formChat = document.querySelector('.typing-area'),
inputField = formChat.querySelector('.input-field'),
sendBtn = formChat.querySelector('button'),
chatBox = document.querySelector('.chat-box');

formChat.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submiting
}

//traitement formulaire

sendBtn.onclick = () =>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../../ajax/insert-chat.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = ""; //leave the message, if sending of database
                scrollToBottom(); 
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(formChat);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}

chatBox.onmouseenter = () =>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () =>{
    chatBox.classList.remove("active");
}

//showing the messages

setInterval(()=>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../../ajax/get-chat.php", true);  
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){ //if active class not contains in chatbox the scroll to bottom
                    scrollToBottom();
                }
            }
        }
    }
   
    //we have to send the form data through ajax to php
    let formData = new FormData(formChat);//creating new formdata object
    xhr.send(formData); //sending the form data to php
}, 500); //this function will frequently after 500ms

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}