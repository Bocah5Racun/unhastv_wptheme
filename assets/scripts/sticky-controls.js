document.addEventListener("DOMContentLoaded", () => {
  const stickys = document.querySelectorAll(".sticky");
  const stickyHeaderHeight =
    document.getElementById("sticky-header").offsetHeight;
  const isAdmin = document.getElementById("wpadminbar").offsetHeight;

  stickys.forEach((sticky) => {
    sticky.style.top = stickyHeaderHeight + isAdmin + 16;
  });
});
