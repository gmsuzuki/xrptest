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
  <script src="../js/form_permission.js" defer></script>
</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');
    require_once( dirname(__FILE__). '/validate/date_validate.php');

// スタッフカプセル化
    require_once( dirname(__FILE__). '/data/girl_data.php');
    require_once( dirname(__FILE__). '/class/girl_class.php');
    require_once( dirname(__FILE__). '/data/staff_list_sort.php');

    // profile
  foreach($sample_names as $sample_name){
    $staffList[] = new girlProfilelManager($sample_name);
  }

  // 画像
  foreach($sample_pics  as $sample_pic ){
    $staffPics[] = new girlImageManager($sample_pic['girlNumber'],$sample_pic);
  }

    // スケジュール
    require_once( dirname(__FILE__). '/class/attendance_class.php');
    require_once( dirname(__FILE__). '/data/attendance_data.php');
    
    foreach($unapprovedscheduleArray as $unapprovedschedulelist){
    $attendance_data_yet[] = new InputAttendanceReserve($unapprovedschedulelist);
    };
    

    ?>





    <main id="main">
      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      ?>

      <!-- キャンセルボタンが押された場合 -->
      <!-- 変なところから来ていないか？確認 -->
      <?php
      if (isset($_POST['cancel'])) {
        session_start(); // セッションを開始
        // localStorageの削除
        echo "<script>localStorage.clear();</script>";
        session_unset(); // セッションの変数をすべて削除
        session_destroy(); // セッションを破棄
        header("Location: approval_schedule.php"); // リダイレクト
        exit; // スクリプトの実行を終了
      }
    
      // ここから本格的にスタート
    


      // セッションスタートしてる
      session_start();

      // 戻るボタンでエラーしないように
      header('Expires:-1');
      header('Cache-Control:');
      header('Pragma:');

      // 入力モードにする
      $mode = 'input';
      // エラー配列を作る
      $errmessage = array();


      // 送信or戻るで戻るインプットに入ってもなにもしない/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
      if (isset($_POST['back']) && $_POST['back']) {


      // 確認（confirm）ページ/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
      } else if (isset($_POST['confirm']) && $_POST['confirm']) {
        



        // 日付
        $request_day = new Check_date($_POST['request_day']);
        // 入っているものがあっているか？
        if($request_day -> is_this_date()){
          $_SESSION['approval_date'] = $request_day -> get_input_date();
        }else{
          $errmessage[] = $request_day->get_err_inclass();
          $_SESSION['approval_date'] = '';
           $errmessage[] = $request_day -> get_input_date();
        }

        // 承認する番号
        if(isset($_POST["employee"]) && is_array($_POST['employee'])){
          foreach ($_POST['employee'] as $employee_num) {
           if(is_numeric($employee_num)){
            $employee_numbers[] = (int)$employee_num;
            $_SESSION['employee_numbers'] = $employee_numbers;
          }else{
          $_SESSION['employee_numbers']='';
          break;
          }
        }
        $_SESSION['employee_numbers'] = $employee_numbers;
        }else{
          $_SESSION['employee_numbers']='';
          $errmessage[] = '番号がないか配列になってない';
        }

    

        // モードチェンジ　エラーしてたらモード変わらない---------------------
        if ($errmessage) {
          $mode = 'input';
        } else {
          $mode = 'confirm';
        }

        // 送信モード/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_

      } else if (isset($_POST['send']) && $_POST['send']) {

// 出勤番号がポストされてくる「名前」決めてないので空白
    if (isset($_POST[""])) {
      // jsonなのでデコード
        $decodenum = json_decode($_POST[""]);
        
        if ($decodenum !== null) {
            // decodenum 配列を処理する
 

      // データベースコネクト
      require_once('db_connect.php');
      try {
      $new_post_title = $_SESSION['new_post_title']['title'];

      $new_post_title = htmlspecialchars($new_post_title, ENT_QUOTES, 'UTF-8');


      //データベースに接続
      $dbh = db_connect();
      //PDOでの例外エラーを詳細にするためのオプション
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //sql
      $sql = "INSERT INTO `mst_staff` (name, pass) VALUES (?, ?)";
      $stmt = $dbh->prepare($sql);
      $date[] = $new_post_title;
      $date[] = $new_post_body;
      $stmt->execute($date);

      //接続終了
      $dbh = null;

      print $new_post_title;
      print 'の記事を追加';
      } catch (Exception $e) {
      echo $e->getMessage();
      exit();
      }


      $_SESSION = array();
      // モードチェンジ
      $mode = 'send';

       } else {
            echo "無効なデータが送信されました。";
        }
    } else {
        echo "データが送信されていません。";
    }


      } else {

      // 初めて入ったとき/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/

      //承認する人

      // $_SESSION['new_post_header']['reserve'];

      }


      ?>
      <!------------------------------------
        html
      -------------------------------------->

      <!-- 入力画面 -->
      <?php if ($mode == 'input') : ?>

      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <!-- エラーメッセージがあるなら表示 -->
          <?php
        if ($errmessage) {
          echo "<div class='errmessage'>";
          echo implode('<br>', $errmessage);
          echo '</div>';
        }

        ?>
          <div class="demo demo3">
            <h1 class="heading"><span>出勤申請リスト</span></h1>
          </div>

          <h2 id="calendar_month_title">
            <?php if(isset($_SESSION['approval_date'])):?>
            <?php echo $_SESSION['approval_date'];?>
            <?php elseif(isset($_GET ['selected_date'])):?>
            <?php echo $_GET ['selected_date'] ?>
            <?php $_SESSION['approval_date'] =$_GET ['selected_date']?>
            <?php else:?>
            <p>日付エラー</p>
            <?php endif?>
          </h2>

          <!-- sqlで -->
          <!-- $_getで日付をもらって -->
          <!-- $gettDate = "2023-08-03"; -->
          <!-- $sql = "SELECT 社員番号 FROM 出勤スケジュールテーブル名 WHERE 出勤日 = '$getDate'"; -->
          <!-- $result = $conn->query($sql); -->
          <!-- こんな感じでクリックした日の出勤者データを取る -->


          <!-- とりあえず未承認の出勤リストをつくってあるこれの選択した日付のインスタンス -->

          <?php foreach( $attendance_data_yet as $yetList ){
            if($yetList->getAttendanceWorkDay() == $_SESSION['approval_date']){
              $yetLists[] = $yetList;
            }
          };?>


          <form method="POST">
            <?php foreach($yetLists as $attendanceCard):?>
            <!-- 出勤希望者の名前等を検索 -->

            <!-- スタッフ番号 -->
            <?php $employe_number = $attendanceCard->getAttendanceGirlNum(); ?>

            <?php foreach($staffList as $sample_name):?>
            <?php if($sample_name->getGirlNumber() == $employe_number):?>
            <!-- 名前 -->
            <?php $employe_girl_name = $sample_name -> getGirlName()?>
            <!-- 画像 -->
            <?php foreach( $staffPics as $staffPic):?>
            <?php if($staffPic -> getGirlNumber() == $sample_name -> getGirlNumber()):?>
            <?php  $employe_girl_img = $staffPic -> getGirlImage01();?>
            <?php break; // ここでループを終了?>
            <?php endif ?>
            <?php endforeach?>

            <?php break ?>
            <?php endif?>
            <?php endforeach?>


            <label>
              <input type="checkbox" name="employee[]" value='<?php echo $attendanceCard->getAttendanceNo()?>'
                class="request_card">
              <?php $attendance_time = date("H:i",strtotime($attendanceCard -> getWorkStartTime())); ?>
              <?php $leaving_time = date("H:i",strtotime($attendanceCard -> getWorkEndTime())); ?>



              <div class="request_wrap">
                <h2 class="input_card application_for_attendance_title ">●出勤申請カード</h2>
                <figure class="request_img">
                  <img src='../<?php echo $employe_girl_img?>' alt="">
                </figure>
                <figcaption class="request_img_caption">
                  <?php echo $employe_girl_name ?>
                </figcaption>
                <div class="work_time">
                  <p class="starttime"><?php echo $attendance_time ?></p>
                  <div class="arrow-round"></div>
                  <p class="endtime"><?php echo $leaving_time ?></p>
                </div>
              </div>
            </label>
            <?php endforeach ?>


            <?php if(isset($_SESSION['approval_date'])):?>
            <?php $approval_date_time =$_SESSION['approval_date']?>
            <?php elseif(isset($_GET['selected_date'])):?>
            <?php $approval_date_time =$_GET['selected_date']?>
            <?php else :?>
            <?php $errmessage = "日付エラー" ;?>
            <?php endif ?>

            <input type="hidden" name="request_day"
              value="<?php echo htmlspecialchars($approval_date_time, ENT_QUOTES, 'UTF-8'); ?>">
            <div class="all_btn_wrap">
              <input type="submit" disabled id="submit_button" name="confirm" value="確認">

              <div class="cancel_btn_wrap">
                <input type="submit" class="setting_cancel" name="cancel" value="キャンセル">
              </div>
            </div>


          </form>
        </div>

      </article>



      <!-- 確認画面 -->
      <?php elseif ($mode == 'confirm') : ?>

      <?php foreach( $attendance_data_yet as $yetList ){
            if($yetList->getAttendanceWorkDay() == $_SESSION['approval_date']){
              $yetLists[] = $yetList;
            }
          };?>


      <div class="demo demo3">
        <h2 class="heading"><span>以下の申請を承認します</span></h2>
      </div>

      <?php $attendanceCards=[]?>
      <?php foreach($yetLists as $okcard){
       foreach($_SESSION['employee_numbers'] as $employee_number){
        if($okcard->getattendanceNo()== $employee_number){
       $attendanceCards[] = $okcard;
        break;
        }
        }
        }      
      ?>

      <!-- 出勤希望者の名前等を検索 -->


      <?php foreach($attendanceCards as $attendanceCard):?>
      <!-- スタッフ番号 -->
      <?php $employe_number = $attendanceCard->getAttendanceGirlNum(); ?>

      <?php foreach($staffList as $sample_name):?>
      <?php if($sample_name->getGirlNumber() == $employe_number):?>
      <!-- 名前 -->
      <?php $employe_girl_name = $sample_name -> getGirlName()?>
      <!-- 画像 -->
      <?php foreach( $staffPics as $staffPic):?>
      <?php if($staffPic -> getGirlNumber() == $sample_name -> getGirlNumber()):?>
      <?php  $employe_girl_img = $staffPic -> getGirlImage01();?>
      <?php break; // ここでループを終了?>
      <?php endif ?>
      <?php endforeach?>

      <?php break ?>
      <?php endif?>
      <?php endforeach?>




      <!-- 日付表示 -->
      <h3 class="approval_date_title"><?php echo $_SESSION['approval_date']?></h3>

      <div class="request_wrap">
        <h2 class="input_card application_for_attendance_checked ">●申請承認</h2>

        <?php $attendance_time = date("H:i",strtotime($attendanceCard -> getWorkStartTime())); ?>
        <?php $leaving_time = date("H:i",strtotime($attendanceCard -> getWorkEndTime())); ?>




        <figure class="request_img">
          <img src='../<?php echo $employe_girl_img?>' alt="">
        </figure>
        <figcaption class="request_img_caption">
          <?php echo $employe_girl_name ?>
        </figcaption>

        <div class="work_time">
          <p class="starttime"><?php echo $attendance_time;?></p>
          <div class="arrow-round"></div>
          <p class="endtime"><?php echo $leaving_time;?></p>
        </div>

      </div>
      <?php endforeach ?>


      <form action="./approval_schedule_done.php" method="POST">

        <!-- 送るデータ -->
        <!-- 承認する日付　いらないかも -->
        <input type="hidden" name="" value="<?php echo $_SESSION['approval_date']?>">
        <!-- 承認する出勤カード番号 -->
        <input type="hidden" name="" value="<?php echo json_encode($_SESSION['employee_numbers'])?>">

        <div class="send_btn_wrap">
          <input type="submit" class="back_btn" name="back" value="戻る">
          <input type="submit" class="send_btn" name="send" value="承認">
        </div>

      </form>


      <!-- 送信画面 -->
      <?php elseif ($mode == 'send') : ?>

      <?php echo $_SESSION['approval_date']?>
      <!-- 承認する出勤カード番号 -->
      <?php echo $_SESSION['employee_numbers']?>



      <?php else : ?>
      <h3>エラーしてます</h3>


      <?php endif; ?>


      <br><br><br><br><br><br><br><br>
      <p>下が確認できないのでスペース</p>
      <?php  echo $mode ;?><br>
      <br><br><br><br><br><br><br><br>

    </main>


  </div>
</body>

</html>