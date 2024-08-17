const $popupHandler = document.querySelectorAll(".open-call-popup");
const $popupElement = document.querySelector("#call-popup");
const $popupCloser = document.querySelector("#call-popup-closer");
const $callPopupBanner = document.querySelector("#call-popup-banner");

if (!$popupElement) return;

$popupHandler.forEach((btnHandler) => {
  btnHandler.addEventListener("click", () => {
    $popupElement.classList.add("show-popup");
  });
});

$popupCloser.addEventListener("click", () => {
  $popupElement.classList.remove("show-popup");
});

if (
  $popupElement.addEventListener("click", (el) => {
    if (el.target == $popupElement) {
      $popupElement.classList.remove("show-popup");
    }
  })
);
