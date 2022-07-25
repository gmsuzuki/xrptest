function scroll_ex() {
  var element = document.getElementsByClassName("scroll-expansion");
  if (!element) return;

  // スクロールした量
  var scrollY = window.pageYOffset;
  // ウインドー内の高さ
  var windowH = window.innerHeight;
  // 要素を表示するタイミング
  var showTiming = 200;

  for (var i = 0; i < element.length; i++) {
    // 表示する要素の相対位置
    var elemClientRect = element[i].getBoundingClientRect();
    var elemY = scrollY + elemClientRect.top;
    if (scrollY > elemY - windowH + showTiming) {
      element[i].classList.add("is-show");
    }
  }
}
// window.addEventListener("scroll", scroll_ex); // スクロール時に実行

function load_ex() {
  var element = document.getElementsByClassName("scroll-expansion");
  if (!element) return;

  for (var i = 0; i < element.length; i++) {
    // 表示する要素の相対位置
    element[i].classList.add("is-show");
  }
}
window.addEventListener("load", load_ex); // スクロール時に実行
