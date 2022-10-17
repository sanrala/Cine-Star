<?php
$id = $_GET['id'] ?? null;

$pdo = require_once('./db.php');
$sessionId = $_COOKIE['session'];
$type = $_GET['type'] ?? false;

$stateSession = $pdo->prepare('SELECT * FROM session where idSession=:id');
$stateSession->bindValue(':id', $sessionId);
$stateSession->execute();
$session = $stateSession->fetch();



$stateReadFavorite = $pdo->prepare('SELECT * FROM favoris, user_favori_film 
WHERE favoris.idFavoris = user_favori_film.idFavoris and user_favori_film.idUser = :idSes');
$stateReadFavorite->bindValue(':idSes', $session['idUser']);
$stateReadFavorite->execute();
$favorite = $stateReadFavorite->fetchAll();

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
    // var_dump($user);
} else {
    header('Location: ./compte.php');
}
