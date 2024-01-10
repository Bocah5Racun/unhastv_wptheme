window.onload = () => {
  // video gallery ad controls
  const videoGalleryBlock = document.querySelector(
    ".video-gallery__video .adsbygoogle"
  );
  const videoGalleryVideo = document.querySelector(
    ".video-gallery__video:nth-child(2)"
  );
  const vGVWidth = videoGalleryVideo.offsetWidth;
  const vGVHeight = videoGalleryVideo.offsetHeight;

  videoGalleryBlock.parentElement.style.width = vGVWidth;
  videoGalleryBlock.parentElement.style.height = vGVHeight;

  // two-cols-ft-left
  const twoColesLeftAd = document.querySelector(
    ".template--two-columns-feature-left__inner-container .section__news-item .adsbygoogle"
  );
  const twoColsCenterBlock = document.querySelector(
    ".template--two-columns-feature-left__inner-container .section__news-item:nth-child(2)"
  );
  const twoColsCenterWidth = twoColsCenterBlock.offsetWidth;
  const twoColsCenterHeight = twoColsCenterBlock.offsetHeight;

  twoColesLeftAd.parentElement.style.width = twoColsCenterWidth;
  twoColesLeftAd.parentElement.style.height = twoColsCenterHeight;

  // three-cols-ft-center ad controls
  const threeColsCenterAd = document.querySelector(
    ".template--three-columns-feature-center__inner-container .section__news-item .adsbygoogle"
  );
  console.log(threeColsCenterAd);
  const threeColsCenterBlock = document.querySelector(
    ".template--three-columns-feature-center__inner-container .section__news-item:nth-child(2) .section__news-item__link"
  );
  const threeColsCenterWidth = threeColsCenterBlock.offsetWidth;
  const threeColsCenterHeight = threeColsCenterBlock.offsetHeight;

  threeColsCenterAd.parentElement.style.width = threeColsCenterWidth;
  threeColsCenterAd.parentElement.style.height = threeColsCenterHeight;
};
