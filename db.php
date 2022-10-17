<?php

// $password = 'Troufion59!';
// $dns = 'mysql:host=db5009974391.hosting-data.io;dbname=dbs8456013';
// $user = 'dbu607552';

$password = '';
$dns = 'mysql:host=localhost;dbname=cinestars';
$user = 'root';

// $password = 'Troufion59!?';
// $dns = 'mysql:host=localhost;dbname=id19532559_cinestars';
// $user = 'id19532559_horn';


try {
    $pdo = new PDO($dns, $user, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    throw new Exception($e->getMessage());
}

return $pdo;
