<div class="footer">

    <img src="image/Cinestars.png" width="200" height="40" alt="Cinestars" id="logo_footer"></img>

    <div class="header_footer">

        <h5 style="color:red; font-size:1rem ;">Prochainement sur :</h5>
        <a href=""><i style="font-size:1.2rem ;margin-right: 10px;" class='bx bxl-twitter'></i>Twitter</a>
        <a href=""><i style="font-size:1.2rem ;margin-right: 10px;" class='bx bxl-facebook-square'></i>Facebook</a>
        <a href=""><i style="font-size:1.2rem ;margin-right: 10px;" class='bx bxl-instagram'></i>Instagram</a>

    </div>
    <div id="scroll_to_top">
        <a href="#"><i class='bx bxs-chevrons-up'></i></a>
    </div>


    <div class="menu_footer">

        <ul>
            <h5 style="color:#00FFCB; font-size:1rem ; ">Menu : </h5>
            <a href="./index.php">
                <li id="menu"><i style="font-size:1.2rem ;margin-right: 10px;" class="fas fa-light fa-house-user"></i>Accueil</li>
            </a>


            <?php if ($user) : ?>
                <a href='./favoris.php'>
                    <li id="menu"><i style="font-size:1.2rem ;margin-right: 10px;" class="fas fa-solid fa-heart"></i>Favoris</li>
                </a>

                <!-- <a href='./alerte.php'>
    <li id="menu"><i class="fas fa-solid fa-bell"></i>Mes Alertes</li>
  </a> -->
            <?php else : ?>
                <a href='./compte.php'>
                    <li id="menu"><i style="font-size:1.2rem ;margin-right: 10px;" class="fas fa-solid fa-heart"></i>Favoris</li>
                </a>
                <a href="./compte.php">
                    <li id="menu"><i style="font-size:1.2rem ;margin-right: 10px;" class='bx bxs-contact'></i>Nous contacter</li>
                </a>

            <?php endif; ?>

            <?php if ($user) : ?>
                <a href="./contact.php">
                    <li id="menu"><i style="font-size:1.2rem ;margin-right: 10px;" class='bx bxs-contact'></i>Nous contacter</li>
                </a>
            <?php else : ?>


            <?php endif; ?>
        </ul>
    </div>
</div>