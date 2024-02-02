const popupOverlay = document.getElementById("popup-overlay");

if (popupOverlay) {
  window.addEventListener("load", () => {
    const popupTimer = setTimeout(() => {
      popupOverlay.classList.add("show");
    }, 2000);
  });

  const closeOverlay = () => {
    popupOverlay.style.display = "none";
  };
}
