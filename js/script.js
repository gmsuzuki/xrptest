
// ハンバーガー
function hamburger() {
  document.getElementById('line1').classList.toggle('line_1');
  document.getElementById('line2').classList.toggle('line_2');
  document.getElementById('line3').classList.toggle('line_3');
  document.getElementById('nav').classList.toggle('inNav');
  document.getElementById('body').classList.toggle('Nav-open');
}
document.getElementById('hamburger').addEventListener('click' , function () {
  hamburger();
} );


//アコーディオン

const accSingleTriggers = document.querySelectorAll('.js-acc-single-trigger');

accSingleTriggers.forEach(trigger => trigger.addEventListener('click', toggleAccordion));

function toggleAccordion() {
  const items = document.querySelectorAll('.js-acc-item');
  const thisItem = this.parentNode;

  items.forEach(item => {
    if (thisItem == item) {
      thisItem.classList.toggle('is-open');
      return;
    }
    item.classList.remove('is-open');
  });
}



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
    centeredSlides:true,
    spaceBetween: 10,
    loop: true,

  });


  const swiper3 = new Swiper(".newsSwiper", {
    // 一列辺り
    slidesPerColumn: 3,
    // 見えている列の数
    slidesPerView: 1.2,
    slidesPerColumnFill: 'column',
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