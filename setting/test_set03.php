<!DOCTYPE html>
<html>

<head>
  <style>
  table {
    border-collapse: collapse;
    width: 100%;
    border: 1px solid black;
  }

  th,
  td {
    border: 1px solid black;
    padding: 8px;
    text-align: center;
  }

  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
  }
  </style>
</head>

<body>

  <?php
$scheduleArray = [
    [
        "社員番号" => "1001",
        "出勤日" => "2023-08-15",
        "出勤時間" => "09:00:00",
        "退勤時間" => "18:00:00"
    ],
    // ... 他のスケジュールデータ ...
    [
        "社員番号" => "1008",
        "出勤日" => "2023-08-15",
        "出勤時間" => "09:00:00",
        "退勤時間" => "17:00:00"
    ]
];

$startTime = strtotime("09:00:00");
$endTime = strtotime("19:00:00");
$timeIncrement = 3600; // 1 hour

echo '<table>';
echo '<tr><th>時間</th>';

// ヘッダーを生成
foreach ($scheduleArray as $schedule) {
    echo '<th>' . $schedule["社員番号"] . '</th>';
}
echo '</tr>';

// 時間毎の行を生成
for ($time = $startTime; $time <= $endTime; $time += $timeIncrement) {
    echo '<tr>';
    echo '<th>' . date("H:i", $time) . '</th>';

    foreach ($scheduleArray as $schedule) {
        $startTimeSlot = strtotime($schedule["出勤時間"]);
        $endTimeSlot = strtotime($schedule["退勤時間"]);

        if ($startTimeSlot <= $time && $time < $endTimeSlot) {
            echo '<td><a href="#" onclick="showModal(\'' . $schedule["出勤日"] . '\', \'' . date("H:i:s", $time) . '\')">○</a></td>';
        } else {
            echo '<td></td>';
        }
    }

    echo '</tr>';
}
echo '</table>';
?>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <span id="closeModal" style="float: right; cursor: pointer;">&times;</span>
      <p id="modalText">ここに内容を表示</p>
    </div>
  </div>

  <script>
  function showModal(date, time) {
    var modal = document.getElementById("myModal");
    var modalText = document.getElementById("modalText");
    modalText.innerHTML = "日付: " + date + "<br>時間: " + time;
    modal.style.display = "block";
  }

  var closeModal = document.getElementById("closeModal");
  closeModal.onclick = function() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>

</body>

</html>