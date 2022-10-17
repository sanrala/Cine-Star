<pre>
<?php
$pdo = require_once('./db.php');
$sessionId = $_COOKIE['session'] ?? false;

$id = $_GET['id'] ?? false;
$idFav = $_GET['idFavoris'] ?? false;
$type = $_GET['type'] ?? false;
$lien_s = "./seasons.php?id=" . $id .  "&type=tv";
$date = new DateTime();
$dateNow = $date->format('d-m-Y à H:i:s');
// echo '<pre>';
// var_dump($id);
// echo '</pre>';
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
// print_r($user);
$url = "https://api.themoviedb.org/3/" . $type . "/" . $id . "?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";

$json = file_get_contents($url);
$result = json_decode($json, true);

$name = $result['name'] ?? null;
$title = $result['title'] ?? null;
$homepage = $result['homepage'] ?? null;
$backdrop_path = $result["backdrop_path"] ?? null;
$poster_path = $result["poster_path"] ?? null;
$overview = $result["overview"] ?? null;
$vote_average = $result["vote_average"] ?? null;
$genre = $result["genres"] ?? null;
$release_date = $result["release_date"] ?? null;
$first_air_date = $result["first_air_date"] ?? null;
$vote = number_format($vote_average, 1, '.', "");
$time = $result["episode_run_time"] ?? null;


$urlLogo = "https://api.themoviedb.org/3/" . $type . "/" . $id . "/watch/providers?api_key=e0e252f245f519ae01af7682ea83a642";
$jsonLogo = file_get_contents($urlLogo);
$resultLogo = json_decode($jsonLogo, true);

$freeplatform = $resultLogo['results']['FR']['flatrate'] ?? null;

$buyplateform = $resultLogo['results']['FR']['buy'] ?? null;
$rentplateform = $resultLogo['results']['FR']['rent'] ?? null;


$urlVideo = "https://api.themoviedb.org/3/" . $type . "/" . $id . "/videos?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";

$jsonVideo = file_get_contents($urlVideo);
$resultVideo = json_decode($jsonVideo, true);
$nbreVideo = count($resultVideo['results']);

if ($name) {
  $urlSeason = "https://api.themoviedb.org/3/tv/" . $id . "?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";

  $jsonSeason = file_get_contents($urlSeason);
  $resultSeason = json_decode($jsonSeason, true);

  $status = $resultSeason['status'] ?? null;

  $number_of_seasons = $resultSeason["number_of_seasons"] ?? null;
  $number_of_episodes = $resultSeason["number_of_episodes"] ?? null;
  $origin_country = $resultSeason["origin_country"] ?? null;

  foreach ($resultSeason["seasons"] as $s) {
    $seasonsair_date = $s["air_date"] ?? null;
    $seasonsepisode_count = $s["episode_count"] ?? null;
    $seasonsname = $s["name"] ?? null;
  }

  $last_episode_to_airDate = $resultSeason["last_episode_to_air"]["air_date"] ?? null;
  $last_episode_to_airEpNbr = $resultSeason["last_episode_to_air"]["episode_number"] ?? null;
  $last_episode_to_airOverview = $resultSeason["last_episode_to_air"]["overview"] ?? null;
  $last_episode_to_airName = $resultSeason["last_episode_to_air"]["name"] ?? null;
  $last_episode_to_airRuntime = $resultSeason["last_episode_to_air"]["runtime"] ?? null;
  $last_episode_to_airSeason = $resultSeason["last_episode_to_air"]["season_number"] ?? null;
  $last_episode_to_airStill_path = $resultSeason["last_episode_to_air"]["still_path"] ?? null;

  $next_episode_to_air = $resultSeason["next_episode_to_air"] ?? null;
  $next_episode_to_airDate = $resultSeason["next_episode_to_air"]["air_date"] ?? null;
  $next_episode_to_airEpNbr = $resultSeason["next_episode_to_air"]["episode_number"] ?? null;
  $next_episode_to_airOverview = $resultSeason["next_episode_to_air"]["overview"] ?? null;
  $next_episode_to_airName = $resultSeason["next_episode_to_air"]["name"] ?? null;
  $next_episode_to_airRuntime = $resultSeason["next_episode_to_air"]["runtime"] ?? null;
  $next_episode_to_airSeason = $resultSeason["next_episode_to_air"]["season_number"] ?? null;
  $next_episode_to_airStill_path = $resultSeason["next_episode_to_air"]["still_path"] ?? null;
}

