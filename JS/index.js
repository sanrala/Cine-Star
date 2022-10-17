
// ---------------------------CAROUSEL AFFICHE---------------------------
const gapAffiche = 17;

const carouselAffiche = document.getElementById("carouselAffiche"),
    contentAffiche = document.getElementById("contentAffiche"),
    nextAffiche = document.getElementById("nextAffiche"),
    prevAffiche = document.getElementById("prevAffiche");

nextAffiche.addEventListener("click", e => {
    carouselAffiche.scrollBy(widthAffiche + gapAffiche, 0);

});


prevAffiche.addEventListener("click", e => {
    carouselAffiche.scrollBy(-(widthAffiche + gapAffiche), 0);

});

let widthAffiche = carouselAffiche.offsetWidth;
window.addEventListener("resize", e => (widthAffiche = carouselAffiche.offsetWidth));

// ---------------------------FIN CAROUSEL---------------------------

// ---------------------------CAROUSEL PERSONWEEK---------------------------
const gapPersonTendance = 17;

const carouselPersonTendance = document.getElementById("carouselPersonTendance"),
    contentPersonTendance = document.getElementById("contentPersonTendance"),
    nextPersonTendance = document.getElementById("nextPersonTendance"),
    prevPersonTendance = document.getElementById("prevPersonTendance");

nextPersonTendance.addEventListener("click", e => {
    carouselPersonTendance.scrollBy(widthPersonTendance + gapPersonTendance, 0);

});


prevPersonTendance.addEventListener("click", e => {
    carouselPersonTendance.scrollBy(-(widthPersonTendance + gapPersonTendance), 0);

});

let widthPersonTendance = carouselPersonTendance.offsetWidth;
window.addEventListener("resize", e => (widthPersonTendance = carouselPersonTendance.offsetWidth));

// ---------------------------FIN CAROUSEL---------------------------


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

// ---------------------------CAROUSEL2---------------------------
const gapPlaying = 16;

const carouselPlaying = document.getElementById("carousel2"),
    contentPlaying = document.getElementById("content2"),
    nextPlaying = document.getElementById("next2"),
    prevPlaying = document.getElementById("prev2");

nextPlaying.addEventListener("click", e => {
    carouselPlaying.scrollBy(widthPlaying + gapPlaying, 0);

});
prevPlaying.addEventListener("click", e => {
    carouselPlaying.scrollBy(-(widthPlaying + gapPlaying), 0);

});

let widthPlaying = carouselPlaying.offsetWidth;
window.addEventListener("resize", e => (widthPlaying = carouselPlaying.offsetWidth));

// ---------------------------FIN CAROUSEL2---------------------------

// ---------------------------CAROUSELDISNEY+TV---------------------------
const gapDisneyTV = 16;

const carouselDisneyT = document.getElementById("carouselDisneyPlusTV"),
    contentDisneyTV = document.getElementById("contentDisneyPlusTV"),
    nextDisneyTV = document.getElementById("nextDisneyTV"),
    prevDisneyTV = document.getElementById("prevDisneyTV");

nextDisneyTV.addEventListener("click", e => {
    carouselDisneyT.scrollBy(widthDisneyTV + gapDisneyTV, 0);

});
prevDisneyTV.addEventListener("click", e => {
    carouselDisneyT.scrollBy(-(widthDisneyTV + gapDisneyTV), 0);

});

let widthDisneyTV = carouselDisneyT.offsetWidth;
window.addEventListener("resize", e => (widthDisneyTV = carouselDisneyT.offsetWidth));

// ---------------------------FIN DISNEY+TV---------------------------


// ---------------------------CAROUSELDISNEY+FILMS---------------------------
const gapDisneyMovie = 16;

const carouselDisneyM = document.getElementById("carouselDisneyMovie"),
    contentDisneyMovie = document.getElementById("contentDisneyMovie"),
    nextDisneyMovie = document.getElementById("nextDisneyMovie"),
    prevDisneyMovie = document.getElementById("prevDisneyMovie");

