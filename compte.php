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
}


const ERROR_REQUIRED = "Veuillez renseigner ce champs";
const ERROR_CONNECT = "Le pseudo et/ou mot de passe ne correspond pas";


$errors = [
    'pseudo' => '',
    'password' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $pseudo = $_input['pseudo'];
    $password = $_POST['password'];

    if (!$pseudo) {
        $errors['pseudo'] = ERROR_REQUIRED;
    }

    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    }


    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $stateVerify = $pdo->prepare('SELECT * FROM user WHERE pseudo=:pseudo');
        $stateVerify->bindValue(':pseudo', $pseudo);
        $stateVerify->execute();
        $user = $stateVerify->fetch();


        if (password_verify($password, $user['password'])) {
            $stateSession = $pdo->prepare('INSERT INTO session VALUES (DEFAULT, :userid)');
            $stateSession->bindValue(':userid', $user['idUser']);
            $stateSession->execute();
            $sessionId = $pdo->lastInsertId();
            setcookie('session', $sessionId, time() + 60 * 60 * 24 * 180);

            header('location: ./index.php');
        } else {
            $errors['password'] = ERROR_CONNECT;
        }
    }
};
?>


<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared/head_compte.php' ?>


<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">
            <section class="connexion">
                <h1>CONNECTEZ-VOUS</h1>
                <div class="separateur"></div>
                <div class="signIn">
                    <form action="./compte.php" method="POST" class="login" id="dnoneLogin">

                        <label for="name"></label> <input type="text" placeholder="Name" id="name" name="pseudo" />
                        <?= $errors['pseudo'] ? '<p style="color:red;font-size:10px">' . $errors['pseudo'] . '</p>' : '' ?>
                        <label for="pass"><input type="password" placeholder="Password" id="password" name="password" />
                            <?= $errors['password'] ? '<p style="color:red;font-size:10px">' . $errors['password'] . '</p>' : '' ?>

                            <br>

                            <button id="pass">Se connecter</button>

                    </form>
                </div>



                <ul>
                    <li class="text">Pas de compte ? <a href="./inscription.php" id="sign">Inscrivez-vous</a></li>
                </ul>
            </section>
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