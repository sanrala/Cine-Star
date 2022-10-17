<div class="row" id="slider-text">
    <div class="swiper">
        <h1 class="titleSwiper">LES SERIES A NE PAS RATER SUR CANAL+
            <div class="swipeButton">
                <i class="fa-solid fa-angle-left" id="prevCTV"></i>
                <i class="fa-solid fa-angle-right" id="nextCTV"></i>
            </div>
        </h1>
    </div>
</div>

<div id="wrapperCanalTV">

    <div id="carouselCanalTV">

        <div id="contentCanalTV">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/tv?api_key="  . $key . "&with_watch_providers=381&watch_region=FR";

            $json = file_get_contents($url);
            $result = json_decode($json, true);

            foreach ($result['results'] as  $r) {
                $name = $r['name'] ?? null;
                $original_name = $r['original_name'] ?? null;
                $genre_ids = $r['genre_ids'] ?? null;
                $id = $r["id"] ?? null;
                $poster_path = $r["poster_path"] ?? null;
                $backdrop_path = $r["backdrop_path"] ?? null;
                $overview = $r["overview"] ?? null;
                $first_air_date = $r["first_air_date"] ?? null;


                $lien = "./cine1_resume.php?id=" . $id .  "&type=tv";
                if ($poster_path !== null) {
                    echo '

  <li class="item-a">
  <div class="box">
    <div class="slide-img">
      <img class="item" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $name . '" />
      <div class="overlaySlider">
        <a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
      </div>
    </div>
    <div class="detail-box">
      <div class="type">
        <a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $name . '</a>
        <a  class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $first_air_date . '</a>
       
      </div>
    
    </div>
  </div>
</li>


';
                } else {
                    echo '

  <li class="item-a">
  <div class="box">
    <div class="slide-img">
      <img class="item" src="image/indisponible.png alt="Image non disponible"" />
      <div class="overlaySlider">
        <a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
      </div>
    </div>
    <div class="detail-box">
      <div class="type">
        <a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $name . '</a>
        <a  class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $first_air_date . '</a>
       
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