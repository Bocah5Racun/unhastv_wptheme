const popupOverlay = document.getElementById("popup-overlay");

if (popupOverlay) {
  window.addEventListener("load", () => {
    setTimeout(() => {
      popupOverlay.style.display = "flex";
    }, 1500);
    setTimeout(() => {
      popupOverlay.classList.add("show");
    }, 2000);
  });
}

const closeOverlay = () => {
  popupOverlay.classList.remove("show");
  setTimeout(() => {
    popupOverlay.remove();
  }, 550);
};
