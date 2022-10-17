<div class="row" id="slider-text">
  <div class="swiper">
    <h1 class="titleSwiper">EN CE MOMENT SUR SALTO
      <div class="swipeButton">
        <i class="fa-solid fa-angle-left" id="prevCanalSTV"></i>
        <i class="fa-solid fa-angle-right" id="nextCanalSTV"></i>
      </div>
    </h1>
  </div>
</div>

<div id="wrapperCanalSTV">

  <div id="carouselCanalSTV">

    <div id="contentCanalSTV">
      <?php

      $url = "https://api.themoviedb.org/3/discover/tv?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=564&watch_region=FR";

      $json = file_get_contents($url);
      $result = json_decode($json, true);

      foreach ($result['results'] as  $r) {
        $name = $r['name'] ?? null;
        $title = $r['title'] ?? null;
        $original_name = $r['original_name'] ?? null;
        $genre_ids = $r['genre_ids'] ?? null;
        $id = $r["id"] ?? null;
        $poster_path = $r["poster_path"] ?? null;
        $backdrop_path = $r["backdrop_path"] ?? null;
        $overview = $r["overview"] ?? null;
        $first_air_date = $r["first_air_date"] ?? null;
        $release_date = $r["release_date"] ?? null;

        $lien = "./cine1_resume.php?id=" . $id .  "&type=tv";
        if ($backdrop_path !== null) {
          echo '

  <li class="item-a" >
  <div class="boxCanalSTV">
    <div class="slide-img">
      <img class="item" src="https://image.tmdb.org/t/p/w500' . $backdrop_path . '" alt="' . $name . '" />
      <div class="overlaySlider">
        <a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
      </div>
    </div>
    <div class="detail-box">
      <div class="type">
        <a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:1rem ; color:white">' . $name . '</a>
        <a  class="dateDeSortie" style="font-size:0.8rem; color:#878484;">Date de sortie : ' . $first_air_date . '</a>
       
      </div>
    
    </div>
  </div>
</li>


';
        } else {
          echo '

              <li class="item-a" >
              <div class="boxCanalSTV">
                <div class="slide-img">
                <img class="item" src="image/indisponible.png" alt="Image non disponible" />
                  <div class="overlaySlider">
                    <a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
                  </div>
                </div>
                <div class="detail-box">
                  <div class="type">
                    <a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:1rem ; color:white">' . $name . '</a>
                    <a  class="dateDeSortie" style="font-size:0.8rem; color:#878484;">Date de sortie : ' . $first_air_date . '</a>
                   
                  </div>
                
                </div>
              </div>
            </li>
            
';
        }
      }
      ?>


    </div>
  </div>
</div>