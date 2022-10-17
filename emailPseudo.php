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


$to = $user['email']; //change receiver address  
$subject = "This is subject";
$question = null;
$lien = "https://www.cinestars.fr/changePseudo.php";
$lienProfile = "https://www.cinestars.fr/profile.php";

$header = "From:support@cinestars.fr \r\n";
$header .= "MIME-Version: 1.0 \r\n";
$header .= "Content-type: text/html;charset=UTF-8 \r\n";

$texte_html = "Vous avez fait une demande de modification du Pseudo.
                       Cliquez <a href=" . $lien . ">ici</a> pour le réinitialiser";

// $texte_html  = "Cliquez <a href=" . $lien . ">ici</a>";
// $texte_html .= "votre texte <br />";
// $texte_html .= "a ecrire ici <br />";

$result = mail($to, $subject, $texte_html, $header);

if ($result == true) {
    echo "Le message a été envoyé, vérifiez vos spams.
    Cliquez <a href=" . $lienProfile . ">ici</a> pour revenir sur votre compte ";
    header('Location: profile.php');
} else {
    echo "OOPS... Le message n'a pas été envoyé...";
}
