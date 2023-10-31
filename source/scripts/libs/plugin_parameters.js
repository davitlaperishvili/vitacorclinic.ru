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

  let section_slider = new Swiper(".section_slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: false,
    freeMode: true,
    centerInsufficientSlides: true,
    breakpoints: {
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 4.5,
        spaceBetween: 30,
      },
    },
    navigation: {
      nextEl: ".why_navigation .swiper-button-next",
      prevEl: ".why_navigation .swiper-button-prev",
    },
  });

  var images_thumb = new Swiper(".images_thumb", {
    spaceBetween: 3,
    slidesPerView: 9,
    centerInsufficientSlides: true,
    loop: false,
  });
  var images_main = new Swiper(".images_main", {
    slidesPerView: 1,
    loop: false,
    navigation: {
      nextEl: ".images_navigation .swiper-button-next",
      prevEl: ".images_navigation .swiper-button-prev",
    },
    thumbs: {
      swiper: images_thumb,
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
