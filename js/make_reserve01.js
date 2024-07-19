document.addEventListener("DOMContentLoaded", function () {
  // 各input要素
  const guestName = document.getElementById("guest_name");
  const guestPhone = document.getElementById("guest_phone");
  const mail1 = document.getElementById("mail1");
  const mail2 = document.getElementById("mail2");
  const submitButton = document.querySelector(
    'input[name="new_customer_information"]'
  );

  // 初期設定
  submitButton.disabled = true;
  submitButton.value = "未入力";
  submitButton.style.backgroundColor = "grey";

  // 入力チェック関数
  function CheckGuestInfo(input) {
    const pattern = new RegExp(input.pattern);
    if (pattern.test(input.value)) {
      input.style.borderColor = "initial";
    } else {
      input.style.borderColor = "red";
    }
    CheckFormValidity();
  }

  function CheckGuestEmail(input) {
    const pattern = new RegExp(input.pattern);
    if (pattern.test(input.value)) {
      input.style.borderColor = "initial";
      mail2.disabled = false; // 初めて正しいメールを入力したら確認用メールを有効にする
    } else {
      input.style.borderColor = "red";
      mail2.disabled = true; // メールが不正の場合、確認用メールを無効にする
    }
    CheckFormValidity();
  }

  function SameCheck(input) {
    if (input.value === mail1.value) {
      input.style.borderColor = "initial";
    } else {
      input.style.borderColor = "red";
    }
    CheckFormValidity();
  }

  // フォーム全体の有効性をチェックする関数
  function CheckFormValidity() {
    if (
      guestName.checkValidity() &&
      guestPhone.checkValidity() &&
      mail1.checkValidity() &&
      mail2.value === mail1.value
    ) {
      submitButton.disabled = false;
      submitButton.value = "登録して予約";
      submitButton.style.backgroundColor = "rgb(229, 170, 88)";
    } else {
      submitButton.disabled = true;
      submitButton.value = "未入力";
      submitButton.style.backgroundColor = "grey";
    }
  }

  // 各input要素にblurイベントを追加
  guestName.onblur = function () {
    CheckGuestInfo(this);
  };
  guestPhone.onblur = function () {
    CheckGuestInfo(this);
  };
  mail1.onblur = function () {
    CheckGuestEmail(this);
  };
  mail2.onblur = function () {
    SameCheck(this);
  };
});
