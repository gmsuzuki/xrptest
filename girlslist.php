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
  <link rel="stylesheet" type="text/css" href="css/girl_list.css" />
  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />

  <!--javascript-->
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
    ?>
    <!------------------>


    <main id="main">

      <!-- データ持ってきてる -->
      <?php
    $nums = ["１人目","２人め","3人め","4人め","5人め","6人め","7人め"];
    ?>



      <article id="girllist" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Girl List</span></h1>
          <h3 class="block_title_caption">在籍一覧</h3>

          <div class="staff_bg">
            <ul class="row_staff_wrap">
              <!-- foreachで回す -->
              <!-- サンプルとして名前に各データ入れてみる -->
              <?php foreach($nums as $num) :?>

              <li class="row_girl_card scroll-expansion">
                <a href="girls.php" class="today_staff_card block_wrap_a">
                  <div class="row_girl_photo_area">
                    <div class="staff_photo">
                      <img src="img/newface01.jpeg" alt="">
                    </div>
                  </div>
                  <div class="row_girl_data">
                    <div class="name_age">
                      <p>
                        <span class="staff_name">
                          適当な名前
                        </span>
                        <span class="staff_age">(20)</span>
                      </p>
                    </div>
                    <div class="bodysize">
                      <p>T/155&nbsp;B/88(F)&nbsp;H/92</p>
                    </div>
                    <ul class="row_girl_tag">
                      <li class="anime_text_bg_blue">大きい</li>
                      <li class="anime_text_bg_blue">小さい</li>
                      <li class="anime_text_bg_blue">うまい</li>
                    </ul>
                    <!-- 時間 -->
                    <div class="row_time_area">
                      <p>12:00~22:00</p>
                    </div>

                    <div class="row_girl_review">
                      <p><span class="anime_text_bg_pink">★口コミ★</span>100件</p>
                    </div>

                    <div class="row_shop_comment_text">
                      適当に書いていますかいています適当に。<br>
                      適当に書いていますかいています。<br>
                      適当に書いていますかいています。<br>
                      適当に書いていますかいています。<br>
                      適当に書いていますかいています。<br>

                    </div>
                  </div>

                </a>
              </li>


              <?php endforeach ?>


            </ul>



          </div>
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