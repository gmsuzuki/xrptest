"use strict";
// ヘッダーメニューボタン系

// スクロール止める、解除関連
function disableScroll(event) {
  event.preventDefault();
}

function nonScrollStart() {
  document.addEventListener("touchmove", disableScroll, {
    passive: false,
  });
  document.addEventListener("mousewheel", disableScroll, {
    passive: false,
  });
}
function nonScrollStop() {
  document.removeEventListener("touchmove", disableScroll, {
    passive: false,
  });
  document.removeEventListener("mousewheel", disableScroll, {
    passive: false,
  });
}

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
  // 消す背景
  document.getElementById("close_bg_ham").classList.toggle("active");
  // スクロールを止める
  // これがiosSafariでは通用しないのでスクロールを切ります
  // document.getElementById("body").classList.toggle("nav_deploy_h");
  nonScrollStart();
}

// ハンバーガー消す
function removeHamburger() {
  document.getElementById("sp_wrapper").classList.remove("sp_wrap_deploy");
  document.getElementById("hamburger").classList.remove("open");
  document.getElementById("sp_nav").classList.remove("in_sp_nav");
  // document.getElementById("body").classList.remove("nav_deploy_h");
  document.getElementById("close_bg_ham").classList.remove("active");
  // スクロール復活
  nonScrollStop();
}

// snsクリック
function snsLink() {
  let sns_link_open = document.getElementById("sns_nav");
  let hamburger_open = document.getElementById("hamburger");
  if (hamburger_open.hasAttribute("class")) {
    removeHamburger();
  }
  document.getElementById("sns_wrapper").classList.toggle("sns_wrap_deploy");
  document.getElementById("sns_nav").classList.toggle("sns_in_nav");
  document.getElementById("close_bg_sns").classList.toggle("active");
  // スクロールを止める
  // これがiosSafariでは通用しないのでスクロールを切ります
  // document.getElementById("body").classList.toggle("nav_deploy_s");
  if (sns_link_open.hasAttribute("class")) {
    nonScrollStop();
  }
  nonScrollStart();
}

// sns消す
function removeSnsLink() {
  document.getElementById("sns_wrapper").classList.remove("sns_wrap_deploy");
  document.getElementById("sns_nav").classList.remove("sns_in_nav");
  // document.getElementById("body").classList.remove("nav_deploy_s");
  // スクロール復活
  document.removeEventListener("touchmove", disableScroll, {
    passive: false,
  });
  document.removeEventListener("mousewheel", disableScroll, {
    passive: false,
  });
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
