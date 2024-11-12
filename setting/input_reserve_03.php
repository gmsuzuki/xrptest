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

  <script src="../js/error_set.js" defer></script>
  <script src="../js/text_check.js" defer></script>
  <script src="../js/text_count.js" defer></script>
  <script src="../js/setting.js" defer></script>
  <script src="../js/cancelpop.js" defer></script>
  <script src="../js/radio_display.js" defer></script>
  <script src="../js/show_modal.js" defer></script>
  <script src="../js/step_bar.js" defer></script>
</head>

<body id="body">

  <!-- header読み込み -->
  <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');

  //お客さんカプセル化
   require_once( dirname(__FILE__). '/data/member_data.php');
   require_once( dirname(__FILE__). '/class/member_class.php');
   
    // profile
    foreach($people_basics as $people_basic){
    $memberList[] = new memberProfileManager($people_basic);
  }

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
  
// スケジュールカプセル化


    require_once( dirname(__FILE__). '/class/attendance_class.php');
    require_once( dirname(__FILE__). '/data/attendance_data.php');

// スケジュール

$inputData = [];
foreach ($scheduleArray as $schedule) {
    $workDay = $schedule['attendanceWorkDay'];
    $inputData[$workDay][] = new InputAttendanceReserve($schedule);
}

    // 予約関連
    require_once( dirname(__FILE__). '/class/reserve_class.php');
    require_once( dirname(__FILE__). '/data/reserve_data.php');


// 予約が完了されてる人
  foreach($reserveLists as $reserveList){
    $reserved_class_arrs[] = new Reservation($reserveList);
  }



?>

  <!-- 得たデータが例えば -->
  <!-- 開店時間閉店時間 -->
  <!-- 何分ごとのタイムテーブルにする？ -->
  <?php
          $startTime = strtotime("08:00:00");
          $endTime = strtotime("21:00:00");
          $timeIncrement = 1800; // 30分
    ?>


  <?php
  // セッションIDを比較
  session_start();

// test01.phpを通過したかをチェック
if (!isset($_SESSION['visited_test01']) && !isset($_SESSION['visited_test02']) ) {
    echo "<p>不正なアクセスです。最初のページに移行します。</p>";
    echo "<script>
    setTimeout(function() {
        window.location.href = 'setting_index02.php';
    }, 2000);
    </script>";
    exit();
}


// タイムアウト確認しょり

  require_once( dirname(__FILE__). '/../parts/input_timeout.php');


  // test03.phpを通過したことを示すフラグを設定
  $_SESSION['visited_test03'] = true;


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



// 03へ来たなら必ずセッションあるでしょ？
if (isset($_SESSION['input_reserve_card'])) {
    $reserve = unserialize($_SESSION['input_reserve_card']);
    // 特別表示用のユーザー名前電話メール
  $reserverName =  $_SESSION['memberName'];
  $reserverPhonee = $_SESSION['memberPhone'];
  $reserverEmail = $_SESSION['memberEmail'];
  $reserverIcon = $_SESSION['memberIcon'];



    // ここでバリデーションしてからOKなら０4へとばす
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["reserve_time"])) {

       $reserve_time = $_POST['reserve_time'];
   // バリデーション: 時刻フォーマット 'H:i' であることを確認
        $time_format = 'H:i';
        $dateTimeObj = DateTime::createFromFormat($time_format, $reserve_time);
        $errors = DateTime::getLastErrors();

   if ($dateTimeObj && $errors['warning_count'] == 0 && $errors['error_count'] == 0) {
          // バリデーション成功
          $reserve -> setReservePlaytime($reserve_time);
          // 次へ行く
          $_SESSION['input_reserve_card'] = serialize($reserve);
          header("Location: input_reserve_04.php");
          exit();

        } else {
          // バリデーション失敗
          $errmessage = "無効な時刻フォーマットです。";
          $reserve->resetPropertyNull($reservePlayTime);
          exit();
        }
    }
    
}else{
    // セッションがないなんてありえない
    echo "<p>入力の手順が間違っています</p>";
    echo "<script>setTimeout(function() {window.location.href = 'setting_index02.php';}, 1000);</script>";
}

