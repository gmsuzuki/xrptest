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
    require_once( dirname(__FILE__). '/data.php');
    ?>
    <!------------------>


    <main id="main">



      <!-- 最新ニュース -->
      <section id="whats_new" class="container under_space">
        <div class="content_wrapper">

          <h2 class="block_title"><span>News</span></h2>
          <h3 class="block_title_caption">最新情報</h3>
          <ul class="topics">

            <?php

            define('MAX','5'); // 1ページの記事の表示数


            $news_num = count($news_list ); // トータルデータ件数

            $max_page = ceil($news_num / MAX); // トータルページ数※ceilは小数点を切り捨てる関数

            if(!isset($_GET['page_id'])){ // $_GET['page_id'] はURLに渡された現在のページ数
            $now = 1; // 設定されてない場合は1ページ目にする
            }else{
            $now = $_GET['page_id'];

            }

            $start_no = ($now - 1) * MAX; // 配列の何番目から取得すればよいか

            // array_sliceは、配列の何番目($start_no)から何番目(MAX)まで切り取る関数
            $disp_data = array_slice($news_list, $start_no, MAX, true);
            ?>
            <!-- 記事一覧表示 -->
            <?php foreach($disp_data as $news) :?>
            <li class="topic">
              <div class="news_data">
                <time><?php echo $news[0]?></time>
                <span class="news_kinds"><?php echo $news[1]?></span>
              </div>
              <div class="news_top_title">
                <a href="" class="block_wrap_a">
                  <?php echo $news[2] ?>
                </a>
              </div>
            </li>
            <?php endforeach ?>
            <!-- イチ記事 -->

          </ul>

          <nav class="nav_links">
            <?php for($i = 1; $i <= $max_page; $i++):?>
            <!-- // 最大ページ数分リンクを作成 -->
            <?php if ($i==$now):?>
            <!-- // 現在表示中のページ数の場合はリンクを貼らない -->
            <span class="page-numbers current"><?php echo $now ?></span>
            <?php else :?>
            <?php echo "<a href='./newslist.php?page_id={$i}' class='page-numbers'>{$i}</a>" ?>
            <?php endif?>
            <?php endfor?>

          </nav>



        </div>
      </section>



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