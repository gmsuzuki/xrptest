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
  <script src="../js/step_bar.js" defer></script>


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
    require_once( dirname(__FILE__). '/../setting/class_input_reserve.php');


// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

// スタッフカプセル化
    require_once( dirname(__FILE__). '/data/girl_data.php');
    require_once( dirname(__FILE__). '/class/girl_class.php');
    require_once( dirname(__FILE__). '/data/staff_list_sort.php');

    // profile
  foreach($sample_names as $sample_name){
    $staffList[] = new girlProfilelManager($sample_name);
  }

  // 画像
  foreach($sample_pics  as $sample_pic ){
    $staffPic[] = new girlImageManager($sample_pic['girlNumber'],$sample_pic);
  }

// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー



session_start(); // セッションを開始

// セッションIDを保存していない場合、現在のセッションIDを保存
if (!isset($_SESSION['session_id'])) {
    $_SESSION['session_id'] = session_id();
}
  // タイムアウト確認処理
  require_once( dirname(__FILE__). '/../parts/input_timeout.php');

// test01.phpを通過したことを示すフラグを設定
  $_SESSION['visited_attendance01'] = true;



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
  if(!isset($_SESSION['select_girl']) || empty($_SESSION['select_girl'])){
  // 初めてのときはインスタンスない
  $_SESSION['select_girl'] = '';
  $_SESSION['input_staff'] = '';

  }elseif(isset($_SESSION['input_attendance_card']) || !empty($_SESSION['input_attendance_card'])){
  $attendance = unserialize($_SESSION['input_attendance_card']);

// バックで戻ってきた

if($_SESSION['visited_attendance02'] == true){
  $_SESSION['visited_attendance02']= false;


};

  }


  

  // スタッフを選択して次へ
  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["reserve_select_girl"])){


  if ($_POST["reserve_select_girl"] !== '' && $_POST["reserve_select_girl"] !== null) {
    $mnumber = (int)$_POST["reserve_select_girl"];
// スタッフ番号は整数ですか？
    if (is_numeric($mnumber) && floor($mnumber) == $mnumber){

                // memberから検索
                foreach ($staffList as $cast) {
                    if ((int)$cast -> getGirlNumber() == $mnumber) {
                        $found_cast = $cast;
                        $castnum = $found_cast -> getGirlNumber();
                        $_SESSION['select_girl'] = $castnum;
                        // 予約入力者タイプ スタッフ入れた
                        $_SESSION['input_staff'] = 1;
                        break;
                    }
                }
                // 次へ行く
                if(isset($_SESSION['input_attendance_card'])){
                $_SESSION['input_attendance_card'] = serialize($attendance);
                }
                header("Location: input_attendance_02.php");
                exit();
            } else {
                $errmessage = "入ってる番号がおかしい";
                $_SESSION['select_girl'] ='';
                echo $errmessage;
                exit();
            }
        } else {
            $errmessage = "指名するキャスト番号入ってない";
            $_SESSION['select_girl'] ='';
            echo $errmessage;
            exit();
        }

      }


  ?>





  <div id="wrapper">

    <main id="main">
      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <div class="demo demo3">
            <h1 class="heading"><span>出勤の入力</span></h1>
          </div>

          <div class="progressbar_square">
            <div class="item active">STEP.1<br>出勤者</div>
            <div class="item">STEP.2<br>日時選択</div>
            <div class="item">STEP.3<br>確認</div>
            <div class="item">STEP.4<br>完了</div>
            <div class="item">STEP.5<br>完了</div>
          </div>





          <h2 class="input_attendance_title">出勤者選択</h2>


          <?php 
             // ひらがなのCollatorオブジェクトを作成
            $collator = new Collator('ja_JP');
            // ひらがなを比較してソート
            usort($staffList, function ($a, $b) use ($collator) {
            return $collator->compare($a -> getKanaName(), $b -> getKanaName());
            });
             $current_row = '';
            ?>

          <?php
            // 名前の順で揃えます
            // usort($sample_names , 'compareNames');
            ?>


          <form id="select_girl_of_attendance" action="input_attendance_01.php" method="post">
            <!-- 名前を行ごとにまとめて表示 -->
            <?php foreach ($staffList as $person):?>

            <?php $name = $person -> getKanaName();
              $name_k =$person -> getGirlName();

              $number = $person -> getGirlNumber();
              foreach($staffPic as $pic){
                if($pic -> getGirlNumber() == $number){
                  $girl_image = $pic -> getGirlImage01();      
                }
              }


            
              $first_char = mb_substr($name, 0, 1);
              ?>
            <?php if ($first_char !== $current_row):?>

            <!-- もうそのカナに誰もいなければ閉じる -->
            <?php if($current_row !== ''):?>
            </ul>
            </section>

            <?php endif ?>




            <?php $current_row = $first_char?>
            <section class="reserve_select_staff_wrap">
              <h3 class="kana_title"><?php echo $current_row ?></h3>


              <ul class="select_staff_wrap">
                <?php endif?>

                <li class=" staff_select_input">

                  <input type="radio" name="reserve_select_girl" value="<?php echo $person->getGirlNumber()?>"
                    id="day_<?php echo $dateId; ?>_num<?php echo $person->getGirlNumber()?>" class="image_radio_select"
                    onclick="document.getElementById('select_girl_of_attendance').submit();">

                  <!-- <div class="image-container"> -->
                  <label for="day_<?php echo $dateId; ?>_num<?php echo $person->getGirlNumber()?>"
                    class="select_staff_input_content">
                    <figure>
                      <img src='../<?php echo $girl_image?>' alt='' class="select_staff_photo">
                    </figure>
                    <figcaption class="girl_name">
                      <?php echo $name_k ?>
                    </figcaption>
                    <!-- </div> -->
                  </label>
                </li>

                <?php endforeach ?>

                <!-- 最後の行の終了タグ -->
                <?php if ($current_row !== ''): ?>
              </ul>
            </section>
            <?php endif ?>
          </form>

          <div class="input_attendance_cancel">
            <a href="input_reserve_schedule.php" onclick="cancelPop(event)" class="staff_input_step step_back">キャンセル</a>
          </div>
        </div>



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