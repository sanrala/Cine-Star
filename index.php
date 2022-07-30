<?php
$id = $_GET['id'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once './shared/head.php' ?>


<body>
  <div class="container">
    <?php require_once './shared/header.php' ?>
    <div class="mainContent">


      <div class="swipeButton">
        <i class="fa-solid fa-angle-left" id="prevAffiche"></i>
        <i class="fa-solid fa-angle-right" id="nextAffiche"></i>

      </div>

      <div id="wrapperAffiche">

        <div id="carouselAffiche">

          <div id="contentAffiche">

          </div>
        </div>
      </div>



      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES FILMS LES PLUS POPULAIRES
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

      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES PROCHAINES SORTIES : FILMS
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev4"></i>
              <i class="fa-solid fa-angle-right" id="next4"></i>
            </div>
          </h2>
        </div>
      </div>


      <div id="wrapper4">

        <div id="carousel4">

          <div id="content4">



          </div>
        </div>
      </div>

      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES FILMS DISNEY+ DU MOMENT
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevDisneyMovie"></i>
              <i class="fa-solid fa-angle-right" id="nextDisneyMovie"></i>
            </div>
          </h2>
        </div>
      </div>

      <div id="wrapperDisneyMovie">

        <div id="carouselDisneyMovie">

          <div id="contentDisneyMovie">



          </div>
        </div>
      </div>

      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES SERIES DISNEY+ DU MOMENT
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevDisneyTV"></i>
              <i class="fa-solid fa-angle-right" id="nextDisneyTV"></i>
            </div>
          </h2>
        </div>
      </div>

      <div id="wrapperDisneyPlusTV">

        <div id="carouselDisneyPlusTV">

          <div id="contentDisneyPlusTV">



          </div>
        </div>
      </div>


      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES FILMS NETFLIX
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev3"></i>
              <i class="fa-solid fa-angle-right" id="next3"></i>
            </div>
          </h2>
        </div>
      </div>

      <div id="wrapper3">

        <div id="carousel3">

          <div id="content3">



          </div>
        </div>
      </div>

      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES SERIES NETFLIX
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev5"></i>
              <i class="fa-solid fa-angle-right" id="next5"></i>
            </div>
          </h2>
        </div>
      </div>


      <div id="wrapper5">


        <div id="carousel5">

          <div id="content5">



          </div>
        </div>
      </div>


      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES SERIES LES PLUS POPULAIRES
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev2"></i>
              <i class="fa-solid fa-angle-right" id="next2"></i>
            </div>
          </h2>
        </div>
      </div>


      <div id="wrapper2">

        <div id="carousel2">

          <div id="content2">



          </div>
        </div>
      </div>



      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES FILMS AMAZON PRIME VIDEO
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevAPM"></i>
              <i class="fa-solid fa-angle-right" id="nextAPM"></i>
            </div>
          </h2>
        </div>
      </div>

      <div id="wrapperAPM">

        <div id="carouselAPM">

          <div id="contentAPM">



          </div>
        </div>
      </div>

      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES SERIES AMAZON PRIME VIDEO
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevAPTV"></i>
              <i class="fa-solid fa-angle-right" id="nextAPTV"></i>
            </div>
          </h2>
        </div>
      </div>


      <div id="wrapperAPTV">


        <div id="carouselAPTV">

          <div id="contentAPTV">



          </div>
        </div>
      </div>


      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES SERIES SUR CANAL+
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevCTV"></i>
              <i class="fa-solid fa-angle-right" id="nextCTV"></i>
            </div>
          </h2>
        </div>
      </div>

      <div id="wrapperCanalTV">

        <div id="carouselCanalTV">

          <div id="contentCanalTV">



          </div>
        </div>
      </div>

      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES FILMS SUR CANAL+
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevCanalMovie"></i>
              <i class="fa-solid fa-angle-right" id="nextCanalMovie"></i>
            </div>
          </h2>
        </div>
      </div>

      <div id="wrapperCanalMovie">

        <div id="carouselCanalMovie">

          <div id="contentCanalMovie">



          </div>
        </div>
      </div>

      <div class="row" id="slider-text">
        <div class="swiper">
          <h2 class="titleSwiper">LES SERIES SUR CANAL SERIES
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prevCanalSTV"></i>
              <i class="fa-solid fa-angle-right" id="nextCanalSTV"></i>
            </div>
          </h2>
        </div>
      </div>

      <div id="wrapperCanalSTV">

        <div id="carouselCanalSTV">

          <div id="contentCanalSTV">



          </div>
        </div>
      </div>


    </div>

  </div>

  <div class="footer">
    <div id="scroll_to_top">
      <a href="#"><i class='bx bxs-chevrons-up'></i></a>
    </div>Copyright ©
  </div>
  <script src="JS/index.js" type="module"> </script>


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
</body>

</html>