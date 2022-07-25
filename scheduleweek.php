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
  <script src="js/fadein.js" defer></script>
  <script src="js/expansion.js" defer></script>
  <script src="js/button_color.js" defer></script>

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



    <!-- データ持ってきてる -->
    <?php
    $nums = ["１人目","２人め","3人め","4人め","5人め","6人め","7人め"];
    ?>

    <main id="main">


      <article id="scheduleweek" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Schedule</span></h1>
          <h3 class="block_title_caption">週間出勤情報</h3>




          <ul id="select_days">

            <?php for($i = 0; $i < 8; $i ++) : ?>

            <li class="select_btn schedule_btn">
              <?php if($i == 0) : ?>

              <a href="scheduleweek.php">
                <!-- 曜日で背景色を変える -->
                <!-- 日曜日なら -->
                <?php if($today->format("w") == 0) :?>
                <span class="sun">
                  <!-- 土曜日なら -->
                  <?php elseif($today->format("w") == 6) :?>
                  <span class="sat">
                    <?php else :?>
                    <!-- 平日なら -->
                    <span class="weekday">
                      <?php endif ?>
                      <!-- ーーーー背景色ここまで-------- -->
                      <?php echo "{$today->format('m/d')}" ?>
                      <?php echo $week_name[$today->format("w")];?>
                    </span>
              </a>
              <?php else :?>
              <a href=" scheduleweek.php?day=<?php echo $i ?>">
                <!-- 曜日で背景色を変える -->
                <!-- 日曜日なら -->
                <?php $today->modify("+1 day") ;?>
                <?php if($today->format("w") == 0) :?>
                <span class="sun">
                  <!-- 土曜日なら -->
                  <?php elseif($today->format("w") == 6) :?>
                  <span class="sat">
                    <?php else :?>
                    <!-- 平日なら -->
                    <span class="weekday">
                      <?php endif ?>
                      <!-- ーーーー背景色ここまで-------- -->


                      <?php echo "{$today->format('m/d')}" ;?>
                      <?php echo $week_name[$today->format("w")] ;?>
                    </span>
              </a>
              <?php endif ?>
            </li>

            <?php endfor ?>

          </ul>

          <div class="staff_bg">
            <ul class="today_staff_wrap">

              <!-- foreachで回す -->
              <!-- サンプルとして名前に各データ入れてみる -->
              <?php foreach($nums as $num) :?>

              <!-- 1人目 -->
              <li class="staff_card scroll-expansion">
                <a href="girls.php" class="today_staff_card block_wrap_a">
                  <!-- 写真 -->
                  <div class="staff_photo_area">
                    <div class="staff_photo">
                      <img src="img/newface01.jpeg" alt="">
                    </div>

                    <!-- アイコン -->
                    <!-- 今すぐとか -->
                    <div class="staff_state_mark">
                      <p>即ご案内</p>
                    </div>
                    <!-- 日記とか動画とか -->
                    <ul class="staff_original_contents">
                      <li class="panel_icon_samall panel_movie_icon">Movie</li>
                      <li class="panel_icon_samall panel_diary_icon">Diary</li>
                      <li class="panel_icon_samall panel_twitter_icon">Twitter</li>
                    </ul>
                  </div>
                  <!-- profile -->
                  <div class="staff_profile_area">
                    <div class="name_age">
                      <p>
                        <span class="new_staff">新人</span>
                        <span class="staff_name">
                          <?php echo $num ?>
                        </span>
                        <span class="staff_age">(20)</span>
                      </p>
                    </div>
                    <div class="bodysize">
                      <p>T/155&nbsp;B/88(F)&nbsp;H/92</p>
                    </div>
                  </div>
                  <!-- 時間 -->
                  <div class="time_area">
                    <p>12:00~22:00</p>
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