document.addEventListener("DOMContentLoaded", function () {
  // ラジオボタンを取得
  const reserveDateRadios = document.querySelectorAll(
    'input[name="reserve_date_check"]'
  );
  const reserveGirlRadios = document.querySelectorAll(
    'input[name="reserve_select_girl"]'
  );
  const submitButton = document.querySelector('input[name="reserve_cast"]');

  // 初期設定
  submitButton.disabled = true;
  submitButton.value = "未選択";

  // ラジオボタンが変更されたときにチェック
  function checkFormValidity() {
    const isReserveDateChecked = Array.from(reserveDateRadios).some(
      (radio) => radio.checked
    );
    const isReserveGirlChecked = Array.from(reserveGirlRadios).some(
      (radio) => radio.checked
    );

    if (isReserveDateChecked && isReserveGirlChecked) {
      submitButton.disabled = false;
      submitButton.value = "決定";
      submitButton.style.backgroundColor = "rgb(229, 170, 88)";
    } else {
      submitButton.disabled = true;
      submitButton.value = "未選択";
      submitButton.style.backgroundColor = "grey";
    }
  }

  // 予約日時のラジオボタンが変更されたときにスタッフの選択を解除
  function handleDateChange() {
    // すべてのスタッフラジオボタンの選択を解除
    reserveGirlRadios.forEach((radio) => {
      radio.checked = false;
    });

    // フォームの状態を再チェック
    checkFormValidity();
  }

  // 各ラジオボタンに変更イベントリスナーを追加
  reserveDateRadios.forEach((radio) => {
    radio.addEventListener("change", handleDateChange);
  });

  reserveGirlRadios.forEach((radio) => {
    radio.addEventListener("change", checkFormValidity);
  });

  // 初期チェック
  checkFormValidity();
});
