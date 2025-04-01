<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--サイトの説明 -->
  <title>testページ</title>
  <meta name="description" content="就職用ホームページです" />

  <!--ogp設定-->
  <meta property="og:url" content="ページのURL" />
  <meta property="og:title" content="ページのタイトル" />
  <meta property="og:type" content="ページのタイプ">
  <meta property="og:description" content="記事の抜粋" />
  <meta property="og:image" content="画像のURL" />
  <meta name="twitter:card" content="カード種類" />
  <meta name="twitter:site" content="@Twitterユーザー名" />
  <meta property="og:site_name" content="サイト名" />
  <meta property="og:locale" content="ja_JP" />
  <meta property="fb:app_id" content="appIDを入力" />


  <!--リンク関連-->
  <link rel="canonical" href="正規化するURL" />
  <!--ファビコンアイコン-->
  <link rel="icon" href="/favicon.ico" id="favicon">
  <!--IE用アイコン-->
  <link rel="shortcut icon" href="画像URL（.ico）" type="image/x-icon" />
  <!--スマホアイコン-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--Windows用タイトル設定 winピン留め-->
  <meta name="msapplication-TileImage" content="画像のURL" />
  <meta name="msapplication-TileColor" content="カラーコード" />

  <!--css-->
  <!-- リセット -->
  <link rel="stylesheet" href="css/reset.css">
  <!-- ローディング -->
  <link rel="stylesheet" type="text/css" href="css/loading.css" />
  <!-- swiper css は先読み -->

  <!-- 共通 -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />
  <link rel="stylesheet" type="text/css" href="css/accordion.css" />
  <link rel="stylesheet" type="text/css" href="css/footer.css" />
  <!-- ページ毎 -->
  <link rel="stylesheet" type="text/css" href="css/review.css" />
  <link rel="stylesheet" type="text/css" href="css/girl_list.css" />
  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />

  <!--javascript-->
  <script src="js/script.js" defer></script>
  <script src="js/header.js" defer></script>
  <script src="js/accordion.js" defer></script>
  <script src="js/loading.js" defer></script>
  <script src="js/expansion.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- フォントオーサム -->
  <!-- 最後はダウンロードしてスピードを出す -->
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">


</head>

<body id="body">

  <!-- ローディング画面 -->
  <div id="loading-wrapper">
    <div class="loader"></div>
    <p>Loading...</p>
  </div>
  <!-- コンテンツ部分 -->

  <div id="wrapper">


    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/parts/header.php');
    require_once( dirname(__FILE__). '/data.php');
    ?>
    <!------------------>


    <?php
    
    // 女子スタッフ
    require_once( dirname(__FILE__). '/setting/class/girl_class.php');
    require_once( dirname(__FILE__). '/setting/data/girl_data.php');


    // スタッフprofile
    foreach($sample_names as $sample_name){
    $staffList[] = new girlProfilelManager($sample_name);
    }
    // スタッフの画像
    foreach($sample_pics as $sample_pic){
       $girlNumber = $sample_pic['girlNumber'];
    // girlImageManagerのインスタンスを作成
    $staffPicList[] = new girlImageManager($girlNumber, $sample_pic);
      }
    
    // ユーザー
    require_once( dirname(__FILE__). '/setting/data/member_data.php');
    require_once( dirname(__FILE__). '/setting/class/member_class.php');
    
    foreach($people_basics as $people_basic){
    $reviewers[] = new memberProfileManager($people_basic);
    }

    
    // 各種review
    require_once( dirname(__FILE__). '/setting/data/review_data.php');
    require_once( dirname(__FILE__). '/setting/class/review_class.php');
  
    foreach($approvalPendings as $approvalPending){
    $review_tips[] = new ReviewManager($approvalPending);
    }
    foreach($review_tips as $item){
    if ($item->getApproval())  {
        $reviews_arry[] = $item;
    }
    }


    ?>



    <?php

// errorを入れる変数
$error='';

