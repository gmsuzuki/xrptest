function updateChart() {
  const ctx = document.getElementById("myChart");
  const one = parseInt(document.getElementById("one").value) || 0;
  const two = parseInt(document.getElementById("two").value) || 0;
  const three = parseInt(document.getElementById("three").value) || 0;
  const four = parseInt(document.getElementById("four").value) || 0;
  const five = parseInt(document.getElementById("five").value) || 0;

  new Chart(ctx, {
    type: "doughnut",
    data: {
      datasets: [
        {
          data: [one, two, three, four, five],
          backgroundColor: [
            "rgb(255, 75, 0)",
            "rgb(0, 90, 255)",
            "rgb(3, 175, 122)",
            "rgb(77, 196, 255)",
            "rgb(246, 170, 0)",
          ],
        },
      ],
    },
  });
}
