<?php

$id = $_GET['id'] ?? null;

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

const ERROR_REQUIRED = "Veuillez renseigner ce champs";
const ERROR_LENGTH = "Le champ doit faire entre 2 et 15 caractères";
const ERROR_VERIFY_PSEUDO = "Le pseudo existe déjà";
const ERROR_PSEUDO = "Le pseudo n'est pas valide";

$errors = [
    'pseudo' => '',
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_INPUT = filter_input_array(INPUT_POST, [

        'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,


    ]);

    $pseudo = $_INPUT['pseudo'] ?? '';

    $stateVerifyPseudo = $pdo->prepare('SELECT * FROM user WHERE pseudo=:pseudo');
    $stateVerifyPseudo->bindValue(':pseudo', $pseudo);
    $stateVerifyPseudo->execute();
    $response = $stateVerifyPseudo->fetch();

    if ($response) {
        $errors['pseudo'] = ERROR_VERIFY_PSEUDO;
    }
    if (!$pseudo) {
        $errors['pseudo'] = ERROR_REQUIRED;
    } else if (mb_strlen($pseudo) < 2 || mb_strlen($pseudo) > 15) {
        $errors['pseudo'] = ERROR_LENGTH;
    }

    // var_dump($user['idUser']);
    // die();
    // if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
    //     $stateVerify = $pdo->prepare('SELECT * FROM user WHERE pseudo=:pseudo');
    //     $stateVerify->bindParam(':pseudo', $pseudo);
    //     $stateVerify->execute();
    //     $user = $stateVerify->fetch();
    // } else {
    //     $errors['pseudo'] = ERROR_VERIFY_PSEUDO;
    // }
    // var_dump($errors['pseudo']);
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateUpdate = $pdo->prepare('UPDATE user SET  pseudo = :pseudo  WHERE idUser = :idUser');
        $stateUpdate->bindValue(':pseudo', $pseudo);
        $stateUpdate->bindValue(':idUser', $user['idUser']);
        $stateUpdate->execute();

        header('location: ./profile.php');
    }
};
?>



<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared/head_change.php' ?>


<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">


            <form action="./changePseudo.php" method="POST">
                <div class="profile">

                    <h1>Modification du Pseudo</h1>
                    <div class="separateur"></div>

                    <br>

                    <div>

                        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value=<?= isset($pseudo) ? "$pseudo" : "" ?>><br>

                        <?= $errors['pseudo'] ? '<p style="color:red;font-size:10px">' . $errors['pseudo'] . '</p>' : '' ?>
                    </div>

                    <div>

                        <br>

                        <button class="valid">Modifier</button>
                    </div>

            </form>

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