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

      <a href="#">
        <li id="menu"><i class='bx bxs-contact'></i>Nous contacter</li>
      </a>

    </div>

  </div>
  <img src="image/Cinestars.png" width="200" height="40" alt="logo" id="logo"></img>

  <div class="menu">
    <form id="form">
      <input type="text" placeholder="Search" id="search" class="search">
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