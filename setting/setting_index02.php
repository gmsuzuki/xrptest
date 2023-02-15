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
    ?>
    <!------------------>


    <main id="main">



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
                  <a href=""><span>予約状況</span></a>
                </li>
                <li class="basic_setting_link list_flex_box ">
                  <a href=""><span>イベント状況</span></a>
                </li>


              </ul>

            </div>
            <!-- お店の設定ここまで -->

            <!-- 承認設定 -->
            <div id="approval_setting_lists" class="tab_content">

              <ul class="approval_setting_list list_flex">
                <li class="approval_setting_link list_flex_box ">
                  <a href=""><span>出勤予定承認</span></a>
                </li>
                <li class="approval_setting_link list_flex_box ">
                  <a href=""><span>口コミ承認</span></a>
                </li>
                <li class="approval_setting_link list_flex_box ">
                  <a href=""><span>予約承認</span></a>
                </li>


              </ul>
            </div>
            <!-- scheduleここまで -->

            <!-- 登録関係 -->
            <div id="register_setting_lists" class="tab_content">

              <ul class="register_setting_list list_flex">
                <li class="register_setting_link list_flex_box ">
                  <a href="new_girl_set.php"><span>新人登録/削除</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href=""><span>イベント登録/削除</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href=""><span>スタッフ登録/削除</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href=""><span>ニュース登録/削除</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href=""><span>店登録/削除</span></a>
                </li>
                <li class="register_setting_link list_flex_box ">
                  <a href=""><span>店外観登録/削除</span></a>
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