const headerDoc = document.querySelector("header");

if (!headerDoc) return;

function changePositionHeader() {
  window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY;

    if (scrollPosition >= 120) {
      headerDoc.classList.add("sticky");
      headerDoc.classList.add("top-0");
    } else {
      headerDoc.classList.remove("sticky");
    }
  });

  const scrolled = window.scrollY;

  if (scrolled >= 120) {
    headerDoc.classList.add("sticky");
    headerDoc.classList.add("top-0");
  }
}

changePositionHeader();
