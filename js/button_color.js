// スケジュール日にち用

var params = new URL(document.location).searchParams;
//urlから日付のパラメータもらう
var day = params.get("day");

const week = document.getElementById("select_days");

// なければ今日
if (day == null) {
  var selected_day = week.children[0];
  var change_color_day = selected_day.querySelector("span");
  change_color_day.classList.add("anime_btn");
  // .getElementsByClassName("select_btn")
  // selected_day.classList.add("active");
} else {
  // クラスで取り出すので配列になる
  var selected_day = week.children[day];
  var change_color_day = selected_day.querySelector("span");
  change_color_day.classList.add("anime_btn");
  // selected_day.classList.add("active");
}
