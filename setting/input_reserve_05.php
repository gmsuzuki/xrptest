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
  <script src="../js/text_check.js" defer></script>
  <script src="../js/text_count.js" defer></script>
  <script src="../js/setting.js" defer></script>
  <script src="../js/cancelpop.js" defer></script>
  <script src="../js/user_input_modal.js" defer></script>
  <script src="../js/step_bar.js" defer></script>

</head>

<body id="body">


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

  // オプション
  foreach($sample_basic_options  as $sampleoption ){
    $options[]= new girlOptionManager($sampleoption['girlNumber'],$sampleoption);

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


// すべて予約カード
$allReserves = []; // 空の配列を初期化

foreach($reserveLists as $reservedataArry){
  $allReserves[] = new Reservation($reservedataArry);
}




 
session_start(); // セッションを開始


// test03.phpを通過したかをチェック
if (!isset($_SESSION['visited_test03'])) {
    echo "<p>不正なアクセスです。最初のページに移行します。</p>";
    echo "<script>
    setTimeout(function() {
        window.location.href = 'setting_index02.php';
    }, 2000);
    </script>";
    exit();
}


  // タイムアウト確認処理
  require_once( dirname(__FILE__). '/../parts/input_timeout.php');

// test01.phpを通過したことを示すフラグを設定
  $_SESSION['visited_test04'] = true;



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







// 05へ来たなら必ずセッションあるでしょ？
if (isset($_SESSION['input_reserve_card'])) {
    $reserve = unserialize($_SESSION['input_reserve_card']);


  $reserverName =  $_SESSION['memberName'];
  $reserverPhonee = $_SESSION['memberPhone'];
  $reserverEmail = $_SESSION['memberEmail'];
  $reserverIcon = $_SESSION['memberIcon'];
  $employe_girl_name = $_SESSION['employe_girl_name'];
  $employe_girl_img = $_SESSION['employe_girl_img'];





    // ここでバリデーションかく



} else {
  // セッションがないなんてありえない
    echo "<p>入力の手順が間違っています</p>";
    echo "<script>setTimeout(function() {window.location.href = 'setting_index02.php';}, 1000);</script>";
}

      
?>


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

  <?php $employe_girl_name = $_SESSION['employe_girl_name']?>
  <!-- 画像 -->
  <?php $employe_girl_img = $_SESSION['employe_girl_img']?>







  <!-- 通常なら$_getで予約番号を取得 -->
  <!-- sqlでその番号の予約データを取るべき？ -->
  <!-- 予約済みのインスタンス -->
  <!-- sqlをやっていないからとりあえずサンプル全部をインスタンスにしてる -->
  <!-- なにもない場合は空にしておくことが重要 -->
  <!-- ここで予約カードの特定終了 -->



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



  <!--  -->


  <div id="wrapper">




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
            <div class="item active">STEP.4<br>確認</div>
            <div class="item">STEP.5<br>完了</div>
          </div>



          <div class="request_wrap">
            <h2 class="input_card reserve_card_title">●予約カード</h2>
            <p class="reserve_title_day"><?php echo $year . "-" . $month . "-" . $day; ?></p>
            <div class="request_icon_wrap">
              <!-- 客 -->
              <div>
                <figure class="request_img">
                  <?php if($reserve->getReserveCustomerType()== 2):?>
                  <img src='../img/user_face.png' alt="">
                  <?php else:?>
                  <img src='../<?php echo $reserverIcon?>' alt="">
                  <?php endif?>
                </figure>
                <figcaption class="request_img_caption">
                  <?php echo $reserverName;?>
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
                  <?php echo $employe_girl_name ; ?>
                </figcaption>
              </div>
            </div>

            <div class="work_time">
              <!-- スタート -->
              <p class="starttime"><?php echo $reserve->getReservePlaytime() ?></p>
              <span class="dli-caret-right"></span>
              <p class="endtime">
                <!-- エンド -->
                <?php echo $reserve->addTimeToStartTime($reserve->getReservePlayCourse()) ?>
              </p>
              <!-- コース -->
              <p class="coursetime"><?php echo $reserve->getReservePlayCourse(); ?>分</p>
            </div>


            <?php if($reserve->getReservePlaySpace() == 1):?>
            <div class='play_place'>
              <p class="select_play_place">ホテル</p>
              <p><?php echo $reserve->getReservePlayArea();?></p>
            </div>
            <?php elseif($reserve->getReservePlaySpace() == 2):?>
            <div class='play_place_house'>
              <p class="select_play_plase">■自宅</p>
              <div><?php echo $reserve->getReservePlayAdress();?></div>

            </div>
            <?php endif?>


            <div class='play_options'>
              <h2>オプション</h2>
              <?php
              // オプションリスト (確認したいオプションを配列にしておく)
              $optionIds = ['option01', 'option02', 'option03', 'option04', 'option05', 'option06', 'option07',
              'option08', 'option09', 'option10'];

              // trueになっているオプションを保存する配列
              $trueOptions = [];

              // 各オプションがtrueかを確認
              foreach ($optionIds as $optionId) {
              // 動的にメソッドを呼び出し、trueかを確認
              if ($reserve->{'get' . ucfirst($optionId)}()) {
              $trueOptions[] = $optionId;
              }
              }

              // 結果の表示
              if (!empty($trueOptions)) {
              // trueになっているオプションをecho
              foreach ($trueOptions as $trueOption) {
              echo $trueOption ."<br>";
              }
              } else {
              // 全てfalseの場合
              echo "選択なし";
              }

              ?>

            </div>



            <form action="input_reserve_06.php" method="post">
              <div class="step_button_wrap">
                <a href="input_reserve_schedule.php" onclick="cancelPop(event)"
                  class="staff_input_step step_back">キャンセル</a>

                <input type="submit" name="customer_information" value="決定" class="staff_input_step step_next">

              </div>
            </form>


          </div>
        </div>
      </article>
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