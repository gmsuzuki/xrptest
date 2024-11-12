<!DOCTYPE html>
<html lang="ja">

<?php    
      session_start();
      //バリデーション読み込み
      require_once('date_validate.php');

      // セッションスタートしてる


      // 戻るボタンでエラーしないように
      header('Expires:-1');
      header('Cache-Control:');
      header('Pragma:');

      // エラー配列を作る
      $errmessage = array();

    
      ?>

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
  <script src="../js/show_modal.js" defer></script>
</head>

<body id="body">


  <div id="wrapper">

    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');


    // 承認されてるスケジュール
    require_once( dirname(__FILE__). '/class/attendance_class.php');
    require_once( dirname(__FILE__). '/data/attendance_data.php');
    

    foreach($scheduleArray as $schedule){
    $attendance_data_done[] = new InputAttendanceReserve($schedule);
    };


// 予約のclass
    require_once( dirname(__FILE__). '/class/reserve_class.php');
    require_once( dirname(__FILE__). '/data/reserve_data.php');

// 未承認リスト
    $reserve_class_arrs=[];
    foreach( $reserveLists_yet as $reserve_request){
    $reserve_class_arrs[] = new Reservation($reserve_request);
  }

// 予約が完了されてる人
  foreach($reserveLists as $reserveList){
    $reserved_class_arrs[] = new Reservation($reserveList);
  }


//お客さんカプセル化
require_once( dirname(__FILE__). '/data/member_data.php');
require_once( dirname(__FILE__). '/class/member_class.php');

//客profile
foreach($people_basics as $people_basic){
$memberList[] = new memberProfileManager($people_basic);
}


// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

// スタッフカプセル化
require_once( dirname(__FILE__). '/data/girl_data.php');
require_once( dirname(__FILE__). '/class/girl_class.php');
require_once( dirname(__FILE__). '/data/staff_list_sort.php');

// スタッフprofile
foreach($sample_names as $sample_name){
$staffList[] = new girlProfilelManager($sample_name);
}

