<?php
$id = $_GET['id'] ?? null;
$type = $_GET['type'] ?? null;
// $host_name = 'db5009974391.hosting-data.io';
// $database = 'dbs8456013';
// $user_name = 'dbu607552';
// $password = 'Troufion59!';


// $link = new mysqli($host_name, $user_name, $password, $database);

// $bdd = new PDO("mysql:host=localhost;dbname=id19532559_cinestars;charset=utf8", "id19532559_horn", "Troufion59!?");


$pdo = require_once('./db.php');
$sessionId = $_COOKIE['session'] ?? false;

if ($sessionId) {
  $stateSession = $pdo->prepare('SELECT * FROM session where idSession=:id');
  $stateSession->bindValue(':id', $sessionId);
  $stateSession->execute();
  $session = $stateSession->fetch();

  $stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser=:id');
  $stateUser->bindValue(':id', $session['idUser']);
  $stateUser->execute();
  $user = $stateUser->fetch();
} else {
  $user = null;
}

?>

<!DOCTYPE html>
<html lang="fr">
<?php require_once './shared/head.php' ?>

<body>
  <div class="container">
    <?php require_once './shared/header.php' ?>
    <div class="mainContent">

      <div class="swipeButton">
        <i class="fa-solid fa-angle-left" id="prevAffiche"></i>
        <i class="fa-solid fa-angle-right" id="nextAffiche"></i>

      </div>

      <div id="wrapperAffiche">

        <div id="carouselAffiche">

          <div id="contentAffiche">
            <?php
            $url = "https://api.themoviedb.org/3/trending/all/day?api_key=e0e252f245f519ae01af7682ea83a642";

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



      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES FILMS LES PLUS ATTENDUS
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev4"></i>
              <i class="fa-solid fa-angle-right" id="next4"></i>
            </div>
          </h1>
        </div>
      </div>


      <div id="wrapper4">

        <div id="carousel4">

          <div id="content4">
            <?php

            $date = new DateTime();

            $dateNow = $date->format('Y-m-d');



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/movie?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&release_date.gte=" . $dateNow . "&release_date.lte=2022-12-31&region=FR https://api.themoviedb.org/3/discover/movie?api_key=" . $key . "&language=fr-FR&primary_release_date.gte=" . $dateNow . "&primary_release_date.lte=2022-12-31&region=FR";

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
              // $dateorder = sort($release_date);


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

<li style="display:none" class="item-a">
<div style="display:none" class="box">
<div style="display:none" class="slide-img">

<img style="display:none"  class="item" src="image/indisponible.png" alt="Image non disponible" />
<div style="display:none"  class="overlaySlider">
<a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div  style="display:none" class="detail-box">
<div class="type">
<a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $title . '</a>
<a   style="display:none" class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $release_date . '</a>

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

<li style="display:none"  class="item-a">
<div  style="display:none" class="box">
<div style="display:none"  class="slide-img">

