// id要素を取る
function _(x) {
  return document.getElementById(x);
}

// 使ってない
// 配列の中身が数値かどうか？
function arrisnan(arr) {
  return arr.some(isNaN);
}

// ラジオボタンのバリュ
function radioCheck(checkradio, len) {
  var radiochecked;
  for (let i = 0; i < len; i++) {
    if (checkradio.item(i).checked) {
      radiochecked = checkradio.item(i).value;
    }
  }
  return radiochecked;
}

// フォームチェックcheckValidity();
function formCheck() {
  forma = document.getElementById("multiphase");
  return forma.checkValidity();
}
