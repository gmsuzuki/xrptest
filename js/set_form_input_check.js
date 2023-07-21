// 各種文字入力チェック
function CheckGuestInfo(input) {
  const input_ok = input.checkValidity();
  const alert_span = input.closest("li").getElementsByTagName("em");
  console.log(input_ok);
  if (input_ok) {
    alert_span[0].style.display = "none";
    input.style.backgroundColor = "#ffffff";
  } else {
    alert_span[0].style.display = "inline";
    input.style.backgroundColor = "#ffdddd";
  }
}

// パスワード二重チェック
function SameCheckPass(input) {
  const pass = document.getElementById("staff_new_login_pass").value; //パスワード１の値を取得
  const passConfirm = input.value; //確認用フォームの値を取得(引数input)
  // alert表示用
  const email_alert_span = input.closest("li").getElementsByTagName("em");
  if (pass != passConfirm) {
    email_alert_span[0].style.display = "inline";
    input.style.backgroundColor = "#ffdddd";
  } else {
    email_alert_span[0].style.display = "none";
    input.style.backgroundColor = "#ffffff";
  }
}
