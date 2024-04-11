
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
        searchField.classList.remove("d-none") + 
        searchField.classList.add("load-top") +
        btnDisplaySearching.classList.add("d-none")
        );

        btnRemoveField.addEventListener("click", () => 
        searchField.classList.add("d-none") + 
        btnDisplaySearching.classList.remove("d-none") +
        btnDisplaySearching.classList.add("load-down")
        );
}



/* Newsletter form */

const btnDisplayForm = document.getElementById("btn-newsletter");
const formDisplay = document.getElementById("form-newsletter");
const btnRemoveForm = document.getElementById("btn-remove");

if (btnDisplayForm) {
        btnDisplayForm.addEventListener("click", () => 
        formDisplay.classList.remove("d-none") +
        formDisplay.classList.add("fade-in") +  
        btnDisplayForm.classList.add("d-none")
        
    );

    btnRemoveForm.addEventListener("click", () => 
        formDisplay.classList.add("d-none") +
        btnDisplayForm.classList.remove("d-none") 
    );
}


/* Gallery img & modal */

let mainImg = document.querySelector("#main-img");
const galleryImg = document.querySelectorAll(".gallery img");
let modalImg = document.querySelector("#modal-img");

for (let i=0; i < galleryImg.length; i++) {
    galleryImg[i].addEventListener("mouseover", () => mainImg.src = galleryImg[i].src)

}

if(mainImg) {
    mainImg.addEventListener("click", () =>
    modalImg.src = mainImg.src
    )
}

  


/* Admin section */


/* section 1 */

const btnAdminSection1 = document.getElementById("btn-section1");
const btnRemoveAdminSection1 = document.getElementById("btn-section1-remove");
const adminSection1 = document.getElementById("section1");


if (btnAdminSection1) {
        btnAdminSection1.addEventListener("click", () => 
        adminSection1.classList.remove("d-none") +
        adminSection1.classList.add("load-top") +  
        btnAdminSection1.classList.add("rotate-90") +
        btnAdminSection1.classList.add("active")
        
    );
        btnRemoveAdminSection1.addEventListener("click", () => 
        adminSection1.classList.add("d-none") +
        btnAdminSection1.classList.remove("rotate-90")
    );
}


/* section 2 */

const btnAdminSection2 = document.getElementById("btn-section2");
const btnRemoveAdminSection2 = document.getElementById("btn-section2-remove");
const adminSection2 = document.getElementById("section2");


if (btnAdminSection2) {
        btnAdminSection2.addEventListener("click", () => 
        adminSection2.classList.remove("d-none") +
        adminSection2.classList.add("load-top") +  
        btnAdminSection2.classList.add("rotate-90") +
        btnAdminSection2.classList.add("active")
        
    );
        btnRemoveAdminSection2.addEventListener("click", () => 
        adminSection2.classList.add("d-none") +
        btnAdminSection2.classList.remove("rotate-90")
    );
}

/* section 3 */

const btnAdminSection3 = document.getElementById("btn-section3");
const btnRemoveAdminSection3 = document.getElementById("btn-section3-remove");
const adminSection3 = document.getElementById("section3");


if (btnAdminSection3) {
        btnAdminSection3.addEventListener("click", () => 
        adminSection3.classList.remove("d-none") +
        adminSection3.classList.add("load-top") +  
        btnAdminSection3.classList.add("rotate-90") +
        btnAdminSection3.classList.add("active")
        
    );
        btnRemoveAdminSection3.addEventListener("click", () => 
        adminSection3.classList.add("d-none") +
        btnAdminSection3.classList.remove("rotate-90")
    );
}

/* section 4 */

const btnAdminSection4 = document.getElementById("btn-section4");
const btnRemoveAdminSection4 = document.getElementById("btn-section4-remove");
const adminSection4 = document.getElementById("section4");


if (btnAdminSection4) {
        btnAdminSection4.addEventListener("click", () => 
        adminSection4.classList.remove("d-none") +
        adminSection4.classList.add("load-top") +  
        btnAdminSection4.classList.add("rotate-90") +
        btnAdminSection4.classList.add("active")
        
    );
        btnRemoveAdminSection4.addEventListener("click", () => 
        adminSection4.classList.add("d-none") +
        btnAdminSection4.classList.remove("rotate-90")
    );
}

/* section 5 */

const btnAdminSection5 = document.getElementById("btn-section5");
const btnRemoveAdminSection5 = document.getElementById("btn-section5-remove");
const adminSection5 = document.getElementById("section5");


if (btnAdminSection5) {
        btnAdminSection5.addEventListener("click", () => 
        adminSection5.classList.remove("d-none") +
        adminSection5.classList.add("load-top") +  
        btnAdminSection5.classList.add("rotate-90") +
        btnAdminSection5.classList.add("active")
        
    );
        btnRemoveAdminSection5.addEventListener("click", () => 
        adminSection5.classList.add("d-none") +
        btnAdminSection4.classList.remove("rotate-90")
    );
}


/* wysiwyg script */

tinymce.init({
    selector: 'textarea#editor',
    skin: 'bootstrap', //The TinyMCE Bootstrap skin
    plugins: 'lists, link, image, media',
toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
menubar: false,
setup: (editor) => {
    // Apply the focus effect
    editor.on("init", () => {
    editor.getContainer().style.transition = "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
        });
    editor.on("focus", () => { (editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)"),
    (editor.getContainer().style.borderColor = "#80bdff");
        });
    editor.on("blur", () => {
    (editor.getContainer().style.boxShadow = ""),
    (editor.getContainer().style.borderColor = "");
    });
    },
});   