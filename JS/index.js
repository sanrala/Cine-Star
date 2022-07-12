


// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-app.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyDopEBR4bbjewi6lvSlirK49p59JMcGTec",
    authDomain: "cinestars-aa75e.firebaseapp.com",
    projectId: "cinestars-aa75e",
    storageBucket: "cinestars-aa75e.appspot.com",
    messagingSenderId: "580492067329",
    appId: "1:580492067329:web:4b257ed89a531cfdf03600"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);


import { getDatabase, get, ref, set, child, update, remove }
    from "https://www.gstatic.com/firebasejs/9.8.3/firebase-database.js"

const db = getDatabase();





// BOUTON CONNEXION

document.getElementById("myBtn").onmouseover = function () { myFunction() };

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// FIN BOUTON CONNEXION


// ---------------------------CAROUSEL AFFICHE---------------------------
const gapAffiche = 29;

const carouselAffiche = document.getElementById("carouselAffiche"),
    contentAffiche = document.getElementById("contentAffiche"),
    nextAffiche = document.getElementById("nextAffiche"),
    prevAffiche = document.getElementById("prevAffiche");
//    setInterval(() => {
//     carouselAffiche.scrollBy(widthAffiche + gapAffiche, 0);
// }, 2000);
//  nextAffiche.addEventListener("click", e => {
//    carouselAffiche.scrollBy(widthAffiche + gapAffiche, 0);

//  });
prevAffiche.addEventListener("click", e => {
    carouselAffiche.scrollBy(-(widthAffiche + gapAffiche), 0);

});

let widthAffiche = carouselAffiche.offsetWidth;
window.addEventListener("resize", e => (widthAffiche = carouselAffiche.offsetWidth));

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


//liste Films

const films = [


]

const series = [




]

const aps = [


]



// function getAllFilms() {

// const filmsFirebase = fetch('https://cinestars-aa75e-default-rtdb.firebaseio.com/films.json')

// filmsFirebase.then(async response => {
//     try {
//         const filmsFromFirebase = await response.json();
//         console.log(filmsFromFirebase);
//         const filmNode = filmsFromFirebase.map(films => {

//             return createFilm(films)
//         });
//         film.innerHTML = ""
//         film.append(...filmNode)


//     } catch (e) {
//         console.log(e);
//     }
// })
// }
// function getAllSeries() {
//     const seriesFirebase = fetch('https://cinestars-aa75e-default-rtdb.firebaseio.com/series.json')
//     seriesFirebase.then(async response => {
//     try {
//         const seriesFromFirebase = await response.json();

//         const serieNode = seriesFromFirebase.map(series => {

//             return createSerie(series)
//         });
//         serie.innerHTML = ""
//         serie.append(...serieNode)


//     } catch (e) {
//         console.log(e);
//     }
// })
// }

// function getAllAPS() {
//     const apsFirebase = fetch('https://cinestars-aa75e-default-rtdb.firebaseio.com/aps.json')
//     apsFirebase.then(async response => {
//     try {
//         const APSFromFirebase = await response.json();

//         const apNode = APSFromFirebase.map(aps => {

//             return createFilm(aps)
//         });
//         ap.innerHTML = ""
//         ap.append(...apNode)


//     } catch (e) {
//         console.log(e);
//     }
// })
// }





// -----------------------------CAROUSEL AFFICHE------------------
const newCarouselAffiche = document.querySelector('#contentAffiche')

let movieAffiche = fetch('https://api.themoviedb.org/3/trending/all/day?api_key=e0e252f245f519ae01af7682ea83a642');
movieAffiche.then(async response => {
    try {
        let movieNowAffiche = await response.json();
        console.log(movieAffiche);
        let recentMovieAffiche = movieNowAffiche.results;

        const movieAfficheNode = recentMovieAffiche.map(movieAffiche => {
            return createMovieAffiche(movieAffiche)
        })
        newCarouselAffiche.append(...movieAfficheNode);
    } catch (error) {
        console.log(error);
    }
})



