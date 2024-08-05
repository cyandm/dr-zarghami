const form = document.querySelector("#contact_form");

if (!form) return;

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(form);
  formData.append("nonce", rest_details.nonce);

  jQuery(($) => {
    $.ajax({
      url: rest_details.url + "/cynApi/v1/contactForm",
      type: "post",
      cache: false,
      processData: false,
      contentType: false,
      data: formData,

      success: (res) => {
        console.log("form is submitted", res);

        form.rest();
      },

      error: (err) => {
        console.log("error is happend", err);
      },
    });
  });
});
