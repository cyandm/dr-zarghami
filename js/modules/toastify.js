import Toastify from "toastify-js";

const successColor = "#4caf50";
const errorColor = "#ef5350";

let successText = "عملیات با موفقیت انجام شد";
let errorText = "عملیات با خطا مواجه شد";
let successFormText = "فرم با موفقیت ارسال شد";

export const successToast = Toastify({
  text: successText,
  style: {
    background: successColor,
  },
});

export const errorToast = Toastify({
  text: errorText,
  style: {
    background: errorColor,
  },
});

export const successFormToast = Toastify({
  text: successFormText,
  style: {
    background: successColor,
  },
});