const createMovieAffiche = (movieAffiche) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('boxAffiche')

    const slide = document.createElement('div')
    slide.classList.add('slideAffiche-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('itemAffiche')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + movieAffiche.backdrop_path;



    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    // const a = document.createElement('a')
    // a.classList.add('love-btn')
    // a.innerText = "J'aime"



    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = movieAffiche.title;
    aType.style.fontSize = ('0.7rem')
    aType.href = `cine1_resume.html?id=${movieAffiche.id}`

    // const spanGenre = document.createElement('span')
    // spanGenre= movie.genre_ids;

    // const aVote = document.createElement('a')
    // aVote.innerText = "Date de sortie : " + movieAffiche.release_date
    // aVote.style.fontSize=('0.8rem')
    // aVote.style.color='#878484'




    slide.append(imgScreen1, overlay)
    box.append(slide)

    type.append(aType)
    li.append(box)
    // return aType
    return li;






    return slide;


}


// -----------------------------FIN CAROUSEL AFFICHE------------------



// ------------------CAROUSEL FILMS POULAIRES---------------







const newCarousel = document.querySelector('#content')

let movies = fetch('https://api.themoviedb.org/3/movie/popular?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1');
movies.then(async response => {
    try {
        let popularMovie = await response.json();

        let recentPopularMovie = popularMovie.results;

        const movieNode = recentPopularMovie.map(movie => {
            return createTop(movie)
        })
        newCarousel.append(...movieNode);
    } catch (error) {
        console.log(error);
    }
})



const createTop = (movie) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + movie.poster_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('love-btn')
    a.innerText = "J'aime"

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = movie.title;
    aType.style.fontSize = ('0.7rem')
    aType.href = `cine1_resume.html?id=${movie.id}`

    // const spanGenre = document.createElement('span')
    // spanGenre= movie.genre_ids;

    const aVote = document.createElement('a')
    aVote.innerText = "Date de sortie : " + movie.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType
        // , spanGenre
        , aVote
    )
    li.append(box)
    // return aType
    return li;


}
// ------------------FIN CAROUSEL FILMS POULAIRES---------------


// ------------------CAROUSEL 2 FILMS TV POPULARE---------------

const newCarousel2 = document.querySelector('#content2')

let TVPlay = fetch('https://api.themoviedb.org/3/tv/popular?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1');
TVPlay.then(async response => {
    try {
        let playingNowTV = await response.json();
        console.log(TVPlay);
        let recentPlayingTV = playingNowTV.results;

        const TVPlayNode = recentPlayingTV.map(TVPlay => {
            return createNowTV(TVPlay)
        })
        newCarousel2.append(...TVPlayNode);
    } catch (error) {
        console.log(error);
    }
})



const createNowTV = (TVPlay) => {
    // const imgAffiche = document.createElement('img')
    // imgAffiche.src ="https://image.tmdb.org/t/p/w500/" + moviePlay.backdrop_path;
    //  mainBody.append(imgAffiche).length
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + TVPlay.poster_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('love-btn')
    a.innerText = "J'aime"

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = TVPlay.title;
    aType.style.fontSize = '0.8rem'
    aType.href = `cine1_resume.html?id=${TVPlay.id}`

    // const spanGenre = document.createElement('span')
    // spanGenre= movie.genre_ids;

    const aVote = document.createElement('a')
    aVote.innerText = "Date de sortie : " + TVPlay.release_date
    aVote.style.fontSize = '0.8rem'
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType
        // , spanGenre
        , aVote
    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL FILMS NOW PLAYING---------------


// ------------------CAROUSEL 3 FILMS NOW PLAYING---------------

const newCarousel3 = document.querySelector('#content3')

let topRated = fetch('https://api.themoviedb.org/3/movie/top_rated?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1');
topRated.then(async response => {
    try {
        let topRatedMovie = await response.json();

        let recentTopRatedMovie = topRatedMovie.results;

        const topRatedNode = recentTopRatedMovie.map(topRated => {
            return createTopRated(topRated)
        })
        newCarousel3.append(...topRatedNode);
    } catch (error) {
        console.log(error);
    }
})



const createTopRated = (topRated) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + topRated.poster_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('love-btn')
    a.innerText = "J'aime"

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = topRated.title;
    aType.style.fontSize = ('0.8rem')
    aType.style.fontSize = ('0.8rem')
    aType.href = `cine1_resume.html?id=${topRated.id}`

    // const spanGenre = document.createElement('span')
    // spanGenre= movie.genre_ids;

    const aVote = document.createElement('a')
    aVote.innerText = "Date de sortie : " + topRated.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType
        // , spanGenre
        , aVote
    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL FILMS TOP RATED---------------

// ------------------CAROUSEL 3 FILMS UPCOMING---------------

const newCarousel4 = document.querySelector('#content4')

let upComing = fetch('https://api.themoviedb.org/3/movie/upcoming?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1');
upComing.then(async response => {
    try {
        let upComingMovie = await response.json();

        let recentupComingMovie = upComingMovie.results;
        console.log(recentupComingMovie);

        const upComingNode = recentupComingMovie.map(upComing => {
            return createupComing(upComing)
        })

        newCarousel4.append(...upComingNode);
    } catch (error) {
        console.log(error);
    }
})


function selectAllData() {
    let dateUpComing = fetch('https://api.themoviedb.org/3/movie/upcoming?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1')
        .then(async response => {

            try {
                const dateUptComing = await response.json();
                let dateUp = dateUptComing.dates
                console.log(dateUp);

            } catch (e) {
                console.log(e);
            }
        })
}
selectAllData()
// const todayTimeStamp = Date.now()
// console.log(todayTimeStamp)
// const todayTimeStampUpComing = Date.now(upComing.release_date )
// console.log(todayTimeStampUpComing)


const createupComing = (upComing, dateUpComing) => {
    // if (todayTimeStamp >= todayTimeStampUpComing ) { //timestamp

    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + upComing.poster_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('love-btn')
    a.innerText = "J'aime"

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = topRated.title;
    aType.style.fontSize = ('0.8rem')
    aType.style.fontSize = ('0.8rem')
    aType.href = `cine1_resume.html?id=${upComing.id}`

    // const spanGenre = document.createElement('span')
    // spanGenre= movie.genre_ids;

    const aVote = document.createElement('a')
    aVote.innerText = "Date de sortie : " + upComing.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType
        // , spanGenre
        , aVote
    )
    li.append(box)

    return li;
}

