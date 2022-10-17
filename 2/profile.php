<?php
// header('Location: profile.php');
$id = $_GET['id'] ?? null;
$imgAvatar = $_GET['img'] ?? null;
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
};

// var_dump($user['idUser']);





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_INPUT = filter_input_array(INPUT_POST, [
        'photo_profile' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        //   'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        //   'email' => FILTER_SANITIZE_EMAIL,
        //   'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ]);

    $photo = $_INPUT['photo_profile'];

    // var_dump($photo);

    $stateSelect = $pdo->prepare('SELECT * from user WHERE idUser=:idUser ');
    // $stateSelect->bindValue(':avatar', $photo);
    $stateSelect->bindValue(':idUser', $session['idUser']);
    $stateSelect->execute();


    $stateInsert = $pdo->prepare('UPDATE user SET avatar=:avatar WHERE idUser=:idUser ');
    $stateInsert->bindValue(':avatar', $photo);
    $stateInsert->bindValue(':idUser', $session['idUser']);

    $stateInsert->execute();
    header('Location: profile.php');
}

$stateRead = $pdo->prepare('SELECT * FROM avatars');
// $stateRead->bindValue(':img', $imgAvatar);

$stateRead->execute();
$result = $stateRead->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared/head_profile.php' ?>


<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">

            <div class="avatars" id="myDIV">

                <?php foreach ($result as $r) : ?>


                    <a href="./profile.php?img=<?= $r['img'] ?>" class="btn">
                        <img class="av" src=" <?= $r['img']  ?>" alt="">
                    </a>
                <?php endforeach ?>

            </div>


            <form action="./profile.php" method="POST" class="select_avatar">



                <!-- <input style="border-radius:50%; width:50%; height:150px; margin:0 auto; background-color:beige" type="image" value="<?= $imgAvatar ?>" name="totof" class="profile_av" src="<?= $imgAvatar ?>" alt="<?php echo $user['pseudo'] ?>"> -->


                <img name="photo" class="profile_avatar" style="border-radius:50%; width:150px; height:150px; margin:0 auto; background-color:beige" src="<?= $user['avatar'] ?>" alt="<?php echo $user['pseudo'] ?>">
                <button class="btn_avatar" name="btn_avatar"> Sauvegarder </button>

                <input type="text" id="sel" name="photo_profile" value=<?= isset($imgAvatar) ? "$imgAvatar" : "" ?>><br>
                <p style="color:red ;"><?= $failed ?? null ?></p>
                <p style="color:#00FFCB ;"><?= $success ?? null ?></p>


                <span style="color:orange" name="pseudo">Pseudo :
                    <span class="user"> <?php echo $user['pseudo'] ?></span><a href="./emailPseudo.php"><i class="fas fa-eraser"></i></a>
                </span>
                <span style="color:orange" name="email">Email :
                    <span class="user"> <?php echo $user['email'] ?> </span><a href="./emailEmail.php"><i class="fas fa-solid fa-eraser"></i></a></span>
                <span style="color:orange" name="password">Mot de passe :
                    <span class="user"> ********* </span><a href="./emailPassword.php"><i class="fas fa-solid fa-eraser"></i></a></span>


            </form>

        </div>
        <!-- </div>-->
    </div>
    </div>
    <?php require_once './shared/footer.php' ?>
    <!-- <script src="JS/compte.js" type="module"></script> -->
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