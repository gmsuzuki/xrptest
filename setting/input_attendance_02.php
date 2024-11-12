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
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">

  <!--css javascript-->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/event.css" /> -->


  <!-- これinputのときだけ読み込む -->
  <!-- <script src="../js/newevent_set.js" defer></script> -->

  <script src="../js/error_set.js" defer></script>
  <!-- <script src="../js/text_check.js" defer></script> -->
  <!-- <script src="../js/text_count.js" defer></script> -->
  <script src="../js/setting.js" defer></script>
  <script src="../js/cancelpop.js" defer></script>
  <script src="../js/user_input_modal.js" defer></script>
  <script src="../js/step_bar.js" defer></script>

  <script>
  function showAlert() {
    alert("予約者が選択されてません");
  }
  </script>




</head>

<body id="body">


  <?php

    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');
    require_once( dirname(__FILE__). '/../setting/radio_validate.php');
    require_once( dirname(__FILE__). '/../setting/class_input_reserve.php');

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

// スタッフカプセル化
    require_once( dirname(__FILE__). '/data/girl_data.php');
    require_once( dirname(__FILE__). '/class/girl_class.php');
    // require_once( dirname(__FILE__). '/data/staff_list_sort.php');

    // profile
  foreach($sample_names as $sample_name){
    $staffList[] = new girlProfilelManager($sample_name);
  }

  // 画像
  foreach($sample_pics  as $sample_pic ){
    $staffPic[] = new girlImageManager($sample_pic['girlNumber'],$sample_pic);
  }

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー



session_start(); // セッションを開始

// セッションIDを保存していない場合、現在のセッションIDを保存
if (!isset($_SESSION['session_id'])) {
    $_SESSION['session_id'] = session_id();
}
  // タイムアウト確認処理
  require_once( dirname(__FILE__). '/../parts/input_timeout.php');

// test01.phpを通過したことを示すフラグを設定
  $_SESSION['visited_attendance02'] = true;



  // 戻るボタンでエラーしないように
  header('Expires:-1');
  header('Cache-Control:');
  header('Pragma:');


  // キャンセルボタンが押された場合
  if (isset($_POST['cancel'])) {
  // localStorageの削除
  echo "<script>
  localStorage.clear();
  </script>";
  session_unset(); // セッションの変数をすべて削除
  session_destroy(); // セッションを破棄
  header("Location: setting_index02.php"); // top.htmlにリダイレクト
  exit; // スクリプトの実行を終了
  }

  // エラー配列
  $errmessage = array();


// バックで戻ってきた

if($_SESSION['visited_attendance03'] == true){
  $_SESSION['visited_attendance03']= false;


};


// ０２からインスタンス作るバックで戻ってきたら復帰
  if(isset($_SESSION['input_attendance_card'])){
  $previousAttendances = unserialize($_SESSION['input_attendance_card']);
  

}

// print_r($_SESSION['input_attendance_card']);

    // ここでバリデーションしてからOKなら０３へとばす
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["select_work_of_day"])) {
      
    $attendanceGirlNum = $_SESSION['select_girl']; // ここに適切な値を設定してください
    $dates = $_POST['dates'];
    $start_times = $_POST['start_times'];
    $end_times = $_POST['end_times'];

    $newAttendances = [];

  for ($i = 0; $i < count($dates); $i++) {
        $attendanceWorkDay = $dates[$i];
        $workStartTime = $start_times[$i];
        $workEndTime = $end_times[$i];

    if (!empty($workStartTime) && !empty($workEndTime)) {
            $newAttendances[$attendanceWorkDay] = new InputAttendanceReserve($attendanceGirlNum, $attendanceWorkDay, $workStartTime, $workEndTime);
        }

    
    }
      if(!empty($previousAttendances)){
      $attendances = array_merge($previousAttendances, $newAttendances);
      $_SESSION['input_attendance_card'] = serialize($attendances);
    }else{
      $_SESSION['input_attendance_card'] = serialize($newAttendances);
    }

    header("Location: input_attendance_03.php");
    exit();

      // 次へ

  }

print_r( $newAttendances );





