<?php

$password = '';
$dns = 'mysql:host=localhost;dbname=CineStars';
$user = 'root';


try {
    $pdo = new PDO($dns, $user, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    throw new Exception($e->getMessage());
}

return $pdo;
