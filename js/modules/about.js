let aboutSlider = document.querySelector(".about-slider");
if (aboutSlider) {
  var swiper = new Swiper(".about-slider", {
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    speed: 1000,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}

let certificates = document.querySelector(".certificates-section");
if (certificates) {
  var swiper = new Swiper(".certificates-section", {
    slidesPerView: 3,
    speed: 1000,
    spaceBetween: 20,
    loop: true,

    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}
