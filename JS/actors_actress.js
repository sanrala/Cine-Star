
function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}

// ---------------------------CAROUSEL---------------------------
const gap = 16;

const carousel = document.getElementById("carousel"),
    content = document.getElementById("content"),
    next = document.getElementById("next"),
    prev = document.getElementById("prev");

next.addEventListener("click", e => {
    carousel.scrollBy(width + gap, 0);

});
prev.addEventListener("click", e => {
    carousel.scrollBy(-(width + gap), 0);

});

let width = carousel.offsetWidth;
window.addEventListener("resize", e => (width = carousel.offsetWidth));

// ---------------------------FIN CAROUSEL---------------------------

// ---------------------------CAROUSEL DIAPOS---------------------------
const gapDiapo = 16;

const carouselDiapo = document.getElementById("carouselDiapo"),
    contentDiapo = document.getElementById("contentDiapo"),
    nextDiapo = document.getElementById("nextDiapo"),
    prevDiapo = document.getElementById("prevDiapo");

nextDiapo.addEventListener("click", e => {
    carouselDiapo.scrollBy(widthDiapo + gapDiapo, 0);

});
prevDiapo.addEventListener("click", e => {
    carouselDiapo.scrollBy(-(widthDiapo + gapDiapo), 0);

});

let widthDiapo = carouselDiapo.offsetWidth;
window.addEventListener("resize", e => (widthDiapo = carouselDiapo.offsetWidth));

// ---------------------------FIN CAROUSEL DIAPOS---------------------------

            // ------------------------------------FILMOGRAPHIES-----------------------------------




