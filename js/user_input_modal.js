// 新規ユーザーモーダル

function showModal() {
  const modal = document.getElementById("user_input_modal");
  const modalOverlay = document.getElementById("modalOverlay");

  modal.style.display = "block"; // ブロック表示
  modalOverlay.style.display = "block"; // ブロック表示

  setTimeout(() => {
    // トランジションが適用されるようにタイミングを調整
    modal.style.opacity = 1; // フェードイン
    modalOverlay.style.opacity = 1; // フェードイン
  }, 0);
}

function clearModal() {
  const clearModal = document.getElementById("clearModal");
  const clearModalOverlay = document.getElementById("clearmodalOverlay");

  clearModal.style.display = "block"; // ブロック表示
  clearModal.style.display = "block"; // ブロック表示

  setTimeout(() => {
    // トランジションが適用されるようにタイミングを調整
    clearModal.style.opacity = 1; // フェードイン
    clearModalOverlay.style.opacity = 1; // フェードイン
  }, 0);
}

function closeModal() {
  const modal = document.getElementById("user_input_modal");
  const modalOverlay = document.getElementById("modalOverlay");

  modal.style.opacity = 0; // フェードアウト
  modalOverlay.style.opacity = 0; // フェードアウト

  setTimeout(() => {
    // フェードアウト後に非表示
    modal.style.display = "none";
    modalOverlay.style.display = "none";
  }, 500); // トランジションの時間（0.5秒）
}

function submitForm(event) {
  event.preventDefault(); // フォーム送信を停止

  const form = document.getElementById("modalForm");
  const formData = new FormData(form);

  fetch("input_reserve_02.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (response.ok) {
        // フォームが正常に送信された場合、モーダルを閉じる
        closeModal();
        window.location.href = "input_reserve_02.php"; // ページをリダイレクト
      } else {
        console.error("送信エラー");
      }
    })
    .catch((error) => console.error("送信中にエラーが発生しました", error));

  return false; // フォームのデフォルト動作を防止
}

// ---------------------------------------------
// 入力チェック

// 入力の警告文をはじめは出さないために消去
var mini = document.getElementsByClassName("mini_alert");
function alert_delete() {
  for (var i = 0; i < mini.length; i++) {
    mini[i].style.display = "none";
  }
}

// https://www.torat.jp/css-radiobotton/
// ここを参考にした
// 使用する場所用

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

function update() {
  if (document.getElementById("form")) {
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
}

window.addEventListener("load", alert_delete());
