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
    ?>
    <!------------------>

    <main id="main">

      <article id="review" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Review</span></h1>
          <h3 class="block_title_caption">口コミ</h3>
        </div><!-- content_wrapper -->

        <section id="new_reviews">
          <h2 class="girl_tag_title new_review_title">#new reviews</h2>

          <div class="newreview_wrap">
            <!-- foreachで回す -->
            <!-- サンプルとして名前に各データ入れてみる -->
            <div class="swiper10 newreviewSwiper">
              <ul class="swiper-wrapper">
                <!-- 一枚目 -->
                <?php foreach($sample_names as $sample_name) :?>
                <!-- クチコミ1 -->
                <li class="swiper-slide new_review_card">
                  <a href="review.php?review=<?php echo $sample_name[0]?>"
                    class="new_staff_review_content block_wrap_a">
                    <figure class="new_staff_review_photo">
                      <img src='<?php echo $sample_name[1]?>' alt="">
                    </figure>

                    <div class="new_review_date">
                      <div class="assessment">
                        <p class="stars" style="--rating: 3.3;">3.3</p>
                      </div>
                      <figcaption class="girl_name">
                        <?php echo $sample_name[0] ?>
                      </figcaption>
                      <p class="review_comment">
                        あいうえおかきくえこさしすせそたちつ<br>
                        あいうえおかきくえこさしすせそたちつ<br>
                        あいうえおかきくえこさしすせそたちつ<br>
                        あいうえおかきくえこさしすせそたちつ<br>
                        あいうえおかきくえこさしすせそたちつ
                      </p>
                      <div class="new_reviewer_data">
                        <p>０月０日訪問</p>
                        <span>投稿者名</span>
                        <span>○月○日更新</span>
                      </div>
                      <p class=" detail_under_right">
                        <i class="fas fa-chevron-circle-right"></i><span>詳しく</span>
                      </p>
                    </div>
                  </a>
                </li>
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </section>

        <!-- 全員のレビュー -->
        <section id="all_reviews">
          <h2 class="girl_tag_title all_review_title">#all reviews</h2>

          <ul class="review_page_wrap">
            <!-- 一枚目 -->
            <?php foreach($sample_names as $sample_name) :?>
            <!-- クチコミ1 -->
            <li class="staff_review_list">
              <p class="review_num"><span>1</span></p>
              <a href="review.php?review=<?php echo $sample_name[0]?>" class="staff_review_content block_wrap_a">
                <figure class="staff_review_photo">
                  <img src='<?php echo $sample_name[1]?>' alt="">
                </figure>
                <div class="review_date">
                  <p class="update_review"><span>00月00日</span>更新</p>
                  <figcaption class="girl_name">
                    <?php echo $sample_name[0] ?>
                  </figcaption>
                </div>
              </a>
            </li>
            <?php endforeach ?>
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