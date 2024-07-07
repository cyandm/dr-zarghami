

let blogSlider = document.querySelector(".front-blogs-slider");
if (blogSlider) {
  var swiper = new Swiper(".front-blogs-slider", {
    slidesPerView:1,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: {
        slidesPerView: 2.2,
      },
    },
  });
}


