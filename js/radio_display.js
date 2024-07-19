// ページロード時に初期化処理を行う
document.addEventListener("DOMContentLoaded", function () {
  showHideElement();
});

function showHideElement() {
  // 予約客が会員か？
  var memberSearchElement = document.getElementById("memberSearch");
  var newMemberElement = document.getElementById("newMember");
  var castCheck = document.getElementById("cast_check");
  var staffCheck = document.getElementById("staff_check");

  //コースが１８０分以上か？
  var otherCourseTime = document.getElementById("other_course_time");
  var otherRadio = document.getElementById("other_radio");
  var otherText = document.getElementById("write_course_time");

  // ホテルか？自宅か？
  var selectPlayHotel = document.getElementById("select_play_area_hotel");
  var selectPlayHouse = document.getElementById("select_play_area_house");
  var hotelCheck = document.getElementById("hotel_check");
  var houseCheck = document.getElementById("house_check");

  if (castCheck && castCheck.checked) {
    // 会員が選択された場合
    memberSearchElement.style.display = "block";
    newMemberElement.style.display = "none";
  } else if (staffCheck && staffCheck.checked) {
    // ご新規が選択された場合
    memberSearchElement.style.display = "none";
    newMemberElement.style.display = "block";
  }

  if (otherRadio && otherRadio.checked) {
    otherCourseTime.style.display = "block";
    otherText.disabled = false;
    otherText.required = true;
  } else if (otherText) {
    otherText.disabled = true;
    otherText.required = false;
    otherCourseTime.style.display = "none";
    otherText.value = "";
  }

  if (hotelCheck && hotelCheck.checked) {
    // ホテルが選択された場合
    selectPlayHotel.style.display = "block";
    selectPlayHouse.style.display = "none";
  } else if (houseCheck && houseCheck.checked) {
    // 自宅された場合
    selectPlayHotel.style.display = "none";
    selectPlayHouse.style.display = "block";
  }

  // 他のラジオボタンが選択された場合も考慮して、ラジオボタンの変更イベントを監視
  var radioButtons = document.querySelectorAll('input[name="play_time"]');
  radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener("change", showHideElement);
  });
}
