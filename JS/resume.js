


document.getElementById("myBtn").onmouseover = function () { myFunction() };


function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}



// ---------------------------CAROUSEL---------------------------
const gap = 16;

const carousel = document.getElementById("carousel"),
  content = document.getElementById("content"),
  next = document.getElementById("next"),
  prev = document.getElementById("prev");

next.addEventListener("click", e => {
  carousel.scrollBy(width + gap, 0);
  // if (carousel.scrollWidth !== 0) {
  //   prev.style.display = "flex";
  // }
  if (content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
    next.style.color = "red";
  }
});
prev.addEventListener("click", e => {
  carousel.scrollBy(-(width + gap), 0);
  if (carousel.scrollLeft - width - gap <= 0) {
    prev.style.color = "red";
  }
  // if (!content.scrollWidth - width - gap <= carousel.scrollLeft + width) {
  //   next.style.display = "flex";
  // }
});

let width = carousel.offsetWidth;
window.addEventListener("resize", e => (width = carousel.offsetWidth));

// ---------------------------FIN CAROUSEL---------------------------


// ---------------------------CAROUSEL2---------------------------
// const gapVideo = 16;

// const carouselVideo = document.getElementsByClassName("overlayVideo-content"),
//   contentVideo = document.getElementById("contentVideo"),
//   nextVideo = document.getElementById("nextVideo"),
//   prevVideo = document.getElementById("prevVideo");

// nextVideo.addEventListener("click", e => {
//   carouselVideo.scrollBy(widthVideo + gapVideo, 0);

//   if (contentVideo.scrollWidth - widthVideo - gapVideo <= carouselVideo.scrollLeft + widthVideo) {
//     nextVideo.style.color = "red";
//   }
// });
// prevVideo.addEventListener("click", e => {
//   carouselVideo.scrollBy(-(widthVideo + gapVideo), 0);
//   if (carouselVideo.scrollLeft - widthVideo - gapVideo <= 0) {
//     prevVideo.style.color = "red";
//   }

// });

// let widthVideo = carouselVideo.offsetWidth;
// window.addEventListener("resize", e => (widthVideo = carouselVideo.offsetWidth));

// ---------------------------FIN CAROUSEL---------------------------



window.onload = () => {
  console.log(window);
  const urlSearchParams = new URLSearchParams(window.location.search)
  const params = Object.fromEntries(urlSearchParams.entries())
  console.log(params);

  const newCarouselAffiche = document.querySelector('#contentAffiche')

  let movies = fetch('https://api.themoviedb.org/3/movie/' + params.id + '?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR');
  movies.then(async response => {
    try {
      let popularMovie = await response.json();

      const b = document.querySelector('#star1')


      let genre = fetch('https://api.themoviedb.org/3/genre/movie/list?api_key=e0e252f245f519ae01af7682ea83a642&' + params.with_genres);
      genre.then(async response => {
        try {
          let genreMovie = await response.json();


          let RegenreMovie = genreMovie.genres;

          const title = document.querySelector('h2')

          const span = document.createElement('span')
          span.classList.add('title')

          span.innerText = popularMovie.title


          const voteAverage = document.createElement('span')
          voteAverage.classList.add('voteAverageImdb')
          voteAverage.innerText = popularMovie.vote_average + "/10 "


          const logoAverage = document.createElement('img')
          logoAverage.classList.add('logoAverage')
          logoAverage.src = "icones/imdb.png"
          logoAverage.alt = "imdb"


          const genreID = document.createElement('span')
          genreID.classList.add('genreID')


          for (i = 0; i < (popularMovie.genres).length; i++) {
            genreID.innerText += popularMovie.genres[i].name + " ";
          }

          genreID.style.color = "orange"



          const overlayVideo = document.querySelector('.video')


          // const lienBA = document.createElement('span')
          // lienBA.classList.add('lienBA')
          // lienBA.innerHTML = " Regarder la bande-annonce "
          // lienBA.style.color = "white"


          voteAverage.append(logoAverage)
          div.append(img)
          box.append()
          overlayVideo.append(span, voteAverage, genreID)

        } catch (error) {
          console.log(error);
        }
      })

      let video = fetch('https://api.themoviedb.org/3/movie/' + params.id + '/videos?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR');
      video.then(async response => {
        try {
          let genreVideo = await response.json();


          let videoMovie = genreVideo.results;
          console.log(genreVideo);

          for (i = 0; i < (genreVideo.results).length; i++) {
            const videoPlay = document.querySelector('.overlayVideo-content')
            const iframe = document.createElement('iframe')
            // iframe.style.width = '560px'
            // iframe.style.height = '315px'
            iframe.src = "https://www.youtube.com/embed/" + genreVideo.results[i].key
            iframe.style.title = "YouTube video player"
            iframe.style.frameborder = "0"
            iframe.style.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"

            videoPlay.append(iframe)

            const li = document.createElement('li')
            li.classList.add('item-a')

            const box = document.createElement('div')
            box.classList.add('box')

            li.append(box)
            // return aType
            return li;

          }


        } catch (error) {
          console.log(error);
        }
      })

      const div = document.querySelector('.slide-img')
      const img = document.createElement('img')
      img.classList.add('item')
      img.src = "https://image.tmdb.org/t/p/w500" + popularMovie.backdrop_path
      img.alt = popularMovie.title

      const box = document.querySelector('.item-a')



      const sypnosis = document.querySelector('#resume')
      const p = document.createElement('p')
      p.innerText = popularMovie.overview
      sypnosis.append(p)



    } catch (error) {
      console.log(error);
    }
  })
}