// 画像
foreach($sample_pics as $sample_pic ){
$staffPics[] = new girlImageManager($sample_pic['girlNumber'],$sample_pic);
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



    <!-- 通常なら$_getで予約番号を取得 -->
    <!-- sqlでその番号の予約データを取るべき？ -->
    <!-- クリックされたのは誰のどの予約か？特定 -->


    <?php foreach($reserve_class_arrs as $reserve_class_arr) :?>
    <?php if($reserve_class_arr -> getReserveNo() == $_GET['selected_reserve_num']):?>
    <?php $reserve_card = $reserve_class_arr ?>
    <?php break ?>
    <?php endif?>
    <?php endforeach ?>



    <!-- 予約希望時間 -->
    <!-- 予約開始 -->
    <?php $reserve_start_time = strtotime($reserve_card -> getReservePlaytime())?>
    <!-- 予約終了時間 -->
    <?php $reserve_end_time = strtotime($reserve_card -> addTimeToStartTime($reserve_card->getReservePlayCourse()))?>


    <!-- ここで予約カードの特定終了 -->


    <!-- 指名した人の顧客ナンバーから名前、画像特定 -->

    <?php foreach($memberList as $member) :?>
    <?php if($member->getMemberNumber() == $reserve_card -> getReserveCustomerNum()):?>
    <?php $reserve_customer = $member?>
    <?php $reserve_customer_name = $member -> getMemberName()?>
    <?php $reserve_customer_img = $member -> getMemberIcon() ?>
    <?php break; ?>
    <?php endif; ?>
    <?php endforeach ;?>

    <!-- 指名する人のプロフィール -->

    <?php foreach($staffList as $staff) :?>
    <?php if($reserve_card -> getReserveGirlNum() == $staff-> getGirlNumber()):?>
    <?php $employee_girl = $staff ?>
    <?php $employee_girl_name = $staff -> getGirlName()?>
    <!-- 画像特定 -->
    <?php foreach($staffPics as $staffpic):?>
    <?php if($staffpic -> getGirlNumber() == $employee_girl ->getGirlNumber()):?>
    <?php $employee_girl_img = $staffpic -> getGirlImage01()?>
    <?php break ?>
    <?php endif?>
    <?php endforeach?>


    <?php endif?>
    <?php endforeach?>

    <!-- 予約しようとしているキャストの出勤時間を取りたい -->
    <!-- 本来なら予約したい日付の出勤scheduleをとる -->
    <!-- その中から予約したいキャストの出勤時間をとる -->



    <?php foreach($attendance_data_done as $schedule_done ):?>
    <?php if($schedule_done -> getAttendanceGirlNum() == $employee_girl):?>
    <?php $want_reserve_cast =  $schedule_done?>
    <?php break ?>
    <?php endif?>
    <?php endforeach?>

    <!-- 出勤時間退勤時間確定 -->
    <?php $work_start_time = strtotime($want_reserve_cast -> getWorkStartTime())?>
    <?php $work_end_tiome = strtotime($want_reserve_cast -> getWorkEndTime())?>




    <!-- 他に同じ日に同じ人を予約している人はだれ？ -->
    <!-- 予約完了済み配列 ：$reserved_class_arrs-->
    <?php $reserved_cards_arr = []; // ここで初期化 ?>
    <?php if(isset($reserved_class_arrs) && $reserved_class_arrs):?>
    <!-- 予約済みリスト -->


    <!-- 今回いれる予約日を日時に -->

    <?php $dateTime1 = DateTime::createFromFormat('Y-m-d', $reserve_card->getReservePlayDay());?>

    <?php foreach($reserved_class_arrs as $reserved_class_arr) :?>
    <!-- すでに入っている予約日を日時へ -->

    <?php $dateTime2 = DateTime::createFromFormat('Y-m-d', $reserved_class_arr -> getReservePlayDay());?>
    <!-- 指名した人とその日時が同じ予約済みのデータをいれる -->

    <?php if($reserved_class_arr -> getReserveGirlNum() == $reserve_card->getReserveGirlNum()
  &&  $dateTime1 ==  $dateTime2):?>

    <!-- 予約済みリスト -->
    <?php $reserved_cards_arr[] = $reserved_class_arr ?>
    <?php endif?>

    <?php endforeach ?>
    <?php endif?>


    <!-- $reserved_cards_arr[]ここに何も入っていない場合 -->


    <!-- 入っていないものにgetStartTimeとかやってチェックしちゃってる -->
    <!-- だれもその日に予約していない場合、素通りするようにする -->
    <!-- カウントとかを使うかも -->



    <!-- クリックされたインスタンス $reserve_card -->
    <!-- 同じ日の同じ子を予約した人たちのインスタンス配列 $reserved_cards_arr-->



    <main id="main">
      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      ?>


      <!------------------------------------
        html
      -------------------------------------->

      <!-- 予約時間が出勤時間か？ -->
      <?php if ($reserve_start_time<$work_start_time || $work_end_tiome < $reserve_end_time):?>
      <?php $errmessage[] = "出勤予定時間ではありません"; ?>
      <?php endif?>

      <!-- 他の予約とかぶってないか？ -->
      <!-- reserved_cards_arr 予約済みリスト-->


      <?php if(is_array($reserved_cards_arr) && !empty($reserved_cards_arr)): ?>

      <?php foreach($reserved_cards_arr as $reserved_card_arr) :?>
      <?php $reserved_start_time = strtotime($reserved_card_arr -> getReservePlaytime())?>
      <?php $reserved_end_time = strtotime($reserved_card_arr -> addTimeToStartTime($reserved_card_arr->getReservePlayCourse()))?>
      <!-- // strtotimeが失敗していないか確認 -->
      <?php if ($reserved_start_time === false || $reserved_end_time === false) {
      continue; // 無効な予約データをスキップ
      }?>

      <?php if ($reserve_start_time < $reserved_end_time && $reserve_end_time > $reserved_start_time):?>

      <!-- 昔の条件 -->
      <!-- ($reserved_start_time <= $reserve_start_time && $reserve_start_time <=$reserved_end_time) ||  -->
      <!-- ($reserved_start_time <=$reserve_end_time && $reserve_end_time <=$reserved_end_time)) -->

      <?php $errmessage[] = "他の人の予約と重複しています"; ?> <?php endif?> <?php endforeach ?> <?php endif?> <article
        id="setting_index" class="under_space">
        <div class="content_wrapper">



          <!-- エラーメッセージがあるなら表示 -->
          <?php
        if ($errmessage) {
          echo "<div class='errmessage'>";
          echo implode('<br>', $errmessage);
          echo '</div>';
        }else{
          echo "
            <div class='demo demo3'>
              <h2 class='heading'><span>承認しますか？</span></h2>
            </div>";
        }

        ?>



          <!-- 出勤時間にあってるか？ -->
          <!-- エラーを表示するところ -->

          <!-- 予約にかぶってないか？ -->



          <div class="request_wrap">
            <h2 class="input_card reserve_card_title_checked">●予約承認</h2>
            <p class="reserve_title_day"><?php echo $reserve_card->getReservePlayDay() ?></p>
            <div class="request_icon_wrap">
              <!-- 客 -->
              <div>
                <figure class="request_img">
                  <img src='../<?php echo $reserve_customer_img?>' alt="">
                </figure>
                <figcaption class="request_img_caption">
                  <?php echo $reserve_customer_name;?>
                </figcaption>
              </div>
              <div class="arrow"></div>
              <div class="arrow-round"></div>
              <!-- 指名された人 -->
              <div>
                <figure class="request_img">
                  <img src='../<?php echo $employee_girl_img?>' alt="">
                </figure>
                <figcaption class="request_img_caption">
                  <?php echo $employee_girl_name; ?>
                </figcaption>
              </div>
            </div>
            <div class="work_time">
              <p class="starttime"><?php echo 
              date("H:i",strtotime($reserve_card->getReservePlaytime())); ?></span></p>
              <span class="dli-caret-right"></span>

              <p class="endtime">
                <?php echo $reserve_card->addTimeToStartTime($reserve_card->getReservePlayCourse()) ?>
              </p>
              <p class="coursetime"><?php echo $reserve_card->getReservePlayCourse(); ?>分</p>
            </div>

            <form action="" class="reserve_button_wrap">
              <!-- キャンセル -->
              <a href="reserve_schedule.php" class="reserve_back">キャンセル</a>


              <?php if($errmessage):?>
              <a href='reserve_mail.php?selected_reserve_num=<?php echo urlencode($reserve_card->getReserveNo()) ?>'
                class="reserve_back mail_to">お客様へ連絡</a>


              <!-- <a href="reserve_schedule.php" class="reserve_back">お客様へ連絡</a> -->
              <?php else:?>
              <input type="submit" id="nextButton" name="confirm" class="reserve_done" value="確定">
              <?php endif ?>
            </form>

          </div>

          <?php foreach ($reserved_class_arrs as $reserved_class_arr) :?>
          <!-- 予約開始時間 -->

          <?php $startTimeSlot = strtotime($reserved_class_arr -> getReservePlaytime())?>
          <!-- 予約終了時間 -->
          <?php $endTimeSlot = strtotime($reserved_class_arr -> addTimeToStartTime($reserved_class_arr->getReservePlayCourse()))?>

          <?php endforeach?>


          <section class="second_block">
            <div class="demo demo3">
              <h2 class="heading"><span>当日のスケジュール</span></h2>
            </div>
            <table class="oneday_calendar">
              <!-- ヘッダー -->
              <tr>
                <th>時間</th>
                <th>予約希望</th>
                <!-- 選択されたキャストの出勤状況 -->
                <th>出勤時間</th>
              </tr>


              <!-- 時間毎の行を生成 -->
              <?php for ($time = $startTime; $time <= $endTime; $time +=$timeIncrement):?>
              <tr>
                <td>
                  <?php echo date("H:i", $time)?>
                </td>
                <!-- 予約希望時間 -->
                <!-- 予約開始 -->
                <?php $reserve_start_time = strtotime($reserve_card -> getReservePlaytime())?>
                <!-- 予約終了時間 -->
                <?php $reserve_end_time = strtotime($reserve_card -> addTimeToStartTime($reserve_card->getReservePlayCourse()))?>
                <!-- 予約時間より今の時間が遅くて、終わり時間より早ければバツを書く -->
                <?php if ($reserve_start_time<=$time && $time < $reserve_end_time):?>
                <td style="color: red;">★</td>
                <?php else:?>
                <!-- 予約時間がなければ空白 -->
                <td></td>
                <?php endif?>


                <!-- 出勤時間 -->

                <?php if( $work_start_time <= $time && $time <= $work_end_tiome ):?>
                <!-- 色付きセル -->

                <!-- <td style="background-color: #bfbfe3;"> -->
                <?php $has_reservation = false; ?>

                <?php foreach ($reserved_cards_arr as $reserved_class_arr) :?>
                <!-- 予約開始時間 -->
                <?php $startTimeSlot = strtotime($reserved_class_arr -> getReservePlaytime())?>
                <!-- 予約終了時間 -->
                <?php $endTimeSlot = strtotime($reserved_class_arr -> addTimeToStartTime($reserved_class_arr->getReservePlayCourse()))?>



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
                   \'' . $reserved_class_arr->getReservePlayDay() . '\' ,
                   \'' . date("H:i", strtotime($reserved_class_arr->getReservePlaytime())). '\',
                   \'' . $reserved_class_arr->getReservePlayCourse(). '\',
                   \'' . $reserve_customer_name. '\'
                 ); return false;"
                 >
                ×</a>';?>

                  <?php else:?>
                <td style="background-color:#aad9fb;">
                  <span style="color:white; font-weight:bold;">◯</span>

                  <?php endif?>

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




          <div id="myModal" class="modal">
            <div class="modal-content" id="modalContent">
              <span id="closeModal" style="float: right; cursor: pointer;">&times;</span>
              <p id="modalText">ここに内容を表示</p>
            </div>
          </div>




          <?php print_r($reserved_cards_arr)?>

          <br><br><br><br><br><br><br><br>
          <p>下が確認できないのでスペース</p>
          <br><br><br><br><br><br><br><br>

    </main>

  </div>
</body>

</html>