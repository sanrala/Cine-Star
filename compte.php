<?php
$id = $_GET['id'] ?? null;
$pdo = require_once('./db.php');



$error = ' ';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];




    if (!$password || !$pseudo) {
        $error = "TOUS LES CHAMPS DOIVENT ÊTRE REMPLIS";
    } else {
        $statementUser = $pdo->prepare('SELECT * FROM user WHERE pseudo=:pseudo AND mdpUser=:mdpUser');
        $statementUser->bindValue(':pseudo', $pseudo);
        $statementUser->bindValue(':mdpUser', $password);
        $statementUser->execute();
        $user = $statementUser->fetch();

        // var_dump($user);

        if ($user) {
            header("Location: ./?id=" . $user['idUser']);
        } else {
            $error = "Pseudo et/ou mot de passe incorrects";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/compte.css">
    <link rel="stylesheet" media="(max-width: 500px)" href="CSS/compte_mobile.css">
    <link rel="stylesheet" media="(max-width: 1234px)" href="css/tablet.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Grape+Nuts&family=Parisienne&family=Raleway:wght@200&family=Rubik+Microbe&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/158561a05e.js" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


    <title>CineStars</title>
</head>
<style>

</style>

<body>

    <div class="container">
        <div class="header_main">

            <ul id="burg">

                <li class="burger" onclick="openNav()"><a href="#"><i class="fas fa-solid fa-bars fa-2x"></i></a></li>
                <?php if (!$id) : ?>
                    <li>
                        <a href="./compte.php" id="compte"><i class="fas fa-solid fa-user"></i></a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="./compte.php" id="compte"><i class='bx bx-face'></i></a>
                    </li>
                <?php endif; ?>

            </ul>

            <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">


                    <a href="./index.php">
                        <li id="menu"><i class="fas fa-light fa-house-user"></i>Accueil</li>
                    </a>

                    <a href='./favoris.php?id=<?php echo $id; ?>'>
                        <li id="menu"><i class="fas fa-solid fa-heart"></i>Favoris</li>
                    </a>
                    <a href='./alerte.php?id=<?php echo $id; ?>'>
                        <li id="menu"><i class="fas fa-solid fa-bell"></i>Mes Alertes</li>
                    </a>

                    <a href="#">
                        <li id="menu"><i class='bx bxs-contact'></i>Nous contacter</li>
                    </a>

                </div>

            </div>
            <img src="image/Cinestars.png" width="200" height="40" alt="logo" id="logo"></img>

            <div class="menu">
                <form id="form">
                    <input type="text" placeholder="Search" id="search" class="search">
                    <div id="suggestions"></div>

                </form>

                <div class="dropdown">
                    <?php if (!$id) : ?>
                        <a href="./compte.php"><button id="myBtn" class="dropbtn">Compte </button></a>
                    <?php else : ?>
                        <a href="./compte.php"><button id="myBtn" class="dropbtnDeconnecting">Deconnexion </button></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="sidebar">

                <ul>

                    <a href="./index.php">
                        <li id="menu"><i class="fas fa-light fa-house-user"></i>Accueil</li>
                    </a>

                    <a href='./favoris.php?id=<?php echo $id; ?>'>
                        <li id="menu"><i class="fas fa-solid fa-heart"></i>Favoris</li>
                    </a>

                    <a href='./alerte.php?id=<?php echo $id; ?>'>
                        <li id="menu"><i class="fas fa-solid fa-bell"></i>Mes Alertes</li>
                    </a>

                    <a href="#">
                        <li id="menu"><i class='bx bxs-contact'></i>Nous contacter</li>
                    </a>


                </ul>
            </div>
            <div class="mainContent">

                <h1>CONNECTEZ-VOUS</h1>
                <div class="separateur"></div>
                <div class="signIn">
                    <form action="./compte.php" method="POST" class="login" id="dnoneLogin">

                        <label for="name"></label> <input type="text" placeholder="Name" id="name" name="pseudo" />
                        <label for="pass"><input type="password" placeholder="Password" id="password" name="password" />
                            <?php if ($error) :  ?>
                                <h4 style="color:red">
                                    <?= $error ?>
                                </h4>
                            <?php endif;  ?>
                            <button id="pass">submit</button>
                </div>


                </form>
                <ul>
                    <li class="text">Pas de compte ? <a href="" id="sign">Inscrivez-vous</a></li>
                </ul>
                <!-- <div class="signUp">
                    <form action="" class="sign_Up">

                        <label for="nameB"></label><input required type="text" placeholder="User" id="userSign" />
                        <li class="userSign"></li>
                        <label for="passB"></label> <input required type="password" placeholder="Password" id="userPassword" />
                        <li class="userPassword"></li>
                        <li id="error"></li>
                        <li id="error1"></li>
                        <li id="error2"></li>
                        <li id="error3"></li>
                        <li id="error4"></li>

                        <label for="mailB"></label><input required type="mail" placeholder="Email" id="userMail" />
                        <li class="userMail"></li>

                        <button id="btnIns">Inscrivez-vous</button>


                    </form>

                </div> -->
            </div>
        </div>
        <div class="footer">
            <div id="scroll_to_top">
                <a href="#"><i class='bx bxs-chevrons-up'></i></a>
            </div>Copyright ©
        </div>
        <!-- <script src="JS/compte.js" type="module"></script> -->
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