nextDisneyMovie.addEventListener("click", e => {
    carouselDisneyM.scrollBy(widthDisneyMovie + gapDisneyMovie, 0);

});
prevDisneyMovie.addEventListener("click", e => {
    carouselDisneyM.scrollBy(-(widthDisneyMovie + gapDisneyMovie), 0);

});

let widthDisneyMovie = carouselDisneyM.offsetWidth;
window.addEventListener("resize", e => (widthDisneyMovie = carouselDisneyM.offsetWidth));

// ---------------------------FIN DISNEY+FILM---------------------------

// ---------------------------CAROUSEL3---------------------------
const gapTopRated = 16;

const carouselTopRated = document.getElementById("carousel3"),
    contentTopRated = document.getElementById("content3"),
    nextTopRated = document.getElementById("next3"),
    prevTopRated = document.getElementById("prev3");

nextTopRated.addEventListener("click", e => {
    carouselTopRated.scrollBy(widthTopRated + gapTopRated, 0);

});
prevTopRated.addEventListener("click", e => {
    carouselTopRated.scrollBy(-(widthTopRated + gapTopRated), 0);

});

let widthTopRated = carouselTopRated.offsetWidth;
window.addEventListener("resize", e => (widthTopRated = carouselTopRated.offsetWidth));

// ---------------------------FIN CAROUSEL3---------------------------

// ---------------------------CAROUSEL4---------------------------
const gapUpComing = 16;

const carouselUpComing = document.getElementById("carousel4"),
    contentUpComing = document.getElementById("content4"),
    nextUpComing = document.getElementById("next4"),
    prevUpComing = document.getElementById("prev4");

nextUpComing.addEventListener("click", e => {
    carouselUpComing.scrollBy(widthUpComing + gapUpComing, 0);

});
prevUpComing.addEventListener("click", e => {
    carouselUpComing.scrollBy(-(widthUpComing + gapUpComing), 0);

});

let widthUpComing = carouselUpComing.offsetWidth;
window.addEventListener("resize", e => (widthUpComing = carouselUpComing.offsetWidth));

// ---------------------------FIN CAROUSEL4---------------------------

// ---------------------------CAROUSEL4---------------------------
const gapTopRatedTV = 16;

const carouselTopRatedTV = document.getElementById("carousel5"),
    contentTopRatedTV = document.getElementById("content5"),
    nextTopRatedTV = document.getElementById("next5"),
    prevTopRatedTV = document.getElementById("prev5");

nextTopRatedTV.addEventListener("click", e => {
    carouselTopRatedTV.scrollBy(widthTopRatedTV + gapTopRatedTV, 0);

});
prevTopRatedTV.addEventListener("click", e => {
    carouselTopRatedTV.scrollBy(-(widthTopRatedTV + gapTopRatedTV), 0);

});

let widthTopRatedTV = carouselTopRatedTV.offsetWidth;
window.addEventListener("resize", e => (widthTopRatedTV = carouselTopRatedTV.offsetWidth));

// ---------------------------FIN CAROUSEL4---------------------------

// ---------------------------CAROUSEL AP FILM---------------------------
const gapAPM = 16;

const carouselAPM = document.getElementById("carouselAPM"),
    contentAPM = document.getElementById("contentAPM"),
    nextAPM = document.getElementById("nextAPM"),
    prevAPM = document.getElementById("prevAPM");

nextAPM.addEventListener("click", e => {
    carouselAPM.scrollBy(widthAPM + gapAPM, 0);

});
prevAPM.addEventListener("click", e => {
    carouselAPM.scrollBy(-(widthAPM + gapAPM), 0);

});

let widthAPM = carouselAPM.offsetWidth;
window.addEventListener("resize", e => (widthAPM = carouselAPM.offsetWidth));

// ---------------------------FIN AP FILM---------------------------

// ---------------------------CAROUSEL AP TV---------------------------
const gapAPTV = 16;

const carouselAPTV = document.getElementById("carouselAPTV"),
    contentAPTV = document.getElementById("contentAPTV"),
    nextAPTV = document.getElementById("nextAPTV"),
    prevAPTV = document.getElementById("prevAPTV");