<img  style="display:none" class="item" src="image/indisponible.png" alt="Image non disponible" />
<div  style="display:none" class="overlaySlider">
<a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div  style="display:none" class="detail-box">
<div  style="display:none" class="type">
<a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $title . '</a>
<a   style="display:none" class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $release_date . '</a>

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



      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES SORTIES DISNEY+ : FILMS
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevDisneyMovie"></i>
              <i class="fa-solid fa-angle-right" id="nextDisneyMovie"></i>
            </div>
          </h1>
        </div>
      </div>

      <div id="wrapperDisneyMovie">

        <div id="carouselDisneyMovie">

          <div id="contentDisneyMovie">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/movie?api_key="  . $key . "&sort_by=release_date.desc&with_watch_providers=337&watch_region=FR";

            $json = file_get_contents($url);
            $result = json_decode($json, true);
            // echo '<pre>';
            // print_r($result);
            // echo '</pre>';
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
              if ($backdrop_path !== null) {
                echo '

<li   class="item-a">
<div  class="boxDisneyMovie">
<div   class="slide-img">

<img  class="item" src="https://image.tmdb.org/t/p/w500' . $backdrop_path . '" alt="' . $title . '" />
<div   class="overlaySlider">
<a   href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div  class="detail-box">
<div  class="type">
<a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $title . '</a>
<a   class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $release_date . '</a>

</div>

</div>
</div>
</li>


';
              } else {
                echo '

<li  style="display:none" class="item-a">
<div style="display:none"  class="box">
<div  style="display:none" class="slide-img">

<img  style="display:none" class="item" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $title . '" />
<div  style="display:none" class="overlaySlider">
<a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div style="display:none"  class="detail-box">
<div  style="display:none" class="type">
<a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $title . '</a>
<a  style="display:none"  class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $release_date . '</a>

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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES SORTIES DISNEY+ : SERIES
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevDisneyTV"></i>
              <i class="fa-solid fa-angle-right" id="nextDisneyTV"></i>
            </div>
          </h1>
        </div>
      </div>

      <div id="wrapperDisneyPlusTV">

        <div id="carouselDisneyPlusTV">

          <div id="contentDisneyPlusTV">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/tv?api_key="  . $key . "&sort_by=release_date.desc&with_watch_providers=337&watch_region=FR";

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


              $lien = "./cine1_resume.php?id=" . $id .  "&type=tv";
              if ($poster_path !== null) {
                echo '

<li class="item-a" >
<div class="box">
<div class="slide-img">
<img class="item" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $name . '" />
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

<li  style="display:none" class="item-a" >
<div  style="display:none" class="box">
<div style="display:none"  class="slide-img">
<img  style="display:none" class="item" src="image/indisponible.png" alt="Image non disponible" />
<div  style="display:none" class="overlaySlider">
<a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div  style="display:none" class="detail-box">
<div  style="display:none" class="type">
<a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:1rem ; color:white">' . $name . '</a>
<a  style="display:none"  class="dateDeSortie" style="font-size:0.8rem; color:#878484;">Date de sortie : ' . $first_air_date . '</a>

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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES SORTIES NETFLIX : FILMS
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev3"></i>
              <i class="fa-solid fa-angle-right" id="next3"></i>
            </div>
          </h1>
        </div>
      </div>

      <div id="wrapper3">

        <div id="carousel3">

          <div id="content3">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/movie?api_key="  . $key . "&sort_by=release_date.desc&with_watch_providers=8&watch_region=FR";

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

<li style="display:none"  class="item-a">
<div  style="display:none" class="box">
<div style="display:none"  class="slide-img">

<img  style="display:none" class="item" src="image/indisponible.png" alt="Image non disponible" />
<div  style="display:none" class="overlaySlider">
<a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div style="display:none"  class="detail-box">
<div  style="display:none" class="type">
<a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $title . '</a>
<a   style="display:none" class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $release_date . '</a>

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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES SORTIES NETFLIX : SERIES
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev5"></i>
              <i class="fa-solid fa-angle-right" id="next5"></i>
            </div>
          </h1>
        </div>
      </div>


      <div id="wrapper5">


        <div id="carousel5">

          <div id="content5">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/tv?api_key="  . $key . "&sort_by=first_air_date.desc&with_watch_providers=8&watch_region=FR";

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


              $lien = "./cine1_resume.php?id=" . $id .  "&type=tv";
              if ($poster_path !== null) {
                echo '

<li class="item-a" >
<div class="boxTopRatedTV">
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

<li style="display:none"  class="item-a" >
<div  style="display:none" class="box">
<div  style="display:none" class="slide-img">
<img style="display:none"  class="item" src="image/indisponible.png" alt="Image non disponible" />
<div  style="display:none" class="overlaySlider">
<a style="display:none"  href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div  style="display:none" class="detail-box">
<div style="display:none"  class="type">
<a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:1rem ; color:white">' . $name . '</a>
<a  style="display:none"  class="dateDeSortie" style="font-size:0.8rem; color:#878484;">Date de sortie : ' . $first_air_date . '</a>

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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES SERIES LES PLUS POPULAIRES
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev2"></i>
              <i class="fa-solid fa-angle-right" id="next2"></i>
            </div>
          </h1>
        </div>
      </div>


      <div id="wrapper2">

        <div id="carousel2">

          <div id="content2">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/tv/popular?api_key="  . $key . "&language=fr-FR&page=1";

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


              $lien = "./cine1_resume.php?id=" . $id .  "&type=tv";
              if ($poster_path !== null) {
                echo '

<li class="item-a" >
<div class="box">
<div class="slide-img">
<img class="item" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $name . '" />
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

<li  style="display:none" class="item-a" >
<div  style="display:none" class="box">
<div  style="display:none" class="slide-img">
<img  style="display:none" class="item" src="image/indisponible.png" alt="Image non disponible" />
<div  style="display:none" class="overlaySlider">
<a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div style="display:none"  class="detail-box">
<div style="display:none"  class="type">
<a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:1rem ; color:white">' . $name . '</a>
<a  style="display:none"  class="dateDeSortie" style="font-size:0.8rem; color:#878484;">Date de sortie : ' . $first_air_date . '</a>

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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">Les personnalités de la semaine
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevPersonTendance"></i>
              <i class="fa-solid fa-angle-right" id="nextPersonTendance"></i>
            </div>
          </h1>
        </div>
      </div>

      <div id="wrapperPersonTendance">

        <div id="carouselPersonTendance">

          <div id="contentPersonTendance">
            <?php

            $url = "https://api.themoviedb.org/3/trending/person/week?api_key=e0e252f245f519ae01af7682ea83a642";

            $json = file_get_contents($url);
            $result = json_decode($json, true);
            // echo '<pre>';
            // print_r($result);
            // echo '</pre>';
            foreach ($result['results'] as  $r) {
              $name = $r['name'] ?? null;
              $original_name = $r['original_name'] ?? null;
              $genre_ids = $r['genre_ids'] ?? null;
              $idP = $r["id"] ?? null;
              $poster_path = $r["poster_path"] ?? null;
              $backdrop_path = $r["backdrop_path"] ?? null;
              $overview = $r["overview"] ?? null;
              $release_date = $r["release_date"] ?? null;
              $profile_path = $r["profile_path"] ?? null;

              $lien = "./actors_actress.php?id=" . $idP .  "";
              if ($profile_path !== null) {
                echo '

<li class="item-a">
<div class="boxAffiche">
<div class="slideAffiche-img">

<img class="item" src="https://image.tmdb.org/t/p/w500' . $profile_path . '" alt="' . $name . '" />
<div class="overlaySliderAffiche">
<a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div class="detail-box">
<div class="type">
<a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $name . '</a>


</div>

</div>
</div>
</li>


';
              } else {
                echo '

<li style="display:none" class="item-a">
<div style="display:none" class="box">
<div style="display:none" class="slide-img">

<img style="display:none" class="item" src="image/indisponible.png" alt="Image non disponible" />
<div style="display:none" class="overlaySlider">
<a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div style="display:none" class="detail-box">
<div style="display:none" class="type">
<a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $name . '</a>


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
      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES SORTIES PRIME VIDEO : FILMS
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevAPM"></i>
              <i class="fa-solid fa-angle-right" id="nextAPM"></i>
            </div>
          </h1>
        </div>
      </div>

      <div id="wrapperAPM">

        <div id="carouselAPM">

          <div id="contentAPM">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/movie?api_key="  . $key . "&sort_by=release_date.desc&with_watch_providers=119&watch_region=FR";

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

<li style="display:none" class="item-a">
<div  style="display:none" class="box">
<div  style="display:none" class="slide-img">

<img  style="display:none" class="item" src="image/indisponible.png" alt="Image non disponible" />
<div style="display:none"  class="overlaySlider">
<a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div style="display:none" class="detail-box">
<div style="display:none"  class="type">
<a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $title . '</a>
<a   style="display:none" class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $release_date . '</a>

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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES SORTIES PRIME VIDEO : SERIES
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevAPTV"></i>
              <i class="fa-solid fa-angle-right" id="nextAPTV"></i>
            </div>
          </h1>
        </div>
      </div>


      <div id="wrapperAPTV">


        <div id="carouselAPTV">

          <div id="contentAPTV">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/tv?api_key="  . $key . "&sort_by=release_date.desc&with_watch_providers=119&watch_region=FR";

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
              $first_air_date = $r["first_air_date"] ?? null;

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

  <li  style="display:none" class="item-a" >
  <div style="display:none"  class="box">
  <div  style="display:none" class="slide-img">
  <img  style="display:none" class="item" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $name . '" />
  <div  style="display:none" class="overlaySlider">
  <a style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
  </div>
  </div>
  <div  style="display:none" class="detail-box">
  <div  style="display:none" class="type">
  <a style="display:none"  class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:1rem ; color:white">' . $name . '</a>
  <a   style="display:none" class="dateDeSortie" style="font-size:0.8rem; color:#878484;">Date de sortie : ' . $first_air_date . '</a>
  
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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES SORTIES SUR CANAL+ : SERIES
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

            $url = "https://api.themoviedb.org/3/discover/tv?api_key="  . $key . "&sort_by=release_date.desc&with_watch_providers=381&watch_region=FR";

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

  <li style="display:none"  class="item-a">
  <div  style="display:none" class="box">
    <div style="display:none"  class="slide-img">
      <img  style="display:none" class="item" src="image/indisponible.png" alt="Image non disponible"" />
      <div  style="display:none" class="overlaySlider">
        <a style="display:none"  href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
      </div>
    </div>
    <div  style="display:none" class="detail-box">
      <div  style="display:none" class="type">
        <a style="display:none"  class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $name . '</a>
        <a  style="display:none"  class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $first_air_date . '</a>
       
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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES FILMS A NE PAS RATER SUR CANAL+
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevCanalMovie"></i>
              <i class="fa-solid fa-angle-right" id="nextCanalMovie"></i>
            </div>
          </h1>
        </div>
      </div>

      <div id="wrapperCanalMovie">

        <div id="carouselCanalMovie">

          <div id="contentCanalMovie">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/movie?api_key="  . $key . "&with_watch_providers=381&watch_region=FR";

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

  <li  style="display:none" class="item-a">
  <div style="display:none" class="box">
    <div style="display:none"  class="slide-img">
   
      <img  style="display:none" class="item" src="image/indisponible.png" alt="Image non disponible" />
      <div style="display:none"  class="overlaySlider">
        <a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
      </div>
    </div>
    <div style="display:none"  class="detail-box">
      <div  style="display:none" class="type">
        <a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $title . '</a>
        <a  style="display:none"  class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $release_date . '</a>
       
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

            $url = "https://api.themoviedb.org/3/discover/tv?api_key=e0e252f245f519ae01af7682ea83a642&sort_by=release_date.desc&with_watch_providers=564&watch_region=FR";

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

              <li style="display:none"  class="item-a" >
              <div  style="display:none" class="box">
                <div style="display:none"  class="slide-img">
                <img style="display:none"  class="item" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="Image non disponible" />
                  <div  style="display:none" class="overlaySlider">
                    <a style="display:none"  href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
                  </div>
                </div>
                <div  style="display:none" class="detail-box">
                  <div  style="display:none" class="type">
                    <a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:1rem ; color:white">' . $name . '</a>
                    <a  style="display:none"  class="dateDeSortie" style="font-size:0.8rem; color:#878484;">Date de sortie : ' . $first_air_date . '</a>
                   
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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h1 class="titleSwiper">LES MANGAS SUR ADN
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevManga"></i>
              <i class="fa-solid fa-angle-right" id="nextManga"></i>
            </div>
          </h1>
        </div>
      </div>

      <div id="wrapperManga">

        <div id="carouselManga">

          <div id="contentManga">
            <?php



            $key = "e0e252f245f519ae01af7682ea83a642";

            $url = "https://api.themoviedb.org/3/discover/tv?api_key=e0e252f245f519ae01af7682ea83a642&with_watch_providers=415&watch_region=FR";

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
        
              <li style="display:none"  class="item-a">
              <div  style="display:none" class="box">
                <div style="display:none"  class="slide-img">
                <img  style="display:none" class="item" src="image/indisponible.png" alt="Image non disponible" />
                  <div  style="display:none" class="overlaySlider">
                    <a  style="display:none" href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
                  </div>
                </div>
                <div style="display:none"  class="detail-box">
                  <div  style="display:none" class="type">
                    <a  style="display:none" class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.9rem ; color:white; text-align:center;position:relative;">' . $name . '</a>
                    <a  style="display:none"  class="dateDeSortie" style="font-size:0.8rem; color:#878484;position:relative;">Date de sortie : ' . $first_air_date . '</a>
                   
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



    </div>

  </div>

  <?php require_once './shared/footer.php' ?>
  <script src="JS/index.js" type="module"> </script>


  <script>
    //Menu Burger
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }

    //Fin menu burger  

    $(document).ready(function() {
      $(".hamburger").click(function() {
        $(this).toggleClass("is-active");
        $("body").toggleClass("is-active");
      })
    });
  </script>
</body>


</html>