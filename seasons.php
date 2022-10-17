<?php
$id = $_GET['id'] ?? null;
$type = $_GET['type'] ?? false;
$season_number = $_GET['season_number'] ?? null;

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

$url = "https://api.themoviedb.org/3/tv/" . $id . "?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";

$json = file_get_contents($url);
$result = json_decode($json, true);


foreach ($result['seasons'] as $r) {
    $name = $r['name'] ?? null;
    $poster_path = $r['poster_path'] ?? null;
    $overview = $r['overview'] ?? null;
    $idSeason = $r['id'] ?? null;
    $season_number = $r['season_number'] ?? null;
    $episode_count = $r['episode_count'] ?? null;
    $lien = "./cine1_resume.php?id=" . $id .  "&type=tv";

    // if ($overview === "") {
    var_dump($season_number);
    $urlCredits = "https://api.themoviedb.org/3/tv/" . $id . "/season/" .  $season_number . "/aggregate_credits?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR";
    $jsonCredits = file_get_contents($urlCredits);
    $resultCredits = json_decode($jsonCredits, true);
    foreach ($resultCredits['cast'] as $c) {

        $profile_path = $c['profile_path'] ?? null;
      
    };
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared/head_search.php' ?>

<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">

            <?php foreach ($result['seasons'] as $r) : ?>
                <div class="item">

                    <h2> <?= $r['name'] ?? null  ?></h2>

                    <div class="info">
                        <div class="poster">
                            <img src="https://image.tmdb.org/t/p/w500<?php echo $r['poster_path']  ?>" style="width: 100px; height: auto;">
                        </div>
                        <div class="overview">
                            <?php if ($r['overview'] ?? null === "") : ?>
                                <h2>Sypnosis : </h2>

                                <?= $r['overview'] ?? null ?>
   
                        </div>
     
                    </div>

                </div>
            <?php endif  ?>
        <?php endforeach  ?>

        </div>

    </div>

    </div>
    <?php require_once './shared/footer.php' ?>

    <script>
        //Menu Burger
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }

        //Fin menu burger  
    </script>

</body>

</html>