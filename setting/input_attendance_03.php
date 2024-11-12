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
  $_SESSION['visited_attendance03'] = true;



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




// ０２からインスタンス作るバックで戻ってきたら復帰
  if(isset($_SESSION['input_attendance_card'])){
  $previousAttendances = unserialize($_SESSION['input_attendance_card']);
  
  }
// }


    // ここでバリデーションしてからOKなら０３へとばす
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST[""])) {
   
      // 次へ

  }



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
            <div class="item active">STEP.3<br>確認</div>
            <div class="item">STEP.4<br>完了</div>
          </div>


          <section class="staff_input_wrap">
            <h2>申請出勤日時</h2>
            <div class="attendances_input_wrap">
              <figure class="request_img">
                <img src='../<?php echo $employee_girl_img?>' alt="">
              </figure>
              <figcaption class="request_img_caption">
                <?php echo $employee_girl_name ?>
              </figcaption>



              <table class="attendances_list">
                <?php foreach( $previousAttendances as $previousAttendance):?>
                <tr>
                  <td class="<?php echo $previousAttendance->getFormattedWorkDayClass()?> list_leaf">
                    <?php echo $previousAttendance -> getFormattedWorkDay();?>
                  </td>
                  <td classs="list_leaf">
                    <?php echo $previousAttendance -> getWorkStartTime();?>
                  </td>
                  <td classs="list_leaf">→</td>
                  <td classs="list_leaf">
                    <?php echo $previousAttendance -> getWorkEndTime();?>
                  </td>
                </tr>
                <?php endforeach?>
              </table>
            </div>




            <form action="input_attendance_04.php" method="post" class="push_wrap">
              <a href="input_reserve_schedule.php" onclick="cancelPop(event)"
                class="staff_input_step step_back">キャンセル</a>


              <input type="submit" name="schedule_push" value="決定" class="staff_input_step step_next">


              <!-- なんかある -->
            </form>




          </section>





        </div>



        <!-- ポップオーバーのテンプレート -->

        <div class=" popoverTemplate">
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




<br><br><br><br><br>

</html>