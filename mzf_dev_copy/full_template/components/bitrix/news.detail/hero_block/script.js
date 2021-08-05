

//let slides = document.querySelectorAll('[data-val]');
//let currentSlide = 0;
//let currentSlideBg = 0;
//let slideInterval = setInterval(nextSlide, 5000);
//let heroDescBg = document.querySelector(".hero-slider");
//
//slides[currentSlide].className = 'hero-slider__desc show-hero-slide';
//
//
//function nextSlide() {
//  slides[currentSlide].className = 'hero-slider__desc';
//  currentSlide = (currentSlide+1)%slides.length;
//  slides[currentSlide].className = 'hero-slider__desc show-hero-slide';
//
//
//  heroDescBg.classList.add("showBg");
//
//
////  heroDescBg.style.backgroundImage = "url(/images/" + slides[currentSlide].dataset.val.substr(slides[currentSlide].dataset.val.lastIndexOf('/') + 1) + ")";
//  heroDescBg.style.backgroundImage = "url(" + slides[currentSlide].dataset.val + ")";
//}





let slides = document.querySelectorAll('.hero-slider__desc');
let heroDescBg = document.querySelector(".hero-slider");

//let heroImgArr = ["15.jpg","1.jpg","2.jpg"];

let prev = document.querySelector(".hero-slider__prev");
let next = document.querySelector(".hero-slider__next");


let slideIndex = 0;
showSlides(slideIndex);

// Next // previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

//  circle dots controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }
  // var slides = document.getElementsByClassName("mySlides");
  // var dots = document.getElementsByClassName("dot");
  let autoSlide = setInterval(function() {
    plusSlides(1);
  }, 5000);
  
  function showSlides(n) {
  let i;
  
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].className = 'hero-slider__desc';
  }
  // for (i = 0; i < dots.length; i++) {
  //     dots[i].className = dots[i].className.replace(" active", "");
  // }
  heroDescBg.classList.add("showBg");
  heroDescBg.style.backgroundImage = "url(" + slides[slideIndex-1].dataset.val + ")";
  slides[slideIndex-1].className = 'hero-slider__desc show-hero-slide';
}


// automatic slide 

// var slideIndex = 0;
// showSlides();

// function showSlides() {
//   let  i;
//   // var slides = document.getElementsByClassName("mySlides");
//   for (i = 0; i < slides.length; i++) {
//     slides[i].className = 'hero-slider__desc';
//   }
//     slideIndex++;
//   if (slideIndex > slides.length) {slideIndex = 1}
//     slides[slideIndex-1].className = 'hero-slider__desc show-hero-slide';
//   // setTimeout(showSlides, 2000); 
// }

next.addEventListener("click", function(e) {
  e.preventDefault();
  plusSlides(1);
  
});
prev.addEventListener("click", function(e) {
  e.preventDefault();
  plusSlides(-1);
  
});