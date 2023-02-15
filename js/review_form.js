function loadingSecond() {
  const loader = document.getElementById("loading-wrapper");
  loader.classList.add("completed");
}

// 予約警告ポップアップ注意事項
function call_popup() {
  // 1回目のアクセスかどうか
  if (sessionStorage.getItem("rev") === null) {
    //1回目の場合はWebStorageを設定
    sessionStorage.setItem("rev", "on");
    //popup.jsの関数
    popup();
  }
}

// 入力ミスの警告をはじめは出さないために消去
var mini = document.getElementsByClassName("mini_alert");
function alert_delete() {
  for (var i = 0; i < mini.length; i++) {
    mini[i].style.display = "none";
  }
}

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
// ここから入力系

// 各種文字入力チェック
// html5の新機能.checkValidity()を使うd

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
  document.getElementById("review_text_body").value = regExpEscape;
}

// バリデーションをクリアしたら
// 送信できるようにする

const form = document.getElementById("form");
const review_button = document.getElementById("review_button");
form.addEventListener("input", update);
form.addEventListener("change", update);

function update() {
  if (document.getElementById("form")) {
    const isRequired = form.checkValidity();
    if (isRequired) {
      review_button.disabled = false;
      review_button.value = "確認画面へ";
      return;
      // 文字はOKだけどセレクトされてない
    } else {
      review_button.disabled = true;
      review_button.value = "入力が完了していません";
    }
  }
}

// ーーーーーーーーーーーーーーーーーーーーーー
// 文字カウント
// ーーーーーーーーーーーーーーーーーーーーーー

function CountStr(id, str, max) {
  const restr = str.replace(/\s+/g, "");
  // document.getElementById(id).innerHTML = "文字数：" +(max - restr.length) + "文字";
  document.getElementById(id).innerHTML =
    "残り：" + (max - restr.length) + "文字";

  if (max - restr.length < 0) {
    document.getElementById(id).style = "color: red;";
  }
}

// ーーーーーーーーーーーーーーーーーーーーーー
// 文字カウント　現在
// ーーーーーーーーーーーーーーーーーーーーーー

function CountStrNow(id, str, max) {
  const restrnow = str.replace(/\s+/g, "");
  // document.getElementById(id).innerHTML = "文字数：" +(max - restr.length) + "文字";
  document.getElementById(id).innerHTML =
    "現在：" + restrnow.length + "/" + max + "文字";
  if (restrnow.length >= 100) {
    document.getElementById("not_enough").style = "display: none;";
  } else {
    document.getElementById("not_enough").style = "display: block;";
  }
  if (max - restrnow.length < 0) {
    document.getElementById(id).style = "color: red;";
  }
}

//読み込み時に起動するもの

window.addEventListener("load", loadingSecond(), call_popup(), alert_delete());
