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
  <script src="js/script.js" defer></script>
  <script src="js/accordion.js" defer></script>


   <!-- フォントオーサム -->
  <!-- 最後はダウンロードしてスピードを出す -->
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

</head>

<body id="body">


<div id="wrapper" class="shop_fv">


<main>

<section id="shop_top" class="block_index">
  <div id="shop_heading" class="parts_index">
    <h1>お店の名前</h1>
    <h2>お店の説明</h2>
    <div class="logo_area parts_index">
      <img src="img/icon_girl.svg" alt="shop_logo">
    </div>
  </div>
  <div id="rating" class="parts_index">
        <ul>
          <li>
            注意事項が入ります

          </li>
          <li>
            <a href="top.php" class="enter_top">
              Enter
            </a>
          </li>
          <li>
            みたくないひとは
            <a href="https://www.google.com/?hl=ja">
              こちら
            </a>
            から退場
          </li>
        </ul>
  </div>

  <div id="other_service" class="parts_index">
  <ul>
    <li>
      <a href="">
        <img src="img/btn_yes.png" alt="">
      </a>
    </li>
    <li>
      <a href="">
        <img src="img/btn_no.png" alt="">
      </a>
    </li>
  </ul>

  </div>


</section>


<section id="shop_information" class="block_index">

 <div id="shop_recruit" class="parts_index" >

 <!-- foreach -->
  <div class="card">
    <a href="">
      <div class="card_imgframe">
        <img src="img/nat2.jpg" alt="">
      </div>
    </a>
  </div>

 <!-- foreach -->
  <div class="card">
    <a href="">
      <div class="card_imgframe">
        <img src="img/200x40.png" alt="">
      </div>
    </a>
  </div>


 </div>
</section>



  <article id="top_description" class="block_index"> 
    <section id="shop_concept">
        <h2>お店のconcept</h2>

      <div class="parts_index" >
        <h3>
        「厳選した人材を採用」
        </h3>
        <p class="text_concept">
          中身が入ります。中身が入ります。中身が入ります。
          中身が入ります。中身が入ります。中身が入ります。
        </p>
        <h3>
        「厳選した人材を採用」
        </h3>
        <p class="text_concept">
          中身が入ります。中身が入ります。中身が入ります。
          中身が入ります。中身が入ります。中身が入ります。
        </p>
        <h3>
        「厳選した人材を採用」
        </h3>
        <p class="text_concept">
          中身が入ります。中身が入ります。中身が入ります。
          中身が入ります。中身が入ります。中身が入ります。
        </p>
      </div>
    </section>

    <section id="group_concept">
    <h2>groupについて</h2>
        <p class="text_concept">
          中身が入ります。中身が入ります。中身が入ります。
          中身が入ります。中身が入ります。中身が入ります。
        </p>

    </section>



    </article>

    

      
      <?php
      require_once("accordion.php");
      ?>


    </main>


  </div>
</body>

</html>
