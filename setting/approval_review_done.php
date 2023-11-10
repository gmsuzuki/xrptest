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
  <!-- <script src="../js/form_permission.js" defer></script> -->
  <!-- <script src="../js/show_modal.js" defer></script> -->
</head>

<body id="body">

  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/../data.php');
    require_once( dirname(__FILE__). '/review_data.php');
    require_once( dirname(__FILE__). '/member_data.php');
    // エラー配列を作る
    $errmessage = array();
    ?>





    <!-- 通常なら$_getで予約番号を取得 -->
    <!-- sqlでその番号の予約データを取るべき？ -->
    <!-- すべての承認待ちをインスタンス化 -->

    <?php $review_card =null;?>
    <?php foreach($approvalPendings as $approvalPending):?>
    <?php $pending_reviews[] = new ReviewManager($approvalPending);?>
    <?php endforeach ?>

    <!-- クリックされたのは誰のどのレビューか？特定 -->
    <!-- 何度もレビューしてないか？確認しなくていいの？ -->
    <?php foreach($pending_reviews as $pending_review) :?>
    <?php if($pending_review -> getReviewNumber() == $_GET['reviewNum']):?>
    <?php $review_card = $pending_review ?>
    <?php break ?>
    <?php endif?>
    <?php endforeach ?>

    <?php if($review_card == null):?>
    <?php $errmessage = "選択されたレビューが見つかりません"?>
    <?php else :?>

    <!-- 必要なのは -->
    <!-- 女子関連 -->
    <!-- カプセル化はちょっとまつ -->
    <!-- 指名する人のプロフィール -->

    <?php $employee_number = $review_card->getEmployeeNumber(); ?>

    <?php foreach($sample_names as $sample_name):?>
    <?php if($sample_name[0] == $employee_number):?>
    <?php $employee_girl_name = $sample_name[1]?>
    <?php $employee_girl_img = $sample_name[2]?>
    <?php break ?>
    <?php endif?>
    <?php endforeach?>

    <!-- 客関連 -->
    <!-- 指名した人の顧客ナンバーから画像特定 -->
    <!-- 会員でない -->
    <?php if($review_card->getUserNumber() == null):?>
    <?php $review_customer_img = 'img/user_face.png'?>
    <?php else :?>
    <!-- 会員 -->
    <!-- 本来ならSQLでとる -->

    <?php $user_card =null;?>
    <?php foreach($people_basics as $people_basic):?>
    <?php $allusers[] = new MemberHandler ($people_basic);?>
    <?php endforeach ?>

    <?php foreach($allusers as $alluser):?>
    <?php if($alluser->getMemberNumber() ==  $review_card->getUserNumber()): ?>
    <?php $user_card = $alluser ;?>
    <?php $review_customer_img =$user_card->getIconImage() ;?>
    <?php break; ?>
    <?php endif; ?>
    <?php endforeach ;?>
    <!-- 会員か？終了 -->
    <?php endif?>

    <!-- 名前は自由意志 -->
    <?php $review_customer_name = $review_card->getUserName();?>

    <!-- レビュー関連 -->
    <!-- タイトル -->
    <?php $review_title =$review_card->getNgwordCheck($review_card->getReviewTitle());?>
    <!-- 評価 -->
    <?php $review_rate01 =$review_card->getRate01();?>
    <?php $review_rate02 =$review_card->getRate02();?>
    <?php $review_rate03 =$review_card->getRate03();?>
    <?php $review_rate04 =$review_card->getRate04();?>
    <?php $review_rate05 =$review_card->getRate05();?>
    <?php $review_totalrate0 =$review_card->getAverageStar();?>
    <!-- 本文 -->
    <?php $review_body = $review_card->getNgwordCheck($review_card->getReviewBody());?>
    <!-- 訪問日 -->
    <?php $review_play_date =$review_card->getPlayDate();?>



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

 

      ?>
      <!------------------------------------
        html
      -------------------------------------->

      <!-- メールアドレスが入ってないか？ -->
      <?php if($review_card->checkWord()){
      $errmessage[] = "連絡先やURLなどが入ってます";
      }?>

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



      <div class="approval_review_wrap">

        <div class="review_image_area">
          <!-- レビューされた人 -->
          <section class="review_session">
            <h2>レビューされた人</h2>
            <figure class="request_img">
              <img src='../<?php echo $employee_girl_img?>' alt="">
            </figure>
            <figcaption class="request_img_caption">
              <?php echo $employee_girl_name; ?>への口コミ
            </figcaption>
          </section>
          <section class="review_session">
            <h2>レビューした人</h2>
            <figure class="request_img">
              <img src='../<?php echo $review_customer_img?>' alt="">
            </figure>
            <figcaption class="request_img_caption">
              <?php echo $review_customer_name;?>
            </figcaption>
          </section>
        </div>
        <div class="review_body_area">
          <section class="review_session">
            <h2>詳細データ</h2>
            <div class="review_data">
              <h3>訪問日：<?php echo $review_play_date ;?></h3>
            </div>
            <h2>評価</h2>
            <div class="review_data">
              <?php
          for ($i = 1; $i <= 5; $i++) {
            $variableName = "review_rate" . str_pad($i, 2, '0', STR_PAD_LEFT); // 変数名を生成
            if (isset($$variableName)) { // 変数が存在するか確認
              if($$variableName < 3){
              echo '<span class="rate_block alert_text">項目'.$i."：".$$variableName.'</span>'; // 変数の中身を出力                
              }else{
              echo '<span class="rate_block">項目'.$i."：".$$variableName.'</span>'; // 変数の中身を出力
              }
            } else {
              echo "変数 $variableName は存在しません。";
            }
          }
          ?>
            </div>
          </section>
          <section class="review_session">
            <h2>レビュータイトル</h2>
            <div class="review_body">
              <?php echo $review_title ?>
            </div>
          </section>
          <section class="review_session">
            <h2>レビュー本文</h2>
            <div class="review_body">
              <?php echo $review_body ?>
            </div>
          </section>
        </div>


        <form action="" class="reserve_button_wrap">
          <!-- キャンセル -->
          <a href="approval_review.php" class="reserve_back">キャンセル</a>
          <?php if($errmessage):?>
          <input type="submit" id="nextButton" name="gotong" class="reserve_ng" value="破棄">
          <?php else:?>
          <input type="submit" id="nextButton" name="confirm" class="reserve_done" value="確定">
          <?php endif?>
        </form>

      </div>
      <?php endif?>

      <!-- レビューが見つかってる場合終了 -->

      <br><br><br><br><br><br><br><br>
      <p>下が確認できないのでスペース</p>
      <br><br><br><br><br><br><br><br>

    </main>


  </div>
</body>

</html>