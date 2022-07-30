<?php
$id = $_GET['id'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once './shared/head_actors_actress.php' ?>


<body>
    <div class="container">
        <?php require_once './shared/header.php' ?>
        <div class="mainContent">
            <div class="profile">
                <!-- <img class="item" src="image/obiwan.jpg" alt=""> -->

                <div class="info_profile">
                    <!-- <h2>name</h2> -->
                    <div class="biography">

                        <h3>BIOGRAPHIE</h3>

                        <!-- 
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia perspiciatis in voluptatem voluptate laudantium culpa sit, temporibus molestiae! Fugiat eos illo doloremque, architecto expedita dolore possimus incidunt omnis sequi eveniet.
                            Quam facere autem beatae, sit iste reprehenderit officiis nisi doloremque assumenda ex! Fuga quia, inventore voluptatibus odio aliquam possimus enim dolores fugit eaque distinctio sunt, obcaecati quasi sequi necessitatibus consectetur.
                            Officiis, nam quia.<span id="dots">...</span><span id="more">
                                Quo saepe sunt fugit unde? Dolore quia facere facilis eos sint inventore velit itaque enim placeat magni voluptatem voluptatum, soluta nisi, sed cum, provident eaque dolor optio.
                                Corrupti, porro cum nam assumenda expedita facere necessitatibus voluptatum fuga. Quae explicabo hic architecto fugiat aut, consequatur nemo tempore possimus? Consectetur accusamus quibusdam ullam asperiores quidem illo optio harum laboriosam!
                                Quae obcaecati, porro assumenda, accusantium tenetur cupiditate quam accusamus laudantium minus quo possimus odio quas ratione? Aperiam eum corporis et accusantium! Nemo veritatis, vero quas perferendis odio necessitatibus accusamus illum.
                            </span></p>
                        <button onclick="myFunction()" id="myBtn">Read more</button> -->


                    </div>
                    <div class="info_life">
                        <!-- <span id="birthday">Né(e) le : 01/01/2000</span>
                        <span id="deathday">décédé(e) le : 01/01/2000</span>
                        <span id="placeOfBirth">Lieu de naissance :</span> -->
                    </div>
                </div>
            </div>


            <div class="row" id="slider-text">
                <div class="swiper">
                    <h2 class="titleSwiper">FILMOGRAPHIE
                        <div class="swipeButton">
                            <i class="fas fa-solid fa-angle-left" id="prev"></i>
                            <i class="fas fa-solid fa-angle-right" id="next"></i>
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


            <div class="slideshowDiapo-container">

                <!-- <div class="mySlides fade">

                    <img src="" style="width: 200px">
                    <div class="text">Caption Text</div>
                </div> -->

                <!-- <div class="mySlides fade">

                    <img src="image/Film2.jpg" style="width:200px">
                    <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">

                    <img src="image/Film1.jpg" style="width:200px">
                    <div class="text">Caption Three</div>
                </div> -->

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>


        </div>
    </div>
    <div class="footer">
        <div id="scroll_to_top">
            <a href="#"><i class='bx bxs-chevrons-up'></i></a>
        </div>Copyright ©
    </div>
    <script src="JS/actors_actress.js"></script>
    <script>
        //Menu Burger
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }




        // -------------DIAPOS--------------------------------
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
        // -------------FIN DE DIAPOS--------------------------------
    </script>
</body>

</html>