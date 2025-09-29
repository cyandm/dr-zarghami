import { errorToast, successFormToast } from "./toastify";

function studentForm() {
  const articleForm = document.querySelector("#send-article-form");

  if (!articleForm) return;

  articleForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(articleForm);
    formData.append("nonce", rest_details.nonce);

    jQuery(($) => {
      $.ajax({
        url: rest_details.url + "cynApi/v1/studentForm",
        type: "post",
        cache: false,
        processData: false,
        contentType: false,
        data: formData,

        success: (res) => {
          successFormToast.showToast();
          articleForm.reset();
        },

        error: (xhr, status, error) => {
          // ✅ دریافت پیام خطا از سرور
          let errorMessage = "خطایی رخ داده است";

          try {
            const response = JSON.parse(xhr.responseText);
            if (response.data && response.data.error) {
              errorMessage = response.data.error;
            } else if (response.message) {
              errorMessage = response.message;
            }
          } catch (e) {
            console.error("Error parsing response:", e);
          }

          if (typeof errorToast.showToast === "function") {
            errorToast.showToast();
          }

          console.error("Server Error:", errorMessage);

          alert(errorMessage);
        },
      });
    });
  });
}

studentForm();
