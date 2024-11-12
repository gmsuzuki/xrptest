<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--サイトの説明 -->
  <title>設定ページ</title>
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
  <!--アイコン-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--IE用アイコン-->
  <link rel="shortcut icon" href="画像URL（.ico）" type="image/x-icon" />
  <!--スマホアイコン-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--Windows用タイトル設定 winピン留め-->
  <meta name="msapplication-TileImage" content="画像のURL" />
  <meta name="msapplication-TileColor" content="カラーコード" />

  <!--css javascript-->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />

  <!-- <script src="../js/script.js" defer></script> -->

  <!-- フォントオーサム -->
  <!-- 最後はダウンロードしてスピードを出す -->
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

</head>



<body id="body">


  <div id="wrapper">

    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    // require_once( dirname(__FILE__). '/../setting/class_input_reserve.php');

    session_start(); // セッションを開始
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clearSession'])) {

    // セッション変数をクリア
    $_SESSION = array();

    // セッションクッキーを削除
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params(); // セッションクッキーの設定
        setcookie(
            session_name(), // セッションIDのクッキー
            '', // クッキーの値を空に
            time() - 42000, // 有効期限を過去に設定
            $params["path"], 
            $params["domain"], 
            $params["secure"], 
            $params["httponly"]
        ); // クッキーを削除
    }

    // セッションを終了
    session_destroy();

    // リダイレクトを実行して、POSTをGETに変換
    header("Location: " . $_SERVER['REQUEST_URI']); // 現在のURLにリダイレクト
    exit(); // リダイレクト後にスクリプトを終了
}

$pvsession = 'セッションクリアしました';
?>





    <!------------------>


    <main id="main">

      <?php echo $pvsession?>


      <?php print $_SESSION['input_reserve_card']?>

      <article id="setting_index" class="under_space">
        <div class="content_wrapper">



          <!-- 選択肢をつける -->
          <div class="tabs">
            <!-- タブ設定 -->

            <input id="basic_setting" type="radio" name="tab_item" checked>
            <label class="tab_item basic_tab" for="basic_setting">基本更新</label>

            <input id="approval_setting" type="radio" name="tab_item">
            <label class="tab_item approval_tab" for="approval_setting">承認設定</label>

            <input id="register_setting" type="radio" name="tab_item">
            <label class="tab_item register_tab" for="register_setting">登録設定</label>

            <!-- お店の基本設定 -->
            <div id="basic_setting_lists" class="tab_content">
              <ul class="basic_setting_list list_flex">
                <li class="basic_setting_link list_flex_box ">
                  <a href=""><span>キャスト状況</span></a>
                </li>
                <li class="basic_setting_link list_flex_box ">
                  <a href=""><span>出勤状況</span></a>
                </li>
                <li class="basic_setting_link list_flex_box ">
                  <a href="test_set04.php"><span>予約状況</span></a>
                </li>
                <li class="basic_setting_link list_flex_box ">
                  <a href=""><span>イベント状況</span></a>
                </li>
                <li class="basic_setting_link list_flex_box ">
                  <a href="test_set01.php?setting=test01"><span>テスト1</span></a>
                </li>
                <li class="basic_setting_link list_flex_box ">
                  <a href="test_set02.php?setting=test02"><span>テスト2</span></a>
                </li>
              </ul>

              <form method="post">
                <input type="hidden" name="test" value=100>
                <input type="submit" name="clearSession" value="clearセッション">
              </form>


            </div>
            <!-- お店の設定ここまで -->

            <!-- 承認設定 -->
            <div id="approval_setting_lists" class="tab_content">

              <ul class="approval_setting_list list_flex">
                <li class="approval_setting_link list_flex_box ">
                  <a href="approval_schedule.php"><span>出勤承認</span></a>
                </li>
                <li class="approval_setting_link list_flex_box ">
                  <a href="input_attendance_01.php"><span>出勤入力</span></a>
                </li>
                <li class="approval_setting_link list_flex_box ">
                  <a href="reserve_schedule.php"><span>予約承認</span></a>
                </li>
                <li class="approval_setting_link list_flex_box ">
                  <a href="input_reserve_01.php"><span>予約入力</span></a>
                </li>

                <li class="approval_setting_link list_flex_box ">
                  <a href="approval_review.php"><span>口コミ承認</span></a>
                </li>
                <li class="approval_setting_link list_flex_box ">
                  <a href="https://web-tsuku.life/" target="_blank"><span>わかりやすいhtml.js</span></a>
                </li>
                <li class="basic_setting_link list_flex_box ">
                  <a href="phpinfo.php"><span>メール生成</span></a>
                </li>
                <li class="basic_setting_link list_flex_box ">
                  <a href="test_mail.php"><span>メール送信</span></a>
                </li>

              </ul>
            </div>
            <!-- scheduleここまで -->

            <!-- 登録関係 -->
            <div id="register_setting_lists" class="tab_content">

              <ul class="register_setting_list list_flex">
                <li class="register_setting_link list_flex_box ">
                  <a href="new_member_set.php?setting=staff"><span>アカウント作成</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href="new_event_set.php?setting=event"><span>イベント投稿</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href="new_girl_set.php?setting=cast"><span>新人登録</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href="new_news_set.php?setting=info"><span>おしらせ投稿</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href="new_news_set.php?setting=news"><span>店外観</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href="new_girl_info.php?setting=cast_info"><span>女の子紹介</span></a>
                </li>

              </ul>
            </div>
            <!-- イベントここまで -->


          </div>

        </div>
      </article>




    </main>
  </div>

</body>

</html>