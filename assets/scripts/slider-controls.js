/** */

const sliderContainers = document.querySelectorAll(".slider-container");
const sliderPrevs = document.querySelectorAll(".slider-prev .slider-icon");
const sliderNexts = document.querySelectorAll(".slider-next .slider-icon");

sliderContainers.forEach((sliderContainer, index) => {
  const isScrollable =
    sliderContainer.scrollWidth > sliderContainer.clientWidth ? true : false;
  const currentPrev = sliderPrevs[index];
  const currentNext = sliderNexts[index];

  if (!isScrollable) {
    currentPrev.style.display = "none";
    currentNext.style.display = "none";
  }

  currentPrev.style.opacity = 0;
  currentNext.style.opacity = 100;
  sliderContainer.addEventListener("scroll", () => {
    const scrollPercentage =
      (sliderContainer.scrollLeft * 100) /
      (sliderContainer.scrollWidth - sliderContainer.clientWidth);

    currentPrev.style.opacity = scrollPercentage > 0 ? 100 : 0;
    currentNext.style.opacity = scrollPercentage < 100 ? 100 : 0;
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
