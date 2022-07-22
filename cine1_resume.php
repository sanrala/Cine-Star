<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/cine_resume.css">
  <link rel="stylesheet" media="(max-width: 500px)" href="CSS/mobile_cine_resume.css">
  <link rel="stylesheet" media="(max-width: 1225px)" href="CSS/tablet.resume.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Grape+Nuts&family=Parisienne&family=Raleway:wght@200&family=Rubik+Microbe&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/158561a05e.js" crossorigin="anonymous"></script>
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <title>CineStars</title>
</head>


<body>





  <div class="container">
    <div class="header_main">

      <ul id="burg">

        <li class="burger" onclick="openNav()"><a href="#"><i class="fas fa-solid fa-bars fa-2x"></i></a></li>

        <li><a href="./compte.php" id="compte"><i class="fas fa-solid fa-user"></i></a></li>
      </ul>

      <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">


          <a href="./index.php">
            <li id="menu"><i class="fas fa-light fa-house-user"></i>Accueil</li>
          </a>
          <a href="./favoris.php">
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

          <a href="./compte.php"><button id="myBtn" class="dropbtn">Compte </button></a>

        </div>
      </div>
    </div>
    <div class="main">
      <div class="sidebar">

        <ul>

          <a href="./index.php">
            <li id="menu"><i class="fas fa-light fa-house-user"></i>Accueil</li>
          </a>
          <a href="./favoris.php">
            <li id="menu"><i class="fas fa-solid fa-heart"></i>Favoris</li>
          </a>
          <a href="#">
            <li id="menu"><i class='bx bxs-contact'></i>Nous contacter</li>
          </a>


        </ul>
      </div>
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

              <!-- <div class="detail-box"> -->
              <!-- <span>Bande-annonce</span> -->
              <div class="type">

                <!-- <div class="heartbox">
                    <input type="checkbox" class="checkbox" id="checkbox" />
                    <label for="checkbox">
                      <svg id="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg">
                        <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                          <path
                            d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z"
                            id="heart" fill="#AAB8C2" />
                          <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5" />
                        </g>
                      </svg>
                    </label>
                  </div> -->
                <!-- </div> -->

              </div>

          </li>

        </div>


        <div class="BA">


          <div class="video" onclick="openNavVideo()"><a href="#"><i class='bx bx-play-circle'></i></a></div>



          <div id="myNavVideo" class="overlayVideo">

            <a href="javascript:void(0)" class="closebtnVideo" onclick="closeNavVideo()">&times;</a>
            <div class="overlayVideo-content" id="video-content">

            </div>
          </div>


          <div id="resume">
            <h3 id="sypnosis">SYPNOSIS</h3>

          </div>



          <span class="notes">NOTE :

            <span id="star1" class="fa fa-star "></span>
            <span id="star2" class="fa fa-star"></span>
            <span id="star3" class="fa fa-star"></span>
            <span id="star4" class="fa fa-star"></span>
            <span id="star5" class="fa fa-star"></span>
          </span>




          <!-- --------------------------------VOTE----------------------------- -->

          <h3 id="voteSpec">VOTES SPECTATEURS</h3>



          <div class="vote">
            <span id="userRate">
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star"></span>
              <span class="fa fa-star">

              </span>
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
          </div>

          <!-- --------------------------------FIN VOTES----------------------------- -->


          <!-- --------------------------------COMMENT----------------------------- -->

          <h3>CRITIQUES</h3>




          <div class="comment">

            <input class="form-control" rows="1" id="userName" type="text" placeholder="Pseudo / Name?">

            <li class="error"></li>
            <li class="error3"></li>
            <br>
            <textarea rows="5" id="feedbackHere" placeholder="Ecrire ton commentaire"></textarea>

            <li class="error1"></li>
            <li class="error2"></li>
            <br>
            <button class="btnComment">Comment</button>
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
    <div class="footer">Copyright ©</div>

    <!-- 
    <div class="container">

      <div class="header_main">

        <ul id="burg">

          <li class="burger" onclick="openNav()"><a href="#"><i class="fas fa-solid fa-bars fa-2x"></i></a></li>
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

                <li id="menu"><a href="index.html">Accueil</a></li>
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
                  <label for="name"></label> <input required type="text" placeholder="Name" id="name" />
                  <label for="pass"><input required type="password" placeholder="Password" id="password" />
                    <ul class="passError"></ul>
                    <button id="pass">Connexion</button>
              </div>
            </div>
          </div>

        </div>

      </div>



      <div class="main">



        <div class="content">

          <div class="films">

            <h2>

            </h2>

            <div class="actually">
              <div id="img">
                <li class="item-a">
                  <div class="box">

                    <div class="slide-img">

                      <div class="overlay">

                        <a href="#" class="love-btn">
                        </a>
                      </div>
                    </div>
                    <div class="detail-box">
                      <span>Bande-annonce</span>
                      <div class="type">

                        <div class="heartbox">
                          <input type="checkbox" class="checkbox" id="checkbox" />
                          <label for="checkbox">
                            <svg id="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg">
                              <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                                <path
                                  d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z"
                                  id="heart" fill="#AAB8C2" />
                                <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5" />
                              </g>
                            </svg>
                          </label>
                        </div>
                      </div>

                    </div>
                </li>
              </div>


              <div id="infos">
                <p class="info_film">

                </p>


                <div id="classement">

                  <span class="notes">NOTER :

                    <span id="star1" class="fa fa-star "></span>
                    <span id="star2" class="fa fa-star"></span>
                    <span id="star3" class="fa fa-star"></span>
                    <span id="star4" class="fa fa-star"></span>
                    <span id="star5" class="fa fa-star"></span>
                  </span>
                </div>
              </div>



            </div>

            <div class="imgFilms">
              <div class="photos">
                <span id="photos">LES PHOTOS <button id="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24">
                      <path fill="none" d="M0 0h24v24H0V0z" />
                      <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
                    </svg>
                  </button>
                  <button id="next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24">
                      <path fill="none" d="M0 0h24v24H0V0z" />
                      <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                    </svg>
                  </button></span>

                <div id="wrapper">

                  <div id="carousel">

                    <div id="content">



                    </div>
                  </div>

                  <div class="photos2">
                    <span id="photos2">LES ACTEURS/ACTRICES <button id="prev2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24">
                          <path fill="none" d="M0 0h24v24H0V0z" />
                          <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
                        </svg>
                      </button>
                      <button id="next2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24">
                          <path fill="none" d="M0 0h24v24H0V0z" />
                          <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                        </svg>
                      </button></span>

                    <div id="wrapper">

                      <div id="carousel2">

                        <div id="contentActor">

                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div> -->

    <!-- <div id="resume">
      <h3>SYPNOSIS</h3>

    </div>
    <div class="BA">
      <h3>BANDE-ANNONCE</h3>

    </div> -->
    <!-- --------------------------------VOTE----------------------------- -->

    <!-- <h3>VOTES SPECTATEURS</h3>



    <div class="vote">
      <span id="userRate">
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star">

        </span>
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

    <!-- <h3>CRITIQUES</h3>




    <div class="comment">

      <input class="form-control" rows="1" id="userName" type="text" placeholder="Pseudo / Name?">

      <li class="error"></li>
      <li class="error3"></li>
      <br>
      <textarea rows="5" id="feedbackHere" placeholder="Ecrire ton commentaire"></textarea>

      <li class="error1"></li>
      <li class="error2"></li>
      <br>
      <button class="btnComment">Comment</button>
    </div>

    <div class="critique">


      <ul id="listAll">
        <h4>Commentaires des spectateurs</h4>
        <hr>
        <span class="userComment"></span>
        <span class="date"></span>

      </ul>





    </div>



  </div> -->
    <!-- -------------------------------FIN COMMENT----------------------------- -->




    <!-- </div>
  </div>


  </div>
  </div>
  <div class="footer"></div> -->
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