<?php
$id = $_GET['id'] ?? null;
$pdo = require_once('./db.php');
$sessionId = $_COOKIE['session'];
$type = $_GET['type'] ?? false;

$stateSession = $pdo->prepare('SELECT * FROM session where idSession=:id');
$stateSession->bindValue(':id', $sessionId);
$stateSession->execute();
$session = $stateSession->fetch();

// var_dump($session);
// die();


if ($id) {

    $url = "https://api.themoviedb.org/3/"  .  $type . "/"  .  $id . "?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";

    $json = file_get_contents($url);
    $result = json_decode($json, true);


    $date = $result['release_date'] ?? null;
    $datetv = $result['first_air_date'] ?? null;
    $title = $result['title'] ?? null;
    $titletv = $result['name'] ?? null;
    $img = $result['poster_path'] ?? null;
    $idF = $result['id'] ?? null;


    if ($type === 'movie') {


        $stateRead = $pdo->prepare('SELECT * from favoris WHERE idFilm=:idFilm AND type=:type AND idUser=:idUser');
        $stateRead->bindValue(':idFilm', $idF);
        $stateRead->bindValue(':type', $type);
        $stateRead->bindValue(':idUser', $session['idUser']);
        $stateRead->execute();
        $isExist = $stateRead->fetch();


        if (!$isExist) {
            $stateInsert = $pdo->prepare('INSERT INTO favoris (imgFavoris, nomFilmFavoris, dateSortieFavoris, type, idFilm, idUser ) VALUES (
         :img, :title, :date, :type, :idFilm, :idUser )');
            $stateInsert->bindValue(':img', $img);
            $stateInsert->bindValue(':title', $title);
            $stateInsert->bindValue(':date', $date);
            $stateInsert->bindValue(':type', $type);
            $stateInsert->bindValue(':idFilm', $idF);
            $stateInsert->bindValue(':idUser', $session['idUser']);
            $stateInsert->execute();
            $idFav = $pdo->lastInsertId();

            $stateFav = $pdo->prepare('INSERT INTO user_favori_film (idFavoris, idUser) VALUES (:idFav, :idUser)');
            $stateFav->bindValue(':idFav', $idFav);
            $stateFav->bindValue(':idUser', $session['idUser']);
            $stateFav->execute();
        }
    } else {
        $stateRead = $pdo->prepare('SELECT * from favoris WHERE idFilm=:idFilm AND type=:type AND idUser=:idUser');
        $stateRead->bindValue(':idFilm', $idF);
        $stateRead->bindValue(':type', $type);
        $stateRead->bindValue(':idUser', $session['idUser']);
        $stateRead->execute();
        $isExist = $stateRead->fetch();


        if (!$isExist) {
            $stateInsert = $pdo->prepare('INSERT INTO favoris (imgFavoris, nomSerieFavoris, dateSortieFavoris, type, idFilm, idUser ) VALUES (
             :img, :name, :datetv, :type, :idFilm, :idUser )');
            $stateInsert->bindValue(':img', $img);
            $stateInsert->bindValue(':name', $titletv);
            $stateInsert->bindValue(':datetv', $datetv);
            $stateInsert->bindValue(':type', $type);
            $stateInsert->bindValue(':idFilm', $idF);
            $stateInsert->bindValue(':idUser', $session['idUser']);
            $stateInsert->execute();
            $idFavTV = $pdo->lastInsertId();

            $stateFavTV = $pdo->prepare('INSERT INTO user_favori_film (idFavoris, idUser) VALUES (:idFav, :idUser)');
            $stateFavTV->bindValue(':idFav', $idFavTV);
            $stateFavTV->bindValue(':idUser', $session['idUser']);
            $stateFavTV->execute();
            // header('Location: ./cine1_resume.php');
        } else {
            // gérer un message comme quoi le film est déjà présent
        }
    }
}

$stateReadFavorite = $pdo->prepare('SELECT * FROM favoris, user_favori_film 
WHERE favoris.idFavoris = user_favori_film.idFavoris and user_favori_film.idUser = :idSes');
$stateReadFavorite->bindValue(':idSes', $session['idUser']);
$stateReadFavorite->execute();
$favorite = $stateReadFavorite->fetchAll();

if ($sessionId) {
    $stateSession = $pdo->prepare('SELECT * FROM session where idSession=:id');
    $stateSession->bindValue(':id', $sessionId);
    $stateSession->execute();
    $session = $stateSession->fetch();

    // var_dump($session);
    // die;

    $stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser=:id');
    $stateUser->bindValue(':id', $session['idUser']);
    $stateUser->execute();
    $user = $stateUser->fetch();
    // var_dump($user);
} else {
    header('Location: ./compte.php');
}


?>


<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared/head_favoris.php' ?>


<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">

            <div class="favoris">

                <?php foreach ($favorite as $f) : ?>

                    <div class="item">


                        <a href="./cine1_resume.php?id=<?= $id ?>&type=tv"> <img src="https://image.tmdb.org/t/p/w500<?= $f['imgFavoris']; ?> " /></a>

                        <a href="./deleteFavorite.php?id=<?= $f['idFavoris'] ?>">Supprimer des favoris</a>
                    </div>


                <?php endforeach; ?>



            </div>


        </div>
    </div>
    <?php require_once './shared/footer.php' ?>
    <script src="JS/favoris.js"></script>

</body>

</html>