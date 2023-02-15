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
  <!-- リセット -->
  <link rel="stylesheet" href="../css/reset.css">

  <!-- swiper css は先読み -->
  <!-- 共通 -->
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <link rel="stylesheet" type="text/css" href="../css/header.css" />
  <link rel="stylesheet" type="text/css" href="../css/accordion.css" />
  <link rel="stylesheet" type="text/css" href="../css/footer.css" />
  <!-- ページ毎 -->

  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />


  <script src="../js/script.js" defer></script>

  <!-- フォントオーサム -->
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

</head>


<body id="body">

  <div id="wrapper">

    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/header.php');
    require_once('../db_connect.php');
    ?>
    <!------------------>

    <main>


      <br>
      <br>
      <br>
      <h1><a href="../setting/setting_index.php">セッティング</a></h1>
      <br>
      <br>

      <?php


      class Foo
      {
        public $userName;
        public $userPass;

        public function __construct($name, $pass)
        {
          $this->userName = $name;
          $this->userPass = $pass;
        }
      };


      try {
        $pdo = db_connect();

        // 接続を使用する
        $sth = $pdo->query('SELECT * from mst_staff');
        echo "<br>";
        foreach ($sth as $row) {
          echo $row['name'];
          echo '<br>';
        }
        echo "</pre>";

        // 接続を閉じる
        $sth = null;
        $dbh = null;
      } catch (PDOException $e) {
        exit('データベース接続失敗。' . $e->getMessage());
      }





      ?>




    </main>

    <script>
    const scrollAnimationElm = document.querySelectorAll('.sa');
    const scrollAnimationFunc = function() {
      for (const i = 0; i < scrollAnimationElm.length; i++) {
        var triggerMargin = 300;
        if (window.innerHeight > scrollAnimationElm[i].getBoundingClientRect().top + triggerMargin) {
          scrollAnimationElm[i].classList.add('show');
        }
      }
    }
    window.addEventListener('load', scrollAnimationFunc);
    window.addEventListener('scroll', scrollAnimationFunc);
    </script>



</body>

</html>