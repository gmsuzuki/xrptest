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
  <link rel="stylesheet" type="text/css" href="css/news.css" />
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



      <!-- 重要おしらせ -->


      <section id="attention" class="container under_space">

        <h2 class="head_ja">特別なお知らせ</h2>
        <h3 class="button_arrow">
          <a href="" class="btn_color_pink btn_font01">
            コロナウィルス感染予防対策について</a>
        </h3>


      </section>




      <!-- 最新ニュース -->
      <section id="whats_new" class="container under_space">
        <div class="content_wrapper">

          <h2 class="block_title"><span>News</span></h2>
          <h3 class="block_title_caption">最新情報</h3>
          <ul class="topics">

            <!-- foreach テストでやってみる -->

            <!-- 配列sqlで持ってきたやつ -->
            <?php
              $news = array(
              array('今日','なのか'),
              array('昨日','だよね'),
              array('一昨日','の可能性'),
              array('昔','だったかも')
              );
            ?>

            <!-- 配列の他所分繰り返す -->
            <?php foreach($news as $book) : ?>

            <!--　回数表示みたいなもの -->
            <?php echo "<h3>{$book[1]}</h3>" ?>
            <!-- イチ記事 -->
            <li class="topic scroll-up">
              <a href="" class="block_wrap_a">
                <div class="news_box">
                  <figure class="news_img_height">
                    <img src="img/200x40.png" alt="" width="128px">
                  </figure>
                  <div class="news_contents">
                    <p>2022/04/28</p>
                    <h2 class="news_title">
                      あいうえおかきくけこさしすせそたちつてと
                    </h2>
                    <p class="news_kinds">
                      割引情報
                    </p>
                    <p class="news_text">
                      あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほま<br>みむめもあいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめも
                    </p>

                  </div>
                </div>
              </a>
            </li>

            <?php endforeach ; ?>

            <!-- ------- -->

          </ul>


        </div>
      </section>



      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>


      <!---------------------------------------------------->


      <br>
      <br>





      <br>
      <br>




      <br>
      <br>
      <br>
      <br>
      <br>


      <br>
      <br>
      <br>
      <br>
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