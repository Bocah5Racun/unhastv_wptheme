const stickyHeader = document.getElementById("sticky-header");
const stickyHeaderHeight = stickyHeader.offsetHeight;
const menuTrigger = window.innerHeight / 3;

window.onload = () => {
  const bodyOffset = document.getElementById("wpadminbar") ? 32 : 0;

  document.addEventListener("scroll", () => {
    if (document.body.scrollTop > menuTrigger) {
      stickyHeader.style.top = bodyOffset;
    } else {
      stickyHeader.style.top = -stickyHeaderHeight;
    }
  });
};
