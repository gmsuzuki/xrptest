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
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">

  <!--css javascript-->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/event.css" /> -->


  <!-- これinputのときだけ読み込む -->
  <!-- <script src="../js/newevent_set.js" defer></script> -->

  <script src="../js/error_set.js" defer></script>
  <script src="../js/text_check.js" defer></script>
  <script src="../js/text_count.js" defer></script>
  <script src="../js/setting.js" defer></script>
  <script src="../js/cancelpop.js" defer></script>
  <script src="../js/user_input_modal.js" defer></script>
  <script src="../js/make_reserve01.js" defer></script>

  <script>
  function showAlert() {
    alert("予約者が選択されてません");
  }
  </script>




</head>

<body id="body">


  <?php

    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');
    require_once( dirname(__FILE__). '/../setting/radio_validate.php');
    require_once( dirname(__FILE__). '/../setting/reserve_set.php');
    require_once( dirname(__FILE__). '/../setting/class_input_reserve.php');
  

session_start(); // セッションを開始

// セッションIDを保存していない場合、現在のセッションIDを保存
if (!isset($_SESSION['session_id'])) {
    $_SESSION['session_id'] = session_id();
}
  // タイムアウト確認処理
  require_once( dirname(__FILE__). '/../parts/input_timeout.php');

// test01.phpを通過したことを示すフラグを設定
  $_SESSION['visited_test01'] = true;



  // 戻るボタンでエラーしないように
  header('Expires:-1');
  header('Cache-Control:');
  header('Pragma:');


  // キャンセルボタンが押された場合
  if (isset($_POST['cancel'])) {
  // localStorageの削除
  echo "<script>
  localStorage.clear();
  </script>";
  session_unset(); // セッションの変数をすべて削除
  session_destroy(); // セッションを破棄
  header("Location: setting_index02.php"); // top.htmlにリダイレクト
  exit; // スクリプトの実行を終了
  }

  // エラー配列
  $errmessage = array();


  // ーーーーーーーセッション管理
  // 初めて訪問か？ブラウザーバックで戻ってきたか？
  if(!isset($_SESSION['input_reserve_card']) || empty($_SESSION['input_reserve_card'])){
  // InputPlayReserveのインスタンスを作成する
  $reserve = new InputPlayReserve();
  // $reserveTypeに値をセットする(スタッフ入力)


  }elseif(isset($_SESSION['input_reserve_card']) || !empty($_SESSION['input_reserve_card'])){
  $reserve = unserialize($_SESSION['input_reserve_card']);

if($_SESSION['visited_test02'] == true && $reserve->getReserveCustomerType()==2){
  $_SESSION['visited_test02']= false;


};

  }


  // 新規登録して次へ
  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["new_customer_information"])){
  $name = $_POST['customer_name'];
  $phone = $_POST['customer_phone'];
  // 名前のパターンチェック
  $namePattern = '/^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,20}$/';
  if (!preg_match($namePattern, $name)) {
  $errmessage = "名前は20文字以内で、記号を含めないでください。";
  echo $errmessage;
  exit;
  }
  // 電話番号のパターンチェック
  $phonePattern = '/^0[0-9]{9,10}$/';
  if (!preg_match($phonePattern, $phone)) {
  $errmessage = "電話番号はハイフンなしの数字で入力してください。";
  echo $errmessage;
  exit;
  }

  if($_POST['customer_mail'] && $_POST['customer_mail_check'] ){
  $mail01 = $_POST['customer_mail'];
  $mail02 = $_POST['customer_mail_check'];
  if($mail01 !== $mail02){
  $errmessage = "メールの一致が確認できません";
  echo $errmessage;
  exit;
  }
  }
  // インスタンスに入れる
  // 予約入力者タイプ
  $reserve->setReserveType(1);
  // 名前
  $reserve -> setIfValue('reserveCustomerName', $_POST["customer_name"]);
  // mail
  $reserve -> setIfValue('reserveCustomerMail', $_POST["customer_mail"]);
  // phone
  $reserve-> setIfValue('reserveCustomerPhone', $_POST["customer_phone"]);
  // 新規　２
  $reserve-> setIfValue('reserveCustomerType', $_POST["member_new"]);
  // 次へ行く
  // 検索経験をリセット
  unset($_SESSION['search_no']);
  unset($_POST['search_no']);
  unset($_POST['member_search']);
  $_SESSION['input_reserve_card'] = serialize($reserve);
  header("Location: input_reserve_02.php");
  exit();

  // 会員を選択して次へ
  }elseif($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["customer_information"])){

  if (isset($_POST["member_number"])) {
  $mnumber = (int)$_POST["member_number"];
  if (!empty($mnumber) && is_numeric($mnumber) && floor($mnumber) == $mnumber){

  // memberから検索
  foreach ($people_basics as $person) {
  if ($person['no'] == $mnumber) {
  $found_person = $person;
  $reserve->setReserveCustomerNum($found_person['no']);
  $reserve->setReserveCustomerName($found_person['name']);
  $reserve->setReserveCustomerPhone($found_person['phone']);
  if($found_person['email']){
  $reserve->setReserveCustomerMail($found_person['email']);
  }
  }
  }
  // 次へ行く
    // 予約入力者タイプ
  $reserve->setReserveType(1);
  //メンバー１
  $reserve-> setIfValue('reserveCustomerType',1);
  // 検索経験をリセット
  unset($_SESSION['search_no']);
  unset($_POST['search_no']);
  unset($_POST['member_search']);
  $_SESSION['input_reserve_card'] = serialize($reserve);
  header("Location: input_reserve_02.php");
  exit();

  } else {
  // $errmessage = "数字以外の文字が含まれているか、空の文字列です。";
  echo $mnumber;
  echo $errmessage;
  exit;
  }
  } else {
  $errmessage = "パラメータが送信されていません。";
  echo $errmessage;
  exit;
  }

  }



  // 検索のナンバーをSessionに保存
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['member_search'])){
              // フォームからの入力値
              $search_no = isset($_POST['search_no']) ? $_POST['search_no'] : '';
              // 全角数字を半角数字に変換
              $search_no = mb_convert_kana($search_no, 'n', 'UTF-8');
              // 入力された数字を検索
              $found_person = null;
              $test= 1;
              $search_executed = false; // 検索が実行されたかどうかのフラグ
              $serch_err = false;// エラーしてるか？デフォルトしていない
              if ($search_no !== '') {
              foreach ($people_basics as $person) {
                if ($person['no'] == $search_no) {
                  $found_person = $person;
                    $reserve->setReserveCustomerType(1);
                    $reserve->setReserveCustomerNum($found_person['no']);
                    $reserve->setReserveCustomerName($found_person['name']);
                    $reserve->setReserveCustomerPhone($found_person['phone']);
                    if($found_person['email']){
                      $reserve->setReserveCustomerMail($found_person['email']);
                    }
                  $search_executed = true; // 検索が実行されたことを記録
                  $serch_err = false;
                  // $reserve -> setReserveCustomerType(1);
                  break;
                }else{
                  $search_executed = true; // 検索が実行されたことを記録
                  $serch_err = true;
                }
                
              }
            }
            }

  ?>





  <div id="wrapper">

    <main id="main">
      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <div class="demo demo3">
            <h1 class="heading"><span>予約の入力</span></h1>
          </div>

          <div class="progressbar_square">
            <div class="item active">STEP.1<br>お客様</div>
            <div class="item">STEP.2<br>指名選択</div>
            <div class="item">STEP.3<br>予約内容</div>
            <div class="item">STEP.4<br>確認</div>
            <div class="item">STEP.5<br>完了</div>
          </div>

          <body>
            <!-- ラジオボタン -->

            <!-- モーダル -->
            <div id="user_input_modal" class="modal">

              <form action="input_reserve_01.php" method="post">
                <?php
                require_once( dirname(__FILE__). '/user_registration.php')
                ?>


                <div class="step_button_wrap">
                  <!-- モーダルを閉じるボタン -->
                  <button onclick="closeModal()" class="staff_input_step step_back">閉じる</button>
                  <input type="submit" name="new_customer_information" value="登録して予約"
                    class="staff_input_step step_next">
                </div>


              </form>

            </div>


            <!-- クリアモーダル -->


            <div class="popoverTemplate_clear">
              <div class="popover">
                <p>選択中のユーザー情報を破棄します</p>
                <p>よろしいですか？
                </p>
                <div class="popover_btn">
                  <button onclick="move2()" class="true_btn">OK</button>
                  <button onclick="backSet()">キャンセル</button>
                </div>
              </div>
            </div>








            <!-- オーバーレイ -->
            <div id="modalOverlay" class="modal-overlay" onclick="closeModal()"></div>



            <div class="staff_input_wrap">
              <div class="staff_input_title topSpace">
                <h2>お客様番号
                  <span id="alert_number"></span>
                </h2>

                <?php if(!empty($reserve->getReserveCustomerName())):?>
                <a href="input_reserve_schedule.php" onclick="clearPop(event)"
                  class="new_member_registration">新規はこちら</a>

                <!-- <button class="new_member_registration" onclick="clearModal()">新規はこちら</button> -->
                <?php else:?>
                <button class="new_member_registration" onclick="showModal()">新規はこちら</button>

                <?php endif;?>


              </div>

              <form method="post" action="" class="member_search_from" onsubmit="return validateForm()">

                <?php if(!empty($reserve->getReserveCustomerName())):?>
                <input type="text" name="search_no" id="search_no" class="staff_input_area" placeholder="会員番号入力"
                  onfocus="clearPop(event)">
                <?php else:?>
                <input type="text" name="search_no" id="search_no" class="staff_input_area" placeholder="会員番号入力"
                  onBlur="validateInput()">
                <?php endif?>
                <button type="submit" aria-label="会員検索" name='member_search' class="search_button"></button>


              </form>




              <h2>●現在選択中</h2>


              <form method="post" action="">

                <!-- 検索エラー -->
                <?php if($serch_err):?>


                <?php    //今保存されているものを消す
                    $reserve->resetPropertyValue('reserveCustomerNum');
                    $reserve->resetPropertyValue('reserveCustomerName');
                    $reserve->resetPropertyValue('reserveCustomerPhone');
                    $reserve->resetPropertyValue('reserveCustomerMail');
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


                <!-- 通常時 -->
                <!-- 検索されたこともないし検索中でもない初期か戻るで戻ってきた -->
                <?php elseif(!$search_executed && !isset($_POST['search_no'])):?>

                <div class="user_card_wrap">
                  <h2 class="user_card_title">会員番号(初回)</h2>

                  <div class="user_info_wrap">

                    <figure class="request_img">


                      <?php if($reserve->getReserveCustomerType()== 0 || $reserve->getReserveCustomerType()== 2):?>
                      <?php $user_face_img = '/img/user_face.png';?>
                      <?php elseif($reserve->getReserveCustomerType()== 1):?>
                      <?php $user_face_img = $people_basics[$reserve->getReserveCustomerNum()]["icon"] ?>
                      <?php endif?>
                      <img src='../<?php echo $user_face_img?>' alt="" class="">

                    </figure>



                    <figcaption class="request_img_caption">
                      <!-- 名前 -->
                      <?php echo $reserve->isPropertyNotEmpty('reserveCustomerName') ? $reserve->getReserveCustomerName() : '名前未定'?>
                    </figcaption>
                    <!-- メール電話 -->
                    <p>
                      <?php echo $reserve->isPropertyNotEmpty('reserveCustomerPhone') ? $reserve->getReserveCustomerPhone(): '電話未定'?>
                    </p>

                    <p>
                      <?php echo $reserve->isPropertyNotEmpty('reserveCustomerMail') ? $reserve->getReserveCustomerMail(): 'メール未定'?>
                    </p>
                  </div>
                </div>



                <!-- 検索されて見つかった場合 -->

                <?php elseif($found_person !== null && $search_executed):?>

                <div class="user_card_wrap">


                  <h2 class="user_card_title">会員番号(検索後)

                    <?php echo $reserve -> getReserveCustomerType()?>

                    <?php if($reserve -> getReserveCustomerType() ==2):?>
                    <?php $user_type = '新規客' ?>
                    <?php $user_faceicon = 'img/user_face.png' ?>
                    <?php $user_name = $reserve -> getReserveCustomerName() .'新規'?>
                    <?php else:?>
                    <?php $user_type = $found_person['no'] ?>
                    <?php $user_faceicon = $people_basics[$reserve ->getReserveCustomerNum()]["icon"] ?>
                    <?php $user_name = $reserve -> getReserveCustomerName() .'会員'?>
                    <?php endif?>

                    <?php $user_phone = $reserve -> getReserveCustomerPhone() ?>
                    <?php $user_mail = $reserve -> getReserveCustomerMail() ?>





                    <?php echo $user_type?>

                  </h2>
                  <div class="user_info_wrap">

                    <figure class="request_img">
                      <img src='../<?php echo $user_faceicon?>' alt="" class="">
                    </figure>

                    <figcaption class="request_img_caption">
                      <!-- 名前 -->
                      <?php echo $user_name?>
                    </figcaption>
                    <!-- メール電話 -->
                    <p>
                      <?php echo $user_phone ?>
                    </p>
                    <p>
                      <?php echo $user_mail ?>
                    </p>
                  </div>
                </div>

                <?php else:?>
                <!-- なんかバグってる -->

                <?php
                    //今保存されているものを消す
                    $reserve->resetPropertyValue('reserveCustomerNum');
                    $reserve->resetPropertyValue('reserveCustomerName');
                    $reserve->resetPropertyValue('reserveCustomerPhone');
                    $reserve->resetPropertyValue('reserveCustomerMail');
                    ?>


                <div class="user_card_wrap">
                  <h2 class="user_card_title">会員番号
                    <span style="color: red;">エラー半角英数字で入力して</span>
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






                <div class="member_serch_wrap" id="memberSearch">

                  <div class="step_button_wrap">
                    <a href="input_reserve_schedule.php" onclick="cancelPop(event)"
                      class="staff_input_step step_back">キャンセル</a>

                    <!-- エラーしている時 -->
                    <?php if($serch_err):?>
                    <button onclick="showAlert()" class="staff_input_step step_next_never">未選択</button>
                    <!-- 検索もしていないし保存もない -->
                    <?php elseif(empty($reserve-> getReserveCustomerNum()) && empty($found_person)):?>
                    <button onclick="showAlert()" class="staff_input_step step_next_never">未選択</button>
                    <!-- 検索して見つかったとき -->
                    <?php elseif($found_person !== null && $search_executed):?>
                    <input type="hidden" name="member_number" value="<?php echo $found_person['no']?>">
                    <input type="submit" name="customer_information" value="決定" class="staff_input_step step_next">
                    <!-- すでに保存されている -->
                    <?php elseif(!empty($reserve-> getReserveCustomerNum())):?>
                    <?php $reserver_number = $reserve-> getReserveCustomerNum();?>
                    <input type="hidden" name="member_number" value="<?php echo $reserver_number ?>">
                    <input type="submit" name="customer_information" value="決定" class="staff_input_step step_next">
                    <?php endif?>



                    <!-- なんかある -->
                  </div>

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





      </article>
    </main>


  </div>

  <script>
  window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
      location.reload();
    }
  });
  </script>

</body>

</html>