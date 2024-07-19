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

</head>

<body id="body">


  <?php

    require_once( dirname(__FILE__). '/class_input_reserve.php');
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');
    require_once( dirname(__FILE__). '/data/reserve_data.php');
    require_once( dirname(__FILE__). '/data/data_reserve.php');
 
session_start(); // セッションを開始


// test03.phpを通過したかをチェック
if (!isset($_SESSION['visited_test03'])) {
    echo "<p>不正なアクセスです。最初のページに移行します。</p>";
    echo "<script>
    setTimeout(function() {
        window.location.href = 'setting_index02.php';
    }, 2000);
    </script>";
    exit();
}


  // タイムアウト確認処理
  require_once( dirname(__FILE__). '/../parts/input_timeout.php');

// test01.phpを通過したことを示すフラグを設定
  $_SESSION['visited_test04'] = true;



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







// 05へ来たなら必ずセッションあるでしょ？
if (isset($_SESSION['input_reserve_card'])) {
    $reserve = unserialize($_SESSION['input_reserve_card']);


    // ここでバリデーションかく



} else {
  // セッションがないなんてありえない
    echo "<p>入力の手順が間違っています</p>";
    echo "<script>setTimeout(function() {window.location.href = 'setting_index02.php';}, 1000);</script>";
}

      
?>



  <!-- 予約日時 -->
  <?php
    $reservedaynum = $reserve->getReservePlayDay();
    // 年、月、日に分割
    $year = substr($reservedaynum, 0, 4);
    $month = substr($reservedaynum, 4, 2);
    $day = substr($reservedaynum, -2);
    
