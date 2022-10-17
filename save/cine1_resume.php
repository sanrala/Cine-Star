<?php
$pdo = require_once('./db.php');
$sessionId = $_COOKIE['session'] ?? false;

$id = $_GET['id'] ?? false;

if ($sessionId) {
  $stateSession = $pdo->prepare('SELECT * FROM session where idSession=:id');
  $stateSession->bindValue(':id', $sessionId);
  $stateSession->execute();
  $session = $stateSession->fetch();

  // var_dump($session);
  // die;

  $stateUser = $pdo->prepare('SELECT * FROM user WHERE idUser=:id');
  $stateUser->bindValue(':id', $session['idUser']);
  $stateUser->execute();
  $user = $stateUser->fetch();
} else {
  $user = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once './shared/head_resume.php' ?>


<body>
  <div class="container">
    <?php require_once './shared/header.php' ?>
    <div class="mainContent">

      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev"></i>
              <i class="fa-solid fa-angle-right" id="next"></i>
            </div>
          </h2>
        </div>
      </div>

      <div id="wrapper">

        <div id="carousel">

          <div id="content">



          </div>
        </div>
      </div>

      <div id="img">
        <li class="item-a">

          <div class="box">

            <div class="slide-img">

              <div class="overlay">

                <a href="#" class="love-btn">
                </a>
              </div>
            </div>

            <div class="type">



            </div>

        </li>


      </div>

      <div class="BA">

        <span class="notes">NOTE :

          <span id="star1" class="fa fa-star "></span>
          <span id="star2" class="fa fa-star"></span>
          <span id="star3" class="fa fa-star"></span>
          <span id="star4" class="fa fa-star"></span>
          <span id="star5" class="fa fa-star"></span>
        </span>

        <div class="video" onclick="openNavVideo()"><a href="#"><i class='bx bx-play-circle'></i></a></div>



        <div id="myNavVideo" class="overlayVideo">

          <a href="javascript:void(0)" class="closebtnVideo" onclick="closeNavVideo()">&times;</a>
          <div class="overlayVideo-content" id="video-content">

          </div>
        </div>

        <div class="heart-like-button">
          <div class="btn_ajout">
            <?php if ($user) : ?>
              <a href="favoris.php?id=<?= $id ?>"><i class='bx bxs-bookmark-plus'></i> Mettre en Favoris</a>
              <button><i class='bx bxs-bell-plus'> </i> M'alerter le jour de sa sortie</button>
            <?php else : ?>

            <?php endif; ?>
          </div>


        </div>
        <div class="provider">
          <h2>A VOIR EN STREAMING SUR :</h2>
        </div>
        <div class="row" id="slider-text">
          <div class="swiper">
            <h2 class="titleSwiper">CASTING
              <div class="swipeButton">
                <i class="fas fa-solid fa-angle-left" id="prevCast"></i>
                <i class="fas fa-solid fa-angle-right" id="nextCast"></i>
              </div>
            </h2>
          </div>
        </div>

        <div id="wrapperCast">

          <div id="carouselCast">

            <div id="contentCast">



            </div>
          </div>
        </div>

        <div id="resume">

          <h2 id="sypnosis">SYPNOSIS
          </h2>

        </div>






        <div class="watchProvider"></div>



        <div class="videoCarousel">

          <div class="row" id="slider-text">
            <div class="swiper">
              <h2 class="titleSwiper">VIDEOS
                <div class="swipeButton">
                  <i class="fas fa-solid fa-angle-left" id="prevVideo"></i>
                  <i class="fas fa-solid fa-angle-right" id="nextVideo"></i>
                </div>
              </h2>
            </div>
          </div>

          <div id="wrapperVideo">

            <div id="carouselVideo">

              <div id="contentVideo">



              </div>
            </div>
          </div>
        </div>
        <!-- --------------------------------VOTE----------------------------- -->

        <!-- <h3 id="voteSpec">VOTES SPECTATEURS</h3>



        <div class="vote">
          <span id="userRate">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </span>
          <p><span id="totalRateRatio"></span> moyenne sur <span id="totalRate"></span> votes.</p>
          <hr style="border:3px solid #f1f1f1">

          <div class="row">
            <div class="side">
              <div>5 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div id="rateFiveBar" class="bar-5"></div>
              </div>
            </div>
            <div class="side right">
              <div id="rateFive"></div>
            </div>
            <div class="side">
              <div>4 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div id="rateFourBar" class="bar-4"></div>
              </div>
            </div>
            <div class="side right">
              <div id="rateFour"></div>
            </div>
            <div class="side">
              <div>3 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div id="rateThreeBar" class="bar-3"></div>
              </div>
            </div>
            <div class="side right">
              <div id="rateThree"></div>
            </div>
            <div class="side">
              <div>2 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div id="rateTwoBar" class="bar-2"></div>
              </div>
            </div>
            <div class="side right">
              <div id="rateTwo"></div>
            </div>
            <div class="side">
              <div>1 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div id="rateOneBar" class="bar-1"></div>
              </div>
            </div>
            <div class="side right">
              <div id="rateOne"></div>
            </div>
          </div>
        </div> -->

        <!-- --------------------------------FIN VOTES----------------------------- -->


        <!-- --------------------------------COMMENT----------------------------- -->






        <div class="comment">
          <h2>CRITIQUES</h2><br>
          <?php if ($user) : ?>
            <input class="form-control" rows="1" id="userName" type="text" placeholder="Pseudo / Name?">

            <li class="error"></li>
            <li class="error3"></li>
            <br>
            <textarea rows="5" id="feedbackHere" placeholder="Ecrire ton commentaire"></textarea>

            <li class="error1"></li>
            <li class="error2"></li>
            <br>
            <button class="btnComment">Comment</button>
          <?php else : ?>
            <span style="color: white;text-align: center;">Identifiez-vous pour écrire un commentaire.</span>
            <br>
            <a style="text-align: center;" href="./compte.php"><button id="myBtn" class="dropbtn">Compte </button></a>
          <?php endif; ?>
        </div>

        <div class="critique">


          <ul id="listAll">
            <h4>Commentaires des spectateurs</h4>
            <hr>
            <span class="userComment"></span>
            <span class="date"></span>

          </ul>

        </div>

      </div>
      <!-- -------------------------------FIN COMMENT----------------------------- -->




    </div>


  </div>





  <div class="footer">
    <div id="scroll_to_top">
      <a href="#"><i class='bx bxs-chevrons-up'></i></a>
    </div>Copyright ©
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


  <script>
    //Menu Burger

    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }

    //overlay video

    function openNavVideo() {
      document.getElementById("myNavVideo").style.width = "100%";
    }

    function closeNavVideo() {
      document.getElementById("myNavVideo").style.width = "0%";
    }
  </script>



  <!-- <script src="JS/story.js"></script> -->
  <script src="JS/resume.js"></script>
  <!-- <script src="JS/resumeTV.js"></script> -->
</body>

</html>