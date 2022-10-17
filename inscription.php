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
    $stateUser->bindValue(':id', $session['userId']);
    $stateUser->execute();
    $user = $stateUser->fetch();
} else {
    $user = null;
}

const ERROR_REQUIRED = "Veuillez renseigner ce champs";
const ERROR_LENGTH = "Le champ doit faire entre 2 et 15 caractères";
const ERROR_EMAIL = "L'email n'est pas valide";
const ERROR_PASSWORD = "Le mot de passe doit contenir un caractère spécial, une majuscule et minimum 8 caractères";
const ERROR_PASSWORD2 = "Le mot de passe doit contenir un caractère spécial et une majuscule";
const ERROR_CONFIRM_PASSWORD = "Le mot de passe ne correspond pas";
const ERROR_VERIFY_MAIL = "Le mail existe déjà";

$errors = [
    'pseudo' => '',
    'email' => '',
    'password' => '',
    'confirmPassword' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_INPUT = filter_input_array(INPUT_POST, [

        'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL

    ]);

    $pseudo = $_INPUT['pseudo'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_INPUT['email'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    $stateVerifyMail = $pdo->prepare('SELECT * FROM user WHERE email=:email');
    $stateVerifyMail->bindValue(':email', $email);
    $stateVerifyMail->execute();
    $response = $stateVerifyMail->fetch();

    if ($response) {
        $errors['email'] = ERROR_VERIFY_MAIL;
    }

    if (!$pseudo) {
        $errors['pseudo'] = ERROR_REQUIRED;
    } else if (mb_strlen($pseudo) < 2 || mb_strlen($pseudo) > 15) {
        $errors['pseudo'] = ERROR_LENGTH;
    }

    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    } else if (!preg_match('/^\S*(?=\S{8,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[!@?#*$%])(?=\S*[\d])\S*$/', $password)) {
        $errors['password'] = ERROR_PASSWORD;
    }
    if ($password !== $confirmPassword) {
        $errors['confirmPassword'] = ERROR_CONFIRM_PASSWORD;
    }

    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL;
    }




    // si aucune erreur, on recupere les valeurs des input et on fait une requete vers la base de données

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
        $stateInsert = $pdo->prepare('INSERT INTO user (pseudo,  email, password)
         VALUES (:pseudo,  :email, :password)');
        $stateInsert->bindParam(':email', $email);
        $stateInsert->bindParam(':pseudo', $pseudo);
        $stateInsert->bindValue(':password', $hashedPassword);
        $stateInsert->execute();

        header('location: ./compte.php');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared/head_inscription.php' ?>


<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">


            <form action="./inscription.php" method="POST">
                <div class="profile">

                    <h1>INSCRIVEZ-VOUS</h1>
                    <div class="separateur"></div>

                    <br>
                    <section class="signin">
                        <div>

                            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value=<?= isset($pseudo) ? "$pseudo" : "" ?>><br>

                           
                            <?= $errors['pseudo'] ? '<p style="color:red;font-size:10px">' . $errors['pseudo'] . '</p>' : '' ?>
                        </div>




                        <div id="inf">



                            <input type="password" name="password" id="password" placeholder="Mot de passe" autocomplete="off" value=<?= isset($password) ? "$password" : "" ?>><br>

                            <?= $errors['password'] ? '<p style="color:red;font-size:10px">' . $errors['password'] . '</p>' : '' ?>
                            <div class="profil">
                                <i id="ico" class='bx bx-info-circle'></i>
                                <div class="dd_menu">
                                    <div class="dd_center">
                                        <ul>

                                            <li><span>Entre 8 et 15 caractères</span></li>
                                            <li> <span>Au moins 1 majuscule</span></li>
                                            <li> <span>Au moins 1 chiffre</span></li>
                                            <li><span>Au moins 1 symbole (! @ ? # * $ %)</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>




                            <br>

                            <input type="password" name="confirmPassword" id="password" placeholder="confirmer le mot de passe" value=<?= isset($confirmPassword) ? "$confirmPassword" : "" ?>><br>

                            <?= $errors['confirmPassword'] ? '<p style="color:red;font-size:10px">' . $errors['confirmPassword'] . '</p>' : '' ?>
                        </div>


                        <div>
                            <br>

                            <input type="text" name="email" id="email" placeholder="Email" value=<?= isset($email) ? "$email" : "" ?>><br>

                            <?= $errors['email'] ? '<p style="color:red;font-size:10px">' . $errors['email'] . '</p>' : '' ?>
                        </div>


                        <br>

                        <button class="valid">S'inscrire</button>
                </div>

            </form>

            </section>

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

        const avatar = document.querySelector('#ico');

        avatar.addEventListener('mouseover', function() {
            document.querySelector('.dd_menu').classList.toggle('active');
        });


        AOS.init();
    </script>

</body>

</html>