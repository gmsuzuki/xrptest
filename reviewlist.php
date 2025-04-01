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
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/myswiper.css">
  <!-- 共通 -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />
  <link rel="stylesheet" type="text/css" href="css/accordion.css" />
  <link rel="stylesheet" type="text/css" href="css/footer.css" />
  <!-- ページ毎 -->
  <link rel="stylesheet" type="text/css" href="css/review.css" />
  <link rel="stylesheet" type="text/css" href="css/girl_list.css" />
  <link rel="stylesheet" type="text/css" href="css/girls_profile.css" />
  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />

  <!--javascript-->
  <script src="js/swiper.min.js" defer></script>
  <script src="js/swiper_conf.js" defer></script>
  <script src="js/script.js" defer></script>
  <script src="js/header.js" defer></script>
  <script src="js/accordion.js" defer></script>
  <script src="js/loading.js" defer></script>
  <script src="js/expansion.js" defer></script>

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


    // 女子スタッフ
    $staffList = []; // 配列を初期化
    require_once( dirname(__FILE__). '/setting/class/girl_class.php');
    require_once( dirname(__FILE__). '/setting/data/girl_data.php');


    // スタッフprofile
    foreach($sample_names as $sample_name){
     $staffList[] = new girlProfilelManager($sample_name);
     }
    // スタッフの画像
    $staffPicList = []; // 配列を初期化
    foreach($sample_pics as $sample_pic){
       $girlNumber = $sample_pic['girlNumber'];
    // girlImageManagerのインスタンスを作成
    $staffPicList[] = new girlImageManager($girlNumber, $sample_pic);
      }
    
    // review
    require_once( dirname(__FILE__). '/setting/data/review_data.php');
    require_once( dirname(__FILE__). '/setting/class/review_class.php');
   
   $review_tips = []; // 配列を初期化
    foreach($approvalPendings as $approvalPending){
    $review_tips[] = new ReviewManager($approvalPending);
    }
    $reviews_arry = []; // 配列を初期化
    foreach($review_tips as $item){
    if ($item->getApproval())  {
        $reviews_arry[] = $item;
    }
    }
    
      $today = new DateTime(); // 今日の日付
      $oneMonthAgo = (clone $today)->modify('-1 month'); // 1ヶ月前の日付

      // playDate が条件に一致するものをフィルタリング
      $filteredApprovalPendings = array_filter($approvalPendings, function ($item) use ($today, $oneMonthAgo) {
      $playDate = DateTime::createFromFormat('Y-m-d', $item['playDate']);
      return $playDate !== false && $playDate >= $oneMonthAgo && $playDate <= $today;
      });

      $new_review_data = []; // 配列を初期化

      foreach ($filteredApprovalPendings as $filteredApprovalPending) {
      $review = new ReviewManager($filteredApprovalPending);
      if ($review->getApproval()) { // getApproval() が true のものだけ追加
        $new_review_data[] = $review;
      }
      }


    ?>

    <main id="main">

      <article id="review" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Review</span></h1>
          <h3 class="block_title_caption">口コミ</h3>
        </div><!-- content_wrapper -->

        <section id="new_reviews">
          <h2 class="girl_tag_title new_review_title">#new reviews</h2>

          <div class="swiper10 newreviewSwiper">
            <ul class="swiper-wrapper">

              <?php foreach($new_review_data as $new_review) :?>


              <?php $profile_this =findGirlByAttendanceNo($new_review->getEmployeeNumber(), $staffList);?>

              <?php $image = getGirlImageByNumber($staffPicList, $new_review->getEmployeeNumber()); ?>

              <!-- クチコミ1 -->
              <li class="swiper-slide staff_review">

                <a href='review.php?review=<?php echo $new_review->getReviewNumber() ?>'
                  class="staff_review_content block_wrap_a">
                  <div class="staff_review_bg">
                    <!-- 画像 -->
                    <figure class="subtitles_img">
                      <img src='<?php echo $image ?>' alt="">
                      <!-- 名前 -->
                      <figcaption>
                        <?php echo $profile_this->getGirlName() ?>(<?php echo $profile_this->getGirlAge()?>)
                      </figcaption>
                    </figure>
                    <!-- タイトル -->
                    <div class="staff_review_title">
                      <p><?php echo $new_review->getReviewTitle() ?></p>
                    </div>
                    <!-- 評価星 -->
                    <div class="assessment">

                      <p class="total_evaluation"><span class="stars"
                          style='--rating: <?php echo $new_review->calculateAverageRate()?>;'>
                        </span>
                      </p>
                    </div>
                    <!-- 評価本文 -->
                    <p class="staff_review_text">
                      <?php echo $new_review->getReviewBody() ?>
                    </p>
                  </div>
                  <div class="reviewer_data">
                    <p class="date_use">掲載日:<?php echo $new_review->getPlayDate() ?></p>
                  </div>
                </a>
              </li>
              <?php endforeach ?>
            </ul>
          </div>


        </section>

        <!-- 全員のレビュー -->
        <section id="all_reviews">
          <h2 class="girl_tag_title all_review_title">#all reviews</h2>

          <ul class="review_page_wrap">

            <?php $staffSummaries = [];

            $staffSummaries = [];

            foreach ($staffList as $staff) {
            $count = 0;
            $latestDate = null;

            foreach ($reviews_arry as $review) {
            if ($staff->getGirlNumber() == $review->getEmployeeNumber()) {
            $count++;
            $playDate = DateTime::createFromFormat('Y-m-d', $review->getPlayDate());
            if ($playDate !== false && ($latestDate === null || $playDate > $latestDate)) {
            $latestDate = $playDate;
            }
            }
            }

            // 最新の日付をフォーマット
            $formattedDate = $latestDate ? $latestDate->format('Y-m-d') : null;

            // インスタンスを作成してリストに追加
            $staffSummaries[] = new StaffReviewSummary($staff, $count, $formattedDate);
            }

            // countの降順で並び替え
            usort($staffSummaries, function ($a, $b) {
            return $b->getCount() <=> $a->getCount();
              });

              ?>

            <!-- クチコミ1 -->
            <?php foreach($staffSummaries as $summary):?>
            <li class="staff_review_list">
              <p class="review_num"><span><?php echo $summary->getCount() ?></span></p>
              <a href="review.php?staff=<?php echo $summary->getStaff()->getGirlNumber() ?>"
                class="staff_review_content block_wrap_a">
                <figure class="staff_review_photo">
                  <img src='<?php echo getGirlImageByNumber($staffPicList, $summary->getStaff()->getGirlNumber()) ?>'
                    alt="">
                </figure>
                <div class="review_date">
                  <?php if ($summary->getLatestDate()): ?>
                  <p class="update_review"><span><?php echo $summary->getLatestDate(); ?></span></p>
                  <?php else: ?>
                  <p class="update_review">口コミ募集中</p>
                  <?php endif; ?>

                  <figcaption class="girl_name">
                    <?php echo$summary->getStaff()->getGirlName() ?>
                  </figcaption>
                </div>
              </a>

            </li>
            <?php endforeach?>
          </ul>


        </section>


      </article>


      <?php
        require_once( dirname(__FILE__). '/parts/accordion.php');
      ?>



    </main>

    <?php
      require_once( dirname(__FILE__). '/parts/footer.php');
    ?>




  </div><!-- wrapper -->
</body>

</html>