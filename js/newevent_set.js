// formチェック
// 送信できる状態ならボタンをアクティブ
const form = document.getElementById("form");
const event_set_button = document.getElementById("submit_button");

form.addEventListener("input", update);
form.addEventListener("change", update);

// 再読み込みをした場合、残っている
// ブラウザのローカルストレージからボタンの状態を復元
if (localStorage.getItem("buttonState") === "enabled") {
  event_set_button.disabled = false;
  event_set_button.classList.add("submit_color");
  event_set_button.value = "確認";
}

function update() {
  if (document.getElementById("form")) {
    const isRequired = form.checkValidity();
    if (isRequired) {
      event_set_button.disabled = false;
      event_set_button.value = "確認";
      event_set_button.classList.add("submit_color");

      // ボタンの状態をローカルストレージに保存
      localStorage.setItem("buttonState", "enabled");
      // コンソールに表示
      var localStorageData = localStorage.getItem("buttonState");
      console.log(localStorageData);
      return;
      // 文字はOKだけどセレクトされてない
    } else {
      event_set_button.disabled = true;
      // event_set_button.value = "未入力あり";
      // ボタンの状態をローカルストレージに保存
      event_set_button.classList.remove("submit_color");
      localStorage.setItem("buttonState", "disabled");
      var localStorageData = localStorage.getItem("buttonState");
      console.log(localStorageData);
    }
  }
}

function cancelPop(event) {
  // リンクを無効化
  event.preventDefault();
  // テンプレート読み込み
  var template = document.querySelector(".popoverTemplate");
  // クローン作る
  var templateclone = template.cloneNode(true);
  templateclone.id = "popoverClone";
  templateclone.style.position = "absolute"; // 位置指定のためにpositionを設定
  templateclone.style.top = window.pageYOffset + window.innerHeight / 3 + "px"; // 画面の下半分に設定
  templateclone.style.display = "block";
  // 最後尾に追加
  document.body.appendChild(templateclone);
}

function backSet() {
  var popover = document.getElementById("popoverClone");
  popover.parentNode.removeChild(popover);
}

function move() {
  var popover = document.getElementById("popoverClone");
  popover.parentNode.removeChild(popover);
  localStorage.clear();
  // 実際の移動処理を追加する
  window.location.href = "reset_session.php";
}

// 投稿日更新関連
//　今すぐか？予約か？select
const checkbox_now = document.getElementById("new_post_now");
const checkbox_future = document.getElementById("new_post_reserve");
// 予約日時
const datetReserve = document.getElementById("reserve_post_day");
const timeReserve = document.getElementById("reserve_post_time");
// チェックボックスの状態が変化したら呼び出される関数

function handleCheckboxChange() {
  // もし今すぐ更新を選んだら
  if (checkbox_now.checked) {
    datetReserve.disabled = true;
    datetReserve.required = false;
    datetReserve.style.backgroundColor = "#808080";
    datetReserve.style.color = "#808080";
    datetReserve.style.border = "2px solid #808080";
    timeReserve.disabled = true;
    timeReserve.required = false;
    timeReserve.style.backgroundColor = "#808080";
    timeReserve.style.color = "#808080";
    timeReserve.style.border = "2px solid #808080";
  } else {
    datetReserve.disabled = false;
    datetReserve.required = true;
    timeReserve.disabled = false;
    timeReserve.required = true;
    // 背景色チェンジ
    datetReserve.style.backgroundColor = "#f3f3fd";
    datetReserve.style.border = "2px solid blue";
    datetReserve.style.color = "black";
    timeReserve.style.backgroundColor = "#f3f3fd";
    timeReserve.style.border = "2px solid blue";
    timeReserve.style.color = "black";
  }
}

function changeLabelColor(radio) {
  var label = radio.nextElementSibling;
  if (radio.checked) {
    label.style.color = "red";
  } else {
    label.style.color = "";
  }
}

// girls選択
function showImage(selectElement) {
  var selectedIndex = selectElement.selectedIndex;
  if (selectedIndex >= 0) {
    var imageDiv = document.querySelector(".auto_image");
    imageDiv.innerHTML = "";

    var imageTag = document.createElement("img");
    imageTag.src = "../" + selectElement.value;
    imageDiv.appendChild(imageTag);
  }
}

window.addEventListener("load", alert_delete(), handleCheckboxChange());
