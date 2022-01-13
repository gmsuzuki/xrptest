window.onload = () => {
  const header = document.getElementById("header");
  const hH = 5;
  // 現在地を示す変数を定義
  let pos = 0;
  const onScroll = () => {
    // スクロール位置がヘッダーの高さ分より大きい場合にclass名を追加し、そうでない場合にclass名を削除
    if (pos > hH) {
      header.classList.remove("header_blind");
      header.classList.add("header_pinned");
    } else {
      header.classList.add("header_blind");
      header.classList.remove("header_pinned");
    }
  };

  window.addEventListener("scroll", () => {
    pos = window.scrollY;
    onScroll();
  });
};
