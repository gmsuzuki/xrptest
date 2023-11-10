// 予約確認モーダル

// 受け渡しのデータを整理する
// クリックした時間が表示されている
// プレイスタート時間を持ってきたい

function showModal(date, time, playTime, reserverName) {
  var modal = document.getElementById("myModal");
  var modalText = document.getElementById("modalText");
  var modalContent = document.getElementById("modalContent");
  var htmlContent = `
  <div class="modal_wrap">
    <p><span class="modal-space">予約者:</span>${reserverName}</p>
    <p><span class="modal-space">日付:</span>${date}</p>
    <p><span class="modal-space">スタート時間:</span>${time}</p>
    <p><span class="modal-space">コース:</span>${playTime}分</p>
  </div>
`;

  modalText.innerHTML = htmlContent;
  // modalContent.style.top = window.pageYOffset + window.innerHeight / 3 + "px"; // 画面の下半分に設定
  modalContent.style.top = window.innerHeight / 3 + "px"; // 画面の下半分に設定
  modal.style.display = "block";
}

var closeModal = document.getElementById("closeModal");
closeModal.onclick = function () {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
};

window.onclick = function (event) {
  var modal = document.getElementById("myModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
