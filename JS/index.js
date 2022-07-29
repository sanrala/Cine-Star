
const searchInput = document.querySelector('#search');
let search = fetch('https://api.themoviedb.org/3/search/multi?api_key=e0e252f245f519ae01af7682ea83a642&language=en-US&page=1&include_adult=false&query=' + searchInput);
search.then(async response => {
    try {
        let searchAPI = await response.json();
        console.log(searchAPI);
        searchInput.addEventListener('keyup', function (event) {

            const input = searchInput.value
            const result = search.filter(item => item.title.toLocalLowerCase().includes(input.toLocalLowerCase()))

            let suggestions = '';
            const a = document.createElement('a')
            a.classList.add('seeMore')


            a.style.textDecoration = "none";
            if (input != '') {
                result.forEach(search =>
                    a.innerText += search.title
                )
            }
            a.href = `./cine1_resume.php?id=${search.id}&with_genres=${search.genre_ids}&type=movie&person=${search.person_id}`
        })

    } catch (error) {
        console.log(error);
    }
})




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







// -----------------------------CAROUSEL AFFICHE------------------
const newCarouselAffiche = document.querySelector('#contentAffiche')

let movieAffiche = fetch('https://api.themoviedb.org/3/trending/all/day?api_key=e0e252f245f519ae01af7682ea83a642');
movieAffiche.then(async response => {
    try {
        let movieNowAffiche = await response.json();

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

    if (movieAffiche.media_type === 'movie') {

        const li = document.createElement('li')
        li.classList.add('item-a')

        const box = document.createElement('div')
        box.classList.add('boxAffiche')

        const slide = document.createElement('div')
        slide.classList.add('slideAffiche-img')

        const imgScreen1 = document.createElement('img')
        imgScreen1.classList.add('item')
        imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + movieAffiche.poster_path;

        const overlay = document.createElement('div')
        overlay.classList.add('overlaySliderAffiche')

        const a = document.createElement('a')
        a.classList.add('seeMore')
        a.href = `./cine1_resume.php?id=${movieAffiche.id}&with_genres=${movieAffiche.genre_ids}&type=movie&person=${movieAffiche.person_id}`
        a.innerText = "Voir détails..."
        a.style.textDecoration = "none";

        const detailsBox = document.createElement('div')
        detailsBox.classList.add('details-box')

        const type = document.createElement('div')
        type.classList.add('type')







        overlay.append(a);
        slide.append(imgScreen1, overlay)
        box.append(slide,
            detailsBox
        )
        detailsBox.append(type)

        li.append(box)

        return li;

    } else {
        const li = document.createElement('li')
        li.classList.add('item-a')

        const box = document.createElement('div')
        box.classList.add('boxAffiche')

        const slide = document.createElement('div')
        slide.classList.add('slideAffiche-img')

        const imgScreen1 = document.createElement('img')
        imgScreen1.classList.add('item')
        imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + movieAffiche.poster_path;

        const overlay = document.createElement('div')
        overlay.classList.add('overlaySliderAffiche')

        const a = document.createElement('a')
        a.classList.add('seeMore')
        a.href = `./cine1_resume.php?id=${movieAffiche.id}&with_genres=${movieAffiche.genre_ids}&type=tv`
        a.innerText = "Voir détails..."
        a.style.textDecoration = "none";

        const detailsBox = document.createElement('div')
        detailsBox.classList.add('details-box')

        const type = document.createElement('div')
        type.classList.add('type')







        overlay.append(a);
        slide.append(imgScreen1, overlay)
        box.append(slide,
            detailsBox
        )
        detailsBox.append(type)

        li.append(box)

        return li;
    }

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
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${movie.id}&with_genres=${movie.genre_ids}&type=movie`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.classList.add('nameMovies')
    aType.innerText = movie.title;
    aType.style.fontSize = ('0.9rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${movie.id}&with_genres=${movie.genre_ids}&type=movie`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
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
        , aVote

    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL FILMS POULAIRES---------------

// ------------------CAROUSEL SERIES DISNEY PLUS---------------

const carouselDisneyTV = document.querySelector('#contentDisneyPlusTV')

let disneyPlusTV = fetch('https://api.themoviedb.org/3/discover/tv?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=337&watch_region=FR');
disneyPlusTV.then(async response => {
    try {
        let actualDisneyPlusTV = await response.json();

        let recentDisneyPlusTV = actualDisneyPlusTV.results;

        const actualDisneyTVNode = recentDisneyPlusTV.map(disneyPlusTV => {
            return createDisneyTV(disneyPlusTV)
        })
        carouselDisneyTV.append(...actualDisneyTVNode);
    } catch (error) {
        console.log(error);
    }
})



const createDisneyTV = (disneyPlusTV) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + disneyPlusTV.poster_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${disneyPlusTV.id}&with_genres=${disneyPlusTV.genre_ids}&type=tv`
    a.style.textDecoration = "none";


    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.classList.add('nameMovies')
    aType.innerText = disneyPlusTV.name;
    aType.style.fontSize = ('1rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${disneyPlusTV.id}&with_genres=${disneyPlusTV.genre_ids}&type=tv`


    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + disneyPlusTV.first_air_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType
        , aVote

    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSELSERIES DISNEY PLUS---------------

// ------------------CAROUSEL FILMS DISNEY PLUS---------------

const carouselDisneyMovie = document.querySelector('#contentDisneyMovie')

let disneyMovie = fetch('https://api.themoviedb.org/3/discover/movie?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=337&watch_region=FR');
disneyMovie.then(async response => {
    try {
        let actualDisneyMovie = await response.json();

        let recentDisneyMovie = actualDisneyMovie.results;

        const actualDisneyMovieNode = recentDisneyMovie.map(disneyMovie => {
            return createDisneyMovie(disneyMovie)
        })
        carouselDisneyMovie.append(...actualDisneyMovieNode);
    } catch (error) {
        console.log(error);
    }
})



const createDisneyMovie = (disneyMovie) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('boxDisneyMovie')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + disneyMovie.backdrop_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${disneyMovie.id}&with_genres=${disneyMovie.genre_ids}&type=movie`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = disneyMovie.title;
    aType.style.fontSize = ('1.2rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${disneyMovie.id}&with_genres=${disneyMovie.genre_ids}&type=movie`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + disneyMovie.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType
        , aVote

    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL FILMS DISNEY PLUS---------------

// ------------------CAROUSEL 2 FILMS TV POPULARE---------------

const newCarousel2 = document.querySelector('#content2')

let TVPlay = fetch('https://api.themoviedb.org/3/tv/popular?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1');
TVPlay.then(async response => {
    try {
        let playingNowTV = await response.json();

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
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${TVPlay.id}&with_genres=${TVPlay.genre_ids}&type=tv`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.classList.add('nameMovies')
    aType.innerText = TVPlay.name;
    aType.style.fontSize = ('0.9rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${TVPlay.id}&with_genres=${TVPlay.genre_ids}&type=tv`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + TVPlay.first_air_date
    aVote.style.fontSize = '0.8rem'
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType

        , aVote
    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL FILMS NOW PLAYING---------------


// ------------------CAROUSEL 3 FILMS NETFLIX---------------

const newCarousel3 = document.querySelector('#content3')

let netflixMovie = fetch('https://api.themoviedb.org/3/discover/movie?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=8&watch_region=FR');
netflixMovie.then(async response => {
    try {
        let topNetflixMovie = await response.json();

        let recentNetflixMovie = topNetflixMovie.results;

        const netflixMovieNode = recentNetflixMovie.map(netflixMovie => {
            return createTopRated(netflixMovie)
        })
        newCarousel3.append(...netflixMovieNode);
    } catch (error) {
        console.log(error);
    }
})



const createTopRated = (netflixMovie) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + netflixMovie.poster_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${netflixMovie.id}&with_genres=${netflixMovie.id}&type=movie`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.classList.add('nameMovies')
    aType.innerText = netflixMovie.title;
    aType.style.fontSize = ('0.9rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${netflixMovie.id}&with_genres=${netflixMovie.id}&type=movie`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + netflixMovie.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType

        , aVote
    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL FILMS NETFLIX---------------

// ------------------CAROUSEL 3 FILMS UPCOMING---------------

const newCarousel4 = document.querySelector('#content4')

let upComing = fetch('https://api.themoviedb.org/3/discover/movie?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&release_date.gte=2022-07-22&release_date.lte=2023-01-30&region=FR https://api.themoviedb.org/3/discover/movie?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&primary_release_date.gte=2022-07-22&primary_release_date.lte=2023-01-30&region=FR');
upComing.then(async response => {
    try {
        let upComingMovie = await response.json();

        let recentupComingMovie = upComingMovie.results;


        const upComingNode = recentupComingMovie.map(upComing => {
            return createupComing(upComing)
        })

        newCarousel4.append(...upComingNode);
    } catch (error) {
        console.log(error);
    }
})







const createupComing = (upComing) => {




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
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${upComing.id}&with_genres=${upComing.genre_ids}&type=movie`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.classList.add('nameMovies')
    aType.innerText = upComing.title;
    aType.style.fontSize = ('0.9rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${upComing.id}&with_genres=${upComing.genre_ids}&type=movie`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
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
// ------------------FIN CAROUSEL FILMS UPCOMING---------------


// ------------------CAROUSEL 3 NETFLIX TV---------------

const newCarousel5 = document.querySelector('#content5')

let netflixTV = fetch('https://api.themoviedb.org/3/discover/tv?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=8&watch_region=FR');
netflixTV.then(async response => {
    try {
        let netflixTV = await response.json();

        let recentNetflixTV = netflixTV.results;

        const netflixTVNode = recentNetflixTV.map(netflixTV => {
            return createNetflixTV(netflixTV)
        })
        newCarousel5.append(...netflixTVNode);
    } catch (error) {
        console.log(error);
    }
})



const createNetflixTV = (netflixTV) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('boxTopRatedTV')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + netflixTV.backdrop_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${netflixTV.id}&with_genres=${netflixTV.genre_ids}&type=tv`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = netflixTV.name;
    aType.style.fontSize = ('1.2rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${netflixTV.id}&with_genres=${netflixTV.genre_ids}&type=tv`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + netflixTV.first_air_date
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
// ------------------FIN CAROUSEL NETFLIX TV---------------

// ------------------CAROUSEL 3 FILMS AMAZON PRIMES---------------

const newCarouselAPM = document.querySelector('#contentAPM')

let APMovie = fetch('https://api.themoviedb.org/3/discover/movie?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=119&watch_region=FR');
APMovie.then(async response => {
    try {
        let topAPMovie = await response.json();

        let recentAPMovie = topAPMovie.results;

        const APMovieNode = recentAPMovie.map(APMovie => {
            return createAPM(APMovie)
        })
        newCarouselAPM.append(...APMovieNode);
    } catch (error) {
        console.log(error);
    }
})



const createAPM = (APMovie) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + APMovie.poster_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${APMovie.id}&with_genres=${APMovie.id}&type=movie`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.classList.add('nameMovies')
    aType.innerText = APMovie.title;
    aType.style.fontSize = ('0.9rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${APMovie.id}&with_genres=${APMovie.id}&type=movie`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + APMovie.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType

        , aVote
    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL FILMS AMAZON PRIME---------------


// ------------------CAROUSEL 3 SERIES AMAZON PRIMES---------------

const newCarouselAPTV = document.querySelector('#contentAPTV')

let APTV = fetch('https://api.themoviedb.org/3/discover/tv?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=119&watch_region=FR');
APTV.then(async response => {
    try {
        let topAPTV = await response.json();

        let recentAPTV = topAPTV.results;

        const APTVNode = recentAPTV.map(APTV => {
            return createAPTV(APTV)
        })
        newCarouselAPTV.append(...APTVNode);
    } catch (error) {
        console.log(error);
    }
})



const createAPTV = (APTV) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('boxAPTV')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + APTV.backdrop_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${APTV.id}&with_genres=${APTV.id}&type=tv`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = APTV.name;
    aType.style.fontSize = ('1.2rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${APTV.id}&with_genres=${APTV.id}&type=tv`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + APTV.first_air_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType

        , aVote
    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL SERIES AMAZON PRIME---------------


// ------------------CAROUSEL 3 SERIES CANAL+---------------

const newCarouselCanalTV = document.querySelector('#contentCanalTV')

let CanalTV = fetch('https://api.themoviedb.org/3/discover/tv?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=381&watch_region=FR');
CanalTV.then(async response => {
    try {
        let topCanalTV = await response.json();

        let recentCanalTV = topCanalTV.results;

        const CanalTVNode = recentCanalTV.map(CanalTV => {
            return createCanalTV(CanalTV)
        })
        newCarouselCanalTV.append(...CanalTVNode);
    } catch (error) {
        console.log(error);
    }
})



const createCanalTV = (CanalTV) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + CanalTV.poster_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${CanalTV.id}&with_genres=${CanalTV.id}&type=tv`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.classList.add('nameMovies')
    aType.innerText = CanalTV.name;
    aType.style.fontSize = ('0.9rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${CanalTV.id}&with_genres=${CanalTV.id}&type=tv`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + CanalTV.first_air_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType

        , aVote
    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL SERIES CANAL+---------------

// ------------------CAROUSEL 3 FILMS CANAL+---------------

const newCarouselCanalMovie = document.querySelector('#contentCanalMovie')

let CanalMovie = fetch('https://api.themoviedb.org/3/discover/movie?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=381&watch_region=FR');
CanalMovie.then(async response => {
    try {
        let topCanalMovie = await response.json();

        let recentCanalMovie = topCanalMovie.results;

        const CanalMovieNode = recentCanalMovie.map(CanalMovie => {
            return createCanalMovie(CanalMovie)
        })
        newCarouselCanalMovie.append(...CanalMovieNode);
    } catch (error) {
        console.log(error);
    }
})



const createCanalMovie = (CanalMovie) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + CanalMovie.poster_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${CanalMovie.id}&with_genres=${CanalMovie.id}&type=movie`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.classList.add('nameMovies')
    aType.innerText = CanalMovie.title;
    aType.style.fontSize = ('0.9rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${CanalMovie.id}&with_genres=${CanalMovie.id}&type=movie`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + CanalMovie.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType

        , aVote
    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL FILMS CANAL+---------------

// ------------------CAROUSEL 3 SERIES CANAL SERIES---------------

const newCarouselCanalSTV = document.querySelector('#contentCanalSTV')

let CanalSTV = fetch('https://api.themoviedb.org/3/discover/tv?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=345&watch_region=FR');
CanalSTV.then(async response => {
    try {
        let topCanalSTV = await response.json();

        let recentCanalSTV = topCanalSTV.results;

        const CanalSTVNode = recentCanalSTV.map(CanalSTV => {
            return createCanalSTV(CanalSTV)
        })
        newCarouselCanalSTV.append(...CanalSTVNode);
    } catch (error) {
        console.log(error);
    }
})



const createCanalSTV = (CanalSTV) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('boxCanalSTV')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + CanalSTV.backdrop_path;

    const overlay = document.createElement('div')
    overlay.classList.add('overlaySlider')

    const a = document.createElement('a')
    a.classList.add('seeMore')
    a.innerText = "Voir détails..."
    a.href = `./cine1_resume.php?id=${CanalSTV.id}&with_genres=${CanalSTV.id}&type=tv`
    a.style.textDecoration = "none";

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.classList.add('nameMovies')
    aType.innerText = CanalSTV.name;
    aType.style.fontSize = ('1.2rem')
    aType.style.textDecoration = 'none'
    aType.style.color = "white"
    aType.style.textAlign = 'center'
    aType.href = `./cine1_resume.php?id=${CanalSTV.id}&with_genres=${CanalSTV.id}&type=tv`



    const aVote = document.createElement('a')
    aVote.classList.add('dateDeSortie')
    aVote.innerText = "Date de sortie : " + CanalSTV.first_air_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a);
    slide.append(imgScreen1, overlay)
    box.append(slide,
        detailsBox
    )
    detailsBox.append(type)
    type.append(aType

        , aVote
    )
    li.append(box)

    return li;


}
// ------------------FIN CAROUSEL SERIES CANAL+---------------