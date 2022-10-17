<?php
$id = $_GET['id'] ?? null;

$pdo = require_once('./db.php');

$stateDel = $pdo->prepare('DELETE FROM user_favori_film WHERE idFavoris=:id');
$stateDel->bindValue(':id', $id);
$stateDel->execute();

$stateDelete = $pdo->prepare('DELETE FROM favoris WHERE idFavoris=:id');
$stateDelete->bindValue(':id', $id);
$stateDelete->execute();
header('location: ./favoris.php');
