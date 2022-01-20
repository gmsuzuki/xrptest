// ヘッダーメニューボタン系

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
