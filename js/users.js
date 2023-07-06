const searchBar = document.querySelector(".users-list .search-list input");
const search_Btn = document.querySelector(".users-list .search-list button"),
usersList = document.querySelector(".users-list .users-list-item"),
errorText = document.querySelector(".users-list .error-text");

search_Btn.onclick = () =>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    search_Btn.classList.toggle("active");
}
//function pour afficher la recherche of users
searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add('active');
    }else{
        searchBar.classList.remove('active');
    }
    //let's start Ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../ajax/search-list.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
            }else{
                errorText.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}


//function pour afficher tous les users
setInterval(()=>{
     //let's start Ajax
     let xhr = new XMLHttpRequest();
     xhr.open("POST", "../ajax/users-list.php", true); 
     xhr.onload = () =>{
         if(xhr.readyState === XMLHttpRequest.DONE){
             if(xhr.status === 200){
                 let data = xhr.response;
                 if(!searchBar.classList.contains('active')){
                    //si pas de rechercher qui affiche, on afiiche les users
                    usersList.innerHTML = data;
                 }
             }
         }
     }
     xhr.send();
}, 500); //this function will frequently after 500ms