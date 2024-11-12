// https://www.torat.jp/css-radiobotton/
// ここを参考にした
// 使用する場所用

var house_box = document.getElementById("house_address");
var house_input = document.getElementById("house_address_input");
var hotel_box = document.getElementById("hotel_list");
function formSwitch() {
  check = document.getElementsByClassName("js-check");
  // ホテルを選んだら
  if (check[0].checked) {
    hotel_box.style.display = "block";
    house_box.style.display = "none";
    var inputText = document
      .getElementById("house_address")
      .getElementsByTagName("input");
    inputText[0].value = "";
    // const alert_span = house_box.closest("dl").getElementsByTagName("span");
    // alert_span[0].style.display = "none";
    // 住所を入れる強制をはずす
    house_input.required = false;
  } else if (check[1].checked) {
    // 自宅選んだら　ホテルの場所のチェックを全部外す処理
    var inputItem = document
      .getElementById("hotel_list")
      .getElementsByTagName("input");
    for (var i = 0; i < inputItem.length; i++) {
      inputItem[i].checked = "";
    }
    inputItem[0].checked = true;
    house_box.style.display = "block";
    house_input.required = true;
    hotel_box.style.display = "none";
  } else {
    house_box.style.display = "none";
    hotel_box.style.display = "none";
    house_box.style.required = false;
  }
}

// ページ読み込み時にformSwitchを呼び出す
document.addEventListener("DOMContentLoaded", function () {
  formSwitch();
});

// 各種文字入力チェック
function CheckGuestInfo(input) {
  const input_ok = input.checkValidity();
  const alert_span = input.closest("dl").getElementsByTagName("span");
  console.log(input_ok);
  if (input_ok) {
    alert_span[0].style.display = "none";
    input.style.backgroundColor = "#ffffff";
  } else {
    alert_span[0].style.display = "inline";
    input.style.backgroundColor = "#ffdddd";
  }
}
