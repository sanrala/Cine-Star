<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_INPUT = filter_input_array(INPUT_POST, [
        'totof' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        //   'pseudo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        //   'email' => FILTER_SANITIZE_EMAIL,
        //   'password' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ]);

    $photo = $_INPUT['photo_profile'];

    var_dump($photo);
    $stateInsert = $pdo->prepare('UPDATE user SET avatar=:avatar ');
    $stateInsert->bindValue(':avatar', $photo);

    $stateInsert->execute();
}

$stateRead = $pdo->prepare('SELECT * FROM avatars');
// $stateRead->bindValue(':img', $imgAvatar);

$stateRead->execute();
$result = $stateRead->fetchAll();
