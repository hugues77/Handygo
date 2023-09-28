let listElements = document.querySelectorAll('.formulaire-info .accordion-menu .link');

//bien exploiter queryselectorAll
listElements.forEach(listElement =>{
  listElement.addEventListener('click', () =>{
    if(listElement.classList.contains('active')){
      // listElement.classList.remove('active');
    }else{
      listElements.forEach(listE =>{
        listE.classList.remove('active');
      })
      listElement.classList.toggle('active');
    }
  })
})


//deuxième approche avec boucle for - exellent

// for(i=0; i<listElements.length; i++){
//   listElements[i].addEventListener('click', function(){
//     this.classList.toggle('active');
//     })
// }