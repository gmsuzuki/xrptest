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
  <link rel="stylesheet" type="text/css" href="css/header.css" />
  <link rel="stylesheet" type="text/css" href="css/accordion.css" />
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />

   <script src="js/swiper.min.js" defer></script>
  <script src="js/swiper_conf.js" defer></script>
  <script src="js/script.js" defer></script>
  <script src="js/header.js" defer></script>
  <script src="js/loading.js" defer></script>

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
    require_once("header.php");
    ?>
    <!------------------>


    <main>


<!-- スワイパー① -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <!-- foreach で数だけ取る -->
          <div class="swiper-slide">
            <a href="staff/staff00.php?name=test" class="swipe_a">
              <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
              <img src="img/sw01.jpeg" alt="">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="staff/staff00.php?name=test" class="swipe_a">
              <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
              <img src="img/sw02.jpeg" alt="">
            </a>  
          </div>
          <div class="swiper-slide">
            <a href="staff/staff00.php?name=test" class="swipe_a">
              <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
              <img src="img/sw03.jpeg" alt="">
            </a>  
          </div>
        </div>

        <!-- <div class="swiper-button-next next1"></div> -->
        <!-- <div class="swiper-button-prev prev1"></div> -->
        <div class="swiper-pagination page1"></div>
      </div>

<!-- スワイパー① -->
    
<!-- 注意点 -->


<section id="attention" class="container under_space">

  <h2 class="head_ja">特別なお知らせ</h2>
  <h3 class="button_arrow">
    <a href="" class="btn_color_red btn_font01">
     コロナウィルス感染予防対策について</a>
  </h3>

  </section>

<!-- 即 -->

<section class="container under_space">
<div class="content_wrapper">
<!-- タウンの仕様がよくわからないのでサイズ指定は後回し -->
<h2 class="block_title">Right away</h2>

<iframe class="dto-sw2" id="dto-sw2-218" src="https://www.dto.jp/shop/6471/standby-widget-v2?mr=5&amp;l=10&amp;fc=000000&amp;if=dto-sw2-17569" width="100%" frameborder="0" scrolling="no" style="width: 414px; height: 290px;"></iframe>
  <script type="text/javascript">
(function(){
var _d = document.createElement('script');
_d.src = 'https://www.dto.jp/js/dto.standby-widget-v2-52.js';
_d.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(_d);
})();
</script>

</div>
</section>

<!-- おわり即 -->

<section class="container under_space">

<!-- 最新ニュース -->

<div class="content_wrapper">

  <h2 class="block_title">What's New</h2>

  <!-- イチ記事 -->
    <article class="topic">
      <a href="" class="top">

      </a>

</article>


<a href="">
  <div class="news_box">
    <div class="news_img">
      <img src="img/88x31.png" alt="">
    </div>
    <div class="news_contents">
      あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほ
    </div>

  </div>
</a>

</div>
</section>



<!-- 注意点 -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   <a href="girls.php"><h1>上から出る場合。</h1></a>




      <div class="font-test">
        <h1>フォントテスト</h1>
        あいうえおかきくけこさしすせそ
        tati
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
