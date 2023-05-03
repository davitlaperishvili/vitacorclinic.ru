//Swiper Slider
import Swiper from "swiper/bundle";

export default function plugindParameters() {
  // Selector styling
  $("select.selectori").each(function () {
    var placeholder = $(this).data("placeholder") || "Default placeholder";
    $(this).select2({
      allowClear: true,
      minimumResultsForSearch: -1,
      placeholder: placeholder,
    });
  });
  // Slider
  let mySwiper = new Swiper(".banners_slider", {
    slidesPerView: 1,
    pagination: {
      clickable: true,
      el: ".swiper-pagination-banner_list",
    },
  });
  let licenses_slider = new Swiper(".licenses_slider", {
    slidesPerView: 4,
    spaceBetween: 50,
    loop: true,
  });
  let doctors_slider = new Swiper(".doctors_slider_wrap", {
    slidesPerView: 3,
    spaceBetween: 50,
    loop: false,
  });

  // Gallery
  $(".magnific").each(function () {
    $(this).magnificPopup({
      delegate: "a",
      type: "image",
      gallery: {
        enabled: true,
      },
      zoom: {
        enabled: true,
        duration: 300,
      },
    });
  });
  if ($(".magnific_video").length) {
    $(".magnific_video").magnificPopup({
      disableOn: 700,
      type: "iframe",
      mainClass: "mfp-fade",
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false,
    });
  }
}
