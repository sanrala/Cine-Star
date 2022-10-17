// ---------------------------CAROUSEL---------------------------
const gapCast = 16;

const carouselCast = document.getElementById("carouselCast"),
  contentCast = document.getElementById("contentCast"),
  nextCast = document.getElementById("nextCast"),
  prevCast = document.getElementById("prevCast");

nextCast.addEventListener("click", e => {
  carouselCast.scrollBy(widthCast + gapCast, 0);


});
prevCast.addEventListener("click", e => {
  carouselCast.scrollBy(-(widthCast + gapCast), 0);


});

let widthCast = carouselCast.offsetWidth;
window.addEventListener("resize", e => (widthCast = carouselCast.offsetWidth));

// ---------------------------FIN CAROUSEL---------------------------

// ---------------------------CAROUSEL VIDEO---------------------------
const gapVideo = 16;

const carouselVideo = document.getElementById("carouselVideo"),
  contentVideo = document.getElementById("contentVideo"),
  nextVideo = document.getElementById("nextVideo"),
  prevVideo = document.getElementById("prevVideo");

nextVideo.addEventListener("click", e => {
  carouselVideo.scrollBy(widthVideo + gapVideo, 0);


});
prevVideo.addEventListener("click", e => {
  carouselVideo.scrollBy(-(widthVideo + gapVideo), 0);


});

let widthVideo = carouselVideo.offsetWidth;
window.addEventListener("resize", e => (widthVideo = carouselVideo.offsetWidth));

// ---------------------------FIN CAROUSEL---------------------------


// -------------------VOTE-------------------------------------

const userRateItem = $("#userRate .fa-star");

userRateItem.on("mouseover", function () {
  $(this).prevAll(".fa-star").addClass("checked");
  $(this).addClass("checked");
})
userRateItem.on("mouseleave", function () {
  userRateItem.removeClass("checked");

})
// Document Load System Start
$(document).ready(function () { RateSystem() });

