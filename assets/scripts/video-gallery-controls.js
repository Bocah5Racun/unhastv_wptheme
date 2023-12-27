const videoGalleryInners = document.querySelectorAll(
  ".template--video-gallery__inner"
);
const videoGalleryFeatures = document.querySelectorAll(
  ".template--video-gallery__inner .section__news-item--feature"
);

videoGalleryFeatures.forEach((videoGalleryFeature, index) => {
  const featureHeight = videoGalleryFeature.offsetHeight;
  videoGalleryInners[index].style.maxHeight = featureHeight;
});
