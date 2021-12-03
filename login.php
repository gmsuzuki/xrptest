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
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

</head>

<body id="body">


  <div id="wrapper">


    <!-- header読み込み -->
    <?php
    require_once("header.php");
    ?>
    <!------------------>

    <main>

      <br>
      <br>
      <h1>ログイン</h1>
      <form action="">
        <h2>userid</h2>
        <input type="text">
        <h2>password</h2>
        <input type="password">
        <input type="submit">
      </form>

      <br>
      <br>
      <a href="setting/setting_index.php">セッティングへ</a>
      <br>
      <br>
      <a href="setting/setting_index.php">個人ページへ</a>
      <br>
      <br>


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