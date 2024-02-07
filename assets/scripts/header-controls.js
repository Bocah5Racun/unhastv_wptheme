const stickyHeader = document.getElementById("sticky-header");
const stickyHeaderHeight = stickyHeader.offsetHeight;
const menuTrigger = window.innerHeight / 3;
const mobileMenu = document.getElementById("mobile-menu");
const mobileMenuClose = document.getElementById("mobile-menu-close");
let mobileMenuTrigger = false;

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

function toggleMenu() {
  mobileMenuTrigger = !mobileMenuTrigger;
  if (mobileMenuTrigger) {
    mobileMenu.classList.add("mobile-menu__reveal");
    mobileMenuClose.classList.add("mobile-menu-close__spin-right");
  }
  if (!mobileMenuTrigger) {
    mobileMenu.classList.remove("mobile-menu__reveal");
    mobileMenuClose.classList.remove("mobile-menu-close__spin-right");
  }
}