?>


  <!-- 通常なら$_getで予約番号を取得 -->
  <!-- sqlでその番号の予約データを取るべき？ -->

  <!-- 予約済みのインスタンス -->
  <!-- sqlをやっていないからとりあえずサンプル全部をインスタンスにしてる -->
  <!-- なにもない場合は空にしておくことが重要 -->








  <!-- ここで予約カードの特定終了 -->



  <!-- 指名した人の顧客ナンバーから画像特定 -->
  <!-- 新規客 -->
  <?php if($reserve->getReserveCustomerType()== 2):?>
  <?php $reserve_customer_img = 'img/user_face.png'; ?>
  <!-- 会員 -->
  <?php elseif($reserve->getReserveCustomerType() == 1):?>
  <?php $reserve_customer_img = $reserverIcon ?>
  <?php endif; ?>

  <!-- 指名する人のプロフィール -->
  <!-- スタッフ番号 -->
  <?php $employe_number = $reserve->getReserveGirlNum(); ?>

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


  <!-- セッション入れとく -->
  <?php
  $_SESSION['employe_girl_name'] = $employe_girl_name;
  $_SESSION['employe_girl_img'] = $employe_girl_img;
  ?>

  <!-- 予約しようとしているキャストの出勤時間を取りたい -->
  <!-- 02までで日付は持ってるしキャスト番号も持ってるから -->
  <!-- 本来はSQLでとるが -->
  <!-- 今回は先一週間の出勤から検索 -->



  <!-- 予約日時 -->
  <?php
  // 選択日時
  $today_num  = $reserve->getReservePlayDay();
  // 選択してるキャスト
  $select_cast_no = $reserve->getReserveGirlNum();

  // 日付を数字を文字列に変換
   $dayStr = (string)$today_num;

  // 年、月、日をそれぞれ抽出してフォーマット
  $year = substr($dayStr, 0, 4);
  $month = substr($dayStr, 4, 2);
  $day = substr($dayStr, 6, 2);
  
  // 日時合体
  $today_num = $year . '-' . $month . '-' . $day;
  $todayDatas = $inputData[$today_num] ?? null;

  foreach($todayDatas as $todayData){
    if($todayData->getAttendanceGirlNum() == $select_cast_no ){
      $want_reserve_cast = $todayData;
      break;
    }
  } 
  ?>



  <!-- 出勤時間退勤時間確定 -->
  <?php $work_start_time = strtotime($want_reserve_cast->getWorkStartTime())?>
  <?php $work_end_time = strtotime($want_reserve_cast->getWorkEndTime())?>

  <!-- 他に同じ日に同じ人を予約している人はだれ？ -->
  <?php $reserved_cards_arrs= array();?>
  <?php if(isset($reserved_class_arrs) && $reserved_class_arrs):?>

  <!-- 今回いれる予約日を日時に -->

  <?php $dateTime1 = DateTime::createFromFormat('Ymd', $reserve->getReservePlayDay());?>

  <?php foreach($reserved_class_arrs as $reserved_class_arr) :?>
  <!-- すでに入っている予約日を日時へ -->

  <?php $dateTime2 = DateTime::createFromFormat('Y-m-d', $reserved_class_arr -> getReservePlayDay());?>
  <!-- 指名した人とその日時が同じ予約済みのデータをいれる -->


  <?php if($reserved_class_arr -> getReserveGirlNum() == $reserve->getReserveGirlNum()
  &&  $dateTime1 ==  $dateTime2):?>


  <?php $reserved_cards_arrs[] = $reserved_class_arr ?>
  <?php endif?>

  <?php endforeach ?>
  <?php endif?>


  <!-- $reserved_cards_arr[]ここに何も入っていない場合 -->
  <!-- 入っていないものにgetStartTimeとかやってチェックしちゃってる -->
  <!-- だれもその日に予約していない場合、素通りするようにする -->
  <!-- カウントとかを使うかも -->



  <!-- クリックされたインスタンス $reserve_card -->
  <!-- 同じ日の同じ子を予約した人たちのインスタンス配列 $reserved_cards_arr-->




  <div id="wrapper">



    <!-- 得たデータが例えば -->
    <!-- 開店時間閉店時間 -->
    <!-- 何分ごとのタイムテーブルにする？ -->
    <?php
          $startTime = strtotime("10:00:00");
          $endTime = strtotime("21:00:00");
          $timeIncrement = 1800; // 30分
    ?>




    <main id="main">
      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <div class="demo demo3">
            <h1 class="heading"><span>予約の入力</span></h1>
          </div>


          <div class="progressbar_square">
            <div class="item active">STEP.1<br>お客様</div>
            <div class="item active">STEP.2<br>指名選択</div>
            <div class="item active">STEP.3<br>予約内容</div>
            <div class="item">STEP.4<br>確認</div>
            <div class="item">STEP.5<br>完了</div>
          </div>

          <div class="staff_input_wrap">
            <h2>予約カード</h2>
            <p class="reserve_title_day"><?php echo $year . "-" . $month . "-" . $day; ?></p>
            <div class="request_icon_wrap">
              <!-- 客 -->
              <div>
                <figure class="request_img">
                  <?php if($reserve->getReserveCustomerType()== 2):?>
                  <img src='../img/user_face.png' alt="">
                  <?php else:?>
                  <img src='../<?php echo $reserve_customer_img ?>' alt="">
                  <?php endif?>

                </figure>
                <figcaption class="request_img_caption">
                  <?php echo $reserverName ;?>
                </figcaption>
              </div>
              <div class="arrow"></div>
              <div class="arrow-round"></div>
              <!-- 指名された人 -->
              <div>
                <figure class="request_img">
                  <img src='../<?php echo $employe_girl_img?>' alt="">
                </figure>
                <figcaption class="request_img_caption">
                  <?php echo $employe_girl_name; ?>
                </figcaption>
              </div>

            </div>

          </div>

          <!-- ここから時間表示 -->

          <section class="second_block oneday_calendar_bottom">

            <h2 style="padding:1rem 0 1rem 2rem;">スタート時間の選択（○:選択可能）</h2>
            <table class="oneday_calendar">
              <!-- ヘッダー -->
              <tr>
                <th>時間</th>
                <!-- <th>予約希望</th> -->
                <!-- 選択されたキャストの出勤状況 -->
                <th>出勤時間</th>
              </tr>


              <!-- 時間毎の行を生成 -->
              <?php for ($time = $startTime; $time <= $endTime; $time +=$timeIncrement):?>
              <tr>
                <td>
                  <?php echo date("H:i", $time)?>
                </td>

                <!-- 出勤時間 -->
                <?php if( $work_start_time <= $time && $time <= $work_end_time ):?>
                <!-- 色付きセル -->

                <!-- <td style="background-color: #bfbfe3;"> -->
                <?php $has_reservation = false; ?>
                <?php foreach ($reserved_cards_arrs as $reserved_cards_arr) :?>
                <!-- 予約開始時間 -->
                <?php $startTimeSlot = strtotime($reserved_cards_arr -> getReservePlaytime())?>
                <!-- 予約終了時間 -->
                <?php $endTimeSlot = strtotime($reserved_cards_arr -> 
                addTimeToStartTime($reserved_cards_arr->getReservePlayCourse()))?>

                <!-- 予約時間より今の時間が遅くて、終わり時間より早ければバツを書く -->
                <?php if ($startTimeSlot<=$time && $time < $endTimeSlot):?>
                <?php $has_reservation = true; ?>
                <?php break?>
                <?php endif?>
                <?php endforeach?>



                <!-- 予約時間がなければ空白 -->
                <?php if ($has_reservation): ?>
                <td style="background-color: #c3c3c3;">
                  <!-- <a href="#" onclick="cancelPop(event)">×</a> -->




                  <!-- 受け渡しのデータを整理する -->
                  <!-- クリックした時間が表示されている -->
                  <!-- / プレイスタート時間を持ってきたい -->




                  <?php echo
                 '<a href="#" onclick="showModal
                 (
                   \'' . $reserved_cards_arr->getReservePlayDay() . '\' ,
                   \'' . date("H:i", strtotime($reserved_cards_arr->getReservePlayDay())). '\',
                   \'' . $reserved_cards_arr->getReservePlayCourse(). '\',
                   \'' . $reserverName . '\'
                 ); return false;"
                 >
                ×</a>';?>
                  <?php else:?>
                  <!-- <td style="background-color:#aad9fb;"> -->
                  <!-- <span style="color:white; font-weight:bold;">◯</span> -->
                  <?php //endif?>

                  <!-- 修正 -->
                <td style="background-color:#aad9fb;">
                  <form method="post" action="input_reserve_03.php">
                    <input type="hidden" name="reserve_time" value="<?php echo date("H:i", $time); ?>">
                    <button type="submit" style="background:none;border:none;color:white;font-weight:bold;">
                      <?php if($time == $work_end_time): ?>
                      <span style="color:red;">△</span>
                      <?php else:?>
                      ◯
                      <?php endif?>
                    </button>
                  </form>
                  <?php endif; ?>

                  <?php else:?>
                  <!-- 出勤時間以外 -->
                <td class="no_reserve">
                  <?php endif?>
                  <!-- 全部終わって閉じる -->
                </td>
              </tr>

              <?php endfor ?>

            </table>

          </section>



      </article>



      <div id="myModal" class="modal">
        <div class="modal-content" id="modalContent">
          <span id="closeModal" style="float: right; cursor: pointer;">&times;</span>
          <p id="modalText">ここに内容を表示</p>
        </div>
      </div>



    </main>


  </div>
</body>




<!-- 保存されているデータ -->
<p>予約</p>
<?php
    // var_dumpでインスタンスの中身を見る
    echo "
    <pre>";
    var_dump($reserve);
    echo "</pre>";
    ?>

<br>
<br>
<p>他の人の予約</p>
<?php
    // var_dumpでインスタンスの中身を見る
    echo "
    <pre>";
    var_dump($reserved_cards_arrs);
    echo "</pre>";
    ?>
<br>
<!-- 保存されているデータ -->


</html>