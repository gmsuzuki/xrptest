function cancelPop(event) {
  // リンクを無効化
  event.preventDefault();
  // テンプレート読み込み
  var template = document.querySelector(".popoverTemplate");
  // クローン作る
  var templateclone = template.cloneNode(true);
  templateclone.id = "popoverClone";
  templateclone.style.position = "absolute"; // 位置指定のためにpositionを設定
  templateclone.style.top = window.pageYOffset + window.innerHeight / 3 + "px"; // 画面の下半分に設定
  templateclone.style.display = "block";
  // 最後尾に追加
  document.body.appendChild(templateclone);
}

function backSet() {
  var popover = document.getElementById("popoverClone");
  popover.parentNode.removeChild(popover);
}

function move() {
  var popover = document.getElementById("popoverClone");
  popover.parentNode.removeChild(popover);
  localStorage.clear();
  // 実際の移動処理を追加する
  window.location.href = "reset_session.php";
}
