// swaiper

// トップのでかいやつ
const swiper1 = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  pagination: {
    el: ".page1",
    clickable: true,
  },
  navigation: {
    nextEl: ".next1",
    prevEl: ".prev1",
  },
  autoplay: {
    delay: 500000,
    stopOnLastSlide: false,
    disableOnInteraction: false,
    reverseDirection: false,
  },
});

// ピックアップ　新人用
const swiper2 = new Swiper(".GlSwiper", {
  slidesPerView: 1,
  spaceBetween: 0,
  centeredSlides: true,
  loop: true,

  pagination: {
    el: ".page2",
    clickable: true,
  },
  navigation: {
    nextEl: ".next2",
    prevEl: ".prev2",
  },
  autoplay: {
    delay: 5000,
    stopOnLastSlide: false,
    disableOnInteraction: false,
    reverseDirection: false,
  },
});

// クーポン
const swiper3 = new Swiper(".couponSwiper", {
  slidesPerView: 1.6,
  spaceBetween: 10,
  centeredSlides: false,
  loop: true,
  pagination: {
    el: ".page3",
    clickable: true,
  },
  autoplay: {
    delay: 500000,
    stopOnLastSlide: false,
    disableOnInteraction: false,
    reverseDirection: false,
  },
});

// ３段とかのスライダー
const swiper4 = new Swiper(".newsSwiper", {
  // 一列辺り
  slidesPerColumn: 3,
  // 見えている列の数
  slidesPerView: 1.2,
  slidesPerColumnFill: "column",
  spaceBetween: 10,
  pagination: {
    el: ".page4",
    clickable: true,
  },
  navigation: {
    nextEl: ".next4",
    prevEl: ".prev4",
  },
});
