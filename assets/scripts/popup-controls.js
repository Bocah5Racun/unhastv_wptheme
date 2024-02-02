const popupOverlay = document.getElementById("popup-overlay");

if (popupOverlay) {
  window.addEventListener("load", () => {
    popupOverlay.style.display = "flex";
    const popupTimer = setTimeout(() => {
      popupOverlay.classList.add("show");
    }, 2000);
  });
}

const closeOverlay = () => {
  popupOverlay.classList.remove("show");
  const popupRemove = setTimeout(() => {
    popupOverlay.remove();
  }, 550);
};
