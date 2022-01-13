// スクロールすると表示されるメニュー
const under_nav = document.getElementById("under_nav");
let timeoutId;

window.addEventListener("scroll", () => {
  under_nav.classList.remove("under_nav_pinned");

  clearTimeout(timeoutId);

  timeoutId = setTimeout(function () {
    under_nav.classList.add("under_nav_pinned");
  }, 300);
});
