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
  <!-- <link rel="stylesheet" type="text/css" href="../css/event.css" /> -->


  <!-- これinputのときだけ読み込む -->
  <!-- <script src="../js/newevent_set.js" defer></script> -->

  <script src="../js/error_set.js" defer></script>
  <script src="../js/text_check.js" defer></script>
  <script src="../js/text_count.js" defer></script>
  <script src="../js/setting.js" defer></script>
  <script src="../js/cancelpop.js" defer></script>
  <script src="../js/radio_display.js" defer></script>
  <script src="../js/input_reserve_date.js" defer></script>
  <script src="../js/make_reserve02.js" defer></script>


</head>

<body id="body">


  <?php
    require_once( dirname(__FILE__). '/../setting/class_input_reserve.php');
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');
    require_once( dirname(__FILE__). '/data/data_reserve.php');
    ?>


  <?php // セッションIDを比較
  session_start();


// test01.phpを通過したかをチェック
if (!isset($_SESSION['visited_test01'])) {
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

  // test02.phpを通過したことを示すフラグを設定
  $_SESSION['visited_test02'] = true;




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



// 02へ来たなら必ずセッションあるでしょ？
if (isset($_SESSION['input_reserve_card'])) {
    $reserve = unserialize($_SESSION['input_reserve_card']);


    // ここでバリデーションしてからOKなら０３へとばす
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["reserve_cast"])) {

     

        // 日にちが入っているか？
        if (isset($_POST['reserve_date_check'])) {
            $date = $_POST['reserve_date_check'];

            // 正規表現で YYYYMMDD フォーマットを確認
            if (preg_match('/^\d{8}$/', $date)) {
                // DateTimeクラスで日付の妥当性を確認
                $year = substr($date, 0, 4);
                $month = substr($date, 4, 2);
                $day = substr($date, 6, 2);

                if (checkdate($month, $day, $year)) {
                  // 予約日時入れる
                    $reserve->setReservePlayDay($date);
                } else {
                    $errmessage = "無効な日付です。";
                    exit();
                }
            } else {
                $errmessage = "日付の形式が正しくありません。";
                exit();
            }
        } else {
            $errmessage = "日付が送信されていません。";
            exit();
        }


        // 指名したキャストを見つける
        if (isset($_POST['reserve_select_girl'])) {
     

            $mnumber = (int)$_POST["reserve_select_girl"];

            if (!empty($mnumber) && is_numeric($mnumber) && floor($mnumber) == $mnumber) {
                // memberから検索
                foreach ($sample_names as $cast) {
                    if ((int)$cast[0] == $mnumber) {
                        $found_cast = $cast;
                        $castnum = $found_cast[0];
                        $reserve->setReserveGirlNum($castnum);
                        break;
                    }
                }
                // 次へ行く
                $_SESSION['input_reserve_card'] = serialize($reserve);
                header("Location: input_reserve_03.php");
                exit();
            } else {
                $errmessage = "入ってる番号がおかしい";
                $reserve->resetPropertyNull($reservePlayDay);
                exit();
            }
        } else {
            $errmessage = "指名するキャスト番号入ってない";
            $reserve->resetPropertyNull($reservePlayDay);
            exit();
        }



    }
} else {
  // セッションがないなんてありえない
    echo "<p>入力の手順が間違っています</p>";
    echo "<script>setTimeout(function() {window.location.href = 'setting_index02.php';}, 1000);</script>";
}

      
?>



  <div id="wrapper">
    <!-- header読み込み -->




    <main id="main">
      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <div class="demo demo3">
            <h1 class="heading"><span>予約の入力</span></h1>
          </div>


          <div class="progressbar_square">
            <div class="item active">STEP.1<br>お客様</div>
            <div class="item active">STEP.2<br>指名選択</div>
            <div class="item">STEP.3<br>予約内容</div>
            <div class="item">STEP.4<br>確認</div>
            <div class="item">STEP.5<br>完了</div>
          </div>




          <form action="input_reserve_02.php" method="post">


            <div class="staff_input_wrap">
              <h2>予約者<?php if($reserve -> getReserveCustomerType() == 2){echo '(新規)';}?></h2>


              <figure class="request_img">

                <?php if($reserve->getReserveCustomerType()== 2):?>
                <img src='../img/user_face.png' alt="">
                <?php else:?>
                <img src='../<?php echo $people_basics[$reserve->getReserveCustomerNum()]['icon']?>' alt="">
                <?php endif?>
              </figure>
              <figcaption class="request_img_caption">

                <?php echo $reserve->getReserveCustomerName() ?>
              </figcaption>
            </div>


            <section class="input_area_wrap">
              <h2>予約日時</h2>
              <ul id="select_days">

                <?php for($i = 0; $i < 8; $i++): ?>
                <?php $dateId = $today->format('Ymd'); ?>

                <li class="select_btn schedule_btn">
                  <!-- 初日 -->
                  <input type="radio" name="reserve_date_check" class="input_reserve_day"
                    id="<?php echo $dateId; ?>_day" data-day="<?php echo $dateId; ?>" value="<?php echo $dateId; ?>"
                    <?php echo $i == 0 ? 'checked' : ''; ?>>

                  <!-- 曜日で背景色を変える -->
                  <?php
                  $week = '';
                  switch ($today->format("w")) {
                  case 0:
                  $week = "sun";
                  break;
                  case 6:
                  $week = "sat";
                  break;
                  default:
                  $week = "weekday";
                  break;
                }
                ?>
                  <!-- ーーーー背景色ここまで-------- -->

                  <label for="<?php echo $dateId; ?>_day" class="<?php echo $week?>">
                    <?php echo "{$today->format('m/d')} {$week_name[$today->format('w')]}"; ?>
                  </label>
                </li>

                <?php $today->modify('+1 day'); ?>
                <?php endfor; ?>

              </ul>
            </section>
            <!-- radioここまでーーーーーーーーーーーーーーーーーーー -->

            <?php $day_of_schedule = new DateTime(); ?>
            <?php for ($i = 1; $i <= 8; $i++): ?>
            <?php $dateId = $day_of_schedule->format('Ymd'); ?>
            <?php $date_arr = $day_of_schedule->format('Y_m_d'); ?>


            <!-- sectionーーーーーーーーーーーーーーー -->

            <section id="day_<?php echo $dateId; ?>" class="day_section input_area_wrap"
              <?php echo $i == 1 ? '' : 'style="display:none;"'; ?>>
              <h2>出勤者</h2>
              <!-- 連想配列から今日の日付に対応するデータを取得 -->
              <?php if (array_key_exists($date_arr, $inputData)): ?>
              <?php $selectedArray = $inputData[$date_arr]; ?>
              <!-- その日出勤するスタッフのフタッフ番号配列 -->
              <?php $come_to_work_staffs =array();?>


              <?php 
             // ひらがなのCollatorオブジェクトを作成
            $collator = new Collator('ja_JP');
            // ひらがなを比較してソート
            usort($sample_names, function ($a, $b) use ($collator) {
            return $collator->compare($a[2], $b[2]);
            });
             $current_row = '';
            ?>

              <!-- 選んだ日程の出勤者配列から各出勤者 -->
              <?php foreach($selectedArray as $come_to_work): ?>

              <?php foreach($sample_names as $sample_name): ?>
              <?php if($sample_name[0] == $come_to_work['社員番号']): ?>
              <?php $come_to_work_staffs[] = $sample_name; ?>
              <?php endif?>
              <?php endforeach?>
              <?php endforeach?>

              <?php
            // 名前の順で揃えます
            usort($come_to_work_staffs, 'compareNames');
            ?>


              <!-- 名前を行ごとにまとめて表示 -->
              <?php foreach ($come_to_work_staffs as $person):?>

              <?php $name = $person[2];
              $name_k =$person[1];
              $girl_image = $person[3];
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

                  <input type="radio" name="reserve_select_girl" value="<?php echo $person[0]?>"
                    id="day_<?php echo $dateId; ?>_num<?php echo $person[0]?>" class="image_radio_select">

                  <!-- <div class="image-container"> -->
                  <label for="day_<?php echo $dateId; ?>_num<?php echo $person[0]?>" class="select_staff_input_content">
                    <figure>
                      <img src='../<?php echo $girl_image?>' alt='' class="select_staff_photo">
                    </figure>
                    <figcaption class="girl_name">
                      <?php echo $name_k ?>
                    </figcaption>
                    <div class="overlay"><span class="overlay-text">選択中</span></div>
                    <!-- </div> -->
                  </label>
                </li>

                <?php endforeach ?>

                <!-- 最後の行の終了タグ -->
                <?php if ($current_row !== '') {
              echo "</ul>";}
            ?>

            </section>

            <?php else: ?>
            <section class="reserve_select_staff_wrap">
              <ul class="select_staff_wrap">
                <li>
                  <p style="margin-left: 1rem;">出勤予定者がいません</p>
                </li>
              </ul>
            </section>


            </section>
            <?php endif; ?>

            </section>

            <?php $day_of_schedule->modify('+1 day'); ?>
            <?php endfor; ?>



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
      <input type="submit" name="reserve_cast" value="決定" class="staff_input_step step_next">
    </div>
    </form>



  </div>



  <!-- ページ読み込み時にPOSTデータをクリアするためのJavaScript -->
  <script>
  window.onload = function() {
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  }
  </script>
</body>



</html>