var userType, userId, userPass;

const form = document.getElementById("multiphase");
const input1 = document.getElementById("staff_new_login_pass");
const input2 = document.getElementById("new_login_pass_confirmation");
const idInput = document.getElementById("staff_new_login_id");
// const errorSpan = document.getElementById("error");
const submitButton = document.getElementById("nextButton");

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
    alert_span[0].style.color = "red";
    input.style.backgroundColor = "#ffdddd";
  }
  checkFormValidity();
}

function reset_pass() {
  const passConfirm = document.getElementById("new_login_pass_confirmation");
  passConfirm.value = "";
}

// パスワード二重チェック
function SameCheckPass(input) {
  const pass = document.getElementById("staff_new_login_pass").value; //パスワード１の値を取得
  const passConfirm = input.value; //確認用フォームの値を取得(引数input)
  // alert表示用
  const email_alert_span = input.closest("li").getElementsByTagName("em");
  if (pass != passConfirm || !form.checkValidity()) {
    email_alert_span[0].style.display = "inline";
    email_alert_span[0].style.color = "red";
    input.style.backgroundColor = "#ffdddd";
    input.value = "";
  } else {
    email_alert_span[0].style.display = "none";
    input.style.backgroundColor = "#ffffff";
  }
  checkFormValidity();
}

function checkFormValidity() {
  if (input1.value === input2.value && idInput.checkValidity()) {
    submitButton.disabled = false;
    submitButton.style.backgroundColor = "#04384c";
    input1.style.backgroundColor = "#ffffff";
    input2.style.backgroundColor = "#ffffff";
    idInput.style.backgroundColor = "#ffffff";
    var red_font = document.getElementsByTagName("em");
    for (var i = 0; i < red_font.length; i++) {
      red_font[i].style.display = "none";
    }
  } else {
    submitButton.disabled = true;
    submitButton.style.backgroundColor = "grey";
  }
}
function processPhase1() {
  // forma = document.getElementById("multiphase");
  // const isRequired = forma.checkValidity();

  const work_select = document.getElementsByName("staff_cast");
  const lenselect = work_select.length;
  const checked_user_type = radioCheck(work_select, lenselect);

  if (formCheck()) {
    userType = checked_user_type;
    userId = _("staff_new_login_id").value;
    userPass = _("staff_new_login_pass").value;
    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    if (userType == 1) {
      _("user_type").innerHTML = "キャスト";
    } else if (userType == 2) {
      _("user_type").innerHTML = "スタッフ";
    } else {
      _("user_type").innerHTML = "エラー";
    }
    _("user_id").innerHTML = userId;
    _("user_pass").innerHTML = userPass;
  } else {
    alert("入力が正しくありません");
  }
}

// 確認画面

// 戻るボタン
function buck_2step() {
  _("new_login_pass_confirmation").value = "";
  _("phase2").style.display = "none";
  _("phase1").style.display = "block";
}
// ページ読み込み時と入力の変更時に入力チェック関数を実行
window.addEventListener("load", alert_delete());
