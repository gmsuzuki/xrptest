<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Script-Type" content="text/javascript">
  <!--サイトの説明 -->
  <title>設定ページ</title>
  <meta name="description" content="就職用ホームページです" />


  <!--css javascript-->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/event.css" /> -->


  <!-- これinputのときだけ読み込む -->
  <!-- <script src="../js/newevent_set.js" defer></script> -->

</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/../data.php');
    ?>

    <main id="main">
      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <div class="demo demo3">
            <h1 class="heading"><span>出勤承認待ち</span></h1>
          </div>
          <h2 id="calendar_month_title">
            <?php echo $today->format('Y') ?>年<?php echo $today->format('m')?>月
          </h2>
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


// class処理に変更
    // 今年は何年？
    $year = $today -> format('Y');
    // 今は何月？
    $month = $today  -> format("m");
    // 今日は何日？
    $day = $today -> format("d");

    // 今年の今月の1日のunixスタンプを代入
    // $firstDay = mktime(0, 0, 0, $month, 1, $year);
    // 今日のタイムスタンプ
    $firstDay = $today -> getTimestamp();
    // その月に何日あるか？
    $daysInMonth = date("t", $firstDay);
    // その月の初日は何曜日？0が日曜日
    $firstDayOfWeek = date("w", $firstDay);


    ?>
            <tr>

              <?php for ($i=0; $i < 7; $i++) :?>
              <!-- 1日が始まるまでの空白 -->
              <?php if ($i < $firstDayOfWeek):?>
              <td></td>
              <?php else :?>
              <!-- 今日を作る -->
              <?php $dateValue=$today -> format('Y-m-d'); ?>
              <?php $link_count=0 ?>
              <td>
                <span class='dayNumber'><?php echo $today -> format('d') ?></span>

                <?php foreach ($scheduleArray as $schedule):?>
                <?php if ($schedule["出勤日"] === $dateValue):?>
                <?php $link_count++ ?>
                <!-- 承認待機が一つでもあるならリンク追加 -->
                <?php if($link_count == 1) :?>
                <a href='approval_schedule_done.php?selected_date=<?php echo urlencode($dateValue) ?>'
                  class="request_work">
                </a>
                <?php endif ?>
                <?php endif ?>
                <?php endforeach ?>
                <?php if($link_count != 0) :?>
                <p class="ruby">待ち</p>
                <span class="girl_number"><?php echo $link_count ?></span>
                <?php endif ?>


              </td>
              <?php $today->modify('+1 day'); ?>
              <?php $day++; ?>
              <?php endif ?>

              <?php endfor ?>

            </tr>



            <?php $todayCount = 0?>
            <!-- 新しい週を始める -->
            <?php while ($todayCount <= 23):?>

            <?php if ($i % 7===0):?>
            <tr></tr>
            <?php endif ?>
            <?php $dateValue = $today -> format('Y-m-d') ?>
            <?php $link_count=0 ?>
            <td>
              <span class='dayNumber'><?php echo $today -> format('d') ?></span>
              <?php foreach ($scheduleArray as $schedule):?>
              <?php if ($schedule["出勤日"] === $dateValue):?>
              <?php $link_count++  ?>
              <?php if($link_count == 1):?>
              <a href='approval_schedule_done.php?selected_date=<?php echo urlencode($dateValue) ?>'
                class="request_work"></a>
              <?php endif ?>
              <?php endif ?>
              <?php endforeach ?>
              <?php if($link_count != 0) :?>
              <p class="ruby">待ち</p>
              <span class="girl_number"><?php echo $link_count ?></span>
              <?php endif ?>
            </td>
            <?php $today->modify('+1 day'); ?>
            <?php $todayCount++; ?>
            <?php $day++; ?>
            <?php $i++; ?>
            <?php endwhile ?>


          </table>



        </div>

      </article>

      <a href="setting_index02.php" class="back_index">キャンセル</a>


    </main>


  </div>
</body>

</html>