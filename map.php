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
  <link rel="stylesheet" type="text/css" href="css/map.css" />
  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />

  <!--javascript-->
  <script src="js/script.js" defer></script>
  <script src="js/header.js" defer></script>
  <script src="js/accordion.js" defer></script>
  <script src="js/loading.js" defer></script>
  <script src="js/fadein.js" defer></script>

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

      <article id="hotel_map" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Hotel Map</span></h1>
          <h3 class="block_title_caption">出張エリア内のホテルマップ</h3>

          <ul class="area_lists">
            <li class="hotel_area">
              <a href="https://www.google.com/maps/d/embed?mid=1JWZXXQd4QNSoqlmTiDk_0B8oqrbvF8NQ" target="map"
                class="btn_color_pink btn_font01 btn_active">
                松戸</a>
            </li>
            <li class="hotel_area">
              <a href=" https://www.google.com/maps/d/embed?mid=1EoKGNrr6DPs0qepj8L0-p57LjEJO-GcH" target="map"
                class="btn_color_pink btn_font01 btn_active">
                新松戸</a>
            </li>
            <li class="hotel_area">
              <a href="https://www.google.com/maps/d/embed?mid=1UgWbBDAP4gfRZumiAaZz8Z-T4h3MiniX" target="map"
                class="btn_color_pink btn_font01 btn_active">
                馬橋</a>
            </li>
            <li class="hotel_area">
              <a href="https://www.google.com/maps/d/embed?mid=1HhoEih1_YYKIpp-Eqzxat8KNB3yW2i8q" target="map"
                class="btn_color_pink btn_font01 btn_active">
                北松戸</a>
            </li>
            <li class="hotel_area">
              <a href="https://www.google.com/maps/d/embed?mid=1Zl9G9387hF3XN-DcsEBJchMTqfhulZDf" target="map"
                class="btn_color_pink btn_font01 btn_active">
                柏</a>
            </li>
            <li class="hotel_area">
              <a href="https://www.google.com/maps/d/embed?mid=1212JJviYmk1qlclqAP_Airc7Nu_rspsW" target="map"
                class="btn_color_pink btn_font01 btn_active">
                南柏</a>
            </li>
            <li class="hotel_area">
              <a href="https://www.google.com/maps/d/embed?mid=1AApytABKq4lxDXeYlmH8KZqDn1E1domg" target="map"
                class="btn_color_pink btn_font01 btn_active">
                北柏</a>
            </li>
            <li class="hotel_area">
              <a href="https://www.google.com/maps/d/embed?mid=1wviEBagFedVZpJf3ItfRr_xnIKIucTmr" target="map"
                class="btn_color_pink btn_font01 btn_active">
                八柱</a>
            </li>
            <li class="hotel_area">
              <a href="https://www.google.com/maps/d/embed?mid=1KmcatTOsv9e1WKWLfvnMp0MCFFbFaNhs" target="map"
                class="btn_color_pink btn_font01 btn_active">
                三郷</a>
            </li>

          </ul>


          <iframe src="https://www.google.com/maps/d/embed?mid=1JWZXXQd4QNSoqlmTiDk_0B8oqrbvF8NQ"
            class="google_map_monitor" name="map"></iframe>


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