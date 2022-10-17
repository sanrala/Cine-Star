<?php

$pdo = require_once('./db.php');
$sessionId = $_COOKIE['session'];

if ($sessionId) {
    $stateLogout = $pdo->prepare('DELETE FROM session WHERE idSession=:id');
    $stateLogout->bindValue(':id', $sessionId);
    $stateLogout->execute();
    setcookie('session', '', time() - 1);
    header('Location: ./compte.php');
}
