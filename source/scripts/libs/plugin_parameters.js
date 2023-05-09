//Swiper Slider
// import Swiper from "swiper/bundle";

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
  let mySwiperBanners = new Swiper(".custom_banners_slider", {
    slidesPerView: 1,
    loop: false,
    spaceBetween: 5,
    pagination: {
      clickable: true,
      el: ".swiper-pagination-banner_list",
    },
  });
  let licenses_slider = new Swiper(".licenses_slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 50,
      },
    },
  });
  let doctors_slider = new Swiper(".doctors_slider_wrap", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: false,
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 50,
      },
    },
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
