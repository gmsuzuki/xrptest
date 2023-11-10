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
}
