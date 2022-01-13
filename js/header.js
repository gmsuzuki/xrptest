// ヘッダー固定

const header = document.getElementById("header");
const h_contents = document.getElementById("header_contents");
const h_banner = document.getElementById("h_banner");
// バナーの高さ
let hBanner = window.innerWidth * 0.133;
// ポジション
let pos = 0;
// url取得
let url = location.href;

// スクロールに応じてヘッダーを止める
const onScroll = () => {
  if (pos > hBanner) {
    h_contents.classList.add("header_pinned");
  } else {
    h_contents.classList.remove("header_pinned");
  }
};

const hBannerClose = () => {
  // 広告バナー消す
  h_banner.classList.add("banner_blind");
  // ヘッダーを固定
};

// 最上段の広告がある場合
if (h_banner) {
  h_banner.addEventListener("click", function () {
    // バナーを消す
    hBannerClose();
    // バナー分の高さも消す
    hBanner = 0;
  });
  window.addEventListener("scroll", () => {
    pos = window.scrollY;
    onScroll();
  });
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