nextAPTV.addEventListener("click", e => {
    carouselAPTV.scrollBy(widthAPTV + gapAPTV, 0);

});
prevAPTV.addEventListener("click", e => {
    carouselAPTV.scrollBy(-(widthAPTV + gapAPTV), 0);

});

let widthAPTV = carouselAPTV.offsetWidth;
window.addEventListener("resize", e => (widthAPTV = carouselAPTV.offsetWidth));

// ---------------------------FIN AP TV---------------------------

// ---------------------------CAROUSEL canal TV---------------------------
const gapCanalTV = 16;

const carouselCanalTV = document.getElementById("carouselCanalTV"),
    contentCanalTV = document.getElementById("contentCanalTV"),
    nextCanalTV = document.getElementById("nextCTV"),
    prevCanalTV = document.getElementById("prevCTV");

nextCanalTV.addEventListener("click", e => {
    carouselCanalTV.scrollBy(widthCanalTV + gapCanalTV, 0);

});
prevCanalTV.addEventListener("click", e => {
    carouselCanalTV.scrollBy(-(widthCanalTV + gapCanalTV), 0);

});

let widthCanalTV = carouselCanalTV.offsetWidth;
window.addEventListener("resize", e => (widthCanalTV = carouselCanalTV.offsetWidth));

// ---------------------------FIN canal TV---------------------------

// ---------------------------CAROUSEL canal Movie---------------------------
const gapCanalMovie = 16;

const carouselCanalMovie = document.getElementById("carouselCanalMovie"),
    contentCanalMovie = document.getElementById("contentCanalMovie"),
    nextCanalMovie = document.getElementById("nextCanalMovie"),
    prevCanalMovie = document.getElementById("prevCanalMovie");

nextCanalMovie.addEventListener("click", e => {
    carouselCanalMovie.scrollBy(widthCanalMovie + gapCanalMovie, 0);

});
prevCanalMovie.addEventListener("click", e => {
    carouselCanalMovie.scrollBy(-(widthCanalMovie + gapCanalMovie), 0);

});

let widthCanalMovie = carouselCanalMovie.offsetWidth;
window.addEventListener("resize", e => (widthCanalMovie = carouselCanalMovie.offsetWidth));

// ---------------------------FIN canal movie---------------------------

// ---------------------------CAROUSEL canal serie---------------------------
const gapCanalSTV = 16;

const carouselCanalSTV = document.getElementById("carouselCanalSTV"),
    contentCanalSTV = document.getElementById("contentCanalSTV"),
    nextCanalSTV = document.getElementById("nextCanalSTV"),
    prevCanalSTV = document.getElementById("prevCanalSTV");

nextCanalSTV.addEventListener("click", e => {
    carouselCanalSTV.scrollBy(widthCanalSTV + gapCanalSTV, 0);

});
prevCanalSTV.addEventListener("click", e => {
    carouselCanalSTV.scrollBy(-(widthCanalSTV + gapCanalSTV), 0);

});

let widthCanalSTV = carouselCanalSTV.offsetWidth;
window.addEventListener("resize", e => (widthCanalSTV = carouselCanalSTV.offsetWidth));

// ---------------------------FIN canal serie---------------------------

// ---------------------------CAROUSEL AFFICHE---------------------------
const gapManga = 16;

const carouselManga = document.getElementById("carouselManga"),
    contentManga = document.getElementById("contentManga"),
    nextManga = document.getElementById("nextManga"),
    prevManga = document.getElementById("prevManga");

nextManga.addEventListener("click", e => {
    carouselManga.scrollBy(widthManga + gapManga, 0);

});


prevManga.addEventListener("click", e => {
    carouselManga.scrollBy(-(widthManga + gapManga), 0);

});

let widthManga = carouselManga.offsetWidth;
window.addEventListener("resize", e => (widthManga = carouselManga.offsetWidth));

// ---------------------------FIN CAROUSEL---------------------------
