// ************************************************ mobile menu
let mobile = document.querySelector(".hamburger-menu");

let close_mobile = document.getElementById("close-menu");

if (mobile) {
  (function () {
    mobile.addEventListener("click", function () {
      document.querySelector(".mobile-menu").classList.toggle("disply-menu");
      document.querySelector(".mobile-menu-detail").classList.toggle("active");
      document.body.style.overflow = "hidden";
      return false;
    });
    close_mobile.addEventListener("click", function () {
      document.querySelector(".mobile-menu-detail").classList.remove("active");
      document.querySelector(".mobile-menu").classList.remove("disply-menu");
      document.body.style.overflow = "auto";
    });
  })();

  let mobileMenuContainer = document.querySelector(".menu-contain");

  let menuItemsHasChildren = mobileMenuContainer.querySelectorAll(
    "li.menu-item-has-children"
  );

  for (let i = 0; i < menuItemsHasChildren.length; i++) {
    menuItemsHasChildren[i].addEventListener("click", function (event) {
      event.stopPropagation();
      let subMenu = this.getElementsByClassName("sub-menu");
      if (subMenu[0].classList.contains("active-sub")) {
        subMenu[0].style.height = 0;
        subMenu[0].classList.remove("active-sub");
        menuItemsHasChildren[i].classList.remove("active-2");
      } else {
        subMenu[0].classList.add("active-sub");
        subMenu[0].style.height = subMenu[0].scrollHeight + "px";
        menuItemsHasChildren[i].classList.add("active-2");
      }
    });
  }
}
