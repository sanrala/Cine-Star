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
const ERROR_VERIFY_EMAIL = "L'email' existe déjà";
const ERROR_EMAIL = "L'email' n'est pas valide";

$errors = [
    'email' => '',
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_INPUT = filter_input_array(INPUT_POST, [

        'email' => FILTER_SANITIZE_EMAIL,


    ]);

    $email = $_INPUT['email'] ?? '';

    $stateVerifyEmail = $pdo->prepare('SELECT * FROM user WHERE email=:email');
    $stateVerifyEmail->bindValue(':email', $email);
    $stateVerifyEmail->execute();
    $response = $stateVerifyEmail->fetch();

    if ($response) {
        $errors['email'] = ERROR_VERIFY_EMAIL;
    }
    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    }


    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateUpdate = $pdo->prepare('UPDATE user SET  email = :email  WHERE idUser = :idUser');
        $stateUpdate->bindValue(':email', $email);
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


            <form action="./changeEmail.php" method="POST">
                <div class="profile">

                    <h1>Modification de l'Email</h1>
                    <div class="separateur"></div>

                    <br>

                    <div>

                        <input type="email" name="email" id="email" placeholder="Email" value=<?= isset($email) ? "$email" : "" ?>><br>

                        <?= $errors['email'] ? '<p style="color:red;font-size:10px">' . $errors['email'] . '</p>' : '' ?>
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