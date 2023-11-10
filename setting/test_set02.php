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
  </style>
</head>

<body>
  <h2><a href="test_set01.php">もどる</a></h2>
  <h2><a href="test_set03.php">縦横変更</a></h2>
  <!-- sqlで -->
  <!-- $_getで日付をもらって -->
  <!-- $gettDate = "2023-08-03"; -->
  <!-- $sql = "SELECT 社員番号 FROM 出勤スケジュールテーブル名 WHERE 出勤日 = '$getDate'"; -->
  <!-- $result = $conn->query($sql); -->
  <!-- こんな感じでクリックした日の出勤者データを取る -->

  <!-- 以下例としてこれが取れたとする -->
  <?php
     $scheduleArray = [
    [
        "社員番号" => "1001",
        "出勤日" => "2023-08-01",
        "出勤時間" => "09:00:00",
        "退勤時間" => "18:00:00"
    ],
    [
        "社員番号" => "1002",
        "出勤日" => "2023-08-01",
        "出勤時間" => "09:30:00",
        "退勤時間" => "17:30:00"
      ],
    [
        "社員番号" => "1003",
        "出勤日" => "2023-08-01",
        "出勤時間" => "08:45:00",
        "退勤時間" => "17:15:00"
      ],
    [
       "社員番号" => "1004",
        "出勤日" => "2023-08-01",
        "出勤時間" => "09:15:00",
        "退勤時間" => "18:15:00"],
     [
       "社員番号" => "1005",
        "出勤日" => "2023-08-01",
        "出勤時間" => "09:15:00",
        "退勤時間" => "18:15:00"],
     [
       "社員番号" => "1006",
        "出勤日" => "2023-08-01",
        "出勤時間" => "09:15:00",
        "退勤時間" => "18:15:00"],
     [
       "社員番号" => "1007",
        "出勤日" => "2023-08-01",
        "出勤時間" => "09:15:00",
        "退勤時間" => "18:15:00"],
    
        [
        "社員番号" => "1008",
        "出勤日" => "2023-08-01",
        "出勤時間" => "09:00:00",
        "退勤時間" => "17:00:00"
        ]
    ];

$startTime = strtotime("09:00:00");
$endTime = strtotime("19:00:00");
$timeIncrement = 3600; // 1 hour

echo '<table>';
echo '<tr><th>社員番号</th>';
for ($time = $startTime; $time <= $endTime; $time += $timeIncrement) {
    echo '<th>' . date("H:i", $time) . '</th>';
}
echo '</tr>';

foreach ($scheduleArray as $schedule) {
    echo '<tr>';
    echo '<td>' . $schedule["社員番号"] . '</td>';
    
    $startTimeSlot = strtotime($schedule["出勤時間"]);
    $endTimeSlot = strtotime($schedule["退勤時間"]);
    
    for ($time = $startTime; $time <= $endTime; $time += $timeIncrement) {
        if ($startTimeSlot <= $time && $time < $endTimeSlot) {
            echo '<td>○</td>';
        } else {
            echo '<td></td>';
        }
    }
    echo '</tr>';
}
echo '</table>';
?>

</body>

</html>