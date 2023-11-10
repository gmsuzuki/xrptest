<!DOCTYPE html>
<html>

<head>
  <title>カレンダー</title>
  <h2><a href="test_set02.php">時間</a></h2>

  <style>
  .calendar {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size: 1.5rem;
  }

  .calendar th,
  .calendar td {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 3px;
    height: 120px;
    vertical-align: top;
    width: calc(100% / 7);
    position: relative;
  }

  .calendar td a {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    /* リンクをクリック可能にするために要素を前面に配置 */
  }

  .calendar th {
    background-color: #f2f2f2;
  }

  .calendar td:hover {
    background-color: #f2f2f2;
  }

  .dayNumber {
    display: block;
    width: 100%;
    background-color: #7257c0;
    color: white;
    font-size: 1.6rem;
  }


  /*  モーダルのスタイル */
  .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
  }

  .modal-content {
    background-color: white;
    width: 300px;
    padding: 20px;
    border-radius: 5px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  </style>



</head>


<body>
  <h2>カレンダー</h2>
  <table class="calendar">
    <tr>
      <th>日</th>
      <th>月</th>
      <th>火</th>
      <th>水</th>
      <th>木</th>
      <th>金</th>
      <th>土</th>
    </tr>


    <?php 



    // 今年は何年？
    $year=date("Y");
    // 今は何月？
    $month=date("m");
    // 今は何日
    $today = date("d");
    // なぞの変数
    $selectedDate=null;

    // どこでgetしてくるのかｗ
    if (isset($_GET['selected_date'])) {
    $selectedDate=$_GET['selected_date'];
    }
    // 今年の今月の1日のunixスタンプを代入
    $firstDay=mktime(0, 0, 0, $month, $today, $year);
    // その月に何日あるか？
    $daysInMonth=date("t", $firstDay);
    // その月の初日は何曜日？0が日曜日
    $firstDayOfWeek=date("w", $firstDay);


    $scheduleArray = [
    [
        "社員番号" => "1001",
        "出勤日" => "2023-08-01",
        "出勤時間" => "09:00:00",
        "退勤時間" => "18:00:00"
    ],
    [
        "社員番号" => "1002",
        "出勤日" => "2023-08-02",
        "出勤時間" => "09:30:00",
        "退勤時間" => "17:30:00"
      ],
    [
        "社員番号" => "1003",
        "出勤日" => "2023-08-03",
        "出勤時間" => "08:45:00",
        "退勤時間" => "17:15:00"
      ],
    ];

// $scheduleArray の中身を表示して確認

    ?>
    <tr>



      <?php for ($i=0; $i < 7; $i++) :?>
      <!-- 1日が始まるまでの空白 -->
      <?php if ($i < $firstDayOfWeek):?>
      <td></td>
      <?php else :?>
      <!-- 1日を作る -->
      <!-- 日付を2桁のゼロパディングで生成 -->
      <?php $dateValue=sprintf("%04d-%02d-%02d", $year, $month, $today); ?>
      <!-- 選択いらなくない？ -->
      <!-- $isSelected=($dateValue===$selectedDate) ? 'selected' : '' ; -->
      <!-- echo "<td><a href='index.php?selected_date=$dateValue' class='$isSelected'>$day" ; -->
      <td>
        <a href='test_set02.php?selected_date="<?php echo urlencode($dateValue) ?>"'>
          <span class='dayNumber'><?php echo $today ?></span>
        </a>

        <!-- 出勤する人の配列必要？ -->
        <!-- マッチするデータを格納する配列 -->
        <?php $workToday = [];?>

        <?php foreach ($scheduleArray as $schedule):?>
        <?php if ($schedule["出勤日"] === $dateValue):?>
        <?php $workToday[] = $schedule ?>
        <p>
          <?php  echo $schedule["社員番号"] ;?>
        </p>
        <?php endif ?>
        <?php endforeach ?>
      </td>
      <?php $today++; ?>
      <?php endif ?>

      <?php endfor ?>

    </tr>

    <?php $todayCount = 0?>
    <!-- 新しい週を始める -->
    <?php while ($todayCount <= 30):?>
    <?php if ($i % 7===0):?>
    <tr></tr>
    <?php endif ?>
    <?php $dateValue="$year-$month-$today" ?>

    <td>
      <a href='test_set02.php?selected_date="<?php echo urlencode($dateValue) ?>"'>
        <span class='dayNumber'><?php echo $today ?></span>
      </a>
      <?php foreach ($scheduleArray as $schedule):?>
      <?php if($schedule["出勤日"]===$dateValue) :?>
      <?php $workToday[]=$schedule; ?>
      <p>
        <?php echo $schedule[" 社員番号"] ?>
      </p>
      <?php endif ?>
      <?php endforeach ?>

    </td>
    <?php if( $today == $daysInMonth ):?>
    <?php $today = 1 ?>
    <?php else :?>
    <?php $today++; ?>
    <?php endif ?>
    <?php $todayCount++; ?>
    <?php $i++; ?>
    <?php endwhile ?>


  </table>

</body>




</html>