/****************************************************  home text effect  */
let animateletter = document.querySelectorAll(".animate-letter");
if (animateletter) {
  const observerCallback = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        typitvs(entry.target);
        observer.unobserve(entry.target);
      }
    });
  };

  const observer = new IntersectionObserver(observerCallback, {
    threshold: 0.2,
  });

  document.querySelectorAll(".animate-letter").forEach((element) => {
    observer.observe(element);
  });

  function typitvs(element) {
    let h2 = element.querySelector(".animation");
    let text = h2.textContent;

    h2.textContent = text.charAt(0);
    let i = 1;
    let len = text.length;
    let interval = setInterval(function () {
      if (i < len) {
        h2.textContent += text[i];
        i++;
      } else {
        clearInterval(interval);
      }
    }, 180);
  }
}

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

let tabLinks = document.querySelectorAll(".landing-tablinks");
if (tabLinks) {
  const tabContents = document.querySelectorAll(".tabcontent");

  if (tabLinks && tabContents) {
    tabLinks.forEach(function (tabLink) {
      tabLink.addEventListener("click", function (event) {
        for (let index = 0; index < tabLinks.length; index++) {
          // console.log(tabLinks[index].id);
          if (event.target.id === tabLinks[index].id) {
            tabLinks[index].classList.remove("active");
            tabContents[index].classList.add("active");
            event.currentTarget.classList.add("active");
            tabLinks[index].parentElement.classList.remove("active");
            tabContents[index].parentElement.classList.add("active");
            event.currentTarget.parentElement.classList.add("active");
          } else {
            tabContents[index].classList.remove("active");
            tabLinks[index].classList.remove("active");
            tabContents[index].parentElement.classList.remove("active");
            tabLinks[index].parentElement.classList.remove("active");
          }
        }
      });
    });
  }
}
const radios = document.querySelectorAll(".radios");
const radiosparent = document.querySelectorAll(".content");

radios.forEach((elem) => {
  radiosparent.forEach((parent) => {
    parent.classList.remove("active");
  });
  elem.parentElement.classList.remove("active");
  elem.addEventListener("click", () => {
    elem.parentElement.classList.add("active");
  });
});

// js for mobile dropdown
const dropdown = document.querySelector("#dropdown-menu");
if (dropdown) {
  const tabContents = document.querySelectorAll(".tabcontent");
  dropdown.addEventListener("change", function (e) {
    for (let index = 0; index < tabContents.length; index++) {
      if (e.target.value === tabContents[index].id) {
        tabContents[index].classList.add("active");
      } else {
        tabContents[index].classList.remove("active");
      }
    }
  });
}

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
    spaceBetween: 32,
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: true,
      pauseOnMouseEnter: true,
    },
    breakpoints: {
      768: {
        slidesPerView: "auto",
        spaceBetween: 16,
        centeredSlides: true,
      },
    },
  });
}
