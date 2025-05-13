import PhotoSwipeLightbox from "../libs/photoswipe-lightbox.esm.min";

const lightbox = new PhotoSwipeLightbox({
  // may select multiple "galleries"
  gallery: ".certificate-gallery",

  // Elements within gallery (slides)
  children: "#static-thumbnails",

  // setup PhotoSwipe Core dynamic import
  pswpModule: () => import("photoswipe"),
});
lightbox.init();

const lightboxGallery = new PhotoSwipeLightbox({
  gallery: ".gallery",
  children: "#gallery-zoom",
  pswpModule: () => import("photoswipe"),
});
lightboxGallery.init();
