document.addEventListener("DOMContentLoaded", function () {
  const items = document.querySelectorAll(".progressbar_square .item");
  const itemCount = items.length;
  const itemWidth = 100 / itemCount + "%";

  items.forEach(function (item) {
    item.style.width = itemWidth;
  });
});
