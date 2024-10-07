import { errorToast, successFormToast } from "./toastify";

function testimonial() {
  const formComment = document.querySelector("#service_comment_form");

  if (!formComment) return;

  formComment.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(formComment);
    formData.append("nonce", rest_details.nonce);

    jQuery(($) => {
      $.ajax({
        url: rest_details.url + "cynApi/v1/testimonialForm",
        type: "post",
        cache: false,
        processData: false,
        contentType: false,
        data: formData,

        success: (res) => {
          successFormToast.showToast();
          formComment.reset();
        },

        error: (err) => {
          errorToast.showToast();
        },
      });
    });
  });
}

testimonial();

function sliderEqualHeight() {
  const sliderParent = document.querySelector(".slider-height");

  if (!sliderParent) return;

  const sliderItems = document.querySelectorAll(".slider-height .swiper-slide");
  const sliderHeight = sliderParent.offsetHeight;

  sliderItems.forEach((el) => {
    el.style.height = sliderHeight + "px";
  });
}

sliderEqualHeight();

window.addEventListener("resize", sliderEqualHeight);
