



// -------------------------------------TV----------------
window.onload = () => {
  console.log(window);
  const urlSearchParams = new URLSearchParams(window.location.search)
  const paramsTV = Object.fromEntries(urlSearchParams.entries())
  console.log(paramsTV);

  let tv = fetch('  https://api.themoviedb.org/3/tv/' + paramsTV.id + '?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1');
  tv.then(async response => {
    try {
      let popularTV = await response.json();



      let genreTV = fetch('https://api.themoviedb.org/3/genre/tv/list?api_key=e0e252f245f519ae01af7682ea83a642&' + paramsTV.with_genres);
      genreTV.then(async response => {
        try {
          let genreTV = await response.json();


          let RegenreTV = genreTV.genres;

          const titleTV = document.querySelector('h2')

          const spanTV = document.createElement('span')
          spanTV.classList.add('title')
          spanTV.innerText = popularTV.name


          const voteAverageTV = document.createElement('span')
          voteAverageTV.classList.add('voteAverageImdb')
          voteAverageTV.innerText = popularTV.vote_average + "/10 "


          const logoAverageTV = document.createElement('img')
          logoAverageTV.classList.add('logoAverage')
          logoAverageTV.src = "icones/imdb.png"
          logoAverageTV.alt = "imdb"


          const genreIDTV = document.createElement('span')
          genreIDTV.classList.add('genreID')

          for (i = 0; i < (popularTV.genres).length; i++) {
            genreIDTV.innerText += popularTV.genres[i].name + " ";
          }

          genreIDTV.style.color = "orange"



          const overlayVideoTV = document.querySelector('.video')


          // const lienBATV = document.createElement('span')
          // lienBATV.classList.add('lienBA')
          // lienBATV.innerHTML = " Regarder la bande-annonce "
          // lienBATV.style.color = "white"


          voteAverageTV.append(logoAverageTV)
          divTV.append(imgTV)
          boxTV.append(spanTV, voteAverageTV, genreIDTV)
          // overlayVideoTV.append(lienBATV)

        } catch (error) {
          console.log(error);
        }

      })




      const divTV = document.querySelector('.slide-img')
      const imgTV = document.createElement('img')
      imgTV.classList.add('item')
      imgTV.src = "https://image.tmdb.org/t/p/w500" + popularTV.backdrop_path
      imgTV.alt = popularTV.name

      const boxTV = document.querySelector('.item-a')



      const sypnosisTV = document.querySelector('#resume')
      const pTV = document.createElement('p')
      pTV.innerText = popularTV.overview
      sypnosisTV.append(pTV)



    } catch (error) {
      console.log(error);
    }
  })


}