if ($id) {
  $url = "https://api.themoviedb.org/3/"  .  $type . "/"  .  $id . "?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";

  $json = file_get_contents($url);
  $result = json_decode($json, true);

  $titleComment = $result['title'] ?? null;
  $titleCommenttv = $result['name'] ?? null;
  // echo '<pre>';
  // var_dump($titleCommenttv);
  // var_dump($titleComment);
  // echo '<pre>';

  if ($type === 'movie') {
    $stateRead = $pdo->prepare('SELECT * from commentaire WHERE nameFilm=:title');
    $stateRead->bindValue(':title', $titleComment);
    $stateRead->execute();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_INPUT = filter_input_array(INPUT_POST, [
        'comment' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
      ]);

      $comment = $_INPUT['comment'] ?? '';

      $stateInsert = $pdo->prepare('INSERT INTO commentaire (commentaire, idFilm, nameFilm, type, datenow, idUser, avatar_img) VALUES (
       :comment, :idFilm, :nameFilm, :type, :datenow, :idUser, :avatar_img)');
      $stateInsert->bindValue(':comment', $comment);
      $stateInsert->bindValue(':idFilm', $id);
      $stateInsert->bindValue(':nameFilm', $titleComment);
      $stateInsert->bindValue(':type', $type);
      $stateInsert->bindValue(':avatar_img', $user['avatar']);
      $stateInsert->bindValue(':datenow', $dateNow);
      $stateInsert->bindValue(':idUser', $session['idUser']);
      $stateInsert->execute();
      $idComment = $pdo->lastInsertId();
    }

    $stateRead = $pdo->prepare('SELECT commentaire, pseudo, nameFilm, datenow, avatar_img FROM commentaire LEFT JOIN user ON user.idUser=commentaire.idUser AND user.avatar=commentaire.avatar_img WHERE nameFilm=:title');
    $stateRead->bindValue(':title', $titleComment);

    $stateRead->execute();
    $resultComment = $stateRead->fetchAll();
  } else {
    $stateRead = $pdo->prepare('SELECT * from commentaire WHERE nameSerie=:name');
    $stateRead->bindValue(':name', $titleCommenttv);
    $stateRead->execute();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_INPUT = filter_input_array(INPUT_POST, [

        'comment' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
      ]);
      $date = new DateTime();
      $dateNowTV = $date->format('d-m-Y à H:i:s');
      $commenttv = $_INPUT['comment'] ?? '';
      $stateInsert = $pdo->prepare('INSERT INTO commentaire (commentaire, idFilm, nameSerie, type, datenow, idUser, avatar_img) VALUES (
       :comment, :idFilm, :nameSerie, :type, :datenow, :idUser, :avatar_img)');
      $stateInsert->bindValue(':comment', $commenttv);
      $stateInsert->bindValue(':idFilm', $id);
      $stateInsert->bindValue(':nameSerie', $titleCommenttv);
      $stateInsert->bindValue(':type', $type);
      $stateInsert->bindValue(':avatar_img', $user['avatar']);
      $stateInsert->bindValue(':datenow', $dateNowTV);
      $stateInsert->bindValue(':idUser', $session['idUser']);
      $stateInsert->execute();
      $idComment = $pdo->lastInsertId();
    }

    $stateRead = $pdo->prepare('SELECT commentaire, pseudo, nameSerie, datenow , avatar_img FROM commentaire LEFT JOIN user ON user.idUser=commentaire.idUser AND user.avatar=commentaire.avatar_img WHERE nameSerie=:name');
    $stateRead->bindValue(':name', $titleCommenttv);
    $stateRead->execute();
    $resultCommenttv = $stateRead->fetchAll();
  }
}

// Favoris existe déjà"
$stateRead = $pdo->prepare('SELECT * from favoris WHERE idFilm=:idFilm AND type=:type AND idUser=:idUser');
$stateRead->bindValue(':idFilm', $id);
$stateRead->bindValue(':type', $type);
$stateRead->bindValue(':idUser', $session['idUser']);
$stateRead->execute();
$isExist = $stateRead->fetch();

