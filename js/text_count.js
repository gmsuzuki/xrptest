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

function CountStrNow(id, str, min, max) {
  const restrnow = str.replace(/\s+/g, "");
  // document.getElementById(id).innerHTML = "文字数：" +(max - restr.length) + "文字";
  document.getElementById(id).innerHTML =
    "現在：" + restrnow.length + "/" + max + "文字";
  if (restrnow.length >= min) {
    document.getElementById("not_enough").style = "display: none;";
  } else {
    document.getElementById("not_enough").style = "display: inline;";
  }
  if (max - restrnow.length < 0) {
    document.getElementById(id).style = "color: red;";
  }
}

// textareaにはpattern属性がないみたい
function checkTxt(textarea, areaId) {
  console.log("外れたよ");
  var str = textarea.value;
  var regExpEscape = str.replace(/[-\/\\^$*+?.()|\[\]{}]/g, "\\$&");
  console.log(regExpEscape);
  document.getElementById(areaId).value = regExpEscape;
}
