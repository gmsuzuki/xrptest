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
    require_once( dirname(__FILE__). '/data.php');
    ?>
    <!------------------>



    <main id="main">


      <article id="newface" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>New Face</span></h1>
          <h3 class="block_title_caption">新人紹介</h3>


          <div class="staff_bg">
            <ul class="staff_wrap">
              <!-- foreachで回す -->
              <!-- サンプルとして名前に各データ入れてみる -->
              <?php foreach($sample_names as $sample_name) :?>

              <li class="staff_card scroll-expansion">


                <!-- アイコン -->
                <!-- 今すぐとか -->
                <p class="staff_state_mark fukidashi_green">即ご案内</p>
                <!-- 新人 -->
                <div class="staff_card_wrap">
                  <span class="tag new_cast">新人</span>
                  <!-- アイコン -->


                  <a href="girls.php" class="staff_card_link block_wrap_a">


                    <a href="girls.php" class="staff_card_link block_wrap_a">
                      <!-- 写真 -->
                      <div class="staff_photo_area">
                        <figure class="staff_photo">
                          <img src='<?php echo $sample_name[3] ?>' alt="">
                        </figure>
                      </div>
                      <!-- 時間 -->
                      <p class="time_area"><i class="fas fa-clock"></i>
                        12:00~22:00</p>
                      <!-- 属性 -->
                      <div class="girl_types">
                        <span class="girl_type btn_color_blue">新人</span>
                        <span class="girl_type btn_color_pink">体験入店</span>
                        <span class="girl_type btn_color_red">人気No1</span>
                        <span class="girl_type btn_color_pink">やさしい</span>
                      </div>

                      <!-- profile -->

                      <span class="staff_name_age"><?php echo $sample_name[1]?></span>
                      <span class="staff_name_age">(<?php echo $sample_name[4]?>)</span>
                      <span class="bodysize">
                        <?php echo 'T/'.$sample_name[5].'&nbsp;B/'.$sample_name[6].'('.$sample_name[7].')&nbsp;H/'.$sample_name[8]?>
                      </span>

                    </a>
                </div>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
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