$stateReadFavorite = $pdo->prepare('SELECT * FROM favoris, user_favori_film 
WHERE favoris.idFavoris = user_favori_film.idFavoris and user_favori_film.idUser = :idSes');
$stateReadFavorite->bindValue(':idSes', $session['idUser']);
$stateReadFavorite->execute();
$favorite = $stateReadFavorite->fetchall();

$stateDel = $pdo->prepare('DELETE FROM user_favori_film WHERE idFavoris=:id');
$stateDel = $pdo->prepare('DELETE FROM favoris WHERE idFavoris=:id');
$stateDel->bindValue(':id', $id);
$stateDel->execute();
$del = $stateDel->fetch();

// fin Favoris existe déjà


?>
</pre>
<!DOCTYPE html>
<html lang="fr">
<?php require_once './shared/head_resume.php' ?>

<body>
  <div class="container">
    <?php require_once './shared/header.php' ?>
    <div class="mainContent">
      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev"></i>
              <i class="fa-solid fa-angle-right" id="next"></i>
            </div>
          </h2>
        </div>
      </div>
      <div id="wrapper">
        <div id="carousel">
          <div id="content">
            <li class="item-a">
              <div class="box">
                <?php if ($backdrop_path !== null) : ?>
                  <div class="slideBackdrop-img">
                    <img class="itemBackdrop" src="https://image.tmdb.org/t/p/w500<?= $backdrop_path ?>" alt="<?= $title || $name ?>" />
                  </div>
                <?php else : ?>
                  <div class="slideBackdrop-img">
                    <img class="itemBackdrop" src="image/indisponible.png" alt="Image non disponible" />
                  </div>
                <?php endif ?>
              </div>
              <?php if ($poster_path !== null) : ?>
                <div class="boxPoster">
                  <div class="slidePoster-img">
                    <img id="poster_img" class="itemPoster" src="https://image.tmdb.org/t/p/w500<?= $poster_path ?>" alt="<?= $title || $name ?>" />
                    <!-- 
                  <span class="notes">NOTE :
                    <span id="star1" class="fa fa-star "></span>
                    <span id="star2" class="fa fa-star"></span>
                    <span id="star3" class="fa fa-star"></span>
                    <span id="star4" class="fa fa-star"></span>
                    <span id="star5" class="fa fa-star"></span>
                  </span> -->

                  <?php else : ?>
                    <div class="boxPoster">
                      <div class="slidePoster-img">
                        <img id="poster_img" class="itemPoster" src="image/indisponible.png" alt="Image non disponible" />

                      <?php endif ?>
                      <div class="BA">

                        <div class="heart-like-button">
                          <div class="btn_ajout">
                            <?php if ($isExist) : ?>

                              <a href="./deleteFavorite.php?id=<?= $isExist['idFavoris'] ?>"><i class='bx bx-x'></i>Supprimer des favoris </a>

                              <!-- <a href="alerte.php?id=<?= $id ?>"><i class='bx bxs-bell-plus'> </i> M'alerter le jour de sa sortie</a> -->

                            <?php else : ?>
                              <a href="favoris.php?id=<?= $id ?>&type=<?= $type ?>"><i class='bx bxs-bookmark-plus'></i> Mettre en Favoris</a>

                            <?php endif; ?>

                          </div>
                        </div>
                        <?php if ($name) : ?>
                          <h2 class="title"><?= $title ?? $name ?> ( <?= $seasonsname ?> )</h2>
                          <?php if ($status === "Ended") : ?>
                            <h3 class="season_final"> ( Terminée )</h3>
                          <?php endif ?>
                        <?php else : ?>
                          <h2 class="title"><?= $title ?? $name ?></h2>
                        <?php endif ?>
                        <span class="dateSortie"> Date de sortie :
                          <span> <?php echo  $release_date ?? $first_air_date ?>
                          </span></span>
                        <span class="voteAverageImdb"><?= $vote  ?> /10
                          <img id="logoSize" class="logoAverage" src="icones/imdb.png" alt="">
                        </span>
                        <?php if ($name) : ?>
                          <span class="pays">Nationalité :
                            <?php
                            foreach ($resultSeason["production_countries"] as $p) {
                              $namepc = $p["name"] ?? null;
                              echo '
                      <span >' . $namepc .  ' -</span>
                      ';
                            }
                            ?></span>
                        <?php else :  ?>
                          <span class="pays">Nationalité :
                            <?php
                            foreach ($result["production_countries"] as $p) {
                              $namepc = $p["name"] ?? null;
                              echo '
                      <span >' . $namepc .  ' -</span>
                      ';
                            }
                            ?></span>
                        <?php endif  ?>
                        <span class="genreID"> Genre :
                          <?php foreach ($genre as $a) : ?>
                            <span> <?php echo $a['name']; ?></span>
                          <?php endforeach; ?></span>
                        <?php if ($name) : ?>
                          <a class="all_seasons" href="<?= $lien_s ?>">Afficher toutes les saisons</a>
                        <?php else : ?>
                        <?php endif  ?>
                        <span class="duree" style="color: white ;">
                          <?php $time ?>
                        </span>
                        <div id="resume_bis">
                          <h2 id="sypnosis">SYPNOSIS
                          </h2>
                          <p id="read_close"><?= substr($overview, 0, 300) .  '  ...<a href style="color:grey; text-decoration:none;"id="readmore" onclick="showSlides()">Lire la suite</a>'; ?></p>
                          <p id="read"><?= $overview ?></p>
                        </div>
                      </div>
                      </div>
                    </div>
            </li>
          </div>
        </div>
      </div>
      <div class="BA_bis">
        <div class="heart-like-button_bis">
          <div class="btn_ajout_bis">
            <?php if ($isExist) : ?>

              <a href="./deleteFavorite.php?id=<?= $isExist['idFavoris'] ?>"><i class='bx bx-x'></i>Supprimer des favoris </a>

              <!-- <a href="alerte.php?id=<?= $id ?>"><i class='bx bxs-bell-plus'> </i> M'alerter le jour de sa sortie</a> -->

            <?php else : ?>
              <a href="favoris.php?id=<?= $id ?>&type=<?= $type ?>"><i class='bx bxs-bookmark-plus'></i> Mettre en Favoris</a>

            <?php endif; ?>
          </div>
        </div>
        <?php if ($name) : ?>
          <h4 class="title_bis"><?= $title ?? $name ?> ( <?= $seasonsname ?> )</h4>
          <?php if ($status === "Ended") : ?>
            <h3 class="season_final_bis"> ( Terminée )</h3>
          <?php endif ?>
        <?php else : ?>
          <h2 class="title_bis"><?= $title ?? $name ?></h2>
        <?php endif ?>
        <span class="dateSortie_bis"> Date de sortie :
          <span> <?php echo  $release_date ?? $first_air_date ?>
          </span></span>
        <div class="imdb_vote">
          <img class="logoAverage_bis" src="icones/imdb.png" alt="">
          <span class="voteAverageImdb_bis"><?= $vote  ?> /10
        </div>
        </span>
        <!-- <span class="notes_bis">Note de CineStars :
          <span id="star1" class="fa fa-star "></span>
          <span id="star2" class="fa fa-star"></span>
          <span id="star3" class="fa fa-star"></span>
          <span id="star4" class="fa fa-star"></span>
          <span id="star5" class="fa fa-star"></span>
        </span> -->
        <?php if ($name) : ?>
          <span class="pays_bis">Nationalité :
            <?php
            foreach ($resultSeason["production_countries"] as $p) {
              $namepc = $p["name"] ?? null;
              echo '
                      <span >' . $namepc .  ' -</span>
                      ';
            }
            ?></span>
        <?php else :  ?>
          <span class="pays_bis">Nationalité :
            <?php
            foreach ($result["production_countries"] as $p) {
              $namepc = $p["name"] ?? null;
              echo '
                      <span >' . $namepc .  ' -</span>
                      ';
            }
            ?></span>
        <?php endif  ?>

        <span class="genreID_bis"> Genre :
          <?php foreach ($genre as $a) : ?>
            <span> <?php echo $a['name']; ?></span>
          <?php endforeach; ?></span>
        <?php if ($name) : ?>
          <a class="all_seasons_bis" href="<?= $lien_s ?>">Afficher toutes les saisons</a>
        <?php else : ?>
        <?php endif  ?>
      </div>
      <div id="resume">
        <h2 id="sypnosis">SYPNOSIS
        </h2>
        <p id="read_close_bis"><?= substr($overview, 0, 300) .  '  ...<a href style="color:grey; text-decoration:none;"id="readmore" onclick="showSlides_bis()">Lire la suite</a>'; ?></p>
        <p id="read_bis"><?= $overview ?></p>
      </div>
      <?php if ($type === 'tv') : ?>
        <div class="row" id="slider-text">
          <div class="swiper">
            <h2 class="titleSwiper">Créée par
            </h2>
          </div>
        </div>
        <div id="wrapperProduct">
          <div id="carouselProduct">
            <div id="contentProduct">
              <?php
              foreach ($resultSeason["created_by"] as $c) {
                $cbname = $c['name'] ?? null;
                $cbprofile_path = $c["profile_path"] ?? null;
                $idP = $c["id"] ?? null;
                $lien = "./actors_actress.php?id=" . $idP .  "&type=" . $type . "";

                if ($cbprofile_path) {
                  echo '
          
                  <li class="item-b">
                  <div class="box">
                    <div class="slideCast-img">
      <img class="itemCast" src="https://image.tmdb.org/t/p/w500' . $cbprofile_path . '" alt="' . $cbname . '" />
      </div>
      </div>
      <div class="detail-box">
        <div class="type" >
          <a class="namePerson" href="' . $lien . '" style="text-decoration : none ; font-size:0.7rem ; color:#00FFCB; ">' . $cbname . '</a>

        </div>

      </div>
   
  </li>
    

  ';
                } else {

                  echo '
                  <li class="item-b">
                  <div class="box">
                    <div class="slideCast-img">
            <img class="itemCast" src="image/indisponible.png" alt="Image non disponible" />
            </div>
            </div>
                <div class="detail-box">
                  <div class="type" >
                    <a class="namePerson" href="' . $lien . '" style="text-decoration : none ; font-size:0.7rem ; color:#00FFCB; ">' . $cbname . '</a>
          
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
      <?php endif; ?>
      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">Casting
            <div class="swipeButton">
              <i class="fas fa-solid fa-angle-left" id="prevCast"></i>
              <i class="fas fa-solid fa-angle-right" id="nextCast"></i>
            </div>
          </h2>
        </div>
      </div>
      <div id="wrapperCast">
        <div id="carouselCast">
          <div id="contentCast">
            <?php
            $urlPerson = "https://api.themoviedb.org/3/" . $type . "/" . $id . "/credits?api_key=e0e252f245f519ae01af7682ea83a642";

            $jsonPerson = file_get_contents($urlPerson);
            $cast = json_decode($jsonPerson, true);
            foreach ($cast['cast'] as $c) {
              $nameProfile = $c['name'] ?? null;
              $profile_path = $c["profile_path"] ?? null;
              $nameCharacter = $c["character"] ?? null;
              $idP = $c["id"] ?? null;
              $lien = "./actors_actress.php?id=" . $idP .  "&type=" . $type . "";
              if ($profile_path !== null) {
                echo '
              <li class="item-b">
                <div class="box">
                  <div class="slideCast-img">
                  <img class="itemCast" src="https://image.tmdb.org/t/p/w500' . $profile_path . '" alt="' . $nameProfile . '" />
                    <div class="overlaySlider">
                      <a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
                    </div>
                  </div>
                  <div class="detail-box">
                    <div class="type" >
                      <a class="namePerson" href="' . $lien . '" style="text-decoration : none ; font-size:0.7rem ; color:#00FFCB; ">' . $nameProfile . '</a>
                      <span class="personCharacter" style="font-size:0.7rem; color:#878484;position:relative;"> ' . $nameCharacter . '</span>
                    </div>

                  </div>
                </div>
              </li>
              ';
              } else {
                echo '
                <li class="item-b">
                  <div class="box">
                    <div class="slideCast-img">
  
                    <img class="itemCast" src="image/indisponible.png" alt="Image non disponible"  style="height:225px;"/>
                      <div class="overlaySlider">
                        <a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
                      </div>
                    </div>
                    <div class="detail-box">
                      <div class="type" >
                        <a class="namePerson" href="' . $lien . '" style="text-decoration : none ; font-size:0.7rem ; color:#00FFCB; ">' . $nameProfile . '</a>
                        <span class="personCharacter" style="font-size:0.7rem; color:#878484;position:relative;"> ' . $nameCharacter . '</span>
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


      <div class="provider">
        <h2 class="provider-heading">En streaming avec abonnement :</h2>
        <div class="iconeProvider">

          <?php if ($freeplatform) : ?>
            <?php foreach ($freeplatform as $f) : ?>

              <a href="<?= $homepage ?>" target="_blank"><img class="item" src="https://image.tmdb.org/t/p/original<?= $f['logo_path']  ?>" alt="<?= $f['title'] ?? $f['name'] ?? 'unknown' ?>" /></a>

            <?php endforeach; ?>
          <?php else : ?>
            <span>Non disponible sur les plateformes streamings</span>
          <?php endif; ?>

        </div>
        <h2>A la location :</h2>
        <div class="iconeProviderrent">
          <?php if ($rentplateform) : ?>
            <?php foreach ($rentplateform as $r) : ?>
              <a href="<?= $homepage ?>"><img class="item" src="https://image.tmdb.org/t/p/original<?= $r['logo_path']  ?>" target="_blank" alt="<?= $r['title'] ?? $r['name'] ?? 'unknown' ?>" /></a>
            <?php endforeach; ?>
          <?php else : ?>
            <span>Non disponible à la location</span>
          <?php endif; ?>
        </div>
        <h2>A l'achat :</h2>
        <div class="iconeProviderBuy">
          <?php if ($buyplateform) : ?>
            <?php foreach ($buyplateform as $b) : ?>
              <a href="<?= $homepage ?>"><img class="item" src="https://image.tmdb.org/t/p/original<?= $b['logo_path']  ?>" target="_blank" alt="<?= $b['title'] ?? $b['name'] ?? 'unknown' ?>" /></a>
            <?php endforeach; ?>
          <?php else : ?>
            <span class="fin_provider">Non disponible à l'achat</span>
          <?php endif; ?>
        </div>
      </div>

      <div class="videoCarousel">
        <div class="row" id="slider-text">
          <div class="swiper">
            <h2 class="titleSwiper">Bande-annonce ( <?= $nbreVideo ?> ) </h2>
            <div class="swipeButton_video">
              <i class="fas fa-solid fa-angle-left" id="prevVideo"></i>
              <i class="fas fa-solid fa-angle-right" id="nextVideo"></i>
            </div>
            </h2>
          </div>
        </div>
        <div id="wrapperVideo">
          <div id="carouselVideo">
            <div id="contentVideo">
              <?php
              $urlVideo = "https://api.themoviedb.org/3/" . $type . "/" . $id . "/videos?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";

              $jsonVideo = file_get_contents($urlVideo);
              $resultVideo = json_decode($jsonVideo, true);
              foreach ($resultVideo['results'] as $c) {
                $nameVideo = $c['name'] ?? null;
                $videoKey = $c["key"] ?? null;
                $videoIf = $c['id'] ?? null;
                echo '
              <li class="itemVideo-a">
                <div class="boxVideo">
                  <div class="slide-video">

                  <iframe class="iframe-container" src="https://www.youtube.com/embed/' . $videoKey . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   
                  </div>
                  <div class="detail-box">
                    <div class="type" >
                     
                      <span class="titreVideo" style="font-size:1rem; color:black;background-color:beige; text-align:center"> ' . $nameVideo . '</span>
                    </div>
                  </div>
                </div>
              </li>
              ';
              }
              ?>
            </div>
          </div>
        </div>
      </div>

      <?php if ($name) : ?>
        <div class="episode">
          <div class="epAct">
            <h5>Dernier épisode ( <?= $last_episode_to_airName ?> ) </h5>
            <?php if ($last_episode_to_airEpNbr === $number_of_episodes) : ?>
              <span> <?= $seasonsname ?> , épisode N° <?= $last_episode_to_airEpNbr ?> (Final) </span>
            <?php else : ?>
              <span> <?= $seasonsname ?> , épisode N° <?= $last_episode_to_airEpNbr ?> </span>
            <?php endif; ?>
            <span>Date de sortie de l'épisode : <?= $last_episode_to_airDate ?></span>
            <h6>Sypnosis de l'épisode : </h6>
            <?php if ($last_episode_to_airOverview === null) : ?>
              <p style="color:red ;"> Pas de résumé pour cet épisode pour le moment</p>
            <?php else :  ?>
              <p><?= $last_episode_to_airOverview ?></p>
            <?php endif  ?>
          </div>
          <?php if ($last_episode_to_airEpNbr === $number_of_episodes || $next_episode_to_air === null) : ?>
          <?php else : ?>
            <div class="epNext">
              <h5>Prochain épisode</h5>
              <span><?= $seasonsname ?> , épisode N° <?= $next_episode_to_airEpNbr ?> </span>
              <span>Date de sortie de l'épisode : <?= $next_episode_to_airDate ?></span>
              
            </div>
          <?php endif  ?>
        </div>
      <?php endif  ?>

      <!-- --------------------------------COMMENT----------------------------- -->
      <div class="crt">
        <div class="comment">
          <h2>DONNEZ VOTRE AVIS</h2>
          <?php if ($user) : ?>
            <form action="" class="comment-form" method="POST">
              <div class="title_comment">
                <img style="border-radius:50%; width:50px; height:50px; background-color:white" src="<?php echo $user['avatar'] ?>" alt="<?php echo $user['pseudo'] ?>">
                <span style="color: orange;"><?php echo $user['pseudo'] ?> le <?= $dateNow ?></span>
              </div>
              <br>
              <textarea rows="5" id="feedbackHere" type="text" name="comment" placeholder="Ecrire ton commentaire"></textarea>
              <li class="error1"></li>
              <li class="error2"></li>
              <br>
              <button class="btnComment">Comment</button>
            <?php else : ?>
              <span style="color: white;text-align: center;">Identifiez-vous pour écrire un commentaire.</span>
              <br>
              <a style="text-align: center;" href="./compte.php"><button id="myBtn" class="dropbtn">Compte </button></a>

            <?php endif; ?>
        </div>
        </form>
        <?php if ($type === 'movie') : ?>
          <?php foreach ($resultComment as $a) : ?>

            <div class="critique">
              <ul id="listAll">

                <div class="title_comment">
                  <img style="border-radius:50%; width:50px; height:50px; background-color:white" src="<?php echo $a['avatar_img'] ?? null ?>" alt="<?php echo $a['pseudo'] ?>">
                  <span style="color: orange;" class="userComment"><?php echo $a['pseudo'] ?> a commenté le <?php echo $a['datenow'] ?></span>
                </div>
                <span class="comment_user" style="color: white; width:90%" class="date"><?php echo $a['commentaire'] ?></span>
              </ul>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <?php foreach ($resultCommenttv as $b) : ?>

            <div class="critique">
              <ul id="listAll">
                <!-- <h4>Commentaires des spectateurs</h4> -->
                <div class="title_comment">
                  <img style="border-radius:50%; width:50px; height:50px; background-color:white" src="<?php echo $b['avatar_img'] ?? null  ?>" alt="<?php echo $b['pseudo'] ?>">


                  <span style="color: orange ;" class="userComment"><?php echo $b['pseudo'] ?> a commenté le <?php echo $b['datenow'] ?></span>
                </div>
                <p class="comment_user" style="color: white; width:90% " class="date"><?php echo $b['commentaire'] ?></p>

              </ul>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <!-- -------------------------------FIN COMMENT----------------------------- -->
    </div>
  </div>
  <?php require_once './shared/footer.php' ?>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


  <script>
    //Menu Burger

    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }

    //overlay video

    function openNavVideo() {
      document.getElementById("myNavVideo").style.width = "100%";
    }

    function closeNavVideo() {
      document.getElementById("myNavVideo").style.width = "0%";
    }

    function showSlides() {
      let y = document.getElementById("read_close");
      let x = document.getElementById("read");

      if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
      } else {
        x.style.display = "none";

      }
      event.preventDefault()
    }

    function showSlides_bis() {
      let y = document.getElementById("read_close_bis");
      let x = document.getElementById("read_bis");
      event.preventDefault()
      if (x.style.display === "none") {
        y.style.display = "none";
        x.style.display = "block";

      } else {
        x.style.display = "none";

      }

    }
  </script>



  <!-- <script src="JS/story.js"></script> -->
  <script src="JS/resume.js"></script>
  <!-- <script src="JS/resumeTV.js"></script> -->
</body>

</html>