// }
// ------------------FIN CAROUSEL FILMS TOP RATED---------------

let affichage = false;
let myfilms = document.querySelector('.films')

const film = document.querySelector('.actually_films')



const displayFilms = (test, affichage, ok) => {
    if (affichage) {
        myfilms.innerHTML = ''

        myfilms.style.color = "white"

    } else if (ok) {

    }

    else {

        const filmNode = test.map(films => {

            return createFilm(films)
        });
        film.innerHTML = ""
        film.append(...filmNode)
    }

}



const createFilm = (films) => {


    const link = document.createElement('a');
    link.href = `cine1_resume.html?id=${films.id - 1}`
    // &cat=series

    const imgFilm = document.createElement('img')
    imgFilm.src = films.img
    imgFilm.style.width = "150px"
    imgFilm.style.height = "200px"
    imgFilm.alt = films.titre


    link.appendChild(imgFilm)



    return link
    film.append(link)
}

// displayFilms(films, affichage)
// getAllFilms()






// liste Series
const serie = document.querySelector('.actually_series')
let myseries = document.querySelector('.series')



const displaySeries = (ser, aff, ok) => {



    if (aff) {

        myseries.innerHTML = ''
        myseries.style.color = "white"
    } else if (ok) {

    }

    else {
        const serieNode = ser.map(series => {

            return createSerie(series)
        });
        serie.innerHTML = ""

        serie.append(...serieNode)
    }

}



const createSerie = (series) => {
    const a = document.createElement('a')
    a.href = films.lien


    const imgSerie = document.createElement('img')
    imgSerie.src = series.img
    imgSerie.style.width = "150px"
    imgSerie.style.height = "200px"
    //   imgSerie.alt= series.titre
    imgSerie.alt = series.titre
    a.href = series.lien
    a.append(imgSerie)
    return a

    //   serie.append(a, imgSerie)

    return imgSerie
}
// displaySeries(series, affichage)
getAllSeries()






//   liste avantpremieres






const ap = document.querySelector('.actually_ap')
const apAll = document.querySelector('.avantpremieres')

const displayAP = (avpre, affichage, ok) => {

    if (affichage) {

        apAll.style.color = "white"
        apAll.innerHTML = ""
    } else if (ok) {

    }

    else {
        const apNode = avpre.map(aps => {

            return createAP(aps)
        });
        ap.innerHTML = ""
        ap.append(...apNode)
    }

}



const createAP = (aps) => {
    const a = document.createElement('a')


    const imgAPS = document.createElement('img')
    imgAPS.src = aps.img
    imgAPS.style.width = "150px"
    imgAPS.style.height = "200px"
    imgAPS.alt = aps.titre

    a.href = aps.lien
    a.append(imgAPS)
    return a




    return imgAPS
}

// displayAP(aps, affichage)
getAllAPS()





