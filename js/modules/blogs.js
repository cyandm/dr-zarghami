// **************************************************special blog slider with progressbar
let specialSlider = document.querySelector(".special-blog-slider");
if (specialSlider) {
  var swiper = new Swiper(".special-blog-slider", {
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    speed: 1000,
    loop: true,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    on: {
      init: function () {
        var progressBarItems = document.querySelectorAll(
          ".swiper-progress-bar"
        );
        progressBarItems.forEach(function (item, index) {
          item.classList.remove("animate");
          item.classList.remove("active");
          if (index === 0) {
            item.classList.add("animate");
            item.classList.add("active");
          }
        });
      },
      slideChangeTransitionStart: function () {
        var progressBarItems = document.querySelectorAll(
          ".swiper-progress-bar"
        );
        progressBarItems.forEach(function (item) {
          item.classList.remove("animate");
          item.classList.remove("active");
        });
        progressBarItems[0].classList.add("active");
      },
      slideChangeTransitionEnd: function () {
        var progressBarItems = document.querySelectorAll(
          ".swiper-progress-bar"
        );
        progressBarItems[0].classList.add("animate");
      },
    },
  });
}
