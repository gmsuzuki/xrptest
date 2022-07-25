// 入力の警告文をはじめは出さないために消去
var mini = document.getElementsByClassName("mini_alert");
function alert_delete() {
  for (var i = 0; i < mini.length; i++) {
    mini[i].style.display = "none";
  }
}

// 使用する場所用
// https://www.torat.jp/css-radiobotton/
// ここを参考にした

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
    const alert_span = house_box.closest("dl").getElementsByTagName("span");
    alert_span[0].style.display = "none";
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

window.addEventListener("load", formSwitch(), alert_delete());

// 各種文字入力チェック
function CheckGuestInfo(input) {
  const name_ok = input.checkValidity();
  const alert_span = input.closest("dl").getElementsByTagName("span");
  if (name_ok) {
    alert_span[0].style.display = "none";
    input.style.backgroundColor = "#ffffff";
  } else {
    alert_span[0].style.display = "inline";
    input.style.backgroundColor = "#ffdddd";
  }
}

// メールアドレス確認用
function CheckGuestEmail(input) {
  const email_ok = input.checkValidity();
  const email_alert_span = input.closest("dl").getElementsByTagName("span");
  const check_email = document.getElementById("mail2");
  if (email_ok) {
    email_alert_span[0].style.display = "none";
    input.style.backgroundColor = "#ffffff";
    check_email.disabled = false;
  } else {
    email_alert_span[0].style.display = "inline";
    input.style.backgroundColor = "#ffdddd";
    check_email.disabled = true;
  }
}

// メールアドレス二重チェック
function SameCheck(input) {
  const mail = document.getElementById("mail1").value; //メールフォームの値を取得
  const mailConfirm = input.value; //メール確認用フォームの値を取得(引数input)
  // alert表示用
  const email_alert_span = input.closest("dl").getElementsByTagName("span");

  if (mail != mailConfirm) {
    input.setCustomValidity("メールアドレスが一致しません"); // エラーメッセージのセット
    email_alert_span[0].style.display = "inline";
    input.style.backgroundColor = "#ffdddd";
  } else {
    input.setCustomValidity(""); // エラーメッセージのクリア
    email_alert_span[0].style.display = "none";
    input.style.backgroundColor = "#ffffff";
  }
}

// textareaにはpattern属性がないみたい
function checkTxt(textarea) {
  console.log("外れたよ");
  var str = textarea.value;
  var regExpEscape = str.replace(/[-\/\\^$*+?.()|\[\]{}]/g, "\\$&");
  console.log(regExpEscape);
}

// お問い合わせフォーム用

// 送信できるようにする
const form = document.getElementById("form");
const reserve_button = document.getElementById("reserve_button");

form.addEventListener("input", update);
form.addEventListener("change", update);

function update() {
  const isRequired = form.checkValidity();
  if (isRequired) {
    reserve_button.disabled = false;
    reserve_button.value = "確認画面へ";
    return;
    // 文字はOKだけどセレクトされてない
  } else {
    reserve_button.disabled = true;
    reserve_button.value = "入力が完了していません";
  }
}