?>



  <!-- 通常なら$_getで予約番号を取得 -->
  <!-- sqlでその番号の予約データを取るべき？ -->

  <!-- 予約済みのインスタンス -->
  <!-- sqlをやっていないからとりあえずサンプル全部をインスタンスにしてる -->
  <!-- なにもない場合は空にしておくことが重要 -->
  <?php if(isset($reserved_cards) && $reserved_cards):?>
  <?php foreach( $reserved_cards as $reserved_card ):?>
  <?php $reserved_class_arrs[] = new Reservation($reserved_card)?>
  <!-- この先で他の人の予約を検索しているので一旦終了 -->
  <?php endforeach ?>
  <?php else:?>
  <?php $reserved_class_arrs = [] ;?>
  <?php endif?>

  <!-- ここで予約カードの特定終了 -->



  <!-- 指名した人の顧客ナンバーから画像特定 -->
  <?php $reserve_customer_name =$reserve->getReserveCustomerName();?>
  <!-- 新規客 -->
  <?php if($reserve->getReserveCustomerType()== 2):?>
  <?php $reserve_customer_img = 'img/user_face.png'; ?>
  <!-- 会員 -->
  <?php elseif($reserve->getReserveCustomerType() == 1):?>
  <?php foreach($people_basics as $people_basic) :?>
  <?php if($people_basic["no"] == $reserve->getReserveCustomerNum()):?>
  <?php $reserve_customer_img = $people_basic["icon"] ?>
  <?php break; ?>
  <?php endif; ?>
  <?php endforeach ;?>
  <?php endif?>

  <!-- 指名する人のプロフィール -->
  <!-- スタッフ番号 -->
  <?php $employee_number = $reserve->getReserveGirlNum(); ?>

  <?php foreach($sample_names as $sample_name):?>
  <?php if($sample_name[0] == $employee_number):?>
  <!-- 名前 -->
  <?php $employee_girl_name = $sample_name[1]?>
  <!-- 画像 -->
  <?php $employee_girl_img = $sample_name[3]?>
  <?php break ?>
  <?php endif?>
  <?php endforeach?>


  <!-- 予約しようとしているキャストの出勤時間を取りたい -->
  <!-- 02までで日付は持ってるしキャスト番号も持ってるから -->
  <!-- 本来はSQLでとるが -->
  <!-- 今回は先一週間の出勤から検索 -->



  <!-- 予約日時 -->
  <?php
  // 選択日時
  $today_num  = $reserve->getReservePlayDay();
  // 選択してるキャスト
  $select_cast_no = $reserve->getReserveGirlNum();

  // 日付を数字を文字列に変換
   $dayStr = (string)$today_num;

  // 年、月、日をそれぞれ抽出してフォーマット
  $year = substr($dayStr, 0, 4);
  $month = substr($dayStr, 4, 2);
  $day = substr($dayStr, 6, 2);
  
  // 日時合体
  $today_num = $year . '_' . $month . '_' . $day;
  $todayDatas = $inputData[$today_num] ?? null;

  foreach($todayDatas as $todayData){
    if($todayData['社員番号'] == $select_cast_no ){
      $want_reserve_cast = $todayData;
      break;
    }
  } 
  ?>




  <!--  -->



  <div id="wrapper">





    <p>予約</p>
    <?php
    // var_dumpでインスタンスの中身を見る
    echo "
    <pre>";
    var_dump($reserve);
    echo "</pre>";
    ?>

    <br>
    <br>
    <p>他の人の予約</p>
    <?php
    // var_dumpでインスタンスの中身を見る
    echo "
    <pre>";
    var_dump($reserved_cards_arrs);
    echo "</pre>";
    ?>


    <br>




    <main id="main">
      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <div class="demo demo3">
            <h1 class="heading"><span>予約の入力</span></h1>
          </div>


          <div class="progressbar_square">
            <div class="item active">STEP.1<br>お客様</div>
            <div class="item active">STEP.2<br>指名選択</div>
            <div class="item active">STEP.3<br>予約内容</div>
            <div class="item active">STEP.4<br>確認</div>
            <div class="item">STEP.5<br>完了</div>
          </div>

          <div class="request_wrap">
            <h2 class="input_card reserve_card_title">●予約カード</h2>
            <p class="reserve_title_day"><?php echo $year . "-" . $month . "-" . $day; ?></p>
            <div class="request_icon_wrap">
              <!-- 客 -->
              <div>
                <figure class="request_img">
                  <?php if($reserve->getReserveCustomerType()== 2):?>
                  <img src='../img/user_face.png' alt="">
                  <?php else:?>
                  <img src='../<?php echo $people_basics[$reserve->getReserveCustomerNum()]['icon']?>' alt="">
                  <?php endif?>
                </figure>
                <figcaption class="request_img_caption">
                  <?php echo $reserve->getReserveCustomerName();?>
                </figcaption>
              </div>
              <div class="arrow"></div>
              <div class="arrow-round"></div>
              <!-- 指名された人 -->
              <div>
                <figure class="request_img">
                  <img src='../<?php echo $employee_girl_img?>' alt="">
                </figure>
                <figcaption class="request_img_caption">
                  <?php echo $employee_girl_name; ?>
                </figcaption>
              </div>
            </div>

            <div class="work_time">
              <!-- スタート -->
              <p class="starttime"><?php echo $reserve->getReservePlaytime() ?></p>
              <span class="dli-caret-right"></span>
              <p class="endtime">
                <!-- エンド -->
                <?php echo $reserve->addTimeToStartTime($reserve->getReservePlayCourse()) ?>
              </p>
              <!-- コース -->
              <p class="coursetime"><?php echo $reserve->getReservePlayCourse(); ?>分</p>
            </div>


            <?php if($reserve->getReservePlaySpace() == 1):?>
            <div class='play_place'>
              <p class="select_play_place">ホテル</p>
              <p><?php echo $reserve->getReservePlayArea();?></p>
            </div>
            <?php elseif($reserve->getReservePlaySpace() == 2):?>
            <div class='play_place_house'>
              <p class="select_play_plase">■自宅</p>
              <div><?php echo $reserve->getReservePlayAdress();?></div>

            </div>
            <?php endif?>


            <div class='play_options'>
              <h2>オプション</h2>




              <?php if ($reserve->getReservePlayOption() !== null && $reserve->getReservePlayOption() !== '' && $reserve->getReservePlayOption() !== array()) :?>
              <?php $select_optons = $reserve->getReservePlayOption()?>
              <?php foreach($select_optons as $select_opton):?>
              <?php echo $options[$select_opton][1]?>
              <br>
              <?php endforeach?>
              <?php else:?>
              <p>選択なし</p>
              <?php endif?>

            </div>

          </div>

          <br><br><br><br><br><br><br><br><br><br>





        </div>


      </article>
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



    </main>


    <div class="alway_step_button_wrap fixed-footer">
      <a href="input_reserve_schedule.php" onclick="cancelPop(event)" class="staff_input_step step_back">キャンセル</a>
      <input type="submit" name="input_reserve_detail" value="決定" class="staff_input_step step_next">
    </div>

    </form>



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