// ヘッダー固定
// 広告を表示している場合、消したらmainが上に上がるのを防ぐマージン
const main = document.getElementById("main");
// header全体
const header = document.getElementById("header");
// メニューヘッダー
const h_contents = document.getElementById("header_contents");
// 最上段広告
const h_banner = document.getElementById("h_banner");
// 最上段広告を消すボタン
const close_h_banner = document.getElementById("close_banner");
// バナーの高さ
let hBanner = window.innerWidth * 0.133;
// ポジション
let pos = 0;
// url取得
let url = location.href;

// スクロール量が広告の高さより大きくなったら
const onScroll = () => {
  if (pos > hBanner) {
    // h_contents.style.position = "fixed";
    // h_contents.style.top = 0;
    h_contents.classList.add("header_pinned");
    main.classList.add("spaceplus");
  } else {
    if (hBanner == 0) {
      return;
    }
    h_contents.classList.remove("header_pinned");
    main.classList.remove("spaceplus");
    // h_contents.style.position = "static";
  }
};

// 広告バナーを消す関数
const hBannerClose = () => {
  // 広告バナー消す
  h_banner.classList.add("banner_blind");
  // ヘッダーを固定
  h_contents.classList.add("header_pinned");
  main.classList.add("spaceplus");
};

// 最上段の広告がある場合
if (h_banner) {
  close_h_banner.addEventListener("click", function () {
    // 広告バナーを消す関数
    hBannerClose();
    // バナー分の高さも消す
    hBanner = 0;
  });

  window.addEventListener("scroll", () => {
    pos = window.scrollY;
    // スクロール量が広告の高さより大きくなったら関数
    onScroll();
  });
  // 広告バナーがない場合
} else {
  h_contents.classList.add("header_pinned");
}

// ーーーーーーーーーーーーー
// ーーーーーーーーーーーーー
// まだ未完成
// ヘッダーが出ていないところから出す
window.onload = () => {
  // URLの取得
  let url = location.href;
  if (url == "http://xrptest.starfree.jp/girls1.php") {
    header.classList.add("header_blind");
    const hH = 3;
    // 現在地を示す変数を定義
    let pos = 0;
    const onScroll = () => {
      // スクロール位置がヘッダーの高さ分より大きい場合にclass名を追加し、そうでない場合にclass名を削除
      if (pos > hH) {
        // h_contents.classList.add("header_pinned");
      } else {
        // h_contents.classList.remove("header_pinned");
      }
    };
  }
};
