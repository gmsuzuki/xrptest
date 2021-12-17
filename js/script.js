// ヘッダー表示

// ヘッダーを取得
const header = document.getElementById("header");

// ヘッダーの高さを取得
// const hH = header.clientHeight;
const hH = 5;

// 現在地を示す変数を定義
let pos = 0;

const onScroll = () => {
  // スクロール位置がヘッダーの高さ分より大きい場合にclass名を追加し、そうでない場合にclass名を削除
  if (pos > hH) {
    header.classList.add("header_pinned");
  } else {
    header.classList.remove("header_pinned");
  }
};

const under_nav = document.getElementById("under_nav");
let timeoutId;

window.addEventListener("scroll", () => {
  // スクロールするごとにpos（現在地）の値を更新
  pos = window.scrollY;
  onScroll();

  under_nav.classList.remove("under_nav_pinned");

  clearTimeout(timeoutId);

  timeoutId = setTimeout(function () {
    under_nav.classList.add("under_nav_pinned");
  }, 300);
});

// ハンバーガーをクリック
function hamburger() {
  let sns_link_open = document.getElementById("sns_nav");
  if (sns_link_open.hasAttribute("class")) {
    removeSnsLink();
  }
  // 外枠のラッパーを広げる
  document.getElementById("sp_wrapper").classList.toggle("sp_wrap_deploy");
  document.getElementById("hamburger").classList.toggle("open");
  document.getElementById("sp_nav").classList.toggle("in_sp_nav");
  // スクロールを止める
  document.getElementById("body").classList.toggle("nav_deploy_h");
  // 消す背景
  document.getElementById("close_bg_ham").classList.toggle("active");
}
// ハンバーガー消す
function removeHamburger() {
  document.getElementById("sp_wrapper").classList.remove("sp_wrap_deploy");
  document.getElementById("hamburger").classList.remove("open");
  document.getElementById("sp_nav").classList.remove("in_sp_nav");
  document.getElementById("body").classList.remove("nav_deploy_h");
  document.getElementById("close_bg_ham").classList.remove("active");
}

// snsクリック
function snsLink() {
  let hamburger_open = document.getElementById("hamburger");
  if (hamburger_open.hasAttribute("class")) {
    removeHamburger();
  }
  document.getElementById("sns_wrapper").classList.toggle("sns_wrap_deploy");
  document.getElementById("sns_nav").classList.toggle("sns_in_nav");
  document.getElementById("body").classList.toggle("nav_deploy_s");
  document.getElementById("close_bg_sns").classList.toggle("active");
}
// sns消す
function removeSnsLink() {
  document.getElementById("sns_wrapper").classList.remove("sns_wrap_deploy");
  document.getElementById("sns_nav").classList.remove("sns_in_nav");
  document.getElementById("body").classList.remove("nav_deploy_s");
  document.getElementById("close_bg_sns").classList.remove("active");
}

// ハンバーガーメニューをクリックしたら　ハンバーガー関数が起動
document.getElementById("hamburger").addEventListener("click", function () {
  hamburger();
});

// snsボタンをクリックしたら　sns関数が起動
document.getElementById("sns_btn").addEventListener("click", function () {
  snsLink();
});

// 黒背景を押したら消えるハンバーガー
document.getElementById("close_bg_ham").addEventListener("click", function () {
  removeHamburger();
});

// 黒背景を押したら消えるsns
document.getElementById("close_bg_sns").addEventListener("click", function () {
  removeSnsLink();
});

//アコーディオン

const accSingleTriggers = document.querySelectorAll(".js-acc-single-trigger");

accSingleTriggers.forEach((trigger) =>
  trigger.addEventListener("click", toggleAccordion)
);

function toggleAccordion() {
  const items = document.querySelectorAll(".js-acc-item");
  const thisItem = this.parentNode;

  items.forEach((item) => {
    if (thisItem == item) {
      thisItem.classList.toggle("is-open");
      return;
    }
    item.classList.remove("is-open");
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
