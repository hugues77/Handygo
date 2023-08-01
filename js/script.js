
$(document).ready(function () {
  $(window).scroll(function () {
    if (this.scrollY > 20) {
      $(".navbar1").addClass("sticky");
    } else {
      $(".navbar1").removeClass("sticky");
    }
    if(this.scrollY > 500){
      $('.scroll-up-btn').addClass("show");
    }else{
      $('.scroll-up-btn').removeClass("show");
    }
  });

  // slide-up script
  $('.scroll-up-btn').click(function(){
    $('html').animate({scrollTop: 0});
  });

  // toogle menu navbar
  $(".menu-btn").click(function () {
    $(".navbar1 .menu").toggleClass("active");
    $(".menu-btn i").toggleClass("active");
  });

  // script typing animation
  var typed = new Typed(".typing", {
    strings:["HandyGo c'est parti !","Inscrivez-vous","Connectez-vous","Déposer votre trajet","Trouvez un trajet","Payer direct en Especès","Fixer un RDV","Et voilà, c'est tout !"],
    typeSpeed:100,
    backSpeed:100,
    loop:true
  });

  // owl carousel script
  $('.carousel').owlCarousel({
    // items:2,
    margin:20,
    loop:true,
    autoplayTimeOut:2000,
    autoplayHoverPause: true,
    responsive: {
        0:{
            items:1,
            nav: false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:false
        }
    }
  });
});


// traitement Javascript User-login
const sign_in_btn = document.querySelector('#sign-in-btn');
const sign_up_btn = document.querySelector('#sign-up-btn');
const container = document.querySelector('.container1');

sign_up_btn.addEventListener('click', ()=> {
  container.classList.add('sign-up-mode');
});

sign_in_btn.addEventListener('click', ()=> {
  container.classList.remove('sign-up-mode');
});

