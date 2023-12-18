/** */

const sliderContainers = document.querySelectorAll(".slider-container");
const sliderPrevs = document.querySelectorAll(".slider-prev");
const sliderNexts = document.querySelectorAll(".slider-next");

sliderContainers.forEach((sliderContainer, index) => {
  sliderContainer.addEventListener("scroll", () => {
    const scrollPercentage =
      sliderContainer.scrollLeft /
      (sliderContainer.scrollWidth - sliderContainer.clientWidth);
    sliderPrevs[index].style.display = scrollPercentage > 0 ? "flex" : "none";
    sliderNexts[index].style.display = scrollPercentage < 1 ? "flex" : "none";
  });
});

sliderPrevs.forEach((sliderPrev, index) => {
  sliderPrev.addEventListener("click", () => {
    sliderContainers[index].scrollLeft -= 520;
  });
});

sliderNexts.forEach((sliderNext, index) => {
  sliderNext.addEventListener("click", () => {
    sliderContainers[index].scrollLeft += 520;
  });
});
