const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");



  // Wait for intro animation to finish, then redirect

  document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
      // Hide the preloader
      const preloader = document.querySelector(".preloader-container");
      preloader.style.display = "none";
  
      // Show the form
      const form = document.getElementById("form");
      form.style.display = "block";
    }, 4000); // Adjust delay as needed (4 seconds)
  });



     // Automatically change slides every 5 seconds
    //  const carousel = new bootstrap.Carousel(document.getElementById('lottieCarousel'), {
    //   interval: 5000, // 5 seconds
    //   wrap: true // Loop the carousel
    // });


//Animate Sign up and Sign in form 

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});