function RateSystem() {
  // Items

  let rateOne = 1;
  let rateTwo = 0;
  let rateThree = 0;
  let rateFour = 0;
  let rateFive = 0;
  Variables(rateOne, rateTwo, rateThree, rateFour, rateFive)

  userRateItem.click(function () {
    const itemIndex = $(this).index() + 1;

    if (itemIndex === 1) {
      rateOne = rateOne + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
    else if (itemIndex === 2) {
      rateTwo = rateTwo + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
    else if (itemIndex === 3) {
      rateThree = rateThree + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
    else if (itemIndex === 4) {
      rateFour = rateFour + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
    else if (itemIndex === 5) {
      rateFive = rateFive + 1;
      Variables(rateOne, rateTwo, rateThree, rateFour, rateFive);
    }
  })

  function Variables(rateOne, rateTwo, rateThree, rateFour, rateFive) {
    // Total Item Rate
    const totalRate = rateOne + rateTwo + rateThree + rateFour + rateFive;
    // Items Rate
    const rateOneBar = (100 * rateOne) / totalRate;
    const rateTwoBar = (100 * rateTwo) / totalRate;
    const rateThreeBar = (100 * rateThree) / totalRate;
    const rateFourBar = (100 * rateFour) / totalRate;
    const rateFiveBar = (100 * rateFive) / totalRate;





    // HTML Content
    $("#totalRate ").text(totalRate);

    // Rate Star
    $("#rateFive").text(rateFive);
    $("#rateFour").text(rateFour);
    $("#rateThree").text(rateThree);
    $("#rateTwo").text(rateTwo);
    $("#rateOne").text(rateOne);

    // Rate Bar
    $("#rateFiveBar").css("width", rateFiveBar + "%");
    $("#rateFourBar").css("width", rateFourBar + "%");
    $("#rateThreeBar").css("width", rateThreeBar + "%");
    $("#rateTwoBar").css("width", rateTwoBar + "%");
    $("#rateOneBar").css("width", rateOneBar + "%");
    // Rate Ratio
    const rateTotal = (rateOne * 1) + (rateTwo * 2) + (rateThree * 3) + (rateFour * 4) + (rateFive * 5);
    const average = rateTotal / totalRate
    totalVote(average)
    var digits = average.toString().split('');
    var realDigits = digits.map(Number);
    // Rate Undefined If Else
    $("#totalRateRatio ").text(realDigits[0] + ',' +
      (realDigits[2] === undefined ? " 0 " : realDigits[2]) +
      (realDigits[3] === undefined ? " 0 " : realDigits[3]))




  }
}




let span1 = document.querySelector('#star1');
let span2 = document.querySelector('#star2');
let span3 = document.querySelector('#star3');
let span4 = document.querySelector('#star4');
let span5 = document.querySelector('#star5');



function totalVote(average) {

  if (average >= 0 && average <= 1) {


    // if (span1.classList.contains('checked')){
    span1.classList.remove('checked');
    span2.classList.remove('checked');
    span3.classList.remove('checked');
    span4.classList.remove('checked');
    span5.classList.remove('checked');
    // }
  }
  else if (average > 1 && average < 2) {
    span1.classList.add('checked');

    if (span2.classList.contains('checked')) {
      span2.classList.remove('checked');
      span3.classList.remove('checked');
      span4.classList.remove('checked');
      span5.classList.remove('checked');
    }
  } else if (average >= 2 && average < 3) {
    span1.classList.add('checked');
    span2.classList.add('checked');
    if (span3.classList.contains('checked')) {
      span3.classList.remove('checked');
      span4.classList.remove('checked');
      span5.classList.remove('checked');
    }
  } else if (average >= 3 && average < 4) {
    span1.classList.add('checked');
    span2.classList.add('checked');
    span3.classList.add('checked');
    if (span4.classList.contains('checked')) {

      span4.classList.remove('checked');
      span5.classList.remove('checked');
    }
  } else if (average >= 4 && average < 5) {
    span1.classList.add('checked');
    span2.classList.add('checked');
    span3.classList.add('checked');
    span4.classList.add('checked');
    if ($("star4").hasClass('checked')) {

      span5.classList.remove('checked');
    }
  }
  else {
    span1.classList.add('checked');
    span2.classList.add('checked');
    span3.classList.add('checked');
    span4.classList.add('checked');
    span4.classList.add('checked');
  }
}




// ----------------FIN DE VOTE --------------------







// const btnComment = document.querySelector('.btnComment')
// const ul = document.querySelector('#listAll')

// const text = document.querySelector('#feedbackHere')
// const userName = document.querySelector('#userName')
// const user = document.querySelector('.userComment')
// const dateComment = document.querySelector('.date')
// const date = new Date().toLocaleString("fr-FR", {
//   weekday: 'short',
//   month: 'long',
//   day: 'numeric',
//   year: 'numeric',
//   hour: 'numeric',
//   min: 'numeric'

// })

// let error = document.querySelector('.error')
// let error1 = document.querySelector('.error1')
// let error2 = document.querySelector('.error2')





// function comment() {

//   const liName = document.createElement('li')
//   liName.classList.add('liName')
//   liName.innerText = userName.value + " a commenté le " + date
//   liName.style.color = 'blue'




//   const liComment = document.createElement('li')
//   liComment.classList.add('liComment')
//   liComment.innerText = text.value
//   ul.append(liName, dateComment, liComment)



// }




// btnComment.addEventListener('click', (e) => {
//   e.preventDefault()
//   let text = document.querySelector("#feedbackHere").value;
//   let name = document.querySelector("#userName").value;


//   let error1 = document.querySelector('.error1')
//   let error2 = document.querySelector('.error2')
//   let error3 = document.querySelector('.error3')
//   let error = document.querySelector('.error')

//   error1.innerText = ''
//   error2.innerText = ''
//   error3.innerText = ''
//   error.innerText = ''

//   if (text.length < 8) {

//     error1.innerText += 'Inclure 8 caractères minimum'
//     error1.style.color = 'red'

//   }
//   if (name.length < 2) {

//     error.innerText += 'Inclure 2 caractères minimum'
//     error.style.color = 'red'

//   }

//   if (/[!%&|-~§=+:^$*+?{}()]/g.test(userName) == true) {

//     error3.innerText += 'symbole interdit'
//     error3.style.color = 'red'
//   }


//   if (name == '') {
//     error.innerText = ''
//     error.innerText = " Nom / pseudo manquant"
//     error.style.color = 'red'

//   }
//   if (text == '') {

//     error2.innerText = " Mot de passe manquant"
//     error2.style.color = 'red'
//   }

//   if ((text.length >= 8) && (name.length >= 1)) {
//     comment()
//     insertData()

//   }


// });

// ----------------------------------FIN COMMENT----------------------------
