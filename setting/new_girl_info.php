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
  <script src="../js/cancelpop.js" defer></script>
  <!-- <script src="../js/newevent_set.js" defer></script> -->

</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/../data.php');
    // 画像のバリデーション読み込み
    require_once( dirname(__FILE__). '/../setting/image_validate.php');
    require_once( dirname(__FILE__). '/../setting/radio_validate.php');
    ?>


    <main>

      <!-- 変なところから来ていないか？確認 -->

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



      // 送信or戻るで戻るインプットに入ってもなにもしない/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
      if (isset($_POST['back']) && $_POST['back']) {

        // 画像関連/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
        // 画像を削除した場合
      } else if (isset($_POST['img_prv_delete']) && $_POST['img_prv_delete']) {

        $_SESSION['cast_info_image']['data'] = '';
        $_SESSION['cast_info_image']['type'] = '';
        $_SESSION['cast_info_image']['width'] = '';
        $_SESSION['cast_info_image']['height'] = '';


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

        // スタッフ番号
        // 登録しているスタッフ数を数える
        $now_allGirl = count($sample_names);
        // 誰もいないなんてことないよね？
        if($now_allGirl > 0){
          $now_allGirl--;
          $post_newface_id = new Check_radio($_POST['newface_girl_id'],$now_allGirl);
          if (!($post_newface_id->check_radio($post_newface_id->get_checking_radio()) == 'true')) {
        // エラーを入れる
          $errmessage[] = $post_newface_id->get_err_inclass();
        //セッションの中身を消す
          $_SESSION['new_cast_prof']['id'] = '';
          } else {
          // 正常なら選択した数字を入れる
          $_SESSION['new_cast_prof']['id'] = $post_newface_id->get_checking_radio();
        // スタッフ画像
          $selected_girl_allpic = count($sample_pics[$_POST['newface_girl_id']]);
          $selected_girl_allpic--;
          $post_newface_pic = new Check_radio($_POST['picRadio'],$selected_girl_allpic);
          if (!($post_newface_pic->check_radio($post_newface_pic->get_checking_radio()) == 'true')) {
        // エラーを入れる
          $errmessage[] = $post_newface_pic->get_err_inclass();
        //セッションの中身を消す
          $_SESSION['new_cast_prof']['pic'] = '';
          }else{
        //正常なら選択した数字（画像番号）を入れる 
          $_SESSION['new_cast_prof']['pic'] = $post_newface_pic->get_checking_radio();
          }
          }
        }else{
          $errmessage[] = 'スタッフが登録されてません';
        }


        // name="newface_girl_id"

        // 文字関連
        // 記事のタイトルーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
        // クラス作るtext_validate.phpに定義している
        // submitしたときのnameでpostは来ているnew_post_title
        $new_post_title = new Check_txt($_POST['new_cast_info_title'], Fix::EVENTTITLE);

        // 改行消す
        $post_title_replace = $new_post_title->tex_replace();
        // 文字数を表示するためにSessionへ文字数を入れる
        $_SESSION['new_cast_info_title']['length'] = $new_post_title->get_checkig_txt_length();

        // 長さチェック
        if (!($new_post_title->check_length($post_title_replace) == 'true')) {
          $errmessage[] = $new_post_title->get_err_inclass();
          // 規定文字以上をカットして入れる
          $_SESSION['new_cast_info_title']['title'] = $new_post_title->too_long();
        } else {
          // 改行コード消したやつセット
          $new_post_title->set_checking_text($post_title_replace);
          $_SESSION['new_cast_info_title']['title'] = $new_post_title->hchars();
        }



        // イベント本文ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

        $_SESSION['new_cast_info_body'] = $_POST['new_cast_info_body'];

        // クラスを作る
        // $new_post_body = new Check_txt($_POST['new_post_body'], Fix::EVENTBODY);
        
        $new_post_body = new Check_txt($_POST['new_cast_info_body'], Fix::EVENTBODY);

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
          $new_post_body->set_checking_text($_POST['new_cast_info_body']);
          $_SESSION['new_post_body']['body'] = $new_post_body->hchars();

         }



        // 画像関連----------------------------------------
        // 画像が選ばれていれば'tmp_name'は一時保存名
        if (!empty($_FILES['cast_info_image']['tmp_name'])) {

          try {
            // 読み込んだバリデーション関数
            check_post($_FILES['cast_info_image']);
            check_file_error($_FILES['cast_info_image']);
            check_file_size($_FILES['cast_info_image'], Fix::MINIMG);
            check_file_type($_FILES['cast_info_image']);
          } catch (RuntimeException $e) {
            // エラーメッセージ
            $errmessage[] =  $e->getMessage();
          }




// ここでセッションに画像データ入れてる

          // 何一つ問題エラーメッセージがない場合
          // image_validateにsetSessionImg関数定義
          if (empty($errmessage)) {
            setSessionImg('cast_info_image', $_FILES['cast_info_image']);
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
          $new_post_title = $_SESSION['new_cast_info']['title'];
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
        $_SESSION['new_cast_info_title']['title'];
        $_SESSION['new_cast_info_title']['length'];
        // 文章
        $_SESSION['new_cast_info_body'];
        $_SESSION['new_post_body']['body'];
        $_SESSION['new_post_body']['length'];

        // 紹介スタッフ関連
        $_SESSION['new_cast_prof']['id'];
        $_SESSION['new_cast_prof']['pic'];
        // 画像系
        $_SESSION['cast_info_image']['data'];
        $_SESSION['cast_info_image']['type'];
        $_SESSION['cast_info_image']['width'];
        $_SESSION['cast_info_image']['height'];
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


            <div class="demo demo3">
              <h2 class="heading"><span>女の子の紹介</span></h2>
            </div>

            <!-- 記事の種類 -->
            <dl class="bace_wrap cast_info_post_bg">
              <dt class="step_a">紹介する種類</dt>


              <dd class="step_radio_wrap">
                <ul class="radio_select_ul">
                  <li class="radio_select_list">

                    <!-- タイプがまだ選ばれていないか１を選んでいる場合 -->
                    <?php if (empty($_SESSION['new_post_header']['type']) || $_SESSION['new_post_header']['type'] == 1 ): ?>
                    <input type="radio" checked id="new_event" name="new_post" value='1' class="radio_label_01">
                    <?php else:?>
                    <input type="radio" id="new_event" name="new_post" value='1' class="radio_label_01">
                    <?php endif ?>
                    <label class="girl_tag_label_txt" for="new_event">新　人</label>
                  </li>

                  <li class="radio_select_list">
                    <?php if ($_SESSION['new_post_header']['type'] == 2 ): ?>
                    <input type="radio" checked id="new_news" name="new_post" value='2' class="radio_label_02">
                    <?php else :?>
                    <input type="radio" id="new_news" name="new_post" value='2' class="radio_label_02">
                    <?php endif ?>
                    <label class="girl_tag_label_txt" for="new_news">おすすめ</label>
                  </li>

                  <li class="radio_select_list">
                    <?php if ($_SESSION['new_post_header']['type'] == 3 ): ?>
                    <input type="radio" checked id="new_staff" name="new_post" value='3' class="radio_label_03">
                    <?php else :?>
                    <input type="radio" id="new_staff" name="new_post" value='3' class="radio_label_03">
                    <?php endif ?>
                    <label class="girl_tag_label_txt" for="new_staff">卒　業</label>
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


            <!-- テスト -->
            <!-- 紹介するのは -->
            <div class="demo demo3">
              <h2 class="heading"><span>紹介する人</span></h2>
            </div>


            <dl class="bace_wrap cast_info_post_bg">
              <dt class="step_a">女の子選択</dt>
              <dd class="step_select_wrap">


                <select id="cast_select" name="newface_girl_id" required onchange="showSelectedValue()">
                  <option value="" hidden>選択</option>
                  <?php foreach($sample_names as $sample_name) : ?>
                  <?php $selected_option = null;
                  if (isset($_SESSION['new_cast_prof']['id'])) {
                  $selected_option = $_SESSION['new_cast_prof']['id'];
                  } ?>
                  <?php $option_value = $sample_name[0]; ?>
                  <?php $option_label = $sample_name[1]; ?>
                  <option value="<?php echo $option_value; ?>"
                    <?php echo ($option_value == $selected_option) ? 'selected' : ''; ?>>
                    <?php echo $option_label; ?>
                  </option>
                  <?php endforeach ?>
                </select>

              </dd>
              <!-- 自動画像 -->

              <dt class="step_a">掲載画像</dt>
              <dd class="select_pic_att">掲載する画像を選んでください</dd>





              <!-- セッションに選択が残っている -->
              <?php if (isset($_SESSION['new_cast_prof']['id'])) :?>
              <!-- checkedをつけるために -->
              <?php $loop_count = 0; ?>
              <?php $skipFirstElement = true ;?>
              <dd id="selectedCast" class="step_wrap_post">
                <!-- 選んだ人のIDは？ -->
                <?php $selected_girl_pics = $sample_pics[$_SESSION['new_cast_prof']['id']] ?>
                <!-- 選んだ人の画像配列をforeach -->
                <?php foreach($selected_girl_pics as $selected_girl_pic) :?>
                <?php if($skipFirstElement):?>
                <?php $skipFirstElement = false; ?>
                <?php continue ?>
                <?php endif ?>
                <?php $loop_count ++ ?>
                <input type="radio" name="picRadio" value="<?php echo $loop_count ?>"
                  id="radio<?php echo $loop_count ?>"
                  <?php echo ($loop_count == $_SESSION['new_cast_prof']['pic']) ? 'checked' : ''; ?>>
                <label for="radio<?php echo $loop_count ?>" class="radio_pic">
                  <img src="../<?php echo $selected_girl_pic?>">
                </label>
                <?php endforeach ?>
              </dd>



              <?php else :?>
              <dd id="selectedCast" class="step_wrap_post"></dd>
              <script>
              function showSelectedValue() {
                var selectElement = document.getElementById("cast_select");
                var selectedIndex = selectElement.value;
                // 画像の配列を読み込んでる
                <?php echo "var castPics = " . json_encode($sample_pics) . ";" ?>
                // 挿入するところを整理
                var selectedCastElement = document.getElementById("selectedCast");
                selectedCastElement.textContent = '';
                // selectで選択した人の画像数にあわせてforを回す
                for (var i = 1; i < castPics[selectedIndex].length; i++) {
                  var castPic = castPics[selectedIndex][i];
                  var radioId = "radio" + i;

                  var radioElement = document.createElement("input");
                  radioElement.type = "radio";
                  radioElement.name = "picRadio"; // ラジオボタンのグループ名を設定する場合は適切な
                  radioElement.value = i;
                  radioElement.id = radioId;
                  selectedCastElement.appendChild(radioElement);

                  var labelElement = document.createElement("label");
                  labelElement.setAttribute("for", radioId);
                  labelElement.setAttribute("class", "radio_pic");
                  var castPpicElement = document.createElement("img");
                  castPpicElement.src = "../" + castPic;
                  labelElement.appendChild(castPpicElement);
                  selectedCastElement.appendChild(labelElement);


                }
              }
              </script>

              <?php endif ?>

            </dl>



            <!-- 紹介するのは -->
            <div class="demo demo3">
              <h2 class="heading"><span>紹介文</span></h2>
            </div>

            <dl class="bace_wrap cast_info_post_bg">

              <dt class="step_a">題名</dt>
              <!-- <span id="not_enough">必須</span> -->
              <span class="mini_alert">記号は使えません</span>
              <dd class="step_wrap">

                <?php if ($_SESSION['new_cast_info_title']['title']) : ?>
                <!-- 記事の題名 -->
                <input type="text" id="new_post_title" name="new_cast_info_title" maxlength="32"
                  placeholder="32文字以内でお願いします" required onblur="CheckGuestInfo(this)"
                  pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,32}"
                  oninput="CountStr('post_title_count',value,32)" class="mypage_input cancel_alert"
                  value=<?php echo $_SESSION['new_cast_info_title']['title'] ?>>

                <!-- 残り文字の処理 -->
                <!-- 残りの入力可能文字の変更処理 -->
                <p id="post_title_count" class="count_num">
                  戻りの場合残り：<?php echo  Fix::EVENTTITLE - $_SESSION['new_cast_info_title']['length']; ?>文字
                </p>

                <?php else : ?>
                <!-- 題名 -->
                <input type="text" id="new_post_title" name="new_cast_info_title" maxlength="32"
                  placeholder="32文字以内でお願いします" required onblur="CheckGuestInfo(this)"
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
              <p><?php echo $_SESSION['new_post_body']['body'] ?></p>

              <dd class="step_wrap">

                <!-- ここから -->

                <!-- textareaなのかinputなのか -->

                <?php if ($_SESSION['new_post_body']['body']) : ?>
                <textarea rows=20 name="new_cast_info_body" maxlength="1000" placeholder="1000文字以内"
                  onblur="checkTxt(this,'new_post_body')" required
                  oninput="CountStr('post_body_count',value,1000)"><?php echo $_SESSION['new_cast_info_body'] ?></textarea>

                <p id="post_body_count" class="count_num">
                  残り：<?php echo Fix::EVENTBODY - $_SESSION['new_post_body']['length']; ?>文字
                </p>

                <?php else : ?>
                <textarea rows=20 name="new_cast_info_body" maxlength="1000" placeholder="1000文字以内"
                  onblur="checkTxt(this,'new_post_body')" required
                  oninput="CountStr('post_body_count',value,1000)"></textarea>


                <p id="post_body_count" class="count_num">残り：<?php echo Fix::EVENTBODY; ?> 文字</p>

                <?php endif ?>
                <input type="hidden" id="new_post_body" name="new_post_body">

                <!-- ここまでにテキストarea入れる -->

              </dd>

            </dl>


            <!-- 記事の更新日 -->
            <div class="demo demo3">
              <h2 class="heading"><span>いつHPに反映しますか？</span></h2>
            </div>

            <dl class="bace_wrap cast_info_post_bg">

              <!-- 記事の更新日 -->


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
                    echo "<span class='news_kinds pink'>新　人" ;
                  } elseif($postType == 2){
                    echo "<span class='news_kinds blue'>おすすめ" ;
                  }elseif($postType == 3){
                    echo "<span class='news_kinds green'>卒　業" ;
                  }elseif($postType == 4){
                    echo "<span class='news_kinds purple'>その他" ;
                  }else{
                    echo "エラーしてる" ;
                  }
                ?>
                  </span>

                </div>
                <div class="news_top_title">
                  <?php echo $_SESSION['new_cast_info_title']['title'] ?>
                </div>
              </li>
              <!-- イチ記事 -->
            </ul>

          </div><!-- content_wrapper -->
        </section>


        <!-- トップページのニューフェイス -->
        <?php if($postType == 1) :?>
        <section class="top_newface_demo">
          <h3 class="confirm_title"><span>New Face</span></h3>
          <h4 class="block_title_caption">新人スタッフ</h4>
          <div class="newface_demo_picwrap">

            <img
              src="../<?php echo $sample_pics[$_SESSION['new_cast_prof']['id']][$_SESSION['new_cast_prof']['pic']] ?>"
              alt="" class="newface_demo_pic">


            <!-- <img src="../img/newface01.jpeg" alt="" class="newface_demo_pic"> -->
          </div>
          <div class="newface_data_demo">
            <p class="demo_name_age">
              <span class="name"><?php echo $sample_names[$_SESSION['new_cast_prof']['id']][1] ?></span>
              <span>（<?php echo $sample_names[$_SESSION['new_cast_prof']['id']][3] ?>）</span>
            </p>
            <p class="body_size">
              <?php echo 'T/'.$sample_names[$_SESSION['new_cast_prof']['id']][4].'&nbsp;B/'.$sample_names[$_SESSION['new_cast_prof']['id']][5].'('.$sample_names[$_SESSION['new_cast_prof']['id']][6].')&nbsp;H/'.$sample_names[$_SESSION['new_cast_prof']['id']][7]?>
            </p>
          </div>
        </section>
        <?php endif ?>



        <section class="form_send">
          <form action="./new_girl_info.php" method="POST" enctype="multipart/form-data">


            <div class="content_wrapper">

              <?php if( $postType == 1):?>
              <h3 class="confirm_title"><span>New Face</span></h3>
              <h4 class="block_title_caption">新人紹介</h4>
              <?php elseif($postType == 2):?>
              <h3 class="confirm_title"><span>Pick Up</span></h3>
              <h4 class="block_title_caption">おすすめ</h4>
              <?php elseif( $postType == 3):?>
              <h3 class="confirm_title"><span>Graduation</span></h3>
              <h4 class="block_title_caption">卒業</h4>
              <?php elseif( $postType == 4):?>
              <h3 class="confirm_title"><span>Others</span></h3>
              <h4 class="block_title_caption">その他</h4>
              <?php else:?>
              <h3>エラー</h3>
              <?php endif ?>


              <!-- <h3 class="confirm_title"><span>News</span></h3> -->
              <!-- <h4 class="block_title_caption">お知らせ</h4> -->



              <section class="confirm_event_bg">
                <div class="event_description">

                  <img
                    src="../<?php echo $sample_pics[$_SESSION['new_cast_prof']['id']][$_SESSION['new_cast_prof']['pic']] ?>"
                    alt="" class="newface_demo_pic">

                  <div class="newface_data_demo">
                    <p class="demo_name_age">
                      <span class="name"><?php echo $sample_names[$_SESSION['new_cast_prof']['id']][1] ?></span>
                      <span>（<?php echo $sample_names[$_SESSION['new_cast_prof']['id']][3] ?>）</span>
                    </p>
                    <p class="body_size">
                      <?php echo 'T/'.$sample_names[$_SESSION['new_cast_prof']['id']][4].'&nbsp;B/'.$sample_names[$_SESSION['new_cast_prof']['id']][5].'('.$sample_names[$_SESSION['new_cast_prof']['id']][6].')&nbsp;H/'.$sample_names[$_SESSION['new_cast_prof']['id']][7]?>
                    </p>
                  </div>
                  <!-- 記事タイトル -->
                  <p class="confirm_event_title"><?php echo $_SESSION['new_cast_info_title']['title'] ?></p>
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

      <p style="color:red">セッション</p>
      選択スタッフ:<?php echo $_SESSION['new_cast_prof']['id'] ?><br>
      選択画像番号:<?php echo $_SESSION['new_cast_prof']['pic'] ?><br><br><br>
      <p style="color:blue">ポスト</p>
      選択スタッフ:<?php echo $_POST['newface_girl_id'] ?><br>
      選択画像番号:<?php echo $_POST['picRadio'] ?><br><br><br>

      記事内容送信されるやつ：<?php echo nl2br($_SESSION['new_post_body']['body']) ?><br><br>
      バックで戻ったら表示されるやつ<?php echo $_SESSION['new_cast_info_body'] ?><br><br>
      postされてるやつ<?php echo $_POST['new_cast_info_body']; ?>
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