// どこから来たのか？わからない場合
if (!isset($_GET['review']) || empty($_GET['review'])) {
    if (!isset($_GET['staff']) || empty($_GET['staff'])) {
        // 'review' も 'staff' も存在しない場合にリダイレクト
        header("Location: reviewlist.php"); // reviewlist.php に移動
        exit; // リダイレクト後にコードの実行を停止
    }
}
// それ以外の場合の処理
// レビュー記事を見る場合
if (isset($_GET['review']) && !empty($_GET['review'])) {
    $review_no = $_GET['review'];
    $this_review = null; // 初期化




// レビューを特定
    foreach($reviews_arry as $review) {
        if ($review->getReviewNumber() == $review_no) {
            $this_review = $review;
            $this_reviewr_girl = findGirlByAttendanceNo($this_review->getEmployeeNumber(), $staffList);
            $her_name = $this_reviewr_girl->getGirlName();
            $her_img = getGirlImageByNumber($staffPicList, $this_reviewr_girl->getGirlNumber());
            $review_staff_no = $review->getEmployeeNumber();
            break;
        }
    }
     foreach ($reviews_arry as $review) {
            if ($review->getEmployeeNumber() == $review_staff_no) {
                $her_reviews[] = $review;
                $reviewCount = count($her_reviews);
            }
        }

    if ($this_review !== null) { // $this_review が見つかった場合のみ処理
        foreach($reviewers as $reviewer) {
        $memberNumber = $reviewer->getMemberNumber();
        $userNumber = $this_review->getUserNumber();

        // デバッグ用
        if ($memberNumber === null) {
            $error = "エラー: reviewer の memberNumber が null です";
            break;
        }
        if ($userNumber === null) {
            $error = "エラー: this_review の userNumber が null です";
            break;
        }

      if ($memberNumber == $userNumber) {
            $this_revier = $reviewer;
            $found_reviewer = true;
            break;
            }
        }  if (!$found_reviewer) {
        $error = "エラー: 該当するレビュアーが見つかりません。 review_no ($review_no) に対応する userNumber ($userNumber) に一致する memberNumber がありません。<br>";
    }
    } else {
        $error ="エラー: 指定された review_no ($review_no) に該当するレビューが見つかりません。";
    }
}elseif (isset($_GET['staff']) && !empty($_GET['staff'])) {

    // 'staff' が存在し、非空の場合の処理
    $review_staff_no = $_GET['staff'];
    $staff_found = false; // スタッフが見つかったかのフラグ

    // 名前と画像
    foreach ($staffList as $staff) {
        if ($staff->getGirlNumber() == $review_staff_no) {
            $her_name = $staff->getGirlName();
            $her_img = getGirlImageByNumber($staffPicList, $staff->getGirlNumber());
            $staff_found = true;
            break;
        }
    }

    // スタッフが見つからなかった場合のエラー処理
    if (!$staff_found) {
        $error = "エラー: 指定されたスタッフが見つかりません。";
    } else {
        // レビュー取得処理
        $her_reviews = [];
        foreach ($reviews_arry as $review) {
            if ($review->getEmployeeNumber() == $review_staff_no) {
                $her_reviews[] = $review;
                $reviewCount = count($her_reviews);
            }
        }

      // 日付で降順に並び替え
      usort($her_reviews, function($a, $b) {
        $dateA = $a->getPlayDate();
        $dateB = $b->getPlayDate();
    
      // 日付を新しい順に並べる（降順）
       return strtotime($dateB) - strtotime($dateA);
});

    }

} else {
    $error = "エラー: スタッフ番号が指定されていません。";
}



    $reviews_class ='';


    ?>


    <!------------------>

    <main id="main">

      <article id="review" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Review</span></h1>
          <h3 class="block_title_caption">お客様の声</h3>

          <!-- errorの場合の処理 -->
          <?php if (!empty($error)): ?>
          <p style="color: red;"><?php echo $error; ?></p>
          <button onclick="location.href='http://xrptest.starfree.jp/top.php'">トップページへ戻る</button>
          <?php else: ?>

          <!-- 共通部分 -->
          <section class="review_head under_space">
            <h2 class="girl_content_head">
              <a href="girls.php">
                <figure class="reviewed_girl">
                  <img src='<?php echo $her_img?>' alt="">
                </figure>
              </a>
              <figcaption class="reviewed_girl_title"><?php echo $her_name?> </figcaption>
            </h2>

            <div class="reviewed_girl_data">


              <?php 
              
              $average_star =[];
              foreach($reviews_arry as $reviw_arry){
               if ($reviw_arry->getEmployeeNumber() == $review_staff_no) {
              $average_star[] = $reviw_arry;
              }
              }
              
            $averages = calculateAveragesFromObjects($average_star);
            ?>

              <p class="total_evaluation"><span class="stars"
                  style='--rating: <?php echo $averages["overallAverage"]?>;'>
                </span>
                平均<?php echo $averages["overallAverage"]?>
                <span class="comment_count"><i class="fas fa-comment"></i><?php echo $reviewCount?></span>
              </p>

            </div>


            <!-- ここからレビュー関連 -->


            <?php if(isset($_GET['staff']) && !empty($_GET['staff'])) :?>

            <?php foreach($her_reviews as $review_list):?>
            <a href="review.php?review=<?php echo $review_list->getReviewNumber()?>">
              <?php $reviewer_plof = getMemberProfile($reviewers, $review_list->getUserNumber())?>
              <div class="review-card">
                <div class="user-info">
                  <img class='user-thumb' src='<?php echo $reviewer_plof['memberIcon']?>' alt="User">
                  <div style="margin-right:10px;">
                    <div class="user-name"> <?php echo $reviewer_plof['memberName']?></div>
                    <p class="total_evaluation"><span class="stars"
                        style='--rating: <?php echo $review_list->calculateAverageRate()?>;'>
                      </span>
                    </p>
                  </div>
                  <div>
                    <div style="font-weight: bold;"><?php echo $review_list->getReviewTitle()?></div>
                    <div class="review-meta">来店日: <?php echo $review_list->getPlayDate()?></div>
                  </div>
                </div>
              </div>

            </a>

            <?php endforeach?>





            <?php else:?>
            <!-- 個別　どうやってひょうじするか？ -->
            <div class="review-card">
              <div class="user-info">
                <img class='user-thumb' src='<?php echo $this_revier->getMemberIcon()?>' alt="User">
                <div>
                  <div class="user-name"> <?php echo $this_revier->getMemberName()?></div>
                  <div class="review-meta">来店日: <?php echo $this_review->getPlayDate()?></div>
                </div>
              </div>

              <div class="review-content">
                <div class="rating-box">
                  <div class="review-meta">コース: <?php echo $this_review->getPlayTime()?>分コース</div>
                  <div>項目１:
                    <span class="stars" style='--rating: <?php echo $this_review->getRate01()?>;'></span>
                  </div>
                  <div>項目２:
                    <span class="stars" style='--rating: <?php echo $this_review->getRate02()?>;'></span>
                  </div>
                  <div>項目３:
                    <span class="stars" style='--rating: <?php echo $this_review->getRate03()?>;'></span>
                  </div>
                  <div>項目４:
                    <span class="stars" style='--rating: <?php echo $this_review->getRate04()?>;'></span>
                  </div>
                  <div>項目５:
                    <span class="stars" style='--rating: <?php echo $this_review->getRate05()?>;'></span>
                  </div>
                </div>
                <div class="chart-box">
                  <canvas id="ratingChart"></canvas>
                </div>
              </div>

              <div class="review-title"><?php echo $this_review ->getReviewTitle()?></div>
              <div class="review-comment"><?php echo $this_review ->getReviewBody()?></div>

              <p class="review-publication-date">掲載日：</p>
            </div>


            <section>
              <p class="please-leave-review"><strong>あなたも口コミを投稿してみませんか？</strong></p>
              <p class="button_arrow review_button">
                <a href="reviewform.php?reviewed=<?php echo $this_review->getEmployeeNumber()?>"
                  class="btn_color_pink btn_font01">
                  <?php echo $this_reviewr_girl->getGirlName()?>さんの口コミを書く
                </a>
              </p>
            </section>

          </section>
          <?php endif; ?>

          <?php endif; ?>
        </div><!-- content_wrapper -->


      </article>


      <?php
        require_once( dirname(__FILE__). '/parts/accordion.php');
      ?>



    </main>

    <?php
      require_once( dirname(__FILE__). '/parts/footer.php');
    ?>

  </div><!-- wrapper -->



  <script>
  const ctx = document.getElementById('ratingChart').getContext('2d');
  new Chart(ctx, {
    type: 'radar',
    data: {
      labels: ['項目１', '項目２', '項目３', '項目４', '項目５'],
      datasets: [{
        data: [
          <?php echo $this_review ->getRate01()?>,
          <?php echo $this_review ->getRate02()?>,
          <?php echo $this_review ->getRate03()?>,
          <?php echo $this_review ->getRate04()?>,
          <?php echo $this_review ->getRate05()?>
        ],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        r: {
          min: 0,
          max: 5,
          ticks: {
            stepSize: 1,
            display: false // メモリの数字を非表示
          }
        }
      }
    }
  });
  </script>



</body>

</html>