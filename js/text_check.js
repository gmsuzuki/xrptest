// ーーーーーーーーーーーーーーーーーーーーーー
// 文字チェック
// ーーーーーーーーーーーーーーーーーーーーーー

function CheckGuestInfo(input) {
  const input_ok = input.checkValidity();
  const alert_span = input.closest("dl").getElementsByTagName("span");
  console.log(input_ok);
  if (input_ok) {
    alert_span[0].style.display = "none";
    input.style.backgroundColor = "white";
  } else {
    alert_span[0].style.display = "inline";
    alert_span[0].style.color = "red";
    input.style.backgroundColor = "#ffdddd";
  }
}

// ーーーーーーーーーーーーーーーーーーーーーー
// 全角数字を半角数字に変換する関数
// ーーーーーーーーーーーーーーーーーーーーーー
function convertFullWidthToHalfWidth(input) {
  return input.replace(/[０-９]/g, function (s) {
    return String.fromCharCode(s.charCodeAt(0) - 0xfee0);
  });
}

// ーーーーーーーーーーーーーーーーーーーーーー
// 半角数字チェック
// ーーーーーーーーーーーーーーーーーーーーーー

function validateForm() {
  var inputElement = document.getElementById("search_no");
  var errorMessage = document.getElementById("alert_number");

  if (inputElement !== null) {
    var inputValue = inputElement.value.trim(); // 前後の空白を取り除く

    if (inputValue === "") {
      errorMessage.textContent = "未入力";
      inputElement.focus(); // 入力フィールドにフォーカスを戻す
      return false; // フォームの送信を防止
    } else {
      // 全角数字を半角数字に変換
      inputValue = convertFullWidthToHalfWidth(inputValue);

      // 半角数字以外の場合は警告を表示
      if (!/^\d+$/.test(inputValue)) {
        errorMessage.textContent = "入力は半角数字のみ";
        inputElement.value = ""; // 入力フィールドをクリア
        inputElement.focus(); // 入力フィールドにフォーカスを戻す
        return false; // フォームの送信を防止
      } else {
        // 入力が有効な場合、エラーメッセージをクリア
        errorMessage.textContent = "";
      }
    }
  } else {
    console.log("IDが'search_no'である要素は存在しません。");
    return false; // フォームの送信を防止
  }
  return true; // フォームの送信を許可
}

function validateInput() {
  var inputElement = document.getElementById("search_no");
  var errorMessage = document.getElementById("alert_number");

  if (inputElement !== null) {
    var inputValue = inputElement.value.trim(); // 前後の空白を取り除く

    if (inputValue === "") {
      errorMessage.textContent = "未入力";
    } else {
      // 全角数字を半角数字に変換
      inputValue = convertFullWidthToHalfWidth(inputValue);

      // 半角数字以外の場合は警告を表示
      if (!/^\d+$/.test(inputValue)) {
        errorMessage.textContent = "入力は半角数字のみ";
        inputElement.value = ""; // 入力フィールドをクリア
        inputElement.focus(); // 入力フィールドにフォーカスを戻す
      } else {
        // 入力が有効な場合、エラーメッセージをクリア
        errorMessage.textContent = "";
      }
    }
  } else {
    console.log("IDが'search_no'である要素は存在しません。");
  }
}

// ーーーーーーーーーーーーーーーーーーーーーー
// ロングコース自力入力
// ーーーーーーーーーーーーーーーーーーーーーー

function validateLongtime() {
  var input_long_time = document.getElementById("write_course_time");
  if (input_long_time != null) {
    var input_long_time_value = input_long_time.value;

    // 全角数字を半角数字に変換
    input_long_time_value = convertFullWidthToHalfWidth(input_long_time_value);
  }
}
