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


<!-- header読み込み -->
<?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');
    require_once( dirname(__FILE__). '/data/reserve_data.php');
    ?>


<!-- 得たデータが例えば -->
<?php
    // 予約インスタンスを作成して配列に格納
    foreach( $reserve_requests as $reserve_request)
    $reserve_class_arrs[] = new Reservation($reserve_request)
    ?>


<body id="body">

  <div id="wrapper">


    <main id="main">
      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      ?>

      <?php    
      //バリデーション読み込み
      require_once('date_validate.php');
      ?>

      <!------------------------------------
        html
      -------------------------------------->

      <!-- 入力画面 -->

      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <!-- エラーメッセージがあるなら表示 -->

          <div class="demo demo3">
            <h1 class="heading"><span>予約承認待ちリスト</span></h1>
          </div>

          <!--予約のインスタンス配列をforeach  -->
          <?php foreach($reserve_class_arrs as $reserve_class_arr):?>
          <!-- 予約番号 -->
          <?php $reserve_number = $reserve_class_arr->getReservationNumber()?>

          <!-- 指名する人 -->
          <?php $employee_number = $reserve_class_arr->getEmployeeNumber(); ?>
          <!-- 予約予定日 -->
          <?php $reserve_title_day = $reserve_class_arr->getReservationDate();?>
          <!-- 希望開始時間 -->
          <?php $attendance_time = date("H:i",strtotime($reserve_class_arr->getStartTime())); ?>
          <!-- 指名した人の顧客ナンバー -->
          <?php $reserve_customer_name =$reserve_class_arr->getUserNumber();?>
          <?php foreach($people_basics as $people_basic) :?>
          <?php if($people_basic["no"] == $reserve_customer_name):?>
          <?php $reserve_customer_img = $people_basic["icon"] ?>
          <?php break; ?>
          <?php endif; ?>
          <?php endforeach ;?>

          <!-- 指名した人を特定 -->
          <?php foreach($sample_names as $sample_name):?>
          <?php if($sample_name[0] == $employee_number):?>

          <a href='reserve_schedule_done.php?selected_reserve_num=<?php echo urlencode($reserve_number) ?>'>
            <div class="request_wrap">
              <h2 class="input_card reserve_card_title">●予約申請</h2>
              <p class="reserve_title_day"><?php echo $reserve_title_day ?></p>
              <div class="request_icon_wrap">
                <!-- 客 -->
                <div>
                  <figure class="request_img">
                    <img src='../<?php echo $reserve_customer_img?>' alt="">
                  </figure>
                  <figcaption class="request_img_caption">
                    <?php echo $reserve_class_arr->getReserverName();?>
                  </figcaption>
                </div>
                <div class="arrow-round"></div>
                <!-- 指名された人 -->
                <div>
                  <figure class="request_img">
                    <img src='../<?php echo $sample_name[3]?>' alt="">
                  </figure>
                  <figcaption class="request_img_caption">
                    <?php echo $sample_name[1] ?>
                  </figcaption>
                </div>

              </div>
              <div class="work_time">
                <p class="starttime"><?php echo $attendance_time ?></p>
                <span class="dli-caret-right"></span>
                <p class="endtime">
                  <?php echo $reserve_class_arr->addTimeToStartTime($reserve_class_arr->getPlayTime()) ?>
                </p>
                <p class="coursetime"><?php echo $reserve_class_arr->getPlayTime(); ?>分</p>
              </div>

            </div>
          </a>
          <?php endif?>
          <?php endforeach ?>
          <?php endforeach ?>

          <div class="all_btn_wrap">
            <div class="cancel_btn_wrap">
              <a href="setting_index02.php" class="setting_cancel">キャンセル</a>
            </div>
          </div>

        </div>

      </article>


      <br><br><br><br><br><br><br><br>
      <p>下が確認できないのでスペース</p>

      <br><br><br><br><br><br><br><br>



    </main>

  </div>
</body>

</html>