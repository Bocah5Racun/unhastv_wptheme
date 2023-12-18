const sliderContainer = document.getElementById(
  "template--singlerow-slideshow__slider-container"
);
const buttonPrev = document.getElementById("slider-prev");
const buttonNext = document.getElementById("slider-next");

let scrollPercentage = 0;

sliderContainer.addEventListener("scroll", (e) => {
  scrollPercentage =
    sliderContainer.scrollLeft /
    (sliderContainer.scrollWidth - sliderContainer.clientWidth);
  buttonPrev.style.display = scrollPercentage > 0 ? "flex" : "none";
  buttonNext.style.display = scrollPercentage < 1 ? "flex" : "none";
});

buttonPrev.addEventListener("click", () => {
  sliderContainer.scrollLeft -= sliderContainer.scrollWidth / 5;
});

buttonNext.addEventListener("click", () => {
  sliderContainer.scrollLeft += sliderContainer.scrollWidth / 5;
});
