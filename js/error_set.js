// エラー表示最初はしない
var mini = document.getElementsByClassName("mini_alert");
var input_text = document.getElementsByClassName("cancel_alert");
var inputArray = Array.from(input_text);

function alert_delete() {
  for (var i = 0; i < mini.length; i++) {
    mini[i].style.display = "none";
    if (inputArray[i]) {
      inputArray[i].style.backgroundColor = "#ffffff";
      inputArray[i].style.borderColor = "#04384c";
    }
  }
}
