<?php
$id = $_GET['id'] ?? null;

$pdo = require_once('./db.php');



$sessionId = $_COOKIE['session'];

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
    header('Location: ./compte.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once './shared/head.php' ?>


<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">
        </div>
    </div>
    <?php require_once './shared/footer.php' ?>
    <script src="JS/favoris.js"></script>

</body>

</html>