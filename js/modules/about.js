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
    spaceBetween: 16,

    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },

    breakpoints: {
      200: {
        slidesPerView: 1,
      },
      480: {
        slidesPerView: 2,
      },
      700: {
        slidesPerView: 3,
      },
    },

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    // pagination: {
    //   el: ".swiper-pagination",
    //   dynamicBullets: true,
    // },
  });
}
