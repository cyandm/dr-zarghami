import PhotoSwipeLightbox from "photoswipe/lightbox";

const lightbox = new PhotoSwipeLightbox({
  // may select multiple "galleries"
  gallery: "#static-thumbnails",

  // Elements within gallery (slides)
  children: "a",

  // setup PhotoSwipe Core dynamic import
  pswpModule: () => import("photoswipe"),
});
lightbox.init();
