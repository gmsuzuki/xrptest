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

  <!--css javascript-->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <script src="js/swiper.min.js" defer></script>
  <script src="js/script.js" defer></script>

  <!-- フォントオーサム -->
  <!-- 最後はダウンロードしてスピードを出す -->
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

</head>

<body id="body">


  <div id="wrapper">


    <!-- header読み込み -->
    <?php
    // require_once("h_banner.php");
    require_once("header2.php");

    ?>
    <!------------------>
    <main>

      <div class="font-test">
        <h1>フォントテスト</h1>
        あいうえおかきくけこさしすせそ
        abcdefghijklmnopqrstuvwxyz
        家でやりました
        ネットでやりました
      </div>
      <br>
      <a href="staff/staff00.php">staff</a>
      <br>
      <a href="newmember.php">登録</a>



      <br>

      <!-- Slider main container -->
      <!-- swiperはここ参照 -->
      <a href="https://garigaricode.com/swiper/" target="blank">ここわかりやすい</a>

      <h4>スワイパーテスト</h4>


      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <!-- foreach で数だけ取る -->
          <div class="swiper-slide">
            <a href="staff/staff00.php?name=test">
              <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
              <img src="img/200x40.png" alt="">
            </a>
            <span>test</span>
          </div>
          <div class="swiper-slide">Slide 2</div>
          <div class="swiper-slide">Slide 3</div>
        </div>

        <div class="swiper-button-next next1"></div>
        <div class="swiper-button-prev prev1"></div>
        <div class="swiper-pagination page1"></div>
      </div>
      <div>
        datefmt_set_calendar
      </div>

      <!---------------------------------------------------->


      <br>
      <br>



      <!-- Slider main container -->
      <h4>スワイパーテスト2
      </h4>
      <div class="swiper2 GlSwiper">
        <div class="swiper-wrapper">
          <!-- foreach で数だけ取る -->
          <div class="swiper-slide girl-slide">Slide 1</div>
          <div class="swiper-slide girl-slide">Slide 2</div>
          <div class="swiper-slide girl-slide">Slide 3</div>
          <div class="swiper-slide girl-slide">Slide 4</div>
          <div class="swiper-slide girl-slide">Slide 5</div>
        </div>

      </div>


      <br>
      <br>



      <!-- Slider main container -->
      <h4>スワイパーテスト3複数段</h4>
      <div class="swiper3 newsSwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide news-slide">slide 1</div>
          <div class="swiper-slide news-slide">Slide 2</div>
          <div class="swiper-slide news-slide">Slide 3</div>
          <div class="swiper-slide news-slide">slide 4</div>
          <div class="swiper-slide news-slide">slide 5</div>
          <div class="swiper-slide news-slide">slide 6</div>
          <div class="swiper-slide news-slide">slide 7</div>
          <div class="swiper-slide news-slide">slide 8</div>
          <div class="swiper-slide news-slide">slide 9</div>
        </div>

        <div class="swiper-button-next next2"></div>
        <div class="swiper-button-prev prev2"></div>
        <div class="swiper-pagination page2"></div>
      </div>


      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      dddd
      アップできるかな？
      新しいマックですよ
      <?php
      require_once("accordion.php");
      ?>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

    </main>


  </div>
</body>

</html>
