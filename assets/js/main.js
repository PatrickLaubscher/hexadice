
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


/* Searching index aera */

const btnDisplaySearching = document.getElementById("btn-display-search");
const searchField = document.getElementById("search-field");
const btnRemoveField = document.getElementById("btn-remove-field");

if (btnDisplaySearching) {
        btnDisplaySearching.addEventListener("click", () => 
        searchField.classList.remove("d-none") + btnDisplaySearching.classList.add("d-none")
        );

        btnRemoveField.addEventListener("click", () => 
        searchField.classList.add("d-none") + btnDisplaySearching.classList.remove("d-none")
        );
}



/* Newsletter form */

const btnDisplayForm = document.getElementById("btn-newsletter");
const formDisplay = document.getElementById("form-newsletter");
const btnRemoveForm = document.getElementById("btn-remove");

if (btnDisplayForm) {
        btnDisplayForm.addEventListener("click", () => 
        formDisplay.classList.remove("d-none") + btnDisplayForm.classList.add("d-none")
        
    );

    btnRemoveForm.addEventListener("click", () => 
        formDisplay.classList.add("d-none") + btnDisplayForm.classList.remove("d-none")

    );
}



/* Gallery img */

let mainImg = document.querySelector("#main-img");
const galleryImg = document.querySelectorAll(".gallery img");

for (let i=0; i < galleryImg.length; i++) {
    galleryImg[i].addEventListener("mouseover", () => mainImg.src = galleryImg[i].src)

}


