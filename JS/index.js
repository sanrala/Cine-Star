





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


//liste Films

const films = [


]

const series = [




]

const aps = [


]








// -----------------------------CAROUSEL AFFICHE------------------
const newCarouselAffiche = document.querySelector('#contentAffiche')

let movieAffiche = fetch('https://api.themoviedb.org/3/trending/all/day?api_key=e0e252f245f519ae01af7682ea83a642');
movieAffiche.then(async response => {
    try {
        let movieNowAffiche = await response.json();
        console.log(movieAffiche);
        let recentMovieAffiche = movieNowAffiche.results;
        console.log(recentMovieAffiche);
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
        a.classList.add('loveAffiche-btn')
        a.innerText = "J'aime"

        const detailsBox = document.createElement('div')
        detailsBox.classList.add('details-box')

        const type = document.createElement('div')
        type.classList.add('type')

        const seeDetail = document.createElement('a')
        seeDetail.classList.add('overviewAffiche')
        seeDetail.href = `cine1_resume.html?id=${movieAffiche.id}&with_genres=${movieAffiche.genre_ids}&type=movie&person=${movieAffiche.person_id}`
        seeDetail.innerText = " Plus...";
        seeDetail.style.textDecoration = "none";





        overlay.append(a, seeDetail);
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
        a.classList.add('loveAffiche-btn')
        a.innerText = "J'aime"

        const detailsBox = document.createElement('div')
        detailsBox.classList.add('details-box')

        const type = document.createElement('div')
        type.classList.add('type')

        const seeDetail = document.createElement('a')
        seeDetail.classList.add('overviewAffiche')
        seeDetail.href = `cine1_resume.html?id=${movieAffiche.id}&with_genres=${movieAffiche.genre_ids}&type=tv`
        seeDetail.innerText = " Plus...";
        seeDetail.style.textDecoration = "none";





        overlay.append(a, seeDetail);
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
    a.classList.add('love-btn')
    a.innerText = "J'aime"

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = movie.title;
    aType.style.fontSize = ('0.7rem')
    aType.href = `cine1_resume.html?id=${movie.id}&with_genres=${movie.genre_ids}&type=movie`

    const seeDetail = document.createElement('a')
    seeDetail.classList.add('overview')
    seeDetail.href = `cine1_resume.html?id=${movie.id}&with_genres=${movie.genre_ids}&type=movie`
    seeDetail.innerText = " Plus...";
    seeDetail.style.textDecoration = "none";

    const aVote = document.createElement('a')
    aVote.innerText = "Date de sortie : " + movie.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a, seeDetail);
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
    aType.innerText = TVPlay.name;
    aType.style.fontSize = '0.8rem'
    aType.href = `cine1_resume.html?id=${TVPlay.id}&with_genres=${TVPlay.genre_ids}&type=tv`

    const seeDetail = document.createElement('a')
    seeDetail.classList.add('overview')
    seeDetail.href = `cine1_resume.html?id=${TVPlay.id}&with_genres=${TVPlay.genre_ids}&type=tv`
    seeDetail.innerText = " Plus...";
    seeDetail.style.textDecoration = "none";

    const aVote = document.createElement('a')
    aVote.innerText = "Date de sortie : " + TVPlay.first_air_date
    aVote.style.fontSize = '0.8rem'
    aVote.style.color = '#878484'



    overlay.append(a, seeDetail);
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
    aType.href = `cine1_resume.html?id=${topRated.id}&type=movie`

    const seeDetail = document.createElement('a')
    seeDetail.classList.add('overview')
    seeDetail.href = `cine1_resume.html?id=${topRated.id}&with_genres=${topRated.genre_ids}&type=movie`
    seeDetail.innerText = " Plus...";
    seeDetail.style.textDecoration = "none";

    const aVote = document.createElement('a')
    aVote.innerText = "Date de sortie : " + topRated.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a, seeDetail);
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
// ------------------FIN CAROUSEL FILMS TOP RATED---------------

// ------------------CAROUSEL 3 FILMS UPCOMING---------------

const newCarousel4 = document.querySelector('#content4')

let upComing = fetch('https://api.themoviedb.org/3/discover/movie?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&release_date.gte=2022-07-22&release_date.lte=2023-01-30&region=FR https://api.themoviedb.org/3/discover/movie?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&primary_release_date.gte=2022-07-22&primary_release_date.lte=2023-01-30&region=FR');
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
    a.classList.add('love-btn')
    a.innerText = "J'aime"

    const detailsBox = document.createElement('div')
    detailsBox.classList.add('details-box')

    const type = document.createElement('div')
    type.classList.add('type')

    const aType = document.createElement('a')
    aType.innerText = upComing.title;
    aType.style.fontSize = ('0.8rem')
    aType.style.fontSize = ('0.8rem')
    aType.href = `cine1_resume.html?id=${upComing.id}&with_genres=${upComing.genre_ids}&type=movie`

    const seeDetail = document.createElement('a')
    seeDetail.classList.add('overview')
    seeDetail.href = `cine1_resume.html?id=${upComing.id}&with_genres=${upComing.genre_ids}&type=movie`
    seeDetail.innerText = " Plus...";
    seeDetail.style.textDecoration = "none";

    const aVote = document.createElement('a')
    aVote.innerText = "Date de sortie : " + upComing.release_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a, seeDetail);
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


// ------------------CAROUSEL 3 FILMS RECOMMENDATIONS---------------

const newCarousel5 = document.querySelector('#content5')

let topRatedTV = fetch('https://api.themoviedb.org/3/tv/top_rated?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1');
topRatedTV.then(async response => {
    try {
        let topRatedTV = await response.json();

        let recentTopRatedTV = topRatedTV.results;

        const topRatedTVNode = recentTopRatedTV.map(topRatedTV => {
            return createTopRatedTV(topRatedTV)
        })
        newCarousel5.append(...topRatedTVNode);
    } catch (error) {
        console.log(error);
    }
})



const createTopRatedTV = (topRatedTV) => {
    const li = document.createElement('li')
    li.classList.add('item-a')

    const box = document.createElement('div')
    box.classList.add('box')

    const slide = document.createElement('div')
    slide.classList.add('slide-img')

    const imgScreen1 = document.createElement('img')
    imgScreen1.classList.add('item')
    imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + topRatedTV.poster_path;

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
    aType.innerText = topRatedTV.name;
    aType.style.fontSize = ('0.8rem')
    aType.style.fontSize = ('0.8rem')
    aType.href = `cine1_resume.html?id=${topRatedTV.id}&type=tv`

    const seeDetail = document.createElement('a')
    seeDetail.classList.add('overview')
    seeDetail.href = `cine1_resume.html?id=${topRatedTV.id}&with_genres=${topRatedTV.genre_ids}&type=tv`
    seeDetail.innerText = " Plus...";
    seeDetail.style.textDecoration = "none";

    const aVote = document.createElement('a')
    aVote.innerText = "Date de sortie : " + topRatedTV.first_air_date
    aVote.style.fontSize = ('0.8rem')
    aVote.style.color = '#878484'



    overlay.append(a, seeDetail);
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
// ------------------FIN CAROUSEL FILMS RECOMMENDATIONS---------------









