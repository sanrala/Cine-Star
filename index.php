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

      <!-- <div class="mainBody">
        
        </div> -->
      <!-- <div class="row" id="slider-text">
          <div class="swiper">
            <h2 class="titleSwiper">TENDANCES -->

      <div class="swipeButton">
        <i class="fa-solid fa-angle-left" id="prevAffiche"></i>
        <i class="fa-solid fa-angle-right" id="nextAffiche"></i>
        <!-- </div>
            </h2>
          </div> -->
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
          <h2 class="titleSwiper">LES FILMS LES MIEUX NOTÉS
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
          <h2 class="titleSwiper">LES SERIES LES MIEUX NOTÉS
            <div class="swipeButton">
              <i class="fa-solid fa-angle-left" id="prev5"></i>
              <i class="fa-solid fa-angle-right" id="next5"></i>
            </div>
          </h2>
        </div>
      </div>


      <div id="wrapper5">


        <div id="carousel5">
          tghyhgh
          <div id="content5">



          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="footer">Copyright ©</div>
  <script src="JS/index.js" type="module"> </script>


  <script>
    //Menu Burger
    //Menu Burger
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }

    //Fin menu burger  


    // let slideIndex = 1;
    // showSlides(slideIndex);

    // function plusSlides(n) {
    //   showSlides(slideIndex += n);
    // }

    // function currentSlide(n) {
    //   showSlides(slideIndex = n);
    // }

    // function showSlides(n) {
    //   let i;
    //   let slides = document.getElementsByClassName("mySlides");
    //   let dots = document.getElementsByClassName("dot");
    //   if (n > slides.length) { slideIndex = 1 }
    //   if (n < 1) { slideIndex = slides.length }
    //   for (i = 0; i < slides.length; i++) {
    //     slides[i].style.display = "none";
    //   }
    //   for (i = 0; i < dots.length; i++) {
    //     dots[i].className = dots[i].className.replace(" active", "");
    //   }
    //   slides[slideIndex - 1].style.display = "block";
    //   dots[slideIndex - 1].className += " active";
    // }
  </script>
</body>
</body>

</html>