<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Script-Type" content="text/javascript">
  <!--サイトの説明 -->
  <title>設定ページ</title>
  <meta name="description" content="就職用ホームページです" />


  <!--css javascript-->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <link rel="stylesheet" type="text/css" href="../css/event.css" />

  <script src="../js/error_set.js" defer></script>
  <script src="../js/text_check.js" defer></script>
  <script src="../js/text_count.js" defer></script>
  <script src="../js/setting.js" defer></script>
  <!-- <script src="../js/newevent_set.js" defer></script> -->

</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');
    // 画像のバリデーション読み込み
    require_once( dirname(__FILE__). '/../setting/image_validate.php');
    require_once( dirname(__FILE__). '/../setting/radio_validate.php');
    ?>


    <main>

      <!-- 変なところから来ていないか？確認 -->
      <div class="root">
        <?php if ($_GET['setting'] === "shop") {
        echo "正規のルートから来ました<br><br>";
      }
      ?>
      </div>



      <?php
      // キャンセルボタンが押された場合
      if (isset($_POST['cancel'])) {
        session_start(); // セッションを開始
        // localStorageの削除
        echo "<script>localStorage.clear();</script>";
        session_unset(); // セッションの変数をすべて削除
        session_destroy(); // セッションを破棄
        header("Location: setting_index02.php"); // top.htmlにリダイレクト
        exit; // スクリプトの実行を終了
      }
      ?>





      <!-- 入力をクリアするボタンを押したら -->
      <?php
      if ($_POST['clear']) {
        // localStorageの削除
        echo "<script>localStorage.clear();</script>";
        session_start();
        $_SESSION = array();
      }
      ?>
      <!-- クリア終わり -->


      <!-- ここから本格的にスタート -->
      <?php
      //定数読み込み、画像サイズとか
      require_once('const_set.php');
      // 文章バリデーション読み込み
      require_once('text_validate.php');
      // 画像のバリデーション読み込み
      require_once('image_validate.php');


      // セッションスタートしてる
      session_start();

      // 戻るボタンでエラーしないように
      header('Expires:-1');
      header('Cache-Control:');
      header('Pragma:');

      // 入力モードにする
      $mode = 'input';
      // エラー配列を作る
      $errmessage = array();


