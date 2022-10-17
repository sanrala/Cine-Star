<?php
$pdo = require_once('./db.php');
$sessionId = $_COOKIE['session'] ?? false;

$id = $_GET['id'] ?? null;
$type = $_GET['type'] ?? false;
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

//photos acteurs/actrices

$url = "https://api.themoviedb.org/3/person/" . $id . "/images?api_key=e0e252f245f519ae01af7682ea83a642";

$json = file_get_contents($url);
$result = json_decode($json, true);

foreach ($result['profiles'] as $r) {
    $idAPI = $r["id"] ?? null;
    $file_path = $r["file_path"] ?? null;
}
// FIN photos acteurs/actrices

//Information acteurs/actrices
$urlProfile = "https://api.themoviedb.org/3/person/" . $id . "?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";
$urlProfileUS = "https://api.themoviedb.org/3/person/" . $id . "?api_key=e0e252f245f519ae01af7682ea83a642&language=en-US";
$json = file_get_contents($urlProfile);
$jsonUS = file_get_contents($urlProfileUS);
$resultProfile = json_decode($json, true);
$resultProfileUS = json_decode($jsonUS, true);
// echo '<pre>',
// var_dump($resultProfileUS);
// echo '</pre>';

$biographyUS = $resultProfileUS['biography'] ?? null;
$biography = $resultProfile['biography'] ?? null;
$deathday = $resultProfile['deathday'] ?? null;
$birthday = $resultProfile['birthday'] ?? null;
$known_for_department = $resultProfile['known_for_department'] ?? null;
$name = $resultProfile['name'] ?? null;
$place_of_birth = $resultProfile['place_of_birth'] ?? null;
$profile_path = $resultProfile['profile_path'] ?? null;
$gender = $resultProfile['gender'] ?? null;
$homepage = $resultProfile['homepage'] ?? null;


//Fin Information acteurs/actrices

// AGE
if ($birthday) {
    $date = new DateTime();

    $dateNow = $date->format('Y-m-d');

    $diff = date_diff(date_create($birthday), date_create($dateNow));
    $age = $diff->format('%y');
}
//FIN AGE


//nbre d'année depuis son décès
if ($deathday) {
    $diffDeath = date_diff(date_create($deathday), date_create($dateNow));
    $ageDeath = $diffDeath->format('%y');
    //Fin nbre d'année depuis son décès
    //AGE DECES
    $death = $age - $ageDeath;


    //FIN AGE DECES
}

$urlRSociaux = "https://api.themoviedb.org/3/person/" . $id . "/external_ids?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";

$jsonRSociaux = file_get_contents($urlRSociaux);
$resultRSociaux = json_decode($jsonRSociaux, true);

$facebook = $resultRSociaux['facebook_id'] ?? null;
$instagram = $resultRSociaux['instagram_id'] ?? null;
$twitter = $resultRSociaux['twitter_id'] ?? null;


?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared/head_actors_actress.php' ?>

