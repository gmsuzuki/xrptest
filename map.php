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
    require_once( dirname(__FILE__). '/data.php');
    ?>
    <!------------------>

    <main id="main">

      <article id="hotel_map" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Hotel Map</span></h1>
          <h3 class="block_title_caption">出張エリア内のホテルマップ</h3>

          <ul class="area_lists">

            <?php $num=1 ?>
            <?php foreach($hotels as $key => $hotel) :?>
            <li class="hotel_area">
              <?php if($num == 1):?>
              <input type="radio" id='<?php echo $key ?>' value='<?php echo $hotel[1] ?>' name="select_hotel"
                onclick="window.open(href=this.value,'map'); this.checked=true" checked>
              <?php else: ?>
              <input type="radio" id='<?php echo $key ?>' value='<?php echo $hotel[1] ?>' name="select_hotel"
                onclick="window.open(href=this.value,'map'); this.checked=true">
              <?php endif ?>
              <label for='<?php echo $key ?>'><?php echo $hotel[0] ?></label>
            </li>
            <?php $num = $num+1 ?>
            <?php endforeach ?>
            <?php for( $i=0; $i<(4-count($hotels)%4) ; $i++ ) :?>
            <li></li>
            <?php endfor ?>

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