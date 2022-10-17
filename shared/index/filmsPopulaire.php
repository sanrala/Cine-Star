<div class="row" id="slider-text">
    <div class="swiper">
        <h1 class="titleSwiper">LES FILMS LES PLUS POPULAIRES
            <div class="swipeButton">
                <i class="fa-solid fa-angle-left" id="prev"></i>
                <i class="fa-solid fa-angle-right" id="next"></i>
            </div>
        </h1>
    </div>
</div>

<div id="wrapper">

    <div id="carousel">

        <div id="content">
            <?php

            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/movie/popular?api_key="  . $key . "&language=fr-FR&page=1";

            $json = file_get_contents($url);
            $result = json_decode($json, true);

            foreach ($result['results'] as  $r) {
                $title = $r['title'] ?? null;
                $original_name = $r['original_name'] ?? null;
                $genre_ids = $r['genre_ids'] ?? null;
                $id = $r["id"] ?? null;
                $poster_path = $r["poster_path"] ?? null;
                $backdrop_path = $r["backdrop_path"] ?? null;
                $overview = $r["overview"] ?? null;
                $release_date = $r["release_date"] ?? null;


                $lien = "./cine1_resume.php?id=" . $id .  "&type=movie";


                if ($poster_path !== null) {
                    echo '

<li class="item-a">
<div class="box">
<div class="slide-img">

<img class="item" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $title . '" />
<div class="overlaySlider">
<a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div class="detail-box">
<div class="type">
<a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $title . '</a>
<a  class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $release_date . '</a>

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

<img class="item" src="image/indisponible.png" alt="Image non disponible" />
<div class="overlaySlider">
<a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div class="detail-box">
<div class="type">
<a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $title . '</a>
<a  class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $release_date . '</a>

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