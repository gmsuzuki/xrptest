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
  <link rel="stylesheet" type="text/css" href="css/event.css" />
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

    //イベント一覧
    require_once( dirname(__FILE__). '/setting/class/info_class.php');
    require_once( dirname(__FILE__). '/setting/data/info_data.php'); 
    
    $info_instances = []; // 空の配列を初期化
    foreach ($info_list as $info_item) {
    $info_instances[] = new InfoManager($info_item); // 新しいインスタンスを配列に追加
    }

    $event_instances=[];
    $event_instances = array_filter($info_instances, function($instance) {
    return $instance->getInfoType()== 1;
    });



    // is_visible が true のものだけを抽出
    $visible_instances = array_filter($event_instances, function($instance) {
    return $instance->getIsVisible();
    });


    // 最新順にソート
    usort($visible_instances, function($a, $b) {
    return strtotime($b->getInfoTime()) - strtotime($a->getInfoTime());
    });




    ?>
    <!------------------>

    <main id="main">





      <article id="event_list" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Event List</span></h1>
          <h3 class="block_title_caption">イベント一覧</h3>
          <ul class="event_list">
            <?php foreach($visible_instances as $event) :?> <li>
              <a href="information.php?infoid=<?php echo $event->getInfoId() ?>">
                <img src="<?php echo $event->getInfoImg() ?>" alt="">
                <div class="event_title">
                  <p><?php echo $event->getInfoTitle() ?></p>
                </div>
              </a>
            </li>
            <?php endforeach ?>

          </ul>

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