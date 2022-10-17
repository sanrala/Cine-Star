<div class="header_main">
  <div id="menu">
    <input type="checkbox" id="chekbox-burger">
    <span id="button-burger"></span>
    <nav class="nav_sidebar">

      <ul>
        <li>
          <a href="./index.php">
            <i class="fas fa-light fa-house-user"></i>
            <!-- Accueil -->
          </a>

        </li>
        <li>
          <?php if ($user) : ?>
            <a href='./favoris.php'>
              <i class="fas fa-solid fa-heart"></i>
              <!-- Favoris -->
            </a>
        </li>
        <li>
          <a href="./contact.php">
            <i class='bx bxs-contact'></i>
            <!-- Nous contacter -->
          </a>
        </li>
        <li>
          <a href='./logout.php'>
            <i class="fas fa-solid fa-plug-circle-xmark"></i>
            <!-- Déconnexion -->
          </a>
        </li>
        <!-- <a href='./alerte.php'>
    <li id="menu"><i class="fas fa-solid fa-bell"></i>Mes Alertes</li>
  </a> -->
      <?php else : ?>
        <li>
          <a href='./compte.php'>
            <i class="fas fa-solid fa-heart"></i>
            <!-- Favoris -->
        </li>
        </a>
        <li>
          <a href='./compte.php'>
            <i class="fas fa-sharp fa-solid fa-plug"></i>
            <!-- Connexion -->
        </li>
        </a>
        <li>
          <a href="./compte.php">
            <i class='bx bxs-contact'></i>
            <!-- Nous contacter -->
          </a>
        </li>
      <?php endif; ?>


      </ul>
    </nav>
  </div>

  <ul id="burg">

    <li class="burger" onclick="openNav()"><a href="#"><i class="fas fa-solid fa-bars fa-2x"></i></a></li>

    <form action="./search.php" method="POST">
      <input type="text" placeholder="Rechercher votre film" id="searchBar" class="searchBar" name="search">
      <button class="btnSearch"><i class="fas fa-solid fa-magnifying-glass"></i></button>

    </form>
    <?php if ($user) : ?>
      <li>
        <a href="./profile.php" id="compte"><img id="avatar" src="<?php echo $user['avatar'] ?>" alt="<?php echo $user['pseudo'] ?>"></a>
      </li>


    <?php else : ?>
      <?php if ($sessionId) : ?>
        <li>
          <a href="./compte.php" id="compte"><i class="fas fa-solid fa-user"></i></a>
        </li>
      <?php endif; ?>
    <?php endif; ?>

  </ul>

  <!-- <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">


      <a href="./index.php">
        <li id="menu"><i class="fas fa-light fa-house-user"></i>Accueil</li>
      </a>

      <?php if ($user) : ?>
        <a href='./favoris.php'>
          <li id="menu"><i class="fas fa-solid fa-heart"></i>Favoris</li>
        </a>

        <a href='./logout.php'>
          <li id="menu"><i class="fa-solid fa-plug-circle-xmark"></i>Déconnexion</li>
        </a>

      <?php else : ?>

        <a href='./compte.php'>
          <li id="menu"><i class="fas fa-solid fa-heart"></i>Favoris</li>
        </a>

        <a href='./compte.php'>
          <li id="menu"><i class="fas fa-sharp fa-solid fa-plug"></i>Connexion</li>
        </a>
      <?php endif; ?>

      <?php if ($user) : ?>
        <a href="./contact.php">
          <li id="menu"><i class='bx bxs-contact'></i>Nous contacter</li>
        </a>
      <?php else : ?>

        <a href='./compte.php'>
          <li id="menu"><i class="bx bxs-contact"></i>Nous contacter</li>
        </a>
      <?php endif; ?>
    </div>

  </div> -->

  <img src="image/Cinestars.png" width="200" height="40" alt="cinestars" id="logo"></img>

  <div class="menu">
    <form action="./search.php" id="form" method="POST">
      <input type="text" placeholder="Rechercher votre film" id="searchBar" class="searchBar" name="search">
      <button class="btnSearch" type="submit"><i class="fas fa-solid fa-magnifying-glass"></i></button>
      <p class="searchValue"></p>
    </form>

    <div class="dropdown">


      <?php if ($user) : ?>

        <a href="./profile.php" id="compte"><img id="avatar" src="<?php echo $user['avatar'] ?>" alt="<?php echo $user['pseudo'] ?>"></a>

        <a href="./logout.php"><button id="myBtn" class="dropbtnDeconnecting">Deconnexion </button></a>
      <?php else : ?>


        <a href="./compte.php"><button id="myBtn" class="dropbtn">Compte </button></a>
      <?php endif; ?>

    </div>
  </div>
</div>
<div class="main">
  <div class="sidebar">


  </div>