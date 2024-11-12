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
  <!-- <script src="../js/show_modal.js" defer></script> -->
</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');


    // reviewのクラス
    require_once( dirname(__FILE__). '/class/review_class.php');
    require_once( dirname(__FILE__). '/data/review_data.php');



      //すべてのレビュー
       foreach($approvalPendings as $approvalPending){
      $approvalPendingArr[] = new  ReviewManager($approvalPending);
        }

        // 未承認レビュー

        foreach($approvalPendingArr as $approvalPendingData){
          if($approvalPendingData -> getApproval()== false){
           
            $approvalPendingDataArry [] = $approvalPendingData;
          }
        }


// スタッフカプセル化
    require_once( dirname(__FILE__). '/data/girl_data.php');
    require_once( dirname(__FILE__). '/class/girl_class.php');
    

    // profile
  foreach($sample_names as $sample_name){
    $staffList[] = new girlProfilelManager($sample_name);
  }

  // 画像
  foreach($sample_pics  as $sample_pic ){
    $staffPics[] = new girlImageManager($sample_pic['girlNumber'],$sample_pic);
  }
  

    ?>



    <main id="main">
      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      ?>

      <?php    
     
      //バリデーション読み込み
      require_once('date_validate.php');

      // セッションスタートしてる
      session_start();

      // 戻るボタンでエラーしないように
      header('Expires:-1');
      header('Cache-Control:');
      header('Pragma:');

      // エラー配列を作る
      $errmessage = array();


      ?>


      <!------------------------------------
        html
      -------------------------------------->

      <div class="demo demo3">
        <h2 class="heading"><span>口コミ掲載待ちリスト</span></h2>
      </div>


      <div id="approval_pending_list">

        <?php foreach($approvalPendingDataArry as $approvalPending):?>
        <!-- 指名した人のプロフィール -->
        <?php $employee_number = $approvalPending->getEmployeeNumber(); ?>

        <?php foreach($staffList as $staff):?>
        <?php if($staff -> getGirlNumber() == $employee_number):?>
        <?php $employee_girl_name = $staff -> getGirlName()?>
        <?php break ?>
        <?php endif?>
        <?php endforeach?>

        <?php foreach($staffPics as $pic):?>
        <?php if ( $pic -> getGirlNumber() ==  $employee_number ):?>
        <?php $employee_girl_img = $pic -> getGirlImage01()?>
        <?php break ?>
        <?php endif?>

        <?php endforeach?>


        <!-- <div class="review_request_wrap"> -->
        <a href='approval_review_done.php?reviewNum=<?php echo $approvalPending->getReviewNumber()?>'
          class="approval_pending_card">
          <div class="staff_review_bg">
            <!-- 画像 -->
            <figure class="subtitles_img">
              <img src='../<?php echo $employee_girl_img?>' alt="" class="review_girl_img">
              <!-- 名前 -->
              <figcaption class="employee_girl_wrap">
                <?php echo $employee_girl_name ?>
              </figcaption>
            </figure>
            <!-- タイトル -->
            <div class="staff_review_title">
              <p><?php echo $approvalPending-> getReviewTitle()?> </p>
            </div>
            <!-- 評価星 -->
            <div class="assessment">

              <p class="total_evaluation"><span class="stars"
                  style='--rating: <?php echo $approvalPending->getAverageStar()?>;'>
                </span>
              </p>
            </div>

            <!-- 評価本文 -->
            <p class="staff_review_text">
              <!-- 本文いらないかな -->
            </p>
          </div>
          <div class="reviewer_data">
            <p class="date_use">投稿日:<?php echo $approvalPending-> getPlayDate()?> </p>
          </div>
        </a>


        <?php endforeach?>

      </div>


      <br><br><br><br><br><br><br><br>
      <p>下が確認できないのでスペース</p>
      <br><br><br><br><br><br><br><br>

    </main>


  </div>
</body>

</html>