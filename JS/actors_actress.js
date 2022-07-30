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

window.onload = () => {
    console.log(window);
    const urlSearchParams = new URLSearchParams(window.location.search)
    const params = Object.fromEntries(urlSearchParams.entries())
    console.log(params);


    const profile = document.querySelector('.profile')
    const infoProfile = document.querySelector('.info_profile')
    const biography = document.querySelector('.biography')
    const infoLife = document.querySelector('.info_life')

    let person = fetch(' https://api.themoviedb.org/3/person/' + params.id + '?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR');
    person.then(async response => {
        try {
            let personMovie = await response.json();
            let newPersonMovie = personMovie.cast;
            console.log(personMovie);


            const imgProfile = document.createElement('img')
            imgProfile.classList.add('item')
            imgProfile.src = "https://image.tmdb.org/t/p/w500/" + personMovie.profile_path;

            const h2Name = document.createElement('h2');
            h2Name.innerText = personMovie.name;
            h2Name.style.color = 'orange';

            const p = document.createElement('p');
            p.classList.add('contentP')
            if (personMovie.biography === "") {
                p.innerText = "Biographie inconnu pour le moment";
                p.style.color = 'red';
            } else {

                p.innerText = personMovie.biography;
                p.style.color = 'white';
            }

            let birth = personMovie.birthday;
            const nDate = Date.parse(birth)

            const newNDate = new Date(nDate);

            const g = newNDate.getFullYear()


            function getAge(date) {
                let diff = Date.now() - date.getTime();
                let age = new Date(diff);
                return Math.abs(age.getUTCFullYear() - 1970);
            }





            let death = personMovie.deathday;
            const aDate = Date.parse(death)

            const newDate = new Date(aDate);

            const z = newDate.getFullYear()


            function getAgeDead() {


                let age = z - g
                console.log(age);
                return age;
            }




            const spanBirth = document.createElement('span');

            if (personMovie.birthday === null) {
                spanBirth.innerText = " ";
            } else if (personMovie.deathday != null) {
                (personMovie.birthday === null)
                spanBirth.innerText = "Né(e) le : " + personMovie.birthday;
            } else {
                spanBirth.innerText = "Né(e) le : " + personMovie.birthday + " ( " + getAge(new Date(birth)) + " ans) "
            }

            const spanDeath = document.createElement('span');

            if (personMovie.deathday === null) {
                spanDeath.innerText = "";
            } else {
                spanDeath.innerText = "décédé(e) le : " + personMovie.deathday + " ( " + getAgeDead(new Date(birth)) + " ans) ";
            }


            const spanPlaceOfBirth = document.createElement('span');
            if (personMovie.place_of_birth === null) {
                spanPlaceOfBirth.innerText = "";
            } else {

                spanPlaceOfBirth.innerText = "Lieu de naissance : " + personMovie.place_of_birth
            }

            profile.append(imgProfile, infoProfile)
            infoProfile.append(h2Name, biography, infoLife);
            biography.append(p)
            infoLife.append(spanBirth, spanDeath, spanPlaceOfBirth)


            // ------------------------------------FILMOGRAPHIES-----------------------------------

            const newCarousel = document.querySelector('#content')
            // if (params.type == "movie") {
            let movies = fetch('https://api.themoviedb.org/3/person/' + params.id + '/combined_credits?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR');
            movies.then(async response => {
                try {
                    let popularMovie = await response.json();

                    let recentPopularMovie = popularMovie.cast;
                    console.log(recentPopularMovie);


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
                imgScreen1.classList.add('itemCast')
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
                aType.innerText = movie.title || movie.name
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
            // } 
            // else {
            //     let moviesTV = fetch('https://api.themoviedb.org/3/person/' + params.id + '/movie_credits?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR');
            //     moviesTV.then(async response => {
            //         try {
            //             let popularMovieTV = await response.json();

            //             let recentPopularMovieTV = popularMovieTV.cast;
            //             console.log(recentPopularMovieTV);


            //             const movieTVNode = recentPopularMovieTV.map(movieTV => {
            //                 return createTop(movieTV)
            //             })
            //             newCarousel.append(...movieTVNode);
            //         } catch (error) {
            //             console.log(error);
            //         }
            //     })



            //     const createTop = (movieTV) => {

            //         const li = document.createElement('li')
            //         li.classList.add('item-a')

            //         const box = document.createElement('div')
            //         box.classList.add('box')

            //         const slide = document.createElement('div')
            //         slide.classList.add('slide-img')

            //         const imgScreen1 = document.createElement('img')
            //         imgScreen1.classList.add('itemCast')
            //         imgScreen1.src = "https://image.tmdb.org/t/p/w500/" + movieTV.poster_path;

            //         const overlay = document.createElement('div')
            //         overlay.classList.add('overlaySlider')

            //         const a = document.createElement('a')
            //         a.classList.add('seeMore')
            //         a.innerText = "Voir détails..."
            //         a.href = `./cine1_resume.php?id=${movieTV.id}&with_genres=${movieTV.genre_ids}&type=movie`
            //         a.style.textDecoration = "none";

            //         const detailsBox = document.createElement('div')
            //         detailsBox.classList.add('details-box')

            //         const type = document.createElement('div')
            //         type.classList.add('type')

            //         const aType = document.createElement('a')
            //         aType.classList.add('nameMovies')
            //         aType.innerText = movieTV.title;
            //         aType.style.fontSize = ('0.9rem')
            //         aType.style.textDecoration = 'none'
            //         aType.style.color = "white"
            //         aType.style.textAlign = 'center'
            //         aType.href = `./cine1_resume.php?id=${movieTV.id}&with_genres=${movieTV.genre_ids}&type=movie`



            //         const aVote = document.createElement('a')
            //         aVote.classList.add('dateDeSortie')
            //         aVote.innerText = "Date de sortie : "
            //         aVote.style.fontSize = ('0.8rem')
            //         aVote.style.color = '#878484'





            //         overlay.append(a);
            //         slide.append(imgScreen1, overlay)
            //         box.append(slide,
            //             detailsBox
            //         )
            //         detailsBox.append(type)
            //         type.append(aType
            //             , aVote

            //         )
            //         li.append(box)

            //         return li;
            // }
            // }
            // ------------------------------------FILMOGRAPHIES-----------------------------------

            const slide = document.querySelector('.slideshowDiapo-container')

            let photos = fetch('https://api.themoviedb.org/3/person/' + params.id + '/images?api_key=e0e252f245f519ae01af7682ea83a642');
            photos.then(async response => {
                try {
                    let newPhotos = await response.json();

                    let recentNewPhotos = newPhotos.profiles;
                    console.log(newPhotos);

                    const photosNode = recentNewPhotos.map(photos => {
                        return createPhotos(photos)
                    })
                    slide.append(...photosNode);

                } catch (error) {
                    console.log(error);
                }
            })



            const createPhotos = (photos) => {

                const mySlides = document.createElement('div');
                mySlides.classList.add('mySlides');

                const imgPhotos = document.createElement('img');
                imgPhotos.src = "https://image.tmdb.org/t/p/w500/" + photos.file_path
                imgPhotos.style.width = '200px';



                slide.append(mySlides)
                mySlides.append(imgPhotos);

                return mySlides
            }


            // ------------------------------------FILMOGRAPHIES-----------------------------------

            //     const slide = document.querySelector('.slideshowDiapo-container')

            //     let photos = fetch('https://api.themoviedb.org/3/person/' + params.id + '/images?api_key=e0e252f245f519ae01af7682ea83a642');
            //     photos.then(async response => {
            //         try {
            //             let newPhotos = await response.json();

            //             let recentNewPhotos = newPhotos.profiles;
            //             console.log(newPhotos);

            //             const photosNode = recentNewPhotos.map(photos => {
            //                 return createPhotos(photos)
            //             })
            //             slide.append(...photosNode);

            //         } catch (error) {
            //             console.log(error);
            //         }
            //     })



            //     const createPhotos = (photos) => {

            //         const mySlides = document.createElement('div');
            //         mySlides.classList.add('mySlides');

            //         const imgPhotos = document.createElement('img');
            //         imgPhotos.src = "https://image.tmdb.org/t/p/w500/" + photos.file_path
            //         imgPhotos.style.width = '200px';

            //         const text = document.createElement('div');
            //         text.classList.add('text');
            //         text.innerText = "Vote : " + photos.vote_average

            //         slide.append(mySlides)
            //         mySlides.append(imgPhotos, text);

            //         return mySlides
            //     }

            // }
        } catch (error) {
            console.log(error);
        }
    })


}
            // ------------------------------------FILMOGRAPHIES-----------------------------------




