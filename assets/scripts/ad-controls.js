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

  videoGalleryBlock.style.width = videoGalleryBlock.parentElement.width =
    vGVWidth;
  videoGalleryBlock.style.height = videoGalleryBlock.parentElement.height =
    vGVHeight;

  // two-cols-ft-left
  const twoColesLeftAd = document.querySelector(
    ".template--two-columns-feature-left__inner-container .section__news-item .adsbygoogle"
  );
  const twoColsCenterBlock = document.querySelector(
    ".template--two-columns-feature-left__inner-container .section__news-item:nth-child(2)"
  );
  const twoColsCenterWidth = twoColsCenterBlock.offsetWidth;
  const twoColsCenterHeight = twoColsCenterBlock.offsetHeight;

  twoColesLeftAd.style.width = twoColsCenterWidth;
  twoColesLeftAd.style.height = twoColsCenterHeight;

  // three-cols-ft-center ad controls
  const threeColsCenterAd = document.querySelector(
    ".template--three-columns-feature-center__inner-container .section__news-item .adsbygoogle"
  );
  console.log(threeColsCenterAd);
  const threeColsCenterBlock = document.querySelector(
    ".template--three-columns-feature-center__inner-container .section__news-item:nth-child(2)"
  );
  const threeColsCenterWidth = threeColsCenterBlock.offsetWidth;
  const threeColsCenterHeight = threeColsCenterBlock.offsetHeight;

  threeColsCenterAd.style.width = threeColsCenterWidth;
  threeColsCenterAd.style.height = threeColsCenterHeight;
};
