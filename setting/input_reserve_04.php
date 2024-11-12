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
  <script src="../js/input_reserve_form.js" defer></script>
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

// 予約が完了されてる人
  foreach($reserveLists as $reserveList){
    $reserved_class_arrs[] = new Reservation($reserveList);
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







// 02へ来たなら必ずセッションあるでしょ？
if (isset($_SESSION['input_reserve_card'])) {
    $reserve = unserialize($_SESSION['input_reserve_card']);

  $reserverName =  $_SESSION['memberName'];
  $reserverPhonee = $_SESSION['memberPhone'];
  $reserverEmail = $_SESSION['memberEmail'];
  $reserverIcon = $_SESSION['memberIcon'];
  $employe_girl_name = $_SESSION['employe_girl_name'];
  $employe_girl_img = $_SESSION['employe_girl_img'];




  // ここでバリデーションかく

  // ここでバリデーションしてからOKなら０３へとばす
  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["input_reserve_detail"])) {

  // 時間がはいっているか？
  if (isset($_POST['reserve_play_corse'])) {
  $play_corse = (int)$_POST['reserve_play_corse'];
  // 10で割り切れるかどうかをチェックする
  if ($play_corse % 10 === 0) {
  // 予約日時入れる
  $reserve->setReservePlayCourse($play_corse);
  } else {
  $errmessage = "10で割り切れない数値が入ってます";
  echo $errmessage;
  exit();
  }
  }else{
  $errmessage = "コースの時間が選択されてません";
  echo $errmessage;
  exit();
  }


  if (isset($_POST['reserve_play_place'])) {
  $play_place = (int)$_POST['reserve_play_place'];
  if($play_place == 1 || $play_place == 2){
  $reserve->setReservePlaySpace($play_place);
  }else{
  $errmessage = "ことなる数値がはいっています";
  echo $errmessage;
  exit();
  }
  }else{
  $errmessage = "場所が選択されてません";
  echo $errmessage;
  exit();
  }

  // hotel
  if($play_place == 1){
  if(isset($_POST['hotel_area'])){
  $reserve->setReservePlayArea($_POST['hotel_area']);
  if(isset($_POST['customer_address'])){
  unset($_POST['customer_address']);
  }
  $reserve -> resetPropertyValue('reservePlayAdress');
  $errmessage = "ここには来ています";
  echo $errmessage;
  // exit();

  }else{
  $errmessage = "最寄り駅が選択されてません";
  echo $errmessage ;
  if(isset($_POST['customer_address'])){
  unset($_POST['customer_address']);
  }
  $reserve -> resetPropertyValue('reservePlayAdress');
  exit();
  }
  // house
  }elseif($play_place == 2){
  if(isset($_POST['customer_address'])){
  $house_adress = $_POST['customer_address'];
  $pattern = '/^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,100}$/';
  if (preg_match($pattern, $house_adress)) {
  $reserve->setReservePlayAdress($house_adress);
  if(isset($_POST['hotel_area'])){
  unset($_POST['hotel_area']);
  }
  $reserve -> resetPropertyValue('reservePlayArea');
  }else{
  if(isset($_POST['hotel_area'])){
  unset($_POST['hotel_area']);
  }
  $reserve -> resetPropertyValue('reservePlayArea');
  $errmessage = "記号を含めないでください。";
  echo $errmessage;
  exit();

  }}

  }





  if(isset($_POST['play_option'])){
  $selectedOptions = $_POST['play_option'];

  // すべてのkeyリスト作成option01, option02などを使った配列を作成
    $optionIds = ['option01','option02','option03','option04','option05','option06','option07','option08','option09','option10'];

    // 受け取った値が$optionsに存在するか検証
  $valid = true;
  foreach ($selectedOptions as $selectedOption) {
  if (!in_array($selectedOption, $optionIds)) {
  $valid = false;
  break;
  }
  }


  // バリデーション結果に基づく処理

  if ($valid) {
        // すべてのオプションを false にリセット
        foreach ($optionIds as $optionId) {
            $reserve->{'set' . ucfirst($optionId)}(false);
        }

        // 選択されたオプションに true をセット
        foreach ($selectedOptions as $selectedOption) {
            $reserve->{'set' . ucfirst($selectedOption)}(true);
        }
    }
  }else{
  $errmessage = "予想外のオプション";
  echo $errmessage;
  exit();
  }
  

  // 次へ行く
  $_SESSION['input_reserve_card'] = serialize($reserve);
  header("Location: input_reserve_05.php");
  exit();
  }



  } else {
  // セッションがないなんてありえない
  echo "<p>入力の手順が間違っています</p>";
  echo "<script>
  setTimeout(function() {
    window.location.href = 'setting_index02.php';
  }, 1000);
  </script>";
  }


  ?>



  <!-- 予約日時 -->
  <?php
    $reservedaynum = $reserve->getReservePlayDay();
    // 年、月、日に分割
    $year = substr($reservedaynum, 0, 4);
    $month = substr($reservedaynum, 4, 2);
    $day = substr($reservedaynum, -2);
    
