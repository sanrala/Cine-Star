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
const ERROR_EMAIL = "L'email n'est pas valide";

$errors = [
    'pseudo' => '',
    'email' => '',
    'question' => '',
    'sujet' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_input = filter_input_array(INPUT_POST, [
        'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'sujet' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $pseudo = $_input['pseudo'];
    $email = $_input['email'];
    $question = $_POST['question'];
    $sujet = $_input['sujet'];

    if (!$pseudo) {
        $errors['pseudo'] = ERROR_REQUIRED;
    }

    if (!$sujet) {
        $errors['sujet'] = ERROR_REQUIRED;
    }

    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL;
    }
};

?>

<!DOCTYPE html>
<html lang="fr">

<?php require_once './shared/head_contact.php' ?>


<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">

            <section class="contact">
                <div class="form_container">
                    <form action="" method="POST">
                        <h1>Une question ? Contactez-nous !</h1>
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo">
                        <?= $errors['pseudo'] ? '<p style="color:red;font-size:10px">' . $errors['pseudo'] . '</p>' : '' ?>

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <?= $errors['email'] ? '<p style="color:red;font-size:10px">' . $errors['email'] . '</p>' : '' ?>

                        <label for="sujet">Sujet</label>
                        <input type="text" name="sujet" id="sujet">
                        <?= $errors['sujet'] ? '<p style="color:red;font-size:10px">' . $errors['sujet'] . '</p>' : '' ?>

                        <label class="mv20" for="question">Questions ou remarques</label>
                        <textarea name="question" id="question" cols="30" rows="10"></textarea>
                        <input id="pass" type="submit" value="Envoyer le message">
                    </form>
                    <?php
                    $to = 'support@cinestars.Fr'; //change receiver address  
                    $subject = "Demande d'utilisateur";
                    $question = null;


                    $header = "From:support@cinestars.fr \r\n";
                    $header = "MIME-Version: 1.0 \r\n";
                    $header = "Content-type: text/html;charset=UTF-8 \r\n";

                    $message = "Message envoyé depuis la page Contact de CineStars.fr>
                        Pseudo : " . $_POST['pseudo'] ?? null . "
                       Email : " . $_POST['email'] ?? null . "
                       Question : " . $_POST['question'] ?? null;

                    $result = mail($to, $subject, $message, $header);

                    if ($result == true) {
                        echo '<p style="color:white;">Votre message a bien été envoyé.</p>';
                    }

                    ?>
                </div>
            </section>
        </div>

    </div>

    <?php require_once './shared/footer.php' ?>
    <script src="JS/index.js" type="module"> </script>


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