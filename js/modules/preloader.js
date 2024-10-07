function preloader() {
  const preloader = document.getElementById("preloader");

  if (!preloader) return;

  // window.addEventListener("DOMContentLoaded", () => {
  //   preloader.classList.replace("opacity-100", "opacity-0");
  //   setTimeout(() => {
  //     preloader.remove();
  //   }, 3000);
  // });

  setTimeout(() => {
    preloader.classList.replace("opacity-100", "opacity-0"); // کم کردن شفافیت
    setTimeout(() => {
      preloader.remove();
    }, 1000);
  }, 3000);
}

preloader();
