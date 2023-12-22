const stickyHeader = document.getElementById("sticky-header");
const stickyHeaderHeight = stickyHeader.offsetHeight;
const menuTrigger = window.innerHeight / 3;
const bodyOffset = document.getElementById("wpadminbar")
  ? document.getElementById("unhastv-header").offsetTop + 32
  : document.getElementById("unhastv-header").offsetTop;

console.log(bodyOffset);

document.addEventListener("scroll", () => {
  if (document.body.scrollTop > menuTrigger) {
    stickyHeader.style.top = bodyOffset;
  } else {
    stickyHeader.style.top = stickyHeaderHeight * -1;
  }
});
