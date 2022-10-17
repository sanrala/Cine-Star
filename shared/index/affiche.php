<div class="swipeButton">
    <i class="fa-solid fa-angle-left" id="prevAffiche"></i>
    <i class="fa-solid fa-angle-right" id="nextAffiche"></i>

</div>

<div id="wrapperAffiche">

    <div id="carouselAffiche">

        <div id="contentAffiche">
            <?php

            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/trending/all/day?api_key="  . $key . "";

            $json = file_get_contents($url);
            $result = json_decode($json, true);

            foreach ($result['results'] as  $r) {
                $title = $r['title'] ?? null;
                $name = $r['name'] ?? null;
                $original_name = $r['original_name'] ?? null;
                $genre_ids = $r['genre_ids'] ?? null;
                $id = $r["id"] ?? null;
                $poster_path = $r["poster_path"] ?? null;
                $backdrop_path = $r["backdrop_path"] ?? null;
                $overview = $r["overview"] ?? null;
                $release_date = $r["release_date"] ?? null;


                $lien = "./cine1_resume.php?id=" . $id .  "&type=movie";
                $lienTV = "./cine1_resume.php?id=" . $id .  "&type=tv";


                if ($title) {

                    echo '

<li class="item-a">
<div class="boxAffiche">
<div class="slideAffiche-img">

<img class="item" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $title . '" />
<div class="overlaySliderAffiche">
<a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div class="detail-box">
<div class="type">

</div>

</div>
</div>
</li>


';
                } else {
                    echo '


                  <li class="item-a">
                  <div class="boxAffiche">
                  <div class="slideAffiche-img">
                  
                  <img class="item" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $name . '" />
                  <div class="overlaySliderAffiche">
                  <a href="' . $lienTV . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
                  </div>
                  </div>
                  <div class="detail-box">
                  <div class="type">
                  
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