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
  <script src="../js/form_permission.js" defer></script>
  <script src="../js/show_modal.js" defer></script>
</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/../data.php');
    require_once( dirname(__FILE__). '/reserve_data.php');
    ?>


    <!-- 得たデータが例えば -->
    <?php
      $reserve_requests = [
      [
        "ユーザー番号" => 1,
        "予約者名" => "田中大介",
        "電話番号" => "08012345678",
        "メールアドレス" => "daisuke.tanaka@example.com",
        "指名社員番号" => 0,
        "予約希望日" => "2023-09-15",
        "開始時間" => "09:00:00",
        "プレイタイム" => 120,
        "場所種類" => 0,
        "場所位置" => "松戸",
        "オプション1" => true,
        "オプション2" => false,
        "オプション3" => true,
        "オプション4" => false,
        "オプション5" => false,
        "オプション6" => false,
        "コスプレ" => 1,
        "コメント" => "いつでも大丈夫ですわー",
        "予約no" => 10,
        "承認" => 0
    ],
    [
        "ユーザー番号" => 6,
        "予約者名" => "寺田学",
        "電話番号" => "09023456778",
        "メールアドレス" => "wawawa@gmail.com",
        "指名社員番号" => 4,
        "予約希望日" => "2023-09-10",
        "開始時間" => "11:00:00",
        "プレイタイム" => 90,
        "場所種類" => 1,
        "場所位置" => "新松戸５−１−４",
        "オプション1" => false,
        "オプション2" => false,
        "オプション3" => true,
        "オプション4" => false,
        "オプション5" => false,
        "オプション6" => false,
        "コスプレ" => 5,
        "コメント" => "",
        "予約no" => 11,
        "承認" => 0
      ],
    [
        "ユーザー番号" => false,
        "予約者名" => "森暢平",
        "電話番号" => "09041234567",
        "メールアドレス" => "tekeke@gmail.com",
        "指名社員番号" => 5,
        "予約希望日" => "2023-09-10",
        "開始時間" => "11:00:00",
        "プレイタイム" => 90,
        "場所種類" => 1,
        "場所位置" => "新松戸５−１−４",
        "オプション1" => false,
        "オプション2" => false,
        "オプション3" => true,
        "オプション4" => false,
        "オプション5" => false,
        "オプション6" => false,
        "コスプレ" => 5,
        "コメント" => "",
        "予約no" => 11,
        "承認" => 0
      ]
    ];
    

    ?>
    <!-- 通常なら$_getで予約番号を取得 -->
    <!-- sqlでその番号の予約データを取るべき？ -->



    <!-- 予約希望者のインスタンス -->
    <?php foreach( $reserve_requests as $reserve_request ):?>
    <?php $reserve_class_arrs[] = new Reservation($reserve_request)?>
    <?php endforeach ?>


    <!-- 予約済みのインスタンス -->
    <?php foreach( $reserved_cards as $reserved_card ):?>
    <?php $reserved_class_arrs[] = new Reservation($reserved_card)?>
    <?php endforeach ?>

    <!-- とりあえずsampleではインスタンス配列から見つける -->

    <!-- クリックされたのは誰のどの予約か？特定 -->
    <?php foreach($reserve_class_arrs as $reserve_class_arr) :?>
    <?php if($reserve_class_arr -> getReservationNumber() == $_GET['selected_reserve_num']):?>
    <?php $reserve_card = $reserve_class_arr ?>
    <?php break ?>
    <?php endif?>
    <?php endforeach ?>


    <!-- 予約しようとしているキャストの出勤時間を取りたい -->
    <!-- 本来なら予約したい日付の出勤scheduleをとる -->
    <!-- その中から予約したいキャストの出勤時間をとる -->

    <?php foreach($scheduleArray as $schedule ):?>
    <?php if($schedule['社員番号'] == $reserve_card->getEmployeeNumber()):?>
    <?php $want_reserve_cast =  $schedule?>
    <?php break ?>
    <?php endif?>
    <?php endforeach?>

    <!-- 他に同じ日に同じ人を予約している人はだれ？ -->
    <?php if(isset($reserve_card)):?>
    <?php  echo "ある"?>
    <?php endif ?>

    <?php $vars = get_object_vars($reserve_card) ?>
    <?php print_r($vars)?>
    <?php echo $reserve_card->getEmployeeNumber()?>
    <?php echo $reserve_card->getReserverName()?>


    <?php foreach($reserved_class_arrs as $reserved_class_arr) :?>
    <?php if($reserved_class_arr -> getReservationNumber() == $reserve_card->getEmployeeNumber()):?>
    <?php $reserved_cards_arr[] = $reserved_class_arr ?>
    <?php else:?>
    <?php  $reserved_cards_arr[] = "入っていない";?>
    <?php endif?>
    <?php endforeach ?>

    <!-- クリックされたインスタンス $reserve_card -->
    <!-- 同じ日の同じ子を予約した人たちのインスタンス配列 $reserved_cards_arr-->

    <main id="main">
      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      ?>

      <!-- キャンセルボタンが押された場合 -->
      <!-- 変なところから来ていないか？確認 -->
      <?php
      if (isset($_POST['cancel'])) {
        session_start(); // セッションを開始
        // localStorageの削除
        echo "<script>localStorage.clear();</script>";
        session_unset(); // セッションの変数をすべて削除
        session_destroy(); // セッションを破棄
        header("Location: setting_index02.php"); // top.htmlにリダイレクト
        exit; // スクリプトの実行を終了
      }
    
      // ここから本格的にスタート
    
      //バリデーション読み込み
      require_once('date_validate.php');

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


        // 確認（confirm）ページ/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
      } else if (isset($_POST['confirm']) && $_POST['confirm']) {
        



        // 日付
        $request_day = new Check_date($_POST['request_day']);
        // 入っているものがあっているか？
        if($request_day -> is_this_date()){
          $_SESSION['application_date'] = $request_day -> get_input_date();
        }else{
          $errmessage[] = $request_day->get_err_inclass();
          $_SESSION['application_date'] = '';
           $errmessage[] = $request_day -> get_input_date();
        }

        // 承認する番号
        if(isset($_POST["employee"]) && is_array($_POST['employee'])){
          foreach ($_POST['employee'] as $employee_num) {
           if(is_numeric($employee_num)){
            $employee_numbers[] = (int)$employee_num;
            $_SESSION['employee_numbers'] = $employee_numbers;
          }else{
          $_SESSION['employee_numbers']='';
          break;
          }
        }
        $_SESSION['employee_numbers'] = $employee_numbers;
        }else{
          $_SESSION['employee_numbers']='';
          $errmessage[] = '番号がないか配列になってない';
        }

    

        // モードチェンジ　エラーしてたらモード変わらない---------------------
        if ($errmessage) {
          $mode = 'input';
        } else {
          $mode = 'confirm';
        }

        // 送信モード/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_

      } else if (isset($_POST['send']) && $_POST['send']) {

// 出勤番号がポストされてくる「名前」決めてないので空白
    if (isset($_POST[""])) {
      // jsonなのでデコード
        $decodenum = json_decode($_POST[""]);
        
        if ($decodenum !== null) {
            // decodenum 配列を処理する
 

      // データベースコネクト
      require_once('db_connect.php');
      try {
      $new_post_title = $_SESSION['new_post_title']['title'];

      $new_post_title = htmlspecialchars($new_post_title, ENT_QUOTES, 'UTF-8');


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
            echo "無効なデータが送信されました。";
        }
    } else {
        echo "データが送信されていません。";
    }


      } else {

      // 初めて入ったとき/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/

      //承認する人

      // $_SESSION['new_post_header']['reserve'];

      }


      ?>
      <!------------------------------------
        html
      -------------------------------------->

      <!-- 入力画面 -->
      <?php if ($mode == 'input') : ?>

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

          <style>
          table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
          }

          th,
          td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
          }

          .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
          }

          .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
          }
          </style>

          <h1 id="calendar_title">承認しますか？</h1>
          <?php foreach($reserved_class_arrs as $reserved_class_arr) :?>
          <?php echo $reserved_class_arr->getReserverName();?>
          <?php endforeach?>
          <?php echo $_GET['selected_reserve_num'];?>
          <?php echo $reserve_card -> getReservationDate() ?>
          <?php
          $startTime = strtotime("09:00:00");
          $endTime = strtotime("21:00:00");
          $timeIncrement = 1800; // 30分
          ?>


          <table>
            <!-- ヘッダー -->
            <tr>
              <th>時間</th>
              <th>予約希望</th>
              <!-- 選択されたキャストの出勤状況 -->
              <th><?php echo $want_reserve_cast['社員番号']?>出勤</th>
              <!-- 選択されたキャストの予約済みの人全員 -->
              <?php foreach($reserved_class_arrs as $reserved_class_arr) :?>
              <th>
                <?php echo $reserved_class_arr->getReserverName();?>
              </th>
              <?php endforeach ?>
            </tr>


            <!-- 時間毎の行を生成 -->
            <?php for ($time = $startTime; $time <= $endTime; $time +=$timeIncrement):?>
            <tr>
              <th>
                <?php echo date("H:i", $time)?>
              </th>
              <!-- 予約希望時間 -->
              <!-- 予約開始 -->
              <?php $reserve_start_time = strtotime($reserve_card -> getStartTime())?>
              <!-- 予約終了時間 -->
              <?php $reserve_end_time = strtotime($reserve_card -> addTimeToStartTime($reserve_card->getPlayTime()))?>
              <!-- 予約時間より今の時間が遅くて、終わり時間より早ければバツを書く -->
              <?php if ($reserve_start_time<=$time && $time < $reserve_end_time):?>
              <td style="color: red;">★</td>
              <?php else:?>
              <!-- 予約時間がなければ空白 -->
              <td></td>
              <?php endif?>
              <!-- 出勤時間 -->
              <?php $work_start_time = strtotime($want_reserve_cast['出勤時間'])?>
              <?php $work_end_tiome = strtotime($want_reserve_cast['退勤時間'])?>
              <?php if( $work_start_time <= $time && $time <= $work_end_tiome ):?>
              <td style="background-color: #bfbfe3;"></td>
              <?php else:?>
              <!-- 予約時間がなければ空白 -->
              <td>
              </td>
              <?php endif?>


              <!-- ここからが予約済み -->
              <?php foreach ($reserved_class_arrs as $reserved_class_arr) :?>
              <!-- 予約開始時間 -->
              <?php $startTimeSlot = strtotime($reserved_class_arr -> getStartTime())?>
              <!-- 予約終了時間 -->
              <?php $endTimeSlot = strtotime($reserved_class_arr -> addTimeToStartTime($reserved_class_arr->getPlayTime()))?>
              <!-- 予約時間より今の時間が遅くて、終わり時間より早ければバツを書く -->
              <?php if ($startTimeSlot<=$time && $time < $endTimeSlot):?>
              <td>
                <?php echo
                 '<a href="#" onclick="showModal
                 (
                   \'' . $reserved_class_arr->getReservationDate() . '\' ,
                   \'' . date("H:i:s", $time). '\',
                   \'' . $reserved_class_arr->getPlaytime(). '\',
                   \'' . $reserved_class_arr->getReserverName(). '\'
                 )"
                 >
                ✕</a>';?>
              </td>
              <?php else:?>
              <!-- 予約時間がなければ空白 -->
              <td></td>
              <?php endif?>
              <?php endforeach?>
            </tr>
            <?php endfor ?>

          </table>

          <div id="myModal" class="modal">
            <div class="modal-content">
              <span id="closeModal" style="float: right; cursor: pointer;">&times;</span>
              <p id="modalText">ここに内容を表示</p>
            </div>
          </div>



          <form method="POST">
            <?php foreach($reserve_class_arrs as $reserve_class_arr):?>
            <label>
              <input type="checkbox" name="employee[]" value='<?php echo $reserve_class_arr->getReservationNumber();?>'
                class="request_card">
              <!-- 指名する人 -->
              <?php $employee_number = $reserve_class_arr->getEmployeeNumber(); ?>
              <!-- 予約予定日 -->
              <?php $reserve_title_day = $reserve_class_arr->getReservationDate();?>
              <!-- 希望開始時間 -->
              <?php $attendance_time = date("H:i",strtotime($reserve_class_arr->getStartTime())); ?>
              <!-- 指名した人の顧客ナンバー -->
              <?php $reserve_customer_name =$reserve_class_arr->getUserNumber();?>
              <?php foreach($people_basics as $people_basic) :?>
              <?php if($people_basic["no"] == $reserve_customer_name):?>
              <?php $reserve_customer_img = $people_basic["icon"] ?>
              <?php break; ?>
              <?php endif; ?>
              <?php endforeach ;?>

              <!-- 指名した人を特定 -->
              <?php foreach($sample_names as $sample_name):?>
              <?php if($sample_name[0] == $employee_number):?>

              <div class="request_wrap">
                <p class="reserve_title_day"><?php echo $reserve_title_day ?></p>
                <div class="request_icon_wrap">
                  <!-- 客 -->
                  <div>
                    <figure class="request_img">
                      <img src='../<?php echo $reserve_customer_img?>' alt="">
                    </figure>
                    <figcaption class="request_img_caption">
                      <?php echo $reserve_class_arr->getReserverName();?>
                    </figcaption>
                  </div>
                  <div class="arrow">
                  </div>
                  <!-- 指名された人 -->
                  <div>
                    <figure class="request_img">
                      <img src='../<?php echo $sample_name[2]?>' alt="">
                    </figure>
                    <figcaption class="request_img_caption">
                      <?php echo $sample_name[1] ?>
                    </figcaption>
                  </div>


                </div>
                <div class="work_time">
                  <p>開始<span><?php echo $attendance_time ?></span></p>
                  <p>終了<span><?php echo $reserve_class_arr->addTimeToStartTime($reserve_class_arr->getPlayTime()) ?>
                  </p>
                  <p><span><?php echo $reserve_class_arr->getPlayTime(); ?>分</p>

                </div>
              </div>
              <?php endif?>
              <?php endforeach ?>
            </label>
            <?php endforeach ?>
            <input type="hidden" name="request_day"
              value="<?php echo htmlspecialchars($_GET['selected_date'], ENT_QUOTES, 'UTF-8'); ?>">
            <div class="all_btn_wrap">
              <input type="submit" disabled id="submit_button" name="confirm" value="確認">

              <div class="cancel_btn_wrap">
                <a href="approval_schedule.php" class="setting_cancel">キャンセル</a>
              </div>
            </div>
          </form>
        </div>

      </article>



      <!-- 確認画面 -->
      <?php elseif ($mode == 'confirm') : ?>


      <h2 class="confirm_title ">
        以下の申請を承認します。
      </h2>





      <?php foreach ($sample_requests as $sample_request) : ?>

      <?php if (in_array($sample_request['出勤no'], $_SESSION['employee_numbers'])) : ?>
      <?php $work_oks[] = $sample_request?>
      <?php endif; ?>

      <?php endforeach; ?>



      <div class="request_wrap ">
        <!-- 日付表示 -->
        <h3 class="application_date_title"><?php echo $_SESSION['application_date']?></h3>

        <?php foreach($work_oks as $work_ok):?>
        <?php $employee_number = $work_ok["社員番号"];?>
        <?php $attendance_name = ""; ?>

        <!-- 社員番号に対応する名前を$sample_namesから検索 -->
        <?php foreach ($sample_names as $sample_name):?>
        <?php if ($sample_name[0] === $employee_number) :?>
        <?php $attendance_name = $sample_name[1] ?>
        <!-- 名前が見つかったらループを終了 -->
        <?php break ?>
        <?php endif ?>
        <?php endforeach ?>
        <div class="work_time">
          <p><?php echo $attendance_name ?></p>
          <?php echo $work_ok['出勤時間'];?>
          <p>→</p>
          <?php echo $work_ok['退勤時間'];?>
        </div>
        <?php endforeach ?>
      </div>

      <form action="./approval_schedule_done.php" method="POST">

        <!-- 送るデータ -->
        <!-- 承認する日付　いらないかも -->
        <input type="hidden" name="" value="<?php echo $_SESSION['application_date']?>">
        <!-- 承認する出勤カード番号 -->
        <input type="hidden" name="" value="<?php echo json_encode($_SESSION['employee_numbers'])?>">

        <div class="send_btn_wrap">
          <input type="submit" class="back_btn" name="back" value="戻る">
          <input type="submit" class="send_btn" name="send" value="承認">
        </div>

      </form>


      <!-- 送信画面 -->
      <?php elseif ($mode == 'send') : ?>

      <?php echo $_SESSION['application_date']?>
      <!-- 承認する出勤カード番号 -->
      <?php echo $_SESSION['employee_numbers']?>



      <?php else : ?>
      <h3>エラーしてます</h3>


      <?php endif; ?>


      <br><br><br><br><br><br><br><br>
      <p>下が確認できないのでスペース</p>
      <?php  echo $mode ;?><br>
      <br><br><br><br><br><br><br><br>

    </main>


  </div>
</body>

</html>