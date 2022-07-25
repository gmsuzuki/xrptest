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

          class Rankings
          {
              private $name;
              private $age;
              private $body_size;
              private $girl_top_img;
              public function __construct(
                $name,
                $age,
                $body_size,
                $girl_top_img
                )
              {
                  $this->name = $name;
                  $this->age = $age;
                  $this->body_size = $body_size;
                  $this->girl_top_img = $girl_top_img;
              }
              public function getName()
              {
                  return $this->name;
              }
              public function getAge(){
                  return $this->age;
              }
              public function getBody_size()
              {
                  return $this->body_size;
              }
              public function getGirl_top_img()
              {
                  return $this->girl_top_img;
              }
            }
          // とりあえず5人ほど作っておく

          $ranking1 = new Rankings(
            "田中",
            20,
            "T/155&nbsp;B/88(F)&nbsp;H/92",
            "img/newface01.jpeg"
          );

          $ranking2 = new Rankings(
            "吉田",
            22,
            "T/155&nbsp;B/88(F)&nbsp;H/92",
            "img/newface02.jpeg"
          );

          $ranking3 = new Rankings(
            "赤井",
            24,
            "T/155&nbsp;B/88(F)&nbsp;H/92",
            "img/newface03.jpeg"
          );

          $ranking4 = new Rankings(
            "島田",
            30,
            "T/155&nbsp;B/88(F)&nbsp;H/92",
            "img/girl01.jpeg"
          );

          $ranking5 = new Rankings(
            "小松",
            40,
            "T/155&nbsp;B/88(F)&nbsp;H/92",
            "img/girl02.jpeg"
          );


          $rankings =[
            $ranking1,
            $ranking2,
            $ranking3,
            $ranking4,
            $ranking5
          ];
          
          ?>




      <article id="review" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Ranking</span></h1>
          <h3 class="block_title_caption">ランキング</h3>
          <section class="block_anime">
            <h2 class="ranking_head">7月の本指名ランキング</h2>
            <ul class="ranking_list">
              <?php $counter = 1 ?>
              <?php foreach($rankings as $rank) :?> <li>
                <a href="">
                  <img src="<?php echo $rank->getGirl_top_img() ?>" alt="">
                  <div class="ranking_girl_data">
                    <p><?php echo $rank->getName() ?><span>(<?php echo $rank->getAge()?>)</span></p>
                    <p><?php echo $rank->getBody_size()?></p>
                  </div>
                  <div class="rank_mark">
                    <p><?php echo $counter ?></p>
                  </div>
                </a>
              </li>
              <?php $counter ++ ?>
              <?php endforeach ?>

            </ul>
          </section>

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
</body>

</html>