// -------------------------------------TV----------------
// window.onload = () => {
//   console.log(window);
//   const urlSearchParams = new URLSearchParams(window.location.search)
//   const params = Object.fromEntries(urlSearchParams.entries())
//   console.log(params);



//   let tv = fetch('  https://api.themoviedb.org/3/tv/' + params.id + '?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1');
//   tv.then(async response => {
//     try {
//       let popularTV = await response.json();



//       let genreTV = fetch('https://api.themoviedb.org/3/genre/movie/list?api_key=e0e252f245f519ae01af7682ea83a642&' + params.with_genres);
//       genreTV.then(async response => {
//         try {
//           let genreTV = await response.json();


//           let RegenreTV= genreTV.genres;

//           const title = document.querySelector('h2')

//           const span = document.createElement('span')
//           span.classList.add('title')
//           span.innerText = popularTV.name


//           const voteAverage = document.createElement('span')
//           voteAverage.classList.add('voteAverageImdb')
//           voteAverage.innerText = popularTV.vote_average + "/10 "


//           const logoAverage = document.createElement('img')
//           logoAverage.classList.add('logoAverage')
//           logoAverage.src = "icones/imdb.png"
//           logoAverage.alt = "imdb"


//           const genreID = document.createElement('span')
//           genreID.classList.add('genreID')

//           for (i = 0; i < (popularTV.genres).length; i++) {
//             genreID.innerText += popularTV.genres[i].name + " ";
//           }

//           genreID.style.color = "orange"



//           const overlayVideo = document.querySelector('.video')


//           const lienBA = document.createElement('span')
//           lienBA.classList.add('lienBA')
//           lienBA.innerHTML = " Regarder la bande-annonce "
//           lienBA.style.color = "white"


//           voteAverage.append(logoAverage)
//           div.append(img)
//           box.append(span, voteAverage, genreID)
//           overlayVideo.append(lienBA)

//         } catch (error) {
//           console.log(error);
//         }
//       })

//       let videoTV = fetch('https://api.themoviedb.org/3/movie/' + params.id + '/videos?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR');
//       videoTV.then(async response => {
//         try {
//           let genreVideoTV = await response.json();


//           let videoTV = genreVideoTV.results;
//           console.log(genreVideoTV);

//           for (i = 0; i < (genreVideoTV.results).length; i++) {
//             const videoPlay = document.querySelector('.overlayVideo-content')
//             const iframe = document.createElement('iframe')
//             iframe.style.width = '560px'
//             iframe.style.height = '315px'
//             iframe.src = "https://www.youtube.com/embed/" + genreVideo.results[i].key
//             iframe.style.title = "YouTube video player"
//             iframe.style.frameborder = "0"
//             iframe.style.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"

//             videoPlay.append(iframe)
//           }


//         } catch (error) {
//           console.log(error);
//         }
//       })

//       const div = document.querySelector('.slide-img')
//       const img = document.createElement('img')
//       img.classList.add('item')
//       img.src = "https://image.tmdb.org/t/p/w500" + popularTV.backdrop_path
//       img.alt = popularMovie.title

