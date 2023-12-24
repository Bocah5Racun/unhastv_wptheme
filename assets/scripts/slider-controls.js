/** */

const sliderContainers = document.querySelectorAll(".slider-container");
const sliderPrevs = document.querySelectorAll(".slider-prev");
const sliderNexts = document.querySelectorAll(".slider-next");

sliderContainers.forEach((sliderContainer, index) => {
  sliderContainer.addEventListener("scroll", () => {
    const scrollPercentage =
      (sliderContainer.scrollLeft * 100) /
      (sliderContainer.scrollWidth - sliderContainer.clientWidth);

    sliderPrevs[index].style.opacity = scrollPercentage > 0 ? 100 : 0;
    sliderNexts[index].style.opacity = scrollPercentage < 100 ? 100 : 0;
  });
});

sliderPrevs.forEach((sliderPrev, index) => {
  sliderPrev.addEventListener("click", () => {
    sliderContainers[index].scrollLeft -= 500;
  });
});

sliderNexts.forEach((sliderNext, index) => {
  sliderNext.addEventListener("click", () => {
    sliderContainers[index].scrollLeft += 500;
  });
});
