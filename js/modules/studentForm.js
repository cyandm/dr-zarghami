import { errorToast, successFormToast } from "./toastify";

function studentForm() {
  const articleForm = document.querySelector("#send-article-form");

  if (!articleForm) return;

  articleForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(articleForm);
    // formData.append("nonce", rest_details.nonce);

    jQuery(($) => {
      $.ajax({
        url: rest_details.url + "cynApi/v1/studentForm",
        type: "POST",
        cache: false,
        processData: false,
        contentType: false,
        data: formData,

        beforeSend: function (xhr) {
          xhr.setRequestHeader("X-WP-Nonce", rest_details.nonce);
        },

        success: (res) => {
          successFormToast.showToast();
          articleForm.reset();
        },

        error: (err) => {
          errorToast.showToast();
        },
      });
    });
  });
}

studentForm();
