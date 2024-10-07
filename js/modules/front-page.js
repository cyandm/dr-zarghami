/****************************************************  home text effect  */
// let animateletter = document.querySelectorAll(".animate-letter");
// if (animateletter) {
//   const observerCallback = (entries, observer) => {
//     entries.forEach((entry) => {
//       if (entry.isIntersecting) {
//         typitvs(entry.target);
//         observer.unobserve(entry.target);
//       }
//     });
//   };

//   const observer = new IntersectionObserver(observerCallback, {
//     threshold: 0.2,
//   });

//   document.querySelectorAll(".animate-letter").forEach((element) => {
//     observer.observe(element);
//   });

//   function typitvs(element) {
//     let h2 = element.querySelector(".animation");
//     let text = h2.textContent;

//     h2.textContent = text.charAt(0);
//     let i = 1;
//     let len = text.length;
//     let interval = setInterval(function () {
//       if (i < len) {
//         h2.textContent += text[i];
//         i++;
//       } else {
//         clearInterval(interval);
//       }
//     }, 180);
//   }
// }

/****************************************************  home-service-slider */
let mobileServiceSlider = document.querySelector(".home-service-slider");
if (mobileServiceSlider) {
  var swiper = new Swiper(".home-service-slider", {
    slidesPerView: "auto",
    spaceBetween: 14,
    loop: true,
    speed: 800,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
  });
}

/****************************************************  tab click */

function homePageTabs() {
  const homePageTabs = document.querySelector("#homePageTabs");
  if (!homePageTabs) return;

  const tabTitleGroup = homePageTabs.querySelector("#tabTitleGroup");
  const tabContentGroup = homePageTabs.querySelector("#tabContentGroup");
  const tabDecriptionGroup = homePageTabs.querySelectorAll("#content-tab");

  if (!tabTitleGroup || !tabContentGroup) return;

  const tabTitleGroupInner = tabTitleGroup.querySelectorAll("div.tab-title");
  const tabContentGroupInner =
    tabContentGroup.querySelectorAll("div.tab-content");

  if (!tabTitleGroupInner || !tabContentGroupInner) return;

  tabTitleGroupInner[0].classList.add("active");
  tabContentGroupInner[0].classList.add("active");

  tabTitleGroupInner.forEach((tabTitle) => {
    tabTitle.addEventListener("click", () => {
      if (tabTitle.classList.contains("active")) {
        tabTitle.classList.remove("active");
      } else {
        tabTitleGroupInner.forEach((tabs) => {
          tabs.classList.remove("active");
        });
        tabTitle.classList.add("active");
      }
      tabTitle.classList.add("active");

      tabContentGroupInner.forEach((tabContent) => {
        tabContent.classList.remove("active");

        if (tabContent.dataset.tab === tabTitle.dataset.tab) {
          tabContent.classList.add("active");
        }
      });
    });
  });

  tabContentGroupInner.forEach((tabContentGroup) => {
    const radioButtons = tabContentGroup.querySelector(".radio-buttons");
    const radioButtonContents = tabContentGroup.querySelector(
      ".radio-button-content"
    );

    if (!radioButtons || !radioButtonContents) return;

    const titles = radioButtons.querySelectorAll(".title");
    const contents = radioButtonContents.querySelectorAll(".content");

    if (!titles || !contents) return;

    titles.forEach((title) => {
      title.addEventListener("click", () => {
        contents.forEach((content) => {
          content.classList.remove("active");

          if (content.dataset.value === title.dataset.value) {
            content.classList.add("active");
          }
        });
      });
    });
  });
}

homePageTabs();

// // js for mobile dropdown
// const dropdown = document.querySelector("#dropdown-menu");
// if (dropdown) {
//   const tabContents = document.querySelectorAll(".tabcontent");
//   dropdown.addEventListener("change", function (e) {
//     for (let index = 0; index < tabContents.length; index++) {
//       if (e.target.value === tabContents[index].id) {
//         tabContents[index].classList.add("active");
//       } else {
//         tabContents[index].classList.remove("active");
//       }
//     }
//   });
// }

/****************************************************  insurance slider */

let insuranceSlider = document.querySelector(".insurance-slider");

if (insuranceSlider) {
  var swiper = new Swiper(".insurance-slider", {
    slidesPerView: "auto",
    spaceBetween: 50,
    loop: true,
    speed: 800,
    autoplay: {
      delay: 3000,
    },
  });
}

/****************************************************  faq click */
const accordionItemHeaders = document.querySelectorAll(
  ".accordion-item-header"
);
if (accordionItemHeaders) {
  // let accordionItemBody = document.querySelectorAll(".accordion-item-body");
  accordionItemHeaders.forEach((accordionItemHeader) => {
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if (accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    accordionItemHeader.addEventListener("click", () => {
      if (accordionItemHeader.classList.contains("active")) {
        accordionItemHeader.classList.remove("active");
        accordionItemBody.style.maxHeight = 0;
      } else {
        accordionItemHeader.classList.add("active");
        accordionItemBody.style.maxHeight =
          accordionItemBody.scrollHeight + "px";
      }
    });
  });
}

/****************************************************  testimonial swiper */

let testimonial = document.getElementsByClassName("testimonial-slider");
if (testimonial) {
  var swiper = new Swiper(".testimonial-slider", {
    slidesPerView: "auto",
    spaceBetween: 16,
    centeredSlides: false,
    // loop: true,
    speed: 1500,

    autoplay: {
      delay: 4000,
      disableOnInteraction: true,
      pauseOnMouseEnter: true,
    },
    breakpoints: {
      768: {
        slidesPerView: "auto",
        spaceBetween: 16,
      },
    },
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}