//       const box = document.querySelector('.item-a')



//       const sypnosis = document.querySelector('#resume')
//       const p = document.createElement('p')
//       p.innerText = popularTV.overview
//       sypnosis.append(p)



//     } catch (error) {
//       console.log(error);
//     }
//   })
// }









// -------------------VOTE-------------------------------------

const userRateItem = $("#userRate .fa-star");

userRateItem.on("mouseover", function () {
  $(this).prevAll(".fa-star").addClass("checked");
  $(this).addClass("checked");
})
userRateItem.on("mouseleave", function () {
  userRateItem.removeClass("checked");

})
// Document Load System Start
$(document).ready(function () { RateSystem() });

function RateSystem() {
  // Items

  let rateOne = 1;
  let rateTwo = 0;
  let rateThree = 0;
  let rateFour = 0;
  let rateFive = 0;
  Variables(rateOne, rateTwo, rateThree, rateFour, rateFive)

  userRateItem.click(function () {
    const itemIndex = $(this).index() + 1;

    if (itemIndex === 1) {
      rateOne = rateOne + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
    else if (itemIndex === 2) {
      rateTwo = rateTwo + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
    else if (itemIndex === 3) {
      rateThree = rateThree + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
    else if (itemIndex === 4) {
      rateFour = rateFour + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
    else if (itemIndex === 5) {
      rateFive = rateFive + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
  })

  function Variables(rateOne, rateTwo, rateThree, rateFour, rateFive) {
    // Total Item Rate
    const totalRate = rateOne + rateTwo + rateThree + rateFour + rateFive;
    // Items Rate
    const rateOneBar = (100 * rateOne) / totalRate;
    const rateTwoBar = (100 * rateTwo) / totalRate;
    const rateThreeBar = (100 * rateThree) / totalRate;
    const rateFourBar = (100 * rateFour) / totalRate;
    const rateFiveBar = (100 * rateFive) / totalRate;





    // HTML Content
    $("#totalRate ").text(totalRate);

    // Rate Star
    $("#rateFive").text(rateFive);
    $("#rateFour").text(rateFour);
    $("#rateThree").text(rateThree);
    $("#rateTwo").text(rateTwo);
    $("#rateOne").text(rateOne);

    // Rate Bar
    $("#rateFiveBar").css("width", rateFiveBar + "%");
    $("#rateFourBar").css("width", rateFourBar + "%");
    $("#rateThreeBar").css("width", rateThreeBar + "%");
    $("#rateTwoBar").css("width", rateTwoBar + "%");
    $("#rateOneBar").css("width", rateOneBar + "%");
    // Rate Ratio
    const rateTotal = (rateOne * 1) + (rateTwo * 2) + (rateThree * 3) + (rateFour * 4) + (rateFive * 5);
    const average = rateTotal / totalRate
    totalVote(average)
    var digits = average.toString().split('');
    var realDigits = digits.map(Number);
    // Rate Undefined If Else
    $("#totalRateRatio ").text(realDigits[0] + ',' +
      (realDigits[2] === undefined ? " 0 " : realDigits[2]) +
      (realDigits[3] === undefined ? " 0 " : realDigits[3]))




  }
}




let span1 = document.querySelector('#star1');
let span2 = document.querySelector('#star2');
let span3 = document.querySelector('#star3');
let span4 = document.querySelector('#star4');
let span5 = document.querySelector('#star5');



function totalVote(average) {

  if (average >= 0 && average <= 1) {


    // if (span1.classList.contains('checked')){
    span1.classList.remove('checked');
    span2.classList.remove('checked');
    span3.classList.remove('checked');
    span4.classList.remove('checked');
    span5.classList.remove('checked');
    // }
  }
  else if (average > 1 && average < 2) {
    span1.classList.add('checked');

    if (span2.classList.contains('checked')) {
      span2.classList.remove('checked');
      span3.classList.remove('checked');
      span4.classList.remove('checked');
      span5.classList.remove('checked');
    }
  } else if (average >= 2 && average < 3) {
    span1.classList.add('checked');
    span2.classList.add('checked');
    if (span3.classList.contains('checked')) {
      span3.classList.remove('checked');
      span4.classList.remove('checked');
      span5.classList.remove('checked');
    }
  } else if (average >= 3 && average < 4) {
    span1.classList.add('checked');
    span2.classList.add('checked');
    span3.classList.add('checked');
    if (span4.classList.contains('checked')) {
      console.log('coucou 3');
      span4.classList.remove('checked');
      span5.classList.remove('checked');
    }
  } else if (average >= 4 && average < 5) {
    span1.classList.add('checked');
    span2.classList.add('checked');
    span3.classList.add('checked');
    span4.classList.add('checked');
    if ($("star4").hasClass('checked')) {
      console.log('coucou 4');
      span5.classList.remove('checked');
    }
  }
  else {
    span1.classList.add('checked');
    span2.classList.add('checked');
    span3.classList.add('checked');
    span4.classList.add('checked');
    span4.classList.add('checked');
  }
}




// ----------------FIN DE VOTE --------------------




// ----------------------------------COMMENT--------------------------------


let commentaires = [];

function getAllComment() {
  const allComment = fetch('https://cinestars-aa75e-default-rtdb.firebaseio.com/comment.json')
    .then(
      async response => {
        try {
          commentaires = await response.json();
          console.log(commentaires);
        } catch (error) {
          console.log(error);
        }
      }
    )
}





const btnComment = document.querySelector('.btnComment')
const ul = document.querySelector('#listAll')

const text = document.querySelector('#feedbackHere')
const userName = document.querySelector('#userName')
const user = document.querySelector('.userComment')
const dateComment = document.querySelector('.date')
const date = new Date().toLocaleString("fr-FR", {
  weekday: 'short',
  month: 'long',
  day: 'numeric',
  year: 'numeric',
  hour: 'numeric',
  min: 'numeric'

})

let error = document.querySelector('.error')
let error1 = document.querySelector('.error1')
let error2 = document.querySelector('.error2')





function comment() {

  const liName = document.createElement('li')
  liName.classList.add('liName')
  liName.innerText = userName.value + " a commenté le " + date
  liName.style.color = 'blue'


  // dateComment.innerText = "le " + date
  // dateComment.style.color = 'rgb(177, 174, 174)'

  const liComment = document.createElement('li')
  liComment.classList.add('liComment')
  liComment.innerText = text.value
  ul.append(liName, dateComment, liComment)



}


// btnComment.addEventListener('click', comment)


btnComment.addEventListener('click', (e) => {
  e.preventDefault()
  let text = document.querySelector("#feedbackHere").value;
  let name = document.querySelector("#userName").value;


  let error1 = document.querySelector('.error1')
  let error2 = document.querySelector('.error2')
  let error3 = document.querySelector('.error3')
  let error = document.querySelector('.error')

  error1.innerText = ''
  error2.innerText = ''
  error3.innerText = ''
  error.innerText = ''

  if (text.length < 8) {

    error1.innerText += 'Inclure 8 caractères minimum'
    error1.style.color = 'red'

  }
  if (name.length < 2) {

    error.innerText += 'Inclure 2 caractères minimum'
    error.style.color = 'red'

  }

  if (/[!%&|-~§=+:^$*+?{}()]/g.test(userName) == true) {

    error3.innerText += 'symbole interdit'
    error3.style.color = 'red'
  }


  if (name == '') {
    error.innerText = ''
    error.innerText = " Nom / pseudo manquant"
    error.style.color = 'red'

  }
  if (text == '') {

    error2.innerText = " Mot de passe manquant"
    error2.style.color = 'red'
  }

  if ((text.length >= 8) && (name.length >= 1)) {
    comment()
    insertData()

  }


});

// ----------------------------------FIN COMMENT----------------------------
function insertData() {

  set(ref(db, "comment/" + 0), {
    nameComment: userName.value,
    comment: feedbackHere.value,



  })


  const comment = fetch('https://cinestars-aa75e-default-rtdb.firebaseio.com/comment.json')
    .then(async response => {
      try {
        const allMyComment = await response.json();
        let filterComment = allMyComment.filter(f => f !== null)
        console.log(filterComment);
        console.log(allMyComment.length);
        set(ref(db, "comment/" + allMyComment.length), {
          nameComment: userName.value,
          comment: feedbackHere.value,




        })
      } catch (e) {

      }
    })
    .then(() => {
      alert('data inserted')
    })
    .catch((err) => {
      alert('Error : ') + err
    })
}