?>



  <!-- 指名する人のプロフィール -->
  <!-- スタッフ番号 -->
  <?php $employee_number = $_SESSION['select_girl']; ?>

  <?php foreach($staffList as $profile):?>
  <?php if($profile-> getGirlNumber() == $employee_number):?>
  <!-- 名前 -->
  <?php $employee_girl_name = $profile-> getGirlName()?>

  <!-- 画像 -->
  <?php foreach($staffPic as $pic){
  if($pic -> getGirlNumber() == $employee_number){
  $employee_girl_img  = $pic -> getGirlImage01();
  }
  }
  ?>
  <?php break ?>
  <?php endif?>
  <?php endforeach?>




  <div id="wrapper">

    <main id="main">
      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <div class="demo demo3">
            <h1 class="heading"><span>出勤の入力</span></h1>
          </div>

          <div class="progressbar_square">
            <div class="item active">STEP.1<br>出勤者</div>
            <div class="item active">STEP.2<br>日時選択</div>
            <div class="item">STEP.3<br>確認</div>
            <div class="item">STEP.4<br>完了</div>
            <div class="item">STEP.5<br>完了</div>
          </div>


          <section class="staff_input_wrap">
            <h2>出勤者</h2>
            <figure class="request_img">
              <img src='../<?php echo $employee_girl_img?>' alt="">
            </figure>
            <figcaption class="request_img_caption">
              <?php echo $employee_girl_name ?>
            </figcaption>
          </section>

          <section class="staff_input_wrap">
            <h2>出勤日時</h2>

            <form action="input_attendance_02.php" method="post" onsubmit="return validateForm()">
              <table class="input_workdate_and_time">
                <tr>
                  <th>日付</th>
                  <th>出勤時間</th>
                  <th>退勤時間</th>
                </tr>

                <?php
                $week_name = ["日", "月", "火", "水", "木", "金", "土"];
                $today = new DateTime('now');
                
              // 営業時間の開始と終了
                $shop_start = '08:00';
                $shop_end = '22:00';
                
                // 時間を生成する関数
                function generateTimeOptions($start, $end) {
                    $options = [];
                    $start_time = new DateTime($start);
                    $end_time = new DateTime($end);

                    while ($start_time <= $end_time) {
                        $options[] = $start_time->format('H:i');
                        $start_time->modify('+30 minutes');
                    }
                    return $options;
                }

                // 入力ずみデータを取ってくるsqｌで取ってくるのを忘れずに

                function getAttendanceByDate($date, $attendances) {
                foreach ($attendances as $attendance) {
                if ($attendance->getAttendanceWorkDay() === $date) {
                return $attendance;
              }
            }
                return null;
              }



                $time_options = generateTimeOptions($shop_start, $shop_end);
                


                for ($i = 0; $i < 7; $i++):
                    $date = clone $today; // 日付の変更をクローンで行う
                    if ($i > 0) {
                        $date->modify("+$i day");
                    }
                    $formattedDate = $date->format('Y-m-d');
                    $week = $date->format('w');
                    $week_class = $week == 0 ? "sun" : ($week == 6 ? "sat" : "weekday");

               // 該当する日付の出勤情報を取得
                // $selectedStartTime = '';
                // $selectedEndTime = '';

               if(!empty($previousAttendances)){
                $attendance = getAttendanceByDate($formattedDate, $previousAttendances);
                $selectedStartTime = $attendance ? $attendance->getWorkStartTime() : '';
                $selectedEndTime = $attendance ? $attendance->getWorkEndTime() : '';
              }
            ?>
                <tr>
                  <td class="<?php echo $week_class; ?>">
                    <?php echo $date->format('m/d') . " " . $week_name[$week]; ?>
                    <input type='hidden' name='dates[]' value='<?php echo $formattedDate; ?>'>
                  </td>
                  <td>
                    <select name='start_times[]'>
                      <option value="">選択</option>
                      <?php foreach ($time_options as $time): ?>
                      <option value="<?php echo $time; ?>"
                        <?php echo $time === $selectedStartTime ? 'selected' : ''; ?>><?php echo $time; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <td>
                    <select name='end_times[]'>
                      <option value="">選択</option>
                      <?php foreach ($time_options as $time): ?>
                      <option value="<?php echo $time; ?>" <?php echo $time === $selectedEndTime ? 'selected' : ''; ?>>
                        <?php echo $time; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                </tr>
                <?php endfor; ?>
              </table>


              <div class="alway_step_button_wrap fixed-footer">
                <a href="input_reserve_schedule.php" onclick="cancelPop(event)"
                  class="staff_input_step step_back">キャンセル</a>
                <input type="submit" name="select_work_of_day" value="決定" class="staff_input_step step_next">
              </div>

            </form>







        </div>



        <!-- ポップオーバーのテンプレート -->

        <div class="popoverTemplate">
          <div class="popover">
            <p>入力中の内容は破棄されます</p>
            <p>よろしいですか？
            </p>
            <div class="popover_btn">
              <button onclick="move()" class="true_btn">OK</button>
              <button onclick="backSet()">キャンセル</button>
            </div>
          </div>
        </div>





      </article>
    </main>


  </div>

  <script>
  window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
      location.reload();
    }
  });
  </script>

</body>



<script>
function validateTime(selectElement) {
  const row = selectElement.closest('tr');
  const startSelect = row.querySelector('select[name="start_times[]"]');
  const endSelect = row.querySelector('select[name="end_times[]"]');

  if (startSelect && endSelect) {
    const startTime = startSelect.value;
    const endTime = endSelect.value;

    if (startTime && endTime && startTime > endTime) {
      alert('退勤時間は出勤時間よりも後に設定してください。');
      endSelect.value = ''; // 退勤時間の選択をリセット
    }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const selects = document.querySelectorAll('select[name="start_times[]"], select[name="end_times[]"]');
  selects.forEach(select => {
    select.addEventListener('change', function() {
      validateTime(this);
    });
  });
});

function validateForm() {
  let isValid = true;
  let allEmpty = true;
  let errorMessage = '';
  const rows = document.querySelectorAll('.input_workdate_and_time tr');

  rows.forEach(row => {
    const startSelect = row.querySelector('select[name="start_times[]"]');
    const endSelect = row.querySelector('select[name="end_times[]"]');

    if (startSelect && endSelect) {
      const startTime = startSelect.value;
      const endTime = endSelect.value;

      if (startTime || endTime) {
        allEmpty = false;
      }

      if ((startTime && !endTime) || (!startTime && endTime)) {
        errorMessage = '出勤時間と退勤時間の両方を選択してください。';
        isValid = false;
      }
    }
  });

  if (allEmpty) {
    errorMessage = '少なくとも一日分の出勤時間と退勤時間を選択してください。';
    isValid = false;
  }

  if (!isValid) {
    alert(errorMessage);
  }

  return isValid;
}
</script>

<br><br><br><br><br>

</html>