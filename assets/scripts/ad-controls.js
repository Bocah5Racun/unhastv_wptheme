window.onload = () => {
  const videoGalleryBlock = document.querySelector(
    ".video-gallery__video .adsbygoogle"
  );
  const videoGalleryVideo = document.querySelector(
    ".video-gallery__video:nth-child(2)"
  );
  const vGVWidth = videoGalleryVideo.clientWidth;
  const vGVHeight = videoGalleryVideo.clientHeight;

  console.log(videoGalleryBlock);

  videoGalleryBlock.style.width = vGVWidth;
  videoGalleryBlock.style.height = vGVHeight;
};