// submitの種類でifを書いてる
// もし送信・戻るの戻るを押したら
// なにもしない
// 画像をけすならセッションの中身消す
// 確認ボタンが押された
// クラスを作り
// 各種バリデーションチェック
// エラーがないならセッションに入れる
// モードを確認に変更する
// もし送信を押していたら
// サーバ関連
// セッションを消す
// 最初に入ってきた場合
// セッション変数を作る


      // 送信or戻るで戻るインプットに入ってもなにもしない/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
      if (isset($_POST['back']) && $_POST['back']) {

        // 画像関連/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
        // 画像を削除した場合
      } else if (isset($_POST['img_prv_delete']) && $_POST['img_prv_delete']) {

        $_SESSION['event_image']['data'] = '';
        $_SESSION['event_image']['type'] = '';
        $_SESSION['event_image']['width'] = '';
        $_SESSION['event_image']['height'] = '';


        // 確認（confirm）ページ/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
      } else if (isset($_POST['confirm']) && $_POST['confirm']) {
        
      
        // 投稿予定関連
        $new_post_day = new Check_radio($_POST['new_post_day'],Fix::EVENTPOST);
        // 入っているものがあっているか？
        if (!($new_post_day->check_radio($new_post_day->get_checking_radio()) == 'true')) {
        // エラーを入れる
          $errmessage[] = $new_post_day->get_err_inclass();
        //セッションの中身を消す
          $_SESSION['new_post_header']['reserve'] = '';
        } else {
          // 正常なら選択した数字を入れる
          $_SESSION['new_post_header']['reserve'] = $new_post_day->get_checking_radio();
          // 今すぐ投稿なら
          if($_SESSION['new_post_header']['reserve'] == 1){
            $_SESSION['new_post_header']['reserve_day'] = $today->format('Y/m/d');
            $_SESSION['new_post_header']['reserve_time'] = $today->format('H:i');
          }elseif($_SESSION['new_post_header']['reserve'] == 2){
            
            if(validateDateFormat($_POST['reserve_post_day']) && isValidTimeFormat($_POST['reserve_post_time'])){
              $_SESSION['new_post_header']['reserve_day'] = $_POST['reserve_post_day'];
              $_SESSION['new_post_header']['reserve_time'] = $_POST['reserve_post_time'];
            }else{
              $errmessage[] = $new_post_day->get_err_inclass();
              $_SESSION['new_post_header']['reserve_day'] = '';
              $_SESSION['new_post_header']['reserve_time'] = '';
            }
          }

        }

        // 記事の種類
        // クラス作って
        $new_post_type = new Check_radio($_POST['new_post'],Fix::EVENTTYPE);
        // 入っているものがあっているか？
        if (!($new_post_type->check_radio($new_post_type->get_checking_radio()) == 'true')) {
        // エラーを入れる
          $errmessage[] = $new_post_type->get_err_inclass();
        //セッションの中身を消す
          $_SESSION['new_post_header']['type'] = '';
        } else {
          // 正常なら選択した数字を入れる
          $_SESSION['new_post_header']['type'] = $new_post_type->get_checking_radio();
        }

        // 文字関連
        // 記事のタイトルーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
        // クラス作るtext_validate.phpに定義している
        // submitしたときのnameでpostは来ているnew_post_title
        $new_post_title = new Check_txt($_POST['new_post_title'], Fix::EVENTTITLE);

        // 改行消す
        $post_title_replace = $new_post_title->tex_replace();
        // 文字数を表示するためにSessionへ文字数を入れる
        $_SESSION['new_post_title']['length'] = $new_post_title->get_checkig_txt_length();

        // 長さチェック
        if (!($new_post_title->check_length($post_title_replace) == 'true')) {
          $errmessage[] = $new_post_title->get_err_inclass();
          // 規定文字以上をカットして入れる
          $_SESSION['new_post_title']['title'] = $new_post_title->too_long();
        } else {
          // 改行コード消したやつセット
          $new_post_title->set_checking_text($post_title_replace);
          $_SESSION['new_post_title']['title'] = $new_post_title->hchars();
        }



        // イベント本文ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

        $_SESSION['new_event_body'] = $_POST['new_event_body'];

        // クラスを作る
        // $new_post_body = new Check_txt($_POST['new_post_body'], Fix::EVENTBODY);
        
        $new_post_body = new Check_txt($_POST['new_event_body'], Fix::EVENTBODY);

        // 戻るを前提にした処理

        // 文字数を調べる系ーーーーーーーーーーーーーーーー
        // 改行スペースを消す
        $post_body_all_replace = $new_post_body->all_replace();
        // 文字数をSESSIONに入れる
        $_SESSION['new_post_body']['length'] = $new_post_body->get_checkig_txt_length();
        // 長さチェック
        if (!($new_post_body->check_length($post_body_all_replace) == 'true')) {
          $errmessage[] = $new_post_body->get_err_inclass();
          // 規定文字以上はだめ
          $_SESSION['new_post_body']['body'] = $new_post_body->too_long();
        } else {
          // 編集の可能性があるから改行スペースはそのまま
          $new_post_body->set_checking_text($_POST['new_event_body']);
          $_SESSION['new_post_body']['body'] = $new_post_body->hchars();

         }



        // 画像関連----------------------------------------
        // 画像が選ばれていれば'tmp_name'は一時保存名
        if (!empty($_FILES['event_image']['tmp_name'])) {

          try {
            // 読み込んだバリデーション関数
            check_post($_FILES['event_image']);
            check_file_error($_FILES['event_image']);
            check_file_size($_FILES['event_image'], Fix::MINIMG);
            check_file_type($_FILES['event_image']);
          } catch (RuntimeException $e) {
            // エラーメッセージ
            $errmessage[] =  $e->getMessage();
          }




// ここでセッションに画像データ入れてる

          // 何一つ問題エラーメッセージがない場合
          if (empty($errmessage)) {
            setSessionImg('event_image', $_FILES['event_image']);
          }
        }

        // モードチェンジ　エラーしてたらモード変わらない---------------------
        if ($errmessage) {
          $mode = 'input';
        } else {
          $mode = 'confirm';
        }

        // 送信モード/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_

      } else if (isset($_POST['send']) && $_POST['send']) {

        // データベースコネクト
        require_once('db_connect.php');
        try {
          $new_post_title = $_SESSION['new_post_title']['title'];
          $new_post_body = $_SESSION['new_post_body']['body'];

          $new_post_title = htmlspecialchars($new_post_title, ENT_QUOTES, 'UTF-8');
          $new_post_body = htmlspecialchars($new_post_body, ENT_QUOTES, 'UTF-8');


          //データベースに接続
          $dbh = db_connect();
          //PDOでの例外エラーを詳細にするためのオプション
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //sql
          $sql = "INSERT INTO `mst_staff` (name, pass) VALUES (?, ?)";
          $stmt = $dbh->prepare($sql);
          $date[] = $new_post_title;
          $date[] = $new_post_body;
          $stmt->execute($date);

          //接続終了
          $dbh = null;

          print $new_post_title;
          print 'の記事を追加';
        } catch (Exception $e) {
          echo $e->getMessage();
          exit();
        }


        $_SESSION = array();
        // モードチェンジ
        $mode = 'send';
      } else {
        
        // 初めて入ったとき/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
        // 投稿タイプ
        $_SESSION['new_post_header']['type'];
        //投稿日時
        $_SESSION['new_post_header']['reserve'];
        $_SESSION['new_post_header']['reserve_day'];
        $_SESSION['new_post_header']['reserve_time'];
        // タイトル
        $_SESSION['new_post_title']['title'];
        $_SESSION['new_post_title']['length'];
        // 文章
        $_SESSION['new_event_body'];
        $_SESSION['new_post_body']['body'];
        $_SESSION['new_post_body']['length'];
        // 画像系
        $_SESSION['event_image']['data'];
        $_SESSION['event_image']['type'];
        $_SESSION['event_image']['width'];
        $_SESSION['event_image']['height'];
      }

      ?>

      <!------------------------------------
        html
      -------------------------------------->



      <!-- 入力画面 -->
      <?php if ($mode == 'input') : ?>

      <script src="../js/newevent_set.js" defer></script>

      <article id="setting_index" class="under_space">
        <div class="content_wrapper">


          <!-- エラーメッセージがあるなら表示 -->
          <?php
        if ($errmessage) {
          echo "<div class='errmessage'>";
          echo implode('<br>', $errmessage);
          echo '</div>';
        }
        ?>


          <!-- データの送り先 -->
          <!-- <form action="sent.php?setting=shop_info" method="POST" enctype="multipart/form-data"> -->

          <form action="" class="new_event_form" method="POST" id="form" enctype="multipart/form-data">


            <!-- MAX_FILE_SIZE でアップロードファイルのサイズを制限する（単位：バイト） -->
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo Fix::MINIMG; ?>">
            <!-- 店舗番号をこっそり送る -->

            <!-- 設定項目 -->



            <h2 class="step_q">元データはこれ</h2>



            <!-- 記事の種類 -->
            <dl class="bace_wrap news_post_bg">
              <dt class="step_a">種類</dt>

              <dd>
                <ul class="radio_select_ul">
                  <li class="radio_select_list">

                    <!-- タイプがまだ選ばれていないか１を選んでいる場合 -->
                    <?php if (empty($_SESSION['new_post_header']['type']) || $_SESSION['new_post_header']['type'] == 1 ): ?>
                    <input type="radio" checked id="new_event" name="new_post" value='1' class="radio_label_01">
                    <?php else:?>
                    <input type="radio" id="new_event" name="new_post" value='1' class="radio_label_01">
                    <?php endif ?>
                    <label class="girl_tag_label_txt" for="new_event">イベント</label>
                  </li>

                  <li class="radio_select_list">
                    <?php if ($_SESSION['new_post_header']['type'] == 2 ): ?>
                    <input type="radio" checked id="new_news" name="new_post" value='2' class="radio_label_02">
                    <?php else :?>
                    <input type="radio" id="new_news" name="new_post" value='2' class="radio_label_02">
                    <?php endif ?>
                    <label class="girl_tag_label_txt" for="new_news">お知らせ</label>
                  </li>

                  <li class="radio_select_list">
                    <?php if ($_SESSION['new_post_header']['type'] == 3 ): ?>
                    <input type="radio" checked id="new_staff" name="new_post" value='3' class="radio_label_03">
                    <?php else :?>
                    <input type="radio" id="new_staff" name="new_post" value='3' class="radio_label_03">
                    <?php endif ?>
                    <label class="girl_tag_label_txt" for="new_staff">新人</label>
                  </li>

                  <li class="radio_select_list">
                    <?php if ($_SESSION['new_post_header']['type'] == 4 ): ?>
                    <input type="radio" checked id="new_ather" name="new_post" value='4' class="radio_label_04">
                    <?php else :?>
                    <input type="radio" id="new_ather" name="new_post" value='4' class="radio_label_04">
                    <?php endif ?>
                    <label class="girl_tag_label_txt" for="new_ather">その他</label>
                  </li>
                </ul>
              </dd>
            </dl>


            <!-- 画像 -->

            <dl class="edit_area">
              <dt class="step_a">画像</dt>
              <dd>

                <!-- <input type="file" id="inp-preview2" name="" accept="image/jpeg,image/png,image/gif" -->
                <!-- onChange="imgPreView(event, 'preview2',1000000)"> -->
                <input type="file" id="inp-preview1" name="event_image" accept="image/png, image/jpeg,image/gif"
                  onChange="imgPreView(event, 'preview1', 'set_img01',<?php echo Fix::MINIMG; ?>)">
                <label id="set_img01" for="inp-preview1" class="set_img_label">画像追加</label>

                <!-- 戻ってきた場合 -->
                <?php if (!empty($_SESSION['event_image']['data'])) : ?>

                <div id="preview1">
                  <figure id="previewImage-preview1">
                    <h3>現在選択中</h3>
                    <img
                      src="data:<?php echo $_SESSION['event_image']['type']; ?>;base64,<?php echo $_SESSION['event_image']['data']; ?>">
                    <input type="submit" name="img_prv_delete" value="削除">
                  </figure>
                </div>

                <?php else : ?>
                <!-- 通常時のプレビュー位置 -->
                <div id="preview1"></div>

                <?php endif; ?>
                <!-- 終わり戻ってきた場合 -->


              </dd>
            </dl>


            <dl class="new_staff_set_ul">
              <dt class="step_a">題名</dt>
              <!-- <span id="not_enough">必須</span> -->
              <span class="mini_alert">記号は使えません</span>
              <dd class="step_wrap">

                <?php if ($_SESSION['new_post_title']['title']) : ?>
                <!-- 記事の題名 -->
                <input type="text" id="new_post_title" name="new_post_title" maxlength="32" placeholder="32文字以内でお願いします"
                  required onblur="CheckGuestInfo(this)"
                  pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,32}"
                  oninput="CountStr('post_title_count',value,32)" class="mypage_input cancel_alert"
                  value=<?php echo $_SESSION['new_post_title']['title'] ?>>

                <!-- 残り文字の処理 -->
                <!-- 残りの入力可能文字の変更処理 -->
                <p id="post_title_count" class="count_num">
                  戻りの場合残り：<?php echo  Fix::EVENTTITLE - $_SESSION['new_post_title']['length']; ?>文字
                </p>

                <?php else : ?>
                <!-- 題名 -->
                <input type="text" id="new_post_title" name="new_post_title" maxlength="32" placeholder="32文字以内でお願いします"
                  required onblur="CheckGuestInfo(this)"
                  pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,32}"
                  oninput="CountStr('post_title_count',value,32)" class="mypage_input cancel_alert">

                <!-- 残り文字の処理 -->
                <!-- 残りの入力可能文字の変更処理 -->
                <p id="post_title_count" class="count_num">残り：<?php echo Fix::EVENTTITLE ?>文字</p>
                <?php endif ?>
                <!-- ここまで入力可能文字の処理 -->

              </dd>


              <!-- 記事の本文 -->

              <dt class="step_a">内容</dt>
              <span id="not_enough">必須</span>

              <dd class="step_wrap">

                <!-- ここから -->

                <!-- textareaなのかinputなのか -->

                <?php if ($_SESSION['new_post_body']['body']) : ?>
                <textarea rows=20 name="new_event_body" maxlength="1000" placeholder="1000文字以内"
                  onblur="checkTxt(this,'new_post_body')" required
                  oninput="CountStr('post_body_count',value,1000)"><?php echo $_SESSION['new_event_body'] ?></textarea>

                <p id="post_body_count" class="count_num">
                  残り：<?php echo Fix::EVENTBODY - $_SESSION['new_post_body']['length']; ?>文字
                </p>

                <?php else : ?>
                <textarea rows=20 name="new_event_body" maxlength="1000" placeholder="1000文字以内"
                  onblur="checkTxt(this,'new_post_body')" required
                  oninput="CountStr('post_body_count',value,1000)"></textarea>


                <p id="post_body_count" class="count_num">残り：<?php echo Fix::EVENTBODY; ?> 文字</p>

                <?php endif ?>
                <input type="hidden" id="new_post_body" name="new_post_body">

                <!-- ここまでにテキストarea入れる -->

              </dd>

            </dl>


            <!-- 記事の更新日 -->
            <dl>

              <dt class="step_a">更新日時</dt>
              <dd>
                <ul class="radio_select_ul">
                  <li class="radio_select_list">

                    <!-- タイプがまだ選ばれていないか１を選んでいる場合 -->
                    <?php if (empty($_SESSION['new_post_header']['reserve']) || $_SESSION['new_post_header']['reserve'] == 1 ): ?>
                    <input type="radio" checked id="new_post_now" name="new_post_day" value='1' class="radio_label_01"
                      onclick="handleCheckboxChange()">
                    <?php else:?>
                    <input type="radio" id="new_post_now" name="new_post_day" value='1' class="radio_label_01"
                      onclick="handleCheckboxChange()">
                    <?php endif ?>
                    <label class="girl_tag_label_txt" for="new_post_now">今すぐ</label>
                  </li>

                  <li class="radio_select_list">
                    <?php if ($_SESSION['new_post_header']['reserve'] == 2 ): ?>
                    <input type="radio" checked id="new_post_reserve" name="new_post_day" value='2'
                      class="radio_label_02" onclick="handleCheckboxChange()">
                    <?php else :?>
                    <input type="radio" id="new_post_reserve" name="new_post_day" value='2' class="radio_label_02"
                      onclick="handleCheckboxChange()">
                    <?php endif ?>
                    <label class="girl_tag_label_txt" for="new_post_reserve">予約</label>
                  </li>

                </ul>
              </dd>
              <dd>
                <!-- 日時入力 -->
                <!-- 日付選択 -->
                <select id="reserve_post_day" name="reserve_post_day" disabled required>
                  <option value="" hidden
                    <?php if (empty($_SESSION['new_post_header']['reserve_day'])) echo 'selected'; ?>>予約日</option>
                  <?php for($i = 0; $i < 10; $i ++) : ?>
                  <?php $dateValue = $today->format('Y/m/d'); ?>
                  <option value="<?php echo $dateValue; ?>"
                    <?php if (!empty($_SESSION['new_post_header']['reserve_day']) && $dateValue == $_SESSION['new_post_header']['reserve_day']) echo 'selected'; ?>>
                    <?php echo "{$today->format('Y/m/d')}" ?> (<?php echo $week_name[$today->format("w")]; ?>)
                  </option>
                  <?php $today->modify("+1 day") ;?>
                  <?php endfor ?>
                </select>

                <!-- 時間選択 -->
                <select id="reserve_post_time" name="reserve_post_time" disabled required>
                  <?php $selectedDefault = (empty($_SESSION['new_post_header']['reserve_time'])) ? 'selected' : '';
                    echo '<option value="" hidden ' . $selectedDefault . '>時間</option>';for ($hour = 0; $hour <= 23; $hour++) {
                      $selected = '';
                      if (!empty($_SESSION['new_post_header']['reserve_time']) && $_SESSION['new_post_header']['reserve_time'] === sprintf("%02d:00", $hour)) {
                        $selected = 'selected';
                      }
                      echo '<option value="' . sprintf("%02d:00", $hour) . '" ' . $selected . '>' . sprintf("%02d:00", $hour) . '</option>';
                    }
                    ?>
                </select>


              </dd>
            </dl>

            <input type="submit" disabled id="submit_button" name="confirm" value="確認">

            <div class="cancel_btn_wrap">
              <a href="reset_session.php" onclick="cancelPop(event)" class="setting_cancel">キャンセル</a>
            </div>

          </form>

          <!-- ポップオーバーのテンプレート -->

          <div class="popoverTemplate">
            <div class="popover">
              <p>入力中の内容は破棄されます</p>
              <p>よろしいですか？
              </p>
              <div class="popover_btn">
                <button onclick="move()" class="true_btn">OK</button>
                <button onclick="backSet()">キャンセル</button>
              </div>
            </div>
          </div>

        </div><!-- content_wrapper -->


      </article>




      <!-- 確認画面 -->
      <?php elseif ($mode == 'confirm') : ?>

      <article>
        <h2 class="confirm_info">以下のページが更新されます</h2>
        <!-- セクション１　一覧 -->

        <section id="event_list" class="form_send">
          <div class="content_wrapper">
            <h3 class="confirm_title"><span>News</span></h3>
            <h4 class="block_title_caption">最新情報</h4>
            <ul class="topics">

              <li class="topic">
                <div class="news_data">
                  <time><?php echo $_SESSION['new_post_header']['reserve_day']?></time>


                  <!-- ここがまだ -->


                  <?php
                  $postType =$_SESSION['new_post_header']['type'];
                  if( $postType == 1){
                    echo "<span class='news_kinds pink'>イベント" ;
                  } elseif($postType == 2){
                    echo "<span class='news_kinds blue'>お知らせ" ;
                  }elseif($postType == 3){
                    echo "<span class='news_kinds green'>新人" ;
                  }elseif($postType == 4){
                    echo "<span class='news_kinds purple'>その他" ;
                  }else{
                    echo "エラーしてる" ;
                  }
                ?>
                  </span>



                </div>
                <div class="news_top_title">
                  <?php echo $_SESSION['new_post_title']['title'] ?>
                </div>
              </li>
              <!-- イチ記事 -->
            </ul>

          </div><!-- content_wrapper -->
        </section>


        <section class="form_send">
          <form action="./renew_set_event.php" method="POST" enctype="multipart/form-data">


            <div class="content_wrapper">
              <h3 class="confirm_title"><span>News</span></h3>
              <h4 class="block_title_caption">お知らせ</h4>

              <section class="confirm_event_bg">
                <div class="event_description">

                  <!-- 画像をアップしたか？必須でない場合があるので -->
                  <?php if (empty($_SESSION['event_image']['data'])) : ?>
                  <p class="img_err">
                    <?php echo '画像は選択されていません'; ?>
                  </p>
                  <img src="../img/no-image.png" alt="">

                  <?php else : ?>
                  <p class="img_err">
                    <?php check_vh('event_image', Fix::sp_noswipe_bnner_w, Fix::sp_noswipe_bnner_h) ?>
                  </p>
                  <img
                    src="data:<?php echo $_SESSION['event_image']['type']; ?>;base64,<?php echo $_SESSION['event_image']['data']; ?>">

                  <?php endif; ?>

                  <!-- 記事タイトル -->
                  <p class="confirm_event_title"><?php echo $_SESSION['new_post_title']['title'] ?></p>
                  <!-- 記事内容 -->
                  <p class="confirm_event_description_text">
                    <!-- <?php echo $_SESSION['new_event_body'] ?> -->
                    <?php echo nl2br($_SESSION['new_post_body']['body']) ?>
                  </p>
                </div>
              </section>


            </div><!-- content_wrapper -->

            <!-- ここにスペースが無くなるか -->

            <section class="confirm_post_time">
              <p>
                <?php echo $_SESSION['new_post_header']['reserve_day'].'の'.$_SESSION['new_post_header']['reserve_time'] ?>
                に反映されます。
              </p>
            </section>



            <div class="send_btn_wrap">
              <input type="submit" class="back_btn" name="back" value="戻る">
              <input type="submit" class="send_btn" name="send" value="更新">
            </div>



            <!-- データを送る -->
            <!-- 投稿タイプ -->
            <input type="hidden" name="" value="<?php echo $_SESSION['new_post_header']['type'];?>">

            <!-- 画像 -->
            <!-- タイトル -->
            <input type="hidden" name="" value="<?php echo $_SESSION['new_post_title']['title']?>">
            <!-- 本文 -->
            <input type="hidden" name="" value="<?php echo nl2br($_SESSION['new_post_body']['body'])?>">

            <!-- 更新日時 -->
            <?php $originalDateTime = $_SESSION['new_post_header']['reserve_day'].$_SESSION['new_post_header']['reserve_time'];
        // strtotime() 関数を使用してタイムスタンプに変換
        $timestamp = strtotime($originalDateTime);
        // date() 関数を使用して新しい形式に変換
        $newDateTime = date('Y-m-d H:i:s', $timestamp);
        ?>
            <input type="hidden" name="" value="<?php echo $newDateTime?>">


          </form>
        </section><!-- formのセクション -->
      </article><!-- 確認画面 -->

      <br>
      <br>
      <br>

      記事タイトル：<?php echo $_SESSION['new_post_title']['title'] ?><br><br>



      記事内容送信されるやつ：<?php echo nl2br($_SESSION['new_post_body']['body']) ?><br><br>
      バックで戻ったら表示されるやつ<?php echo $_SESSION['new_event_body'] ?><br><br>
      postされてるやつ<?php echo $_POST['new_event_body'] ?>
      <br><br><br>
      postされてるのは<br>
      <?php echo $_POST['reserve_post_day'] ?><br>
      <?php echo $_POST['reserve_post_time'] ?><br>
      <br>
      <br>
      投稿は未来？今？：<?php echo $_SESSION['new_post_header']['reserve'] ?><br><br><br>
      投稿予定日：<?php echo $_SESSION['new_post_header']['reserve_day'] ?><br><br><br>
      投稿時間：<?php echo $_SESSION['new_post_header']['reserve_time'] ?><br>



      <br>
      <br>









      <!-- 送信画面 -->
      <?php elseif ($mode == 'send') : ?>

      <?php echo $_POST['shop']['name']; ?>
      <?php echo $_SESSION['shop']['name']; ?>

      <?php else : ?>
      <h3>エラーしてます</h3>


      <?php endif; ?>



      <br><br><br><br><br><br><br><br>
      <p>下が確認できないのでスペース</p>
      <br><br><br><br><br><br><br><br>



    </main>


  </div>
</body>

</html>