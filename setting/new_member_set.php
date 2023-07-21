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
  <link rel="stylesheet" type="text/css" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />

  <!-- <script src="../js/script.js" defer></script> -->
  <!--javascript-->
  <script src="../js/set_basic.js" defer></script>
  <script src="../js/error_set.js" defer></script>
  <script src="../js/set_form_input_check.js" defer></script>
  <script src="../js/newstaff_set.js" defer></script>


  <!-- フォントオーサム -->
  <!-- 最後はダウンロードしてスピードを出す -->
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
     require_once( dirname(__FILE__). '/../data.php');
    ?>



    <main id="main">


      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <!-- イベントコピペ -->
          <form id="multiphase" name="mypage_set_form" onsubmit="return false" class="new_girl_form">


            <div id="phase1" class="bace_wrap">


              <h2 class="step_q">アカウントを作成</h2>



              <ul class="radio_select_ul">
                <li class="girl_tag_radio_list">
                  <input type="radio" checked id="cast_check" name="staff_cast" value='1' class="radio_label_01">
                  <label class="girl_tag_label_txt" for="cast_check">キャスト</label>
                </li>
                <li class="girl_tag_radio_list">
                  <input type="radio" id="staff_check" name="staff_cast" value='2' class="radio_label_02">
                  <label class="girl_tag_label_txt" for="staff_check">スタッフ</label>
                </li>
              </ul>

              <ul class="new_staff_set_ul">

                <li class="step_wrap">
                  <span class="step_a">ログインID</span>
                  <em class="mini_alert" style="color:red;">エラー</em>
                  <input type="text" required id="staff_new_login_id" name="staff_new_login_id" maxlength="20"
                    onblur="CheckGuestInfo(this)" pattern="^([a-zA-Z0-9]{6,})$" placeholder="半角英数字６文字以上２０文字以内"
                    class="mypage_input cancel_alert">
                </li>
                <li class="step_wrap">
                  <span class="step_a">パスワード</span>
                  <em class="mini_alert">エラー</em>
                  <input type="text" required id="staff_new_login_pass" name="staff_new_login_pass" maxlength="20"
                    onblur="CheckGuestInfo(this)" pattern="^([a-zA-Z0-9]{8,})$" placeholder="半角英数字８文字以上２０文字以内"
                    class="mypage_input cancel_alert">
                </li>

                <li class="step_wrap">
                  <span class="step_a">確認用パスワード</span>
                  <em class="mini_alert">一致しません</em>
                  <input type="text" required id="" name="staff_new_login_pass" maxlength="20"
                    onblur="SameCheckPass(this)" pattern="^([a-zA-Z0-9]{8,})$" placeholder="半角英数字８文字以上２０文字以内"
                    class="mypage_input cancel_alert">
                </li>


              </ul>

              <div class="step_button_wrap">
                <button onclick="location.href='setting_index02.php'">キャンセル</button>
                <button onclick="processPhase1()" class="step_next">次へ</button>
              </div>

            </div>



            <div id="phase2" class="bace_wrap">


              <h2 class="step_q">これで申請しますか？</h2>

              <ul class="new_staff_set_ul">
                <li class="step_wrap">
                  <h3 class="step_a">登録タイプ</h3>
                  <span id="user_type" class=""></span>
                </li>
                <li class="step_wrap">
                  <h3 class="step_a">ログインID</h3>
                  <span id="user_id"></span>
                </li>
                <li class="step_wrap">
                  <h3 class="step_a">パスワード</h3>
                  <span id="user_pass"></span>
                </li>
              </ul>


              <div class="step_button_wrap">
                <button onclick="buck_2step()" class="step_back">戻る</button>
                <button onclick="processPhase1()" class="step_next">次へ</button>
              </div>



          </form>




          <!-- イベントここまで -->




        </div><!-- content_wrapper -->


      </article>



    </main>

  </div><!-- wrapper -->



</body>

</html>