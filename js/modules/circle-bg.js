function createBackgroundPiece(position) {
  const backgroundPiece = document.createElement("div");
  backgroundPiece.className = "cloudy-circle";

  const firstChild = document.createElement("div");
  firstChild.classList.add("dark");

  const secondChild = document.createElement("div");
  secondChild.classList.add("light");

  backgroundPiece.appendChild(firstChild);
  backgroundPiece.appendChild(secondChild);

  backgroundPiece.style.top = position + "px";

  return backgroundPiece;
}

function createBackgroundPieces() {
  const bodyHeight = document.body.clientHeight;
  const numPieces = Math.ceil(bodyHeight / 700) - 1;

  // add first code
  const initialBackgroundPiece = createBackgroundPiece(0);
  document.body.appendChild(initialBackgroundPiece);

  for (let i = 1; i <= numPieces; i++) {
    const position = i * 700;
    const backgroundPiece = createBackgroundPiece(position);

    if (i % 2 === 0) {
      backgroundPiece.style.right = "15%";
    } else {
      backgroundPiece.style.left = "15%";
    }

    document.body.appendChild(backgroundPiece);
  }
}

createBackgroundPieces();
