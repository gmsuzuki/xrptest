// エラー表示最初はしない
var mini = document.getElementsByClassName("mini_alert");
var input_text = document.getElementsByClassName("cancel_alert");

// console.log(input_txt);
function alert_delete() {
  for (var i = 0; i < mini.length; i++) {
    mini[i].style.display = "none";
    input_text[i].style.backgroundColor = "#ffffff";
    input_text[i].style.borderColor = "#04384c";
  }
}
