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


$errors = [
    'password' => '',
    'confirmPassword' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_INPUT = filter_input_array(INPUT_POST, [

        'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,


    ]);

    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';



    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    } else if (!preg_match('/^\S*(?=\S{8,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[!@#$%])(?=\S*[\d])\S*$/', $password)) {
        $errors['password'] = ERROR_PASSWORD;
    }
    if ($password !== $confirmPassword) {
        $errors['confirmPassword'] = ERROR_CONFIRM_PASSWORD;
    }


    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
        $stateUpdate = $pdo->prepare('UPDATE user SET  password = :password  WHERE idUser = :idUser');
        $stateUpdate->bindValue(':password', $hashedPassword);
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


            <form action="./changePassword.php" method="POST">
                <div class="profile">

                    <h1>Modification du mot de passe</h1>
                    <div class="separateur"></div>

                    <br>

                    <div>

                        <br>

                        <div>

                            <br>

                            <input type="password" name="password" id="password" placeholder="Mot de passe" value=<?= $password ?>><br>

                            <?= $errors['password'] ? '<p style="color:red;font-size:10px">' . $errors['password'] . '</p>' : '' ?>
                        </div>


                        <div>

                            <br>

                            <input type="password" name="confirmPassword" id="password" placeholder="confirmer le mot de passe" value=<?= isset($confirmPassword) ? "$confirmPassword" : "" ?>><br>

                            <?= $errors['confirmPassword'] ? '<p style="color:red;font-size:10px">' . $errors['confirmPassword'] . '</p>' : '' ?>
                        </div>


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