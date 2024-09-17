// ****************************************************** service-box
let serviceBox = document.querySelectorAll(".service-box");

if (serviceBox) {
  serviceBox.forEach((box) => {
    box.addEventListener("click", () => {
      if (box.classList.contains("active")) {
        box.classList.remove("active");
      } else {
        serviceBox.forEach((otherBox) => {
          otherBox.classList.remove("active");
        });
        box.classList.add("active");
      }
    });
  });
}

// ******************************************************doctors-slider
let doctorsSlider = document.querySelector(".doctors-slider");
if (doctorsSlider) {
  var swiper = new Swiper(".doctors-slider", {
    // autoplay: {
    //     delay: 5000,
    //     disableOnInteraction: false,
    // },
    spaceBetween: 20,
    speed: 1000,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}

// ****************************************************** video section

const mainVideo = document.getElementById("mainVideo");
if (mainVideo) {
  const videoThumbnails = document.querySelectorAll(".video-thumbnail");
//   console.log(videoThumbnails);

  videoThumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener("click", () => {
      const videoSrc = thumbnail.getAttribute("data-video-src");
      const videoposter = thumbnail.getAttribute("data-poster-src");

        mainVideo.src = videoSrc;
              mainVideo.poster = videoposter;

    });
  });
}
