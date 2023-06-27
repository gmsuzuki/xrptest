// 送信できるようにする
const form = document.getElementById("form");
const submit_button = document.getElementById("submit_button");
form.addEventListener("input", update);
form.addEventListener("change", update);

function update() {
  if (document.getElementById("form")) {
    const isRequired = form.checkValidity();
    if (isRequired) {
      submit_button.disabled = false;
      submit_button.value = "申請する";
      return;
      // 文字はOKだけどセレクトされてない
    } else {
      submit_button.disabled = true;
      submit_button.value = "未入力あり";
    }
  }
}
