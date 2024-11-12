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


// 予約のclass
    require_once( dirname(__FILE__). '/class/reserve_class.php');
    require_once( dirname(__FILE__). '/data/reserve_data.php');

// 未承認リスト
    $reserve_class_arrs=[];
    foreach( $reserveLists_yet as $reserve_request){
    $reserve_class_arrs[] = new Reservation($reserve_request);
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

          <!-- 未承認リスト -->

          <!--予約のインスタンス配列をforeach  -->
          <?php foreach($reserve_class_arrs as $reserve_class_arr):?>
          <!-- 予約番号 -->
          <?php $reserve_number = $reserve_class_arr->getReserveNo()?>

          <!-- 指名する人 -->
          <?php $employe_number = $reserve_class_arr->getReserveGirlNum(); ?>
          <!-- 予約予定日 -->
          <?php $reserve_title_day = $reserve_class_arr->getReservePlayDay();?>
          <!-- 希望開始時間 -->
          <?php $attendance_time = date("H:i",strtotime($reserve_class_arr->getReservePlaytime())); ?>
          <!-- 指名した人の顧客特定 -->
          <?php foreach( $memberList as $samplename ) :?>
          <?php if($samplename -> getMemberNumber() == $reserve_class_arr->getReserveCustomerNum()):?>
          <?php $reserve_customer_name = $samplename -> getMemberName()?>
          <?php $reserve_customer_img =  $samplename -> getMemberIcon() ?>
          <?php break; ?>
          <?php endif; ?>
          <?php endforeach ;?>

          <!-- 指名した人を特定 -->
          <?php foreach($staffList as $staff):?>
          <?php if($staff-> getGirlNumber() == $employe_number):?>
          <?php $nominatedstaff_name = $staff -> getGirlName() ?>
          <?php foreach($staffPics as $staffPic):?>
          <?php if($staffPic -> getGirlNumber() == $employe_number):?>
          <?php $nominatedstaff_img = $staffPic -> getGirlImage01()?>
          <?php break?>
          <?php endif ?>
          <?endforeach?>


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
                    <?php echo $reserve_customer_name;?>
                  </figcaption>
                </div>
                <div class="arrow-round"></div>
                <!-- 指名された人 -->
                <div>
                  <figure class="request_img">
                    <img src='../<?php echo $nominatedstaff_img?>' alt="">
                  </figure>
                  <figcaption class="request_img_caption">
                    <?php echo $nominatedstaff_name ?>
                  </figcaption>
                </div>

              </div>
              <div class="work_time">
                <p class="starttime"><?php echo $attendance_time ?></p>
                <span class="dli-caret-right"></span>
                <p class="endtime">
                  <?php echo $reserve_class_arr->addTimeToStartTime($reserve_class_arr->getReservePlayCourse()) ?>
                </p>
                <p class="coursetime"><?php echo $reserve_class_arr->getReservePlayCourse(); ?>分</p>
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