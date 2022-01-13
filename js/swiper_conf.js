// swaiper

const swiper1 = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: ".page1",
    clickable: true,
  },
  navigation: {
    nextEl: ".next1",
    prevEl: ".prev1",
  },
});

const swiper2 = new Swiper(".GlSwiper", {
  slidesPerView: 1.3,
  centeredSlides: true,
  spaceBetween: 10,
  loop: true,
});

const swiper3 = new Swiper(".newsSwiper", {
  // 一列辺り
  slidesPerColumn: 3,
  // 見えている列の数
  slidesPerView: 1.2,
  slidesPerColumnFill: "column",
  spaceBetween: 10,
  pagination: {
    el: ".page2",
    clickable: true,
  },
  navigation: {
    nextEl: ".next2",
    prevEl: ".prev2",
  },
});
