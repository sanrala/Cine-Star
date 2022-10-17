<?php
$pdo = require_once('./db.php');
$sessionId = $_COOKIE['session'] ?? false;


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
} else {
    $user = null;
}



?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared/head_search.php' ?>


<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">
            <?php
            $id = $_GET['id'] ?? null;
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $search = filter_input_array(INPUT_POST, [
                    'search' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
                ]);          
                $query = $_POST["search"];
                if (
                    $query === 'porn' || $query === 'PORN' || $query === 'Porn'  || $query === 'pOrn' || $query === 'poRn' || $query === 'porN'
                    ||   $query === 'porno' || $query === 'Porno' || $query === 'pOrno' || $query === 'poRno' || $query === 'porNo' || $query === 'pornO'
                    || $query === 'PORNÔ' || $query === 'pOrnô' ||  $query === 'poRnô' || $query === 'pornô' || $query === 'pornÔ' || $query === 'PORNO'
                    || $query === 'xxx' || $query === 'XxX' || $query === 'Xxx' || $query === 'xXX' || $query === 'xxX' || $query === 'xx' || $query === 'xX' || $query === 'Xx' || $query === 'XX'
                    || $query === 'hentai' || $query === 'HENTAI' || $query === 'Hentai' || $query === 'hEntai' || $query === 'heNtai' || $query === 'henTai' || $query === 'hentAi' || $query === 'hentaI'
                    || $query === 'masturbation'  || $query === 'MASTURBATION' || $query === 'Masturbation' || $query === 'mAsturbation' || $query === 'maSturbation' || $query === 'masTurbation' || $query === 'mastUrbation' || $query === 'mastuRbation' || $query === 'masturBation'
                    || $query === 'masturbAtion'  || $query === 'masturbaTion' || $query === 'masturbatIon' ||  $query === 'masturbAtiOn' || $query === 'masturbAtioN'
                    || $query === 'anal'   || $query === 'ANAL' || $query === 'Anal' || $query === 'aNal' || $query === 'anAl' || $query === 'anaL'
                ) {
                } else if ($search) {

                    $query = $_POST["search"];
                    $resStr = str_replace(' ', '+', $query);

                    $url =  "https://api.themoviedb.org/3/search/multi?api_key=e0e252f245f519ae01af7682ea83a642&language=fr-FR&page=1&include_adult=false&query=" . $resStr;

                    $json = file_get_contents($url);
                    $result = json_decode($json, true);
                    if ($query === '') {
                        echo `
<p style="color:white;font-size:10px;font-weight:bold;text-align:center>Merci de saisir des mots-clé dans la barre de recherche </p>
`;
                    } else {

                        foreach ($result['results'] as  $r) {
                            $title = $r['title'] ?? null;
                            $name = $r['name'] ?? null;
                            $genre_ids = $r['genre_ids'] ?? null;
                            $id = $r["id"] ?? null;
                            $poster_path = $r["poster_path"] ?? null;
                            $backdrop_path = $r["backdrop_path"] ?? null;
                            $overview = $r["overview"] ?? null;
                            $biography = $r["biography"] ?? null;

                            $lien = "./cine1_resume.php?id=" . $id . "&type=movie";
                            $lienTV = "./cine1_resume.php?id=" . $id . "&type=tv";
                            $person = `./actors_actress.php?id=" . $id . "&type=movie`;
                            $personTV = `./actors_actress.php?id=" . $id . "&type=tv`;

                            if ($title) {
                                echo '
        
     
      <div class="item" >
          <h2>
         
              ' . $title  . ' 
              
          </h2>
         
          <div class="info">
              <div class="poster">
                  <img src="https://image.tmdb.org/t/p/w500' . $poster_path . '" style="width: 100px; height: auto;">
              </div>
              <div class="overview">
                  ' . $overview . '
                  <a href="' . $lien . '" style="color : "white">clique ici</a>
         
              </div>
              </div>
             
      </div>
    
    
      ';
                            } else {
                                echo '
   
        <div class="item" >
            <h2>
           
                ' . $name  . ' 
                
            </h2>
           
            <div class="info">
                <div class="poster">
                    <img src="https://image.tmdb.org/t/p/w500' . $poster_path . '" style="width: 100px; height: auto;">
                </div>
                <div class="overview">
                    ' . $overview . '
                    <a href="' . $lienTV . '" style="color : "white">clique ici</a>
           
                </div>
                </div>
               
        </div>
     
      
        ';
                            }
                        }
                    }
                }
            }

            ?>
        </div>
    </div>
    <?php require_once './shared/footer.php' ?>

    <script src="JS/favoris.js"></script>

</body>

</html>