?>



  <!-- 通常なら$_getで予約番号を取得 -->
  <!-- sqlでその番号の予約データを取るべき？ -->

  <!-- 予約済みのインスタンス -->
  <!-- sqlをやっていないからとりあえずサンプル全部をインスタンスにしてる -->
  <!-- なにもない場合は空にしておくことが重要 -->



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



  <!--  -->



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


        </div>



        <!-- ここから時間表示 -->


        <!-- 他に同じ日に同じ人を予約している人はだれ？ -->
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


        <?php if($reserved_class_arr -> getReserveGirlNum() == $reserve->getReserveGirlNum() &&  $dateTime1 ==  $dateTime2):?>

        <?php $reserved_cards_arrs[] = $reserved_class_arr ?>
        <?php endif?>

        <?php endforeach ?>
        <?php endif?>



        <?php $time_threshold = $reserve->getReservePlaytime()?>

        <!-- 次の予約を決定する -->
        <?php if(isset($reserved_cards_arrs) && $reserved_cards_arrs):?>


        <!-- 無名関数$card -->
        <?php $filtered_cards = array_filter($reserved_cards_arrs, function($card) use ($time_threshold) {
          return strtotime($card->getReservePlaytime()) >= strtotime($time_threshold);
        });
        ?>

        <?php usort($filtered_cards, function($a, $b) {
          return strtotime($a->getReservePlaytime()) - strtotime($b->getReservePlaytime());
        });

        // フィルタリング後の配列が空でないかをチェック
        if (!empty($filtered_cards)) {
          $next_reserve_card = reset($filtered_cards);
          $next_reserve_time = $next_reserve_card->getReservePlaytime();
        } else {
        // フィルタリング後の配列が空の場合の処理
          $next_reserve_time = $want_reserve_cast -> getWorkEndTime();
        }
        ?>


        <?php else:?>
        <?php $next_reserve_time = $want_reserve_cast -> getWorkEndTime(); ?>


        <?php endif?>


        <form action="input_reserve_04.php" method="post">



          <div class="staff_input_wrap">
            <h2>コース選択</h2>



            <?php
            // DateTimeオブジェクトに変換
             $reserve_playtime = $reserve->getReservePlaytime();
            $reserve_playtime_dt = new DateTime($reserve_playtime);
            $next_reserve_time_dt = new DateTime($next_reserve_time);
            // 時間の差を計算
            $interval = $reserve_playtime_dt->diff($next_reserve_time_dt);
            // 分数を取得
            $minutes = $interval->h * 60 + $interval->i;
            // コースの時間
            $courses = [60, 90, 120, 150, 180, 210, 240, 270, 300];
            
            // 初期選択値をセッションの値に基づいて設定
            $default_course = $reserve->getReservePlayCourse() ? $reserve->getReservePlayCourse() : 60;

            ?>
            <h3>次の予約までは<?php echo $minutes ?>分です</h3>
            <ul id="select_days">
              <?php foreach ($courses as $course):?>
              <li class="select_btn schedule_btn">
                <?php if ($minutes >= $course):?>
                <input type="radio" id="$<?php echo $course?>_play_time" name="reserve_play_corse"
                  value="<?php echo $course?>" class="input_select_corse"
                  <?php echo ($course == $default_course) ? 'checked' : ''; ?>>

                <label for="$<?php echo $course?>_play_time" class="select_play_time">
                  <?php echo $course ?>分
                </label>
              </li>

              <?php endif?>
              <?php endforeach ?>
            </ul>
          </div>


          <section class="staff_input_wrap">
            <h2>プレイ場所</h2>
            <?php
            // 初期選択値を設定
            $reservePlaySpace = $reserve->getReservePlaySpace();
            $reservePlayAdress = $reserve->getReservePlayAdress();
            $reservePlayArea = $reserve->getReservePlayArea();
            
            ?>

            <ul id="select_place">
              <li class="select_btn plya_place_btn">
                <input class="input_select_play_place js-check" id="play_hotel" type="radio" name="reserve_play_place"
                  value="1" onclick="formSwitch()"
                  <?php echo (!$reservePlaySpace || $reservePlaySpace == 1) ? 'checked' : ''?>>
                <label class="select_play_place" for="play_hotel">
                  ホテル
                </label>
              </li>
              <li class="select_btn plya_place_btn">
                <input class="input_select_play_place js-check" id="play_house" type="radio" name="reserve_play_place"
                  value="2" onclick="formSwitch()" <?php echo $reservePlaySpace == 2 ? 'checked' : ''?>>
                <label class="select_play_place" for="play_house">
                  自宅
                </label>
              </li>
            </ul>

            <div class="line"></div>
            <dl>
              <span class="mini_alert">記号は使えません</span>
            </dl>

            <!-- ホテルの場所 -->

            <div id="hotel_list">
              <span class="play_place_title">ご利用駅</span>
              <ul class="form-check" id="select_hotel">
                <?php foreach($hotels as $index => $hotel ): ?>
                <li class="plya_place_btn select_btn">
                  <input class=" form-check-input" id="<?php echo $index ?>" type="radio"
                    value="<?php echo $hotel[0] ?>" name="hotel_area"
                    <?php echo ($reservePlayArea === $hotel[0] || ($reservePlayArea === null && $index === 'hotel1')) ? 'checked' : '' ?>>
                  <label for="<?php echo $index?>" class="select_play_place">
                    <?php echo $hotel[0] ?>
                  </label>
                </li>
                <?php endforeach ?>
              </ul>
            </div>


            <!-- 住所 -->
            <div id="house_address" class="play_place_title" style="display: none;">ご住所
              <input id="house_address_input" class="house_adress_input_text" type="text" name="customer_address"
                placeholder="100文字以内です" size="60" onblur="CheckGuestInfo(this)"
                pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,100}"
                value="<?php echo htmlspecialchars($reservePlayAdress ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>



          </section>

          <section class="staff_input_wrap">
            <h2>希望オプション</h2>

            <ul class="option_tag_ul input_optin">
              <!--選択している女の子のオプションリストを取得-->
              <!-- SQLでやるから後でいらないきがする -->
              <?php foreach( $options as $option) :?>
              <?php if($option -> getgirlNumber() == $reserve ->getReserveGirlNum()):?>
              <!-- girlナンバー抜いた配列 -->
              <?php $girlOptions = $option ->getOptions();?>
              <?php break?>
              <?php endif?>
              <?php endforeach ?>

              <?php foreach ($girlOptions as $key => $value):?>
              <?php $disabled = $value ? '' : 'disabled';?>
              <li class="step_list_wrap li_options">

                <input type="checkbox" id='<?php echo $key ?>' name="play_option[]" value='<?php echo $key ?>'
                  <?php echo $disabled?>>
                <label for='<?php echo $key?>' class="boxcheck"><?php echo $key ?></label>
              </li>
              <?php endforeach?>

            </ul>

          </section>



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


    <div class="alway_step_button_wrap fixed-footer">
      <a href="input_reserve_schedule.php" onclick="cancelPop(event)" class="staff_input_step step_back">キャンセル</a>
      <input type="submit" name="input_reserve_detail" value="決定" class="staff_input_step step_next">
    </div>

    </form>



  </div>

  <!-- リロード時に再読み込み -->
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