<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">
            <div class="profile">
                <div class="info_profile">
                    <img class="item" src="https://image.tmdb.org/t/p/w500/<?= $profile_path ?>" alt="<?= $name ?>">
                    <div class="infoPerso">
                        <div class="resSociaux">
                            <a class="rs" href="https://www.facebook.com/<?= $facebook ?>" target="_blank" alt="https://www.facebook.com/<?= $facebook ?>"><i class=" fa-brands fa-facebook"></i></a>
                            <a class="rs" href="https://www.instagram.com/<?= $instagram ?>" target="_blank" alt="https://www.instagram.com/<?= $instagram ?>"><i class="fa-brands fa-instagram"></i></a>
                            <a class="rs" href="https://twitter.com/<?= $twitter ?>" target="_blank" alt="https://twitter.com/<?= $twitter ?>"><i class="fa-brands fa-twitter"></i></a>

                        </div>
                        <h2 class="name_bis" style="color: orange;"><?= $name ?></h2>
                        <h4>Informations personnelles</h4>
                        <div class="celebre">
                            <h5>Célèbre pour : </h5>
                            <span id="job"> <?= $known_for_department ?></span>
                        </div>
                        <div class="genreP">
                            <h5>Genre : </h5>
                            <?php if ($gender === 2) : ?>
                                <span id="gender"> Homme </span>
                            <?php elseif ($gender === 1) : ?>
                                <span id="gender"> Femme </span>
                            <?php endif ?>
                        </div>
                        <div class="birth">
                            <h5>Date de naissance : </h5>
                            <?php if ($birthday === null) : ?>
                                <span id="birthday"> Date de naissance inconnue </span>

                            <?php else : ?>
                                <span id="birthday">Né(e) le : <?= $birthday ?> </span>


                                <?php if ($deathday === null) : ?>
                                    <span id="age">( <?= $age ?> ans ) </span>

                                <?php else : ?>


                                    <h5>Date de décès : </h5>
                                    <span id="deathday">décédé(e) le : <?= $deathday ?> à l'âge de <?= $death ?> ans</span>
                                <?php endif; ?>

                        </div>

                        <div class="naissance">
                            <h5>Lieu de naissance :</h5>
                            <span id="placeOfBirth"> <?= $place_of_birth ?></span>
                        <?php endif; ?>
                        </div>
                        <div class="homepage">
                            <?php if ($homepage) : ?>
                                <h5>Site officiel :</h5>
                                <a id="homepage" href="<?= $homepage ?>"><?= $homepage ?></a>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <div class="biography">
                    <h1 style="color: orange;"><?= $name ?></h1>
                    <h3>Biographie</h3>

                    <?php if ($biography === "") : ?>

                        <p><?= $biographyUS ?></p>
                    <?php else : ?>
                        <p id="read_close"><?= substr($biography, 0, 300) .  '  ...<a href style="color:grey; text-decoration:none;"id="readmore" onclick="showSlides()">Lire la suite</a>'; ?></p>
                        <p id="read"><?= $biography ?></p>
                    <?php endif; ?>

                    <div class="row" id="slider-text">
                        <div class="swiper">
                            <h3 class="titleSwiper">Filmographie
                                <div class="swipeButton">
                                    <i class="fas fa-solid fa-angle-left" id="prev"></i>
                                    <i class="fas fa-solid fa-angle-right" id="next"></i>
                                </div>
                            </h3>
                        </div>
                    </div>

                    <div id="wrapper">

                        <div id="carousel">

                            <div id="content">

                                <?php

                                $key = "e0e252f245f519ae01af7682ea83a642";

                                $url = "https://api.themoviedb.org/3/person/" . $id . "/combined_credits?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";

                                $json = file_get_contents($url);
                                $result = json_decode($json, true);

                                foreach ($result['cast'] as  $r) {
                                    $title = $r['title'] ?? null;
                                    $name = $r['name'] ?? null;
                                    $idc = $r['id'] ?? null;
                                    $poster_path = $r["poster_path"] ?? null;
                                    $release_date = $r["release_date"] ?? null;
                                    $first_air_date = $r["first_air_date"] ?? null;

                                    $lien = "./cine1_resume.php?id=" . $idc .  "&type=movie";
                                    $lienTV = "./cine1_resume.php?id=" . $idc .  "&type=tv";

                                    if ($poster_path !== null) {
                                        if ($title) {
                                            echo '

<li class="item-a">
<div class="box">
<div class="slide-img">

<img class="itemCast" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $title  .   '" />
<div class="overlaySlider">
<a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div class="detail-box">
<div class="type">
<a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.6rem ; color:white; text-align:center;position:relative;">' . $title   . '</a>


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
    
    <img class="itemCast" src="https://image.tmdb.org/t/p/w500' . $poster_path . '" alt="' . $name  .   '" />
    <div class="overlaySlider">
    <a href="' . $lienTV . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
    </div>
    </div>
    <div class="detail-box">
    <div class="type">
    <a class="nameMovies" href="' . $lienTV . '"style="text-decoration : none ; font-size:0.6rem ; color:white; text-align:center;position:relative;">' . $name  . '</a>
   
    </div>
    
    </div>
    </div>
    </li>
    
    
    ';
                                        }
                                    } else {
                                        echo '

<li class="item-a">
<div class="box">
<div class="slide-img">

<img class="itemCast" src="image/indisponible.png" alt="Image non disponible" />
<div class="overlaySlider">
<a href="' . $lien . '" class="seeMore" style="text-decoration: none;">Voir détails...</a>
</div>
</div>
<div class="detail-box">
<div class="type">
<a class="nameMovies" href="' . $lien . '"style="text-decoration : none ; font-size:0.6rem ; color:white; text-align:center;position:relative;">' . $title  . '</a>

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
        </div>
    </div>


    <?php require_once './shared/footer.php' ?>
    <script src="JS/actors_actress.js"></script>
    <script>
        //Menu Burger
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }




        // -------------DIAPOS--------------------------------
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
        // -------------FIN DE DIAPOS--------------------------------


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
    </script>
</body>

</html>