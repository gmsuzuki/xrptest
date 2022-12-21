function popup() {
  var popup = document.getElementById("js-popup");
  if (!popup) return;
  popup.classList.add("is-show");
  var blackBg = document.getElementById("js-black-bg");
  var closeBtn = document.getElementById("js-close-btn");

  closePopUp(blackBg);
  closePopUp(closeBtn);
  // スクロール止めて
  nonScrollStart();

  function closePopUp(elem) {
    if (!elem) return;
    elem.addEventListener("click", function () {
      popup.classList.remove("is-show");
      // スクロール復活
      nonScrollStop();
    });
  }
}
