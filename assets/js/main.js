
/* AOS */ 

AOS.init();

/* OWL carousel */

$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    });
}); 


/* Newsletter form */

const btnDisplay = document.getElementById("btn-newsletter");
const formDisplay = document.getElementById("form-newsletter");
const btnRemove = document.getElementById("btn-remove");

if (btnDisplay) {
        btnDisplay.addEventListener("click", () => 
        formDisplay.classList.remove("d-none") + btnDisplay.classList.add("d-none")
        
    );

    btnRemove.addEventListener("click", () => 
        formDisplay.classList.add("d-none") + btnDisplay.classList.remove("d-none")

    );
}



/* Gallery img */

let mainImg = document.querySelector("#main-img");
const galleryImg = document.querySelectorAll(".gallery img");

for (let i=0; i < galleryImg.length; i++) {
    galleryImg[i].addEventListener("click", () => mainImg.src = galleryImg[i].src)

}


