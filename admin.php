<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="CSS/compte.css">
    <link rel="stylesheet" media="(max-width: 500px)" href="CSS/mobile.css">
    <link rel="stylesheet" media="(max-width: 1234px)" href="CSS/tablet.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Grape+Nuts&family=Parisienne&family=Raleway:wght@200&family=Rubik+Microbe&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/158561a05e.js" crossorigin="anonymous"></script>



    <title>CineStars</title>
</head>
<style>

</style>

<body>





    <div class="header_main">

        <ul id="burg">

            <li class="burger" onclick="openNav()"><a href="#"><i class="fas fa-solid fa-bars fa-2x"></i></a></li>
            <input type="name" class="form-control" id="user_name" placeholder="un film , une série, ...">
            <!-- <button type="submit" class="btn btn-block btn-primary">Submit</button> -->
            <li id="btnCompte"><a href="" id="compte"><img src="icones/compte.png" width="30px" height="30px"></img></a>
            </li>
        </ul>

        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">


                <li><a href="index.html">Accueil</a></li>
                <li><a href="#">Cinéma</a></li>
                <li><a href="#">Séries</a></li>
                <li><a href="#">Streaming</a></li>
                <li><a href="favoris.html">Favoris</a></li>

            </div>

        </div>

        <div class="menu">
            <div class="menu_btn">
                <div class="header">
                    <img src="image/Cinestars.png" width="200" height="40" alt="logo"></img>
                </div>
                <div class="menu_lien">
                    <ul>

                        <li id="menu"><a href="index.html" class="active">Accueil</a></li>
                        <li id="menu"><a href="#">Cinéma</a></li>
                        <li id="menu"><a href="#">Séries</a></li>
                        <li id="menu"><a href="#">Streaming</a></li>
                        <li id="menu"><a href="favoris.html">Favoris</a></li>


                    </ul>

                </div>

            </div>

            <div class="dropdown">
                <a href="compte.html"><button id="myBtn" class="dropbtn">Compte </button></a>
                <div id="myDropdown" class="dropdown-content">
                    <div class="signIn">
                        <form action="" class="login">
                            <label  for="name"></label>  <input required type="text" placeholder="Name" id="name" />
                            <label for="pass"><input required type="password" placeholder="Password" id="password" />
                         <ul class="passError"></ul>
                            <button id="pass">Connexion</button>
                        </div>
                </div>
            </div>

        </div>

    </div>

    <div class="container">



       


    </div>
<script src="JS/compte.js" type="module"></script>
</body>