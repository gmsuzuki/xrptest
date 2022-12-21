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

// ハンバーガー開く
function hamburger() {
  // SNS開いていたら閉じる
  let sns_link_open = document.getElementById("sns_nav");
  if (sns_link_open.hasAttribute("class")) {
    removeSnsLink();
  }
  // 各種必要なものを表示する
  document.getElementById("sp_wrapper").classList.add("sp_wrap_deploy");
  document.getElementById("hamburger").classList.add("open");
  document.getElementById("sp_nav").classList.add("in_sp_nav");
  // 背景を消す
  document.getElementById("close_bg_ham").classList.add("active");
  // スクロールを止める
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

// ハンバーガーメニューをクリックしたら　ハンバーガー関数が起動
document.getElementById("hamburger").addEventListener("click", function () {
  if (this.classList.contains("open")) {
    removeHamburger();
  } else {
    hamburger();
  }
});

// snsクリック
function snsLink() {
  let hamburger_open = document.getElementById("hamburger");
  if (hamburger_open.hasAttribute("class")) {
    removeHamburger();
  }
  document.getElementById("sns_btn").classList.add("sns_open");
  document.getElementById("sns_wrapper").classList.add("sns_wrap_deploy");
  document.getElementById("sns_nav").classList.add("sns_in_nav");

  // 背景を消す
  document.getElementById("close_bg_sns").classList.add("active");
  // スクロールを止める
  nonScrollStart();
}

// sns消す
function removeSnsLink() {
  document.getElementById("sns_btn").classList.remove("sns_open");
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

// snsボタンをクリックしたら　sns関数が起動
document.getElementById("sns_btn").addEventListener("click", function () {
  if (this.classList.contains("sns_open")) {
    removeSnsLink();
  } else {
    snsLink();
  }
});

// 黒背景を押したら消えるハンバーガー
document.getElementById("close_bg_ham").addEventListener("click", function () {
  removeHamburger();
});

// 黒背景を押したら消えるsns
document.getElementById("close_bg_sns").addEventListener("click", function () {
  removeSnsLink();
});

// 長いやつを省略
// 全体をclass="omit_wrap_size"divで囲んで
// その直後にbutton class="omit_btn" type=button onclick

function open_omit(omit_btn) {
  console.log("おした");
  const readmore = omit_btn
    .closest("div")
    .getElementsByClassName("readmore_wrapper");
  const omit_block = omit_btn
    .closest("section")
    .getElementsByClassName("omit_wrap_size");
  if (omit_block[0]) {
    omit_block[0].classList.add("open");
    omit_btn.style.display = "none";
    readmore[0].style.display = "none";
  } else {
    alert("省略した文章がとれてません");
  }
}
