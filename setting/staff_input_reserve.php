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
  <script src="../js/radio_display.js" defer></script>
  <!-- <script src="../js/newevent_set.js" defer></script> -->
  <script>
  window.addEventListener('pageshow', () => {
    if (window.performance.navigation.type == 2) location.reload();
  });
  </script>
</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');
    require_once( dirname(__FILE__). '/../setting/radio_validate.php');
    require_once( dirname(__FILE__). '/../setting/reserve_set.php');
    require_once( dirname(__FILE__). '/../setting/class_input_reserve.php');
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

 

      // 初めてかどうか？
      if(!isset($_SESSION['input_reserve_card']) || empty($_SESSION['input_reserve_card'])){
      // 決定した希望女の子をsessionに入れる
        if (isset($_GET['reserveGirlNum']) && is_numeric($_GET['reserveGirlNum'])) {
          // InputPlayReserveのインスタンスを作成する
          $reserve = new InputPlayReserve();
          // $_GET['reserveGirlNum']を整数に変換
          $reserveGirlNum = intval($_GET['reserveGirlNum']);
          // $reserveTypeに値をセットする
          $reserve->setReserveType(1);
          // 指名した女性の番号入力
          $reserve->setReserveGirlNum($reserveGirlNum);
          // $_SESSIONに格納
          $_SESSION['input_reserve_card'] = $reserve;
          
          $input = 0;
          $err = "最初";
        }

        // 一度戻って指名を選び直した場合
      }elseif(isset($_SESSION['input_reserve_card']) && (isset($_GET['reserveGirlNum']))){
        $err = "やはりここ";
        if($_GET['reserveGirlNum'] != $_SESSION['input_reserve_card']->getReserveGirlNum()){
          $reserveGirlNum = intval($_GET['reserveGirlNum']);
          // $_SESSIONに格納
          $_SESSION['input_reserve_card'] -> setReserveGirlNum($reserveGirlNum);
          $input = 0;
          // $err = "はもどってきた";
          // ステップ １
        }else{
          $err = "抜けました";
        }

      // 予約客情報
      }elseif($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["customer_information"])){
      // 会員マーク
      $_SESSION['input_reserve_card'] -> setIfValue('reserveCustomerType', $_POST["member_new"]);
      if($_POST["member_new"] == 1){
      //会員番号
      $_SESSION['input_reserve_card'] -> setIfValue('reserveCustomerNum', $_POST["customer_number"]);
      }elseif($_POST["member_new"] == 2){
        // 新規の場合ユーザーナンバー入れない
        $_SESSION['input_reserve_card'] -> resetPropertyValue('reserveCustomerNum');
      }
      // name
      $_SESSION['input_reserve_card'] -> setIfValue('reserveCustomerName', $_POST["customer_name"]);
      // mail
      $_SESSION['input_reserve_card'] -> setIfValue('reserveCustomerMail', $_POST["customer_mail"]);
      // phone
      $_SESSION['input_reserve_card'] -> setIfValue('reserveCustomerPhone', $_POST["customer_phone"]);
      $input = 1;
      
      // ステップ２
      }elseif($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["play_card_input"])){
      // playタイム自分で入れた
      if($_POST["play_time"] == "xxx" && isset($_POST["other_course_time"])){
      // 一応半角してる
      $input_playTime = mb_convert_kana($_POST["other_course_time"], "n");
      $_SESSION['input_reserve_card'] -> setReservePlayCourse($input_playTime);
      // playtime選択でれた
      }elseif($_POST["play_time"] != "xxx"){
      $_SESSION['input_reserve_card'] ->setReservePlayCourse($_POST["play_time"]);

      }else{
      $errmessage[] = 'コースの選択が間違ってます';
      }
      // 予約日
      $_SESSION['input_reserve_card'] -> setReservePlayDay($_POST["reserve_input_day"]);
      // 予約時間
      $_SESSION['input_reserve_card'] -> setReservePlaytime($_POST["reserve_input_time"]);
      // プレイ場所
      $_SESSION['input_reserve_card'] -> setReservePlaySpace($_POST["play_space"]);
      // プレイ場所詳細
      if($_POST["play_space"] == 1){
      $_SESSION['input_reserve_card'] -> setReservePlayArea($_POST["hotel_area"]);
      $input = 2;
      }elseif($_POST["play_space"] == 2){
      $_SESSION['input_reserve_card'] -> setReservePlayadress($_POST["user_house_adress"]);
      $input = 2;
      }else{
      $errmessage[] = '場所が決まってません';
      }

      // 検索から来た
      }elseif($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["search_no"])){
      $reserveGirlNum02= '検索から来ました';
      $input = 0;
      }else{

      // 最初にページに来て予期せぬエラー
      // エラー処理など、不正な値が渡された場合の処理
      $errmessage[] = '女の子がいません？';
      }


      // ボタンがクリックされた場合の処理
      if (isset($_POST['clearSession'])) {
      // セッションをクリア
      session_unset();
      session_destroy();
      session_start(); // 新しいセッションを開始
      }


      // 送信or戻るで戻るインプットに入ってもなにもしない/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
      if (isset($_POST['back']) && $_POST['back']) {


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

      // お客の入力

      // $_SESSION['new_post_header']['type'];


      }
      ?>
      <form method="post">
        <button type="submit" name="clearSession">Clear Session</button>
      </form>
      <script>
      // ボタンがクリックされたときの処理
      document.querySelector('button[name="clearSession"]').addEventListener('click', function() {
        // JavaScriptでの追加の処理があればここに追加
      });
      </script>

      <!------------------------------------
        html
      -------------------------------------->

      <!-- 入力画面 -->
      <?php if ($mode == 'input' && $input == 0): ?>


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



          <!-- ステップ表示 -->

          <div class="demo demo3">
            <h1 class="heading"><span>予約の入力</span></h1>
          </div>



          <!-- //////////////////////////////////////// -->



          <div class="progressbar_square">
            <div class="item active">STEP.1<br>指名選択</div>
            <div class="item active">STEP.2<br>お客様</div>
            <div class="item">STEP.3<br>予約内容</div>
            <div class="item">STEP.4<br>確認</div>
            <div class="item">STEP.5<br>完了</div>
          </div>


          <div class="staff_input_wrap">
            <h2>指名したのは</h2>
            <figure class="request_img">
              <img src='../<?php echo $sample_names[$_SESSION['input_reserve_card']->getReserveGirlNum()][3]?>' alt="">
            </figure>
            <figcaption class="request_img_caption">
              <?php echo $sample_names[$_SESSION['input_reserve_card']->getReserveGirlNum()][1]?>
            </figcaption>
          </div>


          <div id="all_girl_content" class="staff_bg">

            <div class="staff_input_wrap">

              <h2>予約するお客様は？</h2>

              <ul class="radio_select_ul">

                <li class="girl_tag_radio_list">
                  <input type="radio" id="staff_check" name="check_member" value='2' class="radio_label_02"
                    onchange="showHideElement()" checked>
                  <label class="girl_tag_label_txt" for="staff_check">ご新規</label>
                </li>
                <li class="girl_tag_radio_list">
                  <input type="radio" id="cast_check" name="check_member" value='1' class="radio_label_01"
                    onchange="showHideElement()">
                  <label class="girl_tag_label_txt" for="cast_check">会員</label>
                </li>

              </ul>

            </div>

            <div class="staff_input_wrap">

              <div class="new_member_wrap" id="newMember">
                <form method="post" action="staff_input_reserve.php" class="request_from">
                  <h2 class="reserve_data_title">名前</h2>
                  <input type="text" name="customer_name" required value="<?php echo(
                  $_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerName') && 
                  $_SESSION['input_reserve_card']->getReserveCustomerType() == 2
                  ) ? $_SESSION['input_reserve_card']->getReserveCustomerName() : ''?>">

                  <h2 class=" reserve_data_title">電話番号</h2>
                  <input type="text" name="customer_phone" required value="<?php echo(
                  $_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerPhone') && 
                  $_SESSION['input_reserve_card']->getReserveCustomerType() == 2
                  ) ? $_SESSION['input_reserve_card']->getReserveCustomerPhone() : ''?>">

                  <h2 class="reserve_data_title">メールアドレス</h2>
                  <input type="text" name="customer_mail" value="<?php echo(
                  $_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerMail') && 
                  $_SESSION['input_reserve_card']->getReserveCustomerType() == 2
                  ) ? $_SESSION['input_reserve_card']->getReserveCustomerMail() : ''?>">


                  <input type="hidden" value='2' name="member_new">

                  <div class="step_button_wrap">
                    <a href="input_reserve_schedule.php" onclick="cancelPop(event)"
                      class="staff_input_step step_back">キャンセル</a>
                    <input type="submit" name="customer_information" value="次へ" class="staff_input_step step_next">
                  </div>

                </form>


              </div>
            </div>


            <!-- 会員 -->

            <?php if($_POST['search_no']){echo $_POST['search_no'];} ?>



            <div class="staff_input_wrap">
              <div class="member_serch_wrap" id="memberSearch">
                <div class="staff_input_title">
                  <h2>会員検索</h2>
                  <p id="alert_number"></p>
                </div>

                <form method="post" action="staff_input_reserve.php" class="member_search_from">
                  <label>
                    <input type="text" name="search_no" id="search_no" class="staff_input_area" placeholder="会員番号入力"
                      onBlur="validateInput()">

                  </label>
                  <button type="submit" aria-label="会員検索" class="search_button"></button>



                  <?php
              // フォームからの入力値
              $search_no = isset($_POST['search_no']) ? $_POST['search_no'] : '';
              // 全角数字を半角数字に変換
              $search_no = mb_convert_kana($search_no, 'n', 'UTF-8');
              // 入力された数字を検索
              $found_person = null;
              $search_executed = false; // 検索が実行されたかどうかのフラグ
              if ($search_no !== '') {
              foreach ($people_basics as $person) {
                if ($person['no'] == $search_no) {
                  $found_person = $person;
                  $search_executed = true; // 検索が実行されたことを記録
                  break;
                }else{
                  $search_executed = true; // 検索が実行されたことを記録
                }
                
              }
            }
              ?>
                </form>

                type:<?php echo $_SESSION['input_reserve_card']->getReserveCustomerType()?><br>
                post:<?php echo $_POST['member_new']?><br>
                <?php print_r($_SESSION['input_reserve_card']);?>



                <!-- 該当する人物が見つかった場合は名前を表示 -->

                <div class="reserve_data_wrap">


                  <form method="post" action="staff_input_reserve.php" class="request_from">

                    <!-- 検索が実行されておらず、初回表示の場合の処理 -->
                    <?php if(!$search_executed && !isset($_POST['search_no'])):?>



                    <div class="user_card_wrap">
                      <h2 class="user_card_title">会員番号(初回)
                        <?php echo $_SESSION['input_reserve_card']->getReserveCustomerType()==1 && $_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerNum') ? $_SESSION['input_reserve_card']->getReserveCustomerNum(): '未定'?>
                      </h2>
                      <div class="user_info_wrap">

                        <figure class="request_img">
                          <img
                            src='../<?php echo $_SESSION['input_reserve_card']->getReserveCustomerType()==1 && $_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerName') ? $people_basics[$_SESSION['input_reserve_card']->getReserveCustomerNum()]["icon"] : 'img/user_face.png'?>'
                            alt="" class="">
                        </figure>

                        <figcaption class="request_img_caption">
                          <!-- 名前 -->
                          <?php echo $_SESSION['input_reserve_card']->getReserveCustomerType()==1 && $_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerName') ? $_SESSION['input_reserve_card']->getReserveCustomerName() : '未定'?>
                        </figcaption>
                        <!-- メール電話 -->
                        <p>
                          <?php echo $_SESSION['input_reserve_card']->getReserveCustomerType()==1 && $_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerMail') ? $_SESSION['input_reserve_card']->getReserveCustomerMail(): '未定'?>
                        </p>
                        <p>
                          <?php echo $_SESSION['input_reserve_card']->getReserveCustomerType()==1 && $_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerPhone') ? $_SESSION['input_reserve_card']->getReserveCustomerPhone(): '未定'?>
                        </p>
                      </div>
                    </div>


                    <!-- 検索されて見つからなかった場合 -->
                    <?php elseif($found_person === null && $search_executed):?>
                    <?php
                    //今保存されているものを消す
                    $_SESSION['input_reserve_card']->resetPropertyValue('reserveCustomerType');
                    $_SESSION['input_reserve_card']->resetPropertyValue('reserveCustomerNum');
                    $_SESSION['input_reserve_card']->resetPropertyValue('reserveCustomerName');
                    $_SESSION['input_reserve_card']->resetPropertyValue('reserveCustomerPhone');
                    $_SESSION['input_reserve_card']->resetPropertyValue('reserveCustomerMail');
                    ?>

                    <div class="user_card_wrap">
                      <h2 class="user_card_title">会員番号:<span style="color: red;">該当なし</span></h2>
                      <div class="user_info_wrap">

                        <figure class="request_img">
                          <img src='../img/user_face.png' alt="" class="">
                        </figure>

                        <figcaption class="request_img_caption">
                          <!-- 名前 -->
                          <span style="color: red;">該当なし</span>

                        </figcaption>
                        <!-- メール電話 -->
                        <p>電話：<span style="color: red;">該当なし</span></p>
                        <p>メール：<span style="color: red;">該当なし</span></p>
                      </div>
                    </div>


                    <!-- 検索されて見つかった場合 -->
                    <?php elseif($found_person !== null && $search_executed):?>

                    <div class="user_card_wrap">
                      <h2 class="user_card_title">会員番号(検索後)
                        <?php echo $found_person['no']?>

                      </h2>
                      <div class="user_info_wrap">

                        <figure class="request_img">
                          <img src='../<?php echo $people_basics[$found_person['no']]["icon"]?>' alt="" class="">
                        </figure>

                        <figcaption class="request_img_caption">
                          <!-- 名前 -->
                          <?php echo $found_person['name'] ?>
                        </figcaption>
                        <!-- メール電話 -->
                        <p>
                          <?php echo $found_person['phone'] ?>
                        </p>
                        <p>
                          <?php echo $found_person['email'] ?>
                        </p>
                      </div>
                    </div>



                    <!-- 番号 -->
                    <input type="hidden" value='1' name="member_new">
                    <input type="hidden" value='<?php echo $found_person['no']?>' name="customer_number">
                    <input type="hidden" value='<?php echo $found_person['name']?>' name="customer_name">
                    <input type="hidden" value='<?php echo $found_person['phone']?>' name="customer_phone">
                    <input type="hidden" value='<?php echo $found_person['email']?>' name="customer_mail">

                    <?php else:?>



                    <p>エラー半角数字で入力して</p>

                    <div class="user_card_wrap">
                      <h2 class="user_card_title">会員番号
                        <span style="color: red;">エラー</span>
                      </h2>
                      <div class="user_info_wrap">

                        <figure class="request_img">
                          <img src='../img/user_face.png' alt="" class="">
                        </figure>

                        <figcaption class="request_img_caption">
                          <!-- 名前 -->
                          <span style="color: red;">エラー</span>
                        </figcaption>
                        <!-- メール電話 -->
                        <p>
                          <span style="color: red;">エラー</span>
                        </p>
                        <p>
                          <span style="color: red;">エラー</span>
                        </p>
                      </div>
                    </div>


                    <?php endif?>

                </div>


                <!-- ステップ２へ -->


                <div class="step_button_wrap">
                  <a href="input_reserve_schedule.php" onclick="cancelPop(event)"
                    class="staff_input_step step_back">キャンセル</a>
                  <input type="submit" name="customer_information" value="次へ" class="staff_input_step step_next">
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


              </div>


            </div>

            <?php elseif ($mode == 'input' && $input == 1): ?>



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

                <!-- ステップ表示 -->

                <div class="demo demo3">
                  <h1 class="heading"><span>予約の入力</span></h1>
                </div>



                <!-- //////////////////////////////////////// -->



                <div class="progressbar_square">
                  <div class="item active">STEP.1<br>指名選択</div>
                  <div class="item active">STEP.2<br>お客様</div>
                  <div class="item active">STEP.3<br>予約内容</div>
                  <div class="item">STEP.4<br>確認</div>
                  <div class="item">STEP.5<br>完了</div>
                </div>


                <div class="input_area">
                  <section class="staff_input_wrap">
                    <h2>予約カード</h2>
                    ここ <?php echo $_POST['member_new']?><br>

                    <?php print_r($_SESSION['input_reserve_card']);?>
                    <div class="reserve_card_input1">
                      <div>
                        <!-- 予約客の顔写真 -->
                        <?Php if($_SESSION['input_reserve_card'] -> isPropertyNotEmpty('reserveCustomerNum')):?>
                        <figure class="request_img">
                          <img
                            src='../<?php echo $people_basics[$_SESSION['input_reserve_card'] -> getReserveCustomerNum()]["icon"]?>'
                            alt="">
                        </figure>
                        <figcaption class="request_img_caption">
                          <?php echo $people_basics[$_SESSION['input_reserve_card'] -> getReserveCustomerNum()]["name"]?>
                        </figcaption>
                        <?php else:?>
                        <!-- 新規顧客 -->
                        <figure class="request_img">
                          <img src='../img/user_face.png' alt="">
                        </figure>
                        <figcaption class="request_img_caption">
                          <?php echo $_SESSION['input_reserve_card'] -> getReserveCustomerName()?><br>
                        </figcaption>
                        <?php endif?>

                      </div>
                      <!-- やじるし -->
                      <div class="arrow-round"></div>
                      <div>
                        <figure class="request_img">
                          <img
                            src='../<?php echo $sample_names[$_SESSION['input_reserve_card']->getReserveGirlNum()][3]?>'
                            alt="">
                        </figure>
                        <figcaption class="request_img_caption">
                          <?php echo $sample_names[$_SESSION['input_reserve_card']->getReserveGirlNum()][1]?>
                        </figcaption>



                      </div>
                    </div>
                  </section>
                </div>


                <div class="input_area">

                  <section class="staff_input_wrap">
                    <h2>予約日</h2>


                    <!-- 日時入力 -->
                    <!-- 日付選択 -->

                    <form method="post" action="staff_input_reserve.php" class="request_from">
                      <section class="reserve_input_wrap">
                        <select id="reserve_post_day" name="reserve_input_day" required>
                          <option value=""
                            <?php if (!$_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlayDay')) echo 'selected'; ?>>
                            予約日</option>
                          <?php for($i = 0; $i < 10; $i ++) : ?>
                          <?php $dateValue = $today->format('Y/m/d'); ?>
                          <option value="<?php echo $dateValue; ?>"
                            <?php if ($_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlayDay') && $dateValue == $_SESSION['input_reserve_card']->getReservePlayDay()) echo 'selected'; ?>>
                            <?php echo "{$today->format('Y/m/d')}" ?> (<?php echo $week_name[$today->format("w")]; ?>)
                          </option>
                          <?php $today->modify("+1 day") ;?>
                          <?php endfor ?>
                        </select>

                        <!-- 時間選択 -->
                        <select id="reserve_post_time" name="reserve_input_time" required>

                          <?php $selectedDefault = $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlayTime') ? 'selected' : '';
                    echo '<option value="" ' . $selectedDefault . '>開始時間</option>';
                    for ($hour = 9; $hour <= 23; $hour++) {
                      $selected = '';
                      if ($_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlayTime') && $_SESSION['input_reserve_card']-> getReservePlayTime() === sprintf("%02d:00", $hour)) {
                        $selected = 'selected';
                      }
                      echo '<option value="' . sprintf("%02d:00", $hour) . '" ' . $selected . '>' . sprintf("%02d:00", $hour) . '</option>';
                    }
                    ?>
                        </select>
                      </section>

                      <section class="reserve_input_wrap">
                        <h2>コース</h2>
                        <ul class="girl_tag_ul">
                          <!-- 最初の値をなしする -->

                          <?php for($i = 60; $i <= 180; $i += 30) :?>

                          <li class="girl_tag_radio_list">
                            <input type='radio' name='play_time' id='play_time<?php echo $i ?>' value='<?php echo $i ?>'
                              class="select_play_time"
                              <?php if ($_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlayCourse') && $i == $_SESSION['input_reserve_card']->getReservePlayCourse()) echo 'checked'; ?>>
                            <label for='play_time<?php echo $i ?>' class="select_time"><?php echo $i?></label>
                          </li>

                          <?php endfor ?>

                          <li class="girl_tag_radio_list">
                            <input type='radio' name='play_time' id="other_radio" onclick="showHideElement()"
                              value="xxx" class="select_play_time">
                            <label for='other_radio' class="select_time">その他</label>
                          </li>

                        </ul>


                        <!-- ブラウザバックだと読み込まない問題 -->

                        <div id="other_course_time">
                          <h2>ロングタイム</h2>
                          <input type="text" id="write_course_time" name="other_course_time" placeholder="コース時間を入力"
                            disabled required>
                        </div>
                      </section>


                      <!-- 場所 -->

                      <section class="reserve_input_wrap">
                        <h2>利用場所</h2>

                        <ul class="radio_select_ul">
                          <li class="girl_tag_radio_list">
                            <input type="radio" id="hotel_check" name="play_space" value='1' class="select_play_satage"
                              onchange="showHideElement()"
                              <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' ? 'checked' : ''; ?>>
                            <label class="select_space" for="hotel_check">ホテル</label>
                          </li>
                          <li class="girl_tag_radio_list">
                            <input type="radio" id="house_check" name="play_space" value='2' class="select_play_satage"
                              onchange="showHideElement()"
                              <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '2' ? 'checked' : ''; ?>>
                            <label class="select_space" for="house_check">自宅</label>
                          </li>
                        </ul>

                        <div id="select_play_area_hotel">
                          <ul class="hotel_select_ul">
                            <li class="play_space_li">
                              <input class="form-check-input" id="matsudo_hotel" type="radio" value="松戸"
                                name="hotel_area"
                                <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' && $_SESSION['input_reserve_card']->reservePlayArea == '松戸' ? 'checked' : ''; ?>>
                              <label class="play_place_select" for="matsudo_hotel"> 松戸 </label>
                            </li>
                            <li class="play_space_li">
                              <input class="form-check-input" id="shinmastudo_hotel" type="radio" value="新松戸"
                                name="hotel_area"
                                <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' && $_SESSION['input_reserve_card']->reservePlayArea == '新松戸' ? 'checked' : ''; ?>>
                              <label class="play_place_select" for="shinmastudo_hotel">新松戸 </label>
                            </li>
                            <li class="play_space_li">
                              <input class="form-check-input" id="mabashi_hotel" type="radio" value="馬橋"
                                name="hotel_area"
                                <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' && $_SESSION['input_reserve_card']->reservePlayArea == '馬橋' ? 'checked' : ''; ?>>
                              <label class="play_place_select" for="mabashi_hotel">馬橋 </label>
                            </li>
                            <li class="play_space_li">
                              <input class="form-check-input" id="kitamastudo_hotel" type="radio" value="北松戸"
                                name="hotel_area"
                                <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' && $_SESSION['input_reserve_card']->reservePlayArea == '北松戸' ? 'checked' : ''; ?>>
                              <label class="play_place_select" for="kitamastudo_hotel">北松戸 </label>
                            </li>
                            <li class="play_space_li">
                              <input class="form-check-input" id="kashiwa_hotel" type="radio" value="柏"
                                name="hotel_area"
                                <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' && $_SESSION['input_reserve_card']->reservePlayArea == '柏' ? 'checked' : ''; ?>>
                              <label class="play_place_select" for="kashiwa_hotel"> 柏 </label>
                            </li>
                            <li class="play_space_li">
                              <input class="form-check-input" id="minamikashiwa_hotel" type="radio" value="南柏"
                                name="hotel_area"
                                <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' && $_SESSION['input_reserve_card']->reservePlayArea == '南柏' ? 'checked' : ''; ?>>
                              <label class="play_place_select" for="minamikashiwa_hotel"> 南柏 </label>
                            </li>
                            <li class="play_space_li">
                              <input class="form-check-input" id="kitakashiwa_hotel" type="radio" value="北柏"
                                name="hotel_area"
                                <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' && $_SESSION['input_reserve_card']->reservePlayArea == '北柏' ? 'checked' : ''; ?>>
                              <label class="play_place_select" for="kitakashiwa_hotel"> 北柏 </label>
                            </li>
                            <li class="play_space_li">
                              <input class="form-check-input" id="yabashira_hotel" type="radio" value="八柱"
                                name="hotel_area"
                                <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' && $_SESSION['input_reserve_card']->reservePlayArea == '八柱' ? 'checked' : ''; ?>>
                              <label class="play_place_select" for="yabashira_hotel"> 八柱 </label>
                            </li>
                            <li class="play_space_li">
                              <input class="form-check-input" id="misato_hotel" type="radio" value="三郷"
                                name="hotel_area"
                                <?php echo $_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == '1' && $_SESSION['input_reserve_card']->reservePlayArea == '三郷' ? 'checked' : ''; ?>>
                              <label class="play_place_select" for="misato_hotel"> 三郷 </label>
                            </li>

                          </ul>
                        </div>


                        <div id="select_play_area_house">
                          <h2>住所入力</h2>
                          <input type="text" class="play_houseadress" name="user_house_adress"
                            value="<?php echo isset($_SESSION['input_reserve_card']) ? htmlspecialchars($_SESSION['input_reserve_card']->getReservePlayAdress()) : ''; ?>">
                        </div>

                      </section>




                      <div class="step_button_wrap">
                        <a href="input_reserve_schedule.php" onclick="cancelPop(event)"
                          class="staff_input_step step_back">キャンセル</a>
                        <input type="submit" name="play_card_input" value="次へ" class="staff_input_step step_next">
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



                </div>



                <?php elseif ($mode == 'input' && $input == 2): ?>



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

                    <!-- ステップ表示 -->

                    <div class="demo demo3">
                      <h1 class="heading"><span>予約の入力</span></h1>
                    </div>



                    <!-- //////////////////////////////////////// -->



                    <div class="progressbar_square">
                      <div class="item active">STEP.1<br>指名選択</div>
                      <div class="item active">STEP.2<br>お客様</div>
                      <div class="item active">STEP.3<br>予約内容</div>
                      <div class="item active">STEP.4<br>確認</div>
                      <div class="item">STEP.5<br>完了</div>
                    </div>

                    <div class="input_area">
                      <section class="request_wrap">
                        <h2 class="input_card staff_reserve_card_title">●予約カード</h2>

                        <p class="reserve_title_day"><?php echo $_SESSION["input_reserve_card"]->getReservePlayDay() ?>
                        </p>
                        <!-- <div class="reserve_card_input1"> -->
                        <div class="request_icon_wrap">
                          <div>
                            <?Php if($_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerNum')):?>
                            <figure class="request_img">
                              <img
                                src='../<?php echo $people_basics[$_SESSION['input_reserve_card']->getReserveCustomerNum()]["icon"]?>'
                                alt="">
                            </figure>
                            <figcaption class="request_img_caption">
                              <!-- 素直にgetnameで良いかも -->
                              <?php echo $people_basics[$_SESSION['input_reserve_card']->getReserveCustomerNum()]["name"]?>
                            </figcaption>
                            <?php else:?>
                            <figure class="request_img">
                              <img src='../img/user_face.png' alt="">
                            </figure>
                            <figcaption class="request_img_caption">
                              <?php echo $_SESSION['input_reserve_card'] -> getReserveCustomerName()?>
                            </figcaption>
                            <?php endif?>

                          </div>
                          <div class="arrow-round"></div>
                          <div>
                            <figure class="request_img">
                              <img
                                src='../<?php echo $sample_names[$_SESSION['input_reserve_card']->getReserveGirlNum()][3]?>'
                                alt="">
                            </figure>
                            <figcaption class="request_img_caption">
                              <?php echo $sample_names[$_SESSION['input_reserve_card']->getReserveGirlNum()][1]?>
                            </figcaption>
                          </div>
                        </div>
                        <div class="work_time">

                          <p class="starttime"><?php echo $_SESSION["input_reserve_card"]->getReservePlaytime()?></p>
                          <!-- やじるし -->
                          <div class="dli-caret-right"></div>
                          <!-- エンドタイム計算 -->
                          <?php
                            // 現在の startTime を Unix タイムスタンプに変換
                            $startTimeTimestamp = strtotime($_SESSION["input_reserve_card"]->getReservePlaytime());
                            $additionalMinutes = (int)$_SESSION["input_reserve_card"]->getReservePlayCourse();

                            // $additionalMinutes 分を加算
                            $newTimeTimestamp = $startTimeTimestamp + ($additionalMinutes * 60);

                            // 新しい時間を取得
                            $playEndTime = date("H:i", $newTimeTimestamp);
                            ?>
                          <!-- エンドタイム -->
                          <p class="endtime"><?php echo $playEndTime ?></p>
                          <!-- コース -->
                          <p class="coursetime">
                            <?php echo $_SESSION["input_reserve_card"]->getReservePlayCourse() ?>分
                          </p>

                        </div>


                        <?php if($_POST["play_space"] == 1):?>
                        <div class="play_space_wrap">
                          <p class="play_spase_tag hotel_color">ホテル</p>
                          <p class="play_spase_tag hotel_area_color">
                            <?php echo  $_SESSION["input_reserve_card"]->getReservePlayArea()?></p>
                          <?php elseif($_POST["play_space"] == 2):?>
                          <div class="play_space_house_wrap">
                            <p class="play_spase_tag house_color">自宅</p>
                            <p class="house_adress_color">
                              <?php echo  $_SESSION["input_reserve_card"]->getReservePlayadress()?></p>
                            <?php endif?>
                          </div>

                          <div class="user_contact_address_wrap">
                            <h2 class="user_card_title">予約者情報</h2>
                            <div class="user_info_wrap">


                              <!-- ユーザー顔 -->

                              <?Php if($_SESSION['input_reserve_card']->isPropertyNotEmpty('reserveCustomerNum')):?>
                              <figure class="request_img">

                                <img
                                  src='../<?php echo $people_basics[$_SESSION['input_reserve_card']->getReserveCustomerNum()]["icon"]?>'
                                  alt="" class="">
                              </figure>

                              <figcaption class="request_img_caption">
                                <!-- 名前 -->
                                <?php echo $people_basics[$_SESSION['input_reserve_card']->getReserveCustomerNum()]["name"]?>
                              </figcaption>
                              <!-- メール電話 -->

                              <?php else:?>
                              <figure class="request_img">
                                <img src='../img/user_face.png' alt="">
                              </figure>
                              <figcaption class="request_img_caption">
                                <?php echo $_SESSION['input_reserve_card']->getReserveCustomerName()?>
                              </figcaption>
                              <?php endif?>

                              <p><?php echo $_SESSION['input_reserve_card']->getReserveCustomerMail() ?></p>
                              <p><?php echo $_SESSION['input_reserve_card']->getReserveCustomerPhone() ?></p>

                            </div>

                          </div>



                          <form action="">
                            <!-- 予約の種類 -->
                            <input type="hidden" name="input_reserve_type"
                              value='<?php echo $_SESSION['input_reserve_card']->getReserveType()?>'>
                            <!-- ユーザー番号 -->
                            <input type="hidden" name="input_reserve_customer_num"
                              value='<?php echo $_SESSION['input_reserve_card']->getReserveCustomerNum()?>'>
                            <!-- 名前 -->
                            <input type="hidden" name="input_reserve_customer_name"
                              value='<?php echo $_SESSION['input_reserve_card']->getReserveCustomerName()?>'>
                            <!-- メール -->
                            <input type="hidden" name="input_reserve_customer_mail"
                              value='<?php echo $_SESSION['input_reserve_card']->getReserveCustomerMail()?>'>
                            <!-- 電話 -->
                            <input type="hidden" name="input_reserve_customer_phone"
                              value='<?php echo $_SESSION['input_reserve_card']->getReserveCustomerPhone()?>'>
                            <!-- 指名番号 -->
                            <input type="hidden" name="input_reserve_girl_num"
                              value='<?php echo $_SESSION['input_reserve_card']->getReserveGirlNum()?>'>
                            <!-- 日 -->
                            <input type="hidden" name="input_reserve_play_day"
                              value='<?php echo $_SESSION['input_reserve_card']->getReservePlayDay()?>'>
                            <!-- スタート時間 -->
                            <input type="hidden" name="input_reserve_play_time"
                              value='<?php echo $_SESSION['input_reserve_card']->getReservePlaytime()?>'>
                            <!-- コース -->
                            <input type="hidden" name="input_reserve_play_course"
                              value='<?php echo $_SESSION['input_reserve_card']->getReservePlayCourse()?>'>

                            <!--場所 -->
                            <input type="hidden" name="input_reserve_play_space"
                              value='<?php echo $_SESSION['input_reserve_card']->getReservePlaySpace()?>'>

                            <!-- 場所の詳細 -->
                            <?php if($_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == 1):?>
                            <input type="hidden" name="input_reserve_play_area"
                              value='<?php echo $_SESSION['input_reserve_card']->getReservePlayArea()?>'>
                            <?php elseif($_SESSION['input_reserve_card']->isPropertyNotEmpty('reservePlaySpace') && $_SESSION['input_reserve_card']->reservePlaySpace == 2):?>
                            <input type="hidden" name="input_reserve_play_adress"
                              value='<?php echo $_SESSION['input_reserve_card']->getReservePlayadress()?>'>
                            <?php endif?>

                            <div class="step_button_wrap">
                              <a href="input_reserve_schedule.php" onclick="cancelPop(event)"
                                class="staff_input_step step_back">キャンセル</a>
                              <input type="submit" name="play_card_input" value="確定" class="staff_input_step step_next">
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


                      </section>
                    </div>

                    <?php endif?>








                    <br><br><br><br><br><br><br><br>
                    <p>下が確認できないのでスペース</p>
                    <br><br><br><br><br><br><br><br>



    </main>


  </div>
</body>



</html>