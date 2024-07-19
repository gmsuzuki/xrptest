<?php
//  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // $url = 'complete.php';
      // header('Location:' . $url );
      // exit;
    // }




// 変数の初期化
$page_flag = 0;

if( !empty($_POST['btn_confirm']) ) {
          
    session_start();
    // 二重送信防止用トークンの発行
    $token = uniqid('', true);
    //トークンをセッション変数にセット
    $_SESSION['token'] = $token;
	$page_flag = 1;
          

} elseif( !empty($_POST['btn_submit']) ) {


    session_start();
    // POSTされたトークンを取得
    $token = isset($_POST["token"]) ? $_POST["token"] : "";
    // セッション変数のトークンを取得
    $session_token = isset($_SESSION["token"]) ? $_SESSION["token"] : "";
    // セッション変数のトークンを削除
    unset($_SESSION["token"]);
	
  $page_flag = 2;

}
?>


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
  <script src="../js/text_count.js" defer></script>
  <script src="../js/cancelpop.js" defer></script>
</head>


<body id="body">

  <!-- ローディング画面 -->

  <!-- コンテンツ部分 -->

  <div id="wrapper">


    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data//data.php');
    require_once( dirname(__FILE__). '/data/reserve_data.php');
    ?>
    <!------------------>





    <!-- 今回の予約承認希望者全員のインスタンス -->
    <?php foreach( $reserve_requests as $reserve_request ):?>
    <?php $reserve_class_arrs[] = new Reservation($reserve_request)?>
    <?php endforeach ?>


    <!-- クリックされたのは誰のどの予約か？特定 -->
    <?php foreach($reserve_class_arrs as $reserve_class_arr) :?>
    <?php if($reserve_class_arr -> getReservationNumber() == $_GET['selected_reserve_num']):?>
    <?php $reserve_card = $reserve_class_arr ?>
    <?php break ?>
    <?php endif?>
    <?php endforeach ?>


    <!-- お客のメールアドレス -->
    <?php $e_customer_mail = $reserve_card->getEmail()?>
    <!-- お客様の名前 -->
    <?php $e_name = $reserve_card->getReserverName()?>



    <!-- 予約カード -->
    <!-- $reserve_card -->
    <!-- 予約された女性の名前 -->
    <?php foreach($sample_names as $sample_name):?>
    <?php if($sample_name[0] === $reserve_card->getEmployeeNumber()):?>
    <?php $employee_girl = $sample_name; ?>
    <?php $employee_girl_name = $sample_name[1]; ?>
    <?php break ?>
    <?php endif?>
    <?php endforeach ?>




    <main id="main">

      <article id="reserve" class="under_space">
        <div class="content_wrapper">
          <h1 id="calendar_title">お客様へのメール</h1>


          <!-- 確認画面 -->

          <?php if( $page_flag === 1 ): ?>
          <!-- セッションにトークン入れる -->

          <p>メールする内容はこれでよろしいか？</p>

          <section class="mail_confirmation">
            <h2 class="mail_tag">■件名</h2>
            <p class="mail_body"><?php echo $_POST['mail_title']?></p>

            <h3 class="mail_tag">■本文</h3>
            <p class="mail_body"><?php echo nl2br($_POST['request'])?></p>

          </section>
          <form method="post" id="mail_form" name="form1" action="" onsubmit="return verifyContactForm();">

            <!-- 題名 -->
            <input type="hidden" name="send_mail_subject" value="<?php echo $_POST['mail_title']; ?>">

            <!-- 本文 -->
            本文をどうもらうのか？

            <input type="hidden" name="send_mail_body" value="<?php echo $_POST['request']; ?>">

            メールアドレスいる？
            <input type="hidden" name="customer_mail" value="<?php echo $_POST['customer_mail']; ?>">

            <div class="mail_button_wrap">
              <button onclick="history.back()" class="mail_cancel">戻る</button>
              <input type="submit" name="btn_submit" value="送信" id="mail_send">
            </div>

        </div>


        <!-- セッション送る -->
        <input type="hidden" name="token" value="<?php echo $token;?>">
        </form>
  </div>
  <!-- 確認画面ここまで -->


  <!-- 送信済み -->
  <?php elseif( $page_flag === 2 ): ?>
  <?php
          // POSTされたトークンとセッション変数のトークンの比較
          if($token != "" && $token == $session_token) {
          //エスケープ処理やデータチェックを行う関数のファイルの読み込み
            require '../libs/validation.php';
 
          //POSTされたデータを変数に格納（値の初期化とデータの整形：前後にあるホワイトスペースを削除）
          // 題名
          $e_subject = trim( filter_input(INPUT_POST, 'send_mail_subject') );
          // 本文
          $e_send_mail_body = trim( filter_input(INPUT_POST, 'send_mail_body') );

          //送信ボタンが押された場合の処理
          if (isset($_POST['btn_submit'])) {

          //POSTされたデータをチェック
          $_POST = checkInput( $_POST );

          //エラーメッセージを保存する配列の初期化
          $errors = array();
          //値の検証
          // 名前
          if ( $e_subject == '' ) {
          $errors['$e_subject'] = '*件名がありません。';
          //制御文字でないことと文字数をチェック
          } elseif ( preg_match( '/\A[[:^cntrl:]]{1,30}\z/u', $e_subject ) == 0 ) {
          $errors['e_subject'] = '*件名は30文字以内にしましょう。';
          }

          // 本文
          if ( $e_send_mail_body !== '' && preg_match( '/\A[\r\n\t[:^cntrl:]]{1,1000}\z/u', $e_send_mail_body ) == 0 ) {
          $errors['e_send_mail_body'] = '本文は1000文字以内で制御文字は使えません';
          } 
        
          //エラーがなく且つ POST でのリクエストの場合
          if (empty($errors) && $_SERVER['REQUEST_METHOD']==='POST') {      

          //メールアドレス等を記述したファイルの読み込み
          require '../libs/maildata.php';
          //メール本文の組み立て
          $subject = h($e_subject);
          $mail_body = $e_send_mail_body;




          //--------sendmail------------
          //メールの宛先（名前<メールアドレス> の形式）。値は mailvars.php に記載
            // $mailTo = mb_encode_mimeheader($e_customer_mail) ."<" . MAIL_TO. ">" ;
            $mailTo = "gmclips124@gmail.com";
             //Return-Pathに指定するメールアドレス
              $returnMail=MAIL_RETURN_PATH; 
              // //mbstringの日本語設定
              // mb_language( 'ja' ); mb_internal_encoding( 'UTF-8' );
               //送信者情報（From ヘッダー）の設定
              // $header="From: " . mb_encode_mimeheader($e_name) ."<" . MAIL_FROM. ">\n" ;

              // $header = "From: sender@sv1.php.starfree.ne.jp\r\n";
              // $header .= "MIME-Version: 1.0\r\n";
              // $header .= "Content-type: text/plain; charset=utf-8\r\n";

$header = "From: sender@sv1.php.starfree.ne.jp\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/plain; charset=utf-8\r\n";



              // $header .="Cc: ". mb_encode_mimeheader(MAIL_CC_NAME) ."<" . MAIL_CC.">\n";
              // $header .= "Bcc: <" . MAIL_BCC.">";
                //メールの送信
                //メールの送信結果を変数に代入
                if ( ini_get( 'safe_mode' ) ) {
                //セーフモードがOnの場合は第5引数が使えない
                $result = mb_send_mail( $mailTo, $subject, $mail_body, $header );
                } else {
                $result = mb_send_mail( $mailTo, $subject, $mail_body, $header, '-f' . $returnMail );
                }

                //メール送信の結果判定
                if ( $result ) {
                  
                  //自動返信メール
                  //ヘッダー情報
                  $ar_header = "MIME-Version: 1.0\n";
                  $ar_header .= "From: " . mb_encode_mimeheader( AUTO_REPLY_NAME ) . " <" . MAIL_TO . ">\n";
                  $ar_header .= "Reply-To: " . mb_encode_mimeheader( AUTO_REPLY_NAME ) . " <" . MAIL_TO . ">\n";
                  //件名
                  $ar_subject = 'お客様へ連絡しました報告メール';
                  //本文
                  $ar_body = $e_name." 様のご予約が受け付けられない旨を連絡しました。\n\n";
                  $ar_body .= "返信時間：" . date("Y年m月d日 D H時i分") . "\n\n";
                  $ar_body .= $mail_body;
      


                   
                //自動返信メールを送信（送信結果を変数 $result2 に代入）
                if ( ini_get( 'safe_mode' ) ) {
                  $result2 = mb_send_mail( $e_customer_mail , $ar_subject, $ar_body , $ar_header  );
                  } else {
                  $result2 = mb_send_mail( $e_customer_mail , $ar_subject, $ar_body , $ar_header , '-f' . $returnMail );
                }
                // 事実上　$result　$result２が成功したら
                if ($result2){

                $_POST = array(); //空の配列を代入し、すべてのPOST変数を消去
                //変数の値も初期化
                 $e_name = '';
                 $e_customer_mail = '';

                 $mailTo = '';
                 $subject = '';
                 $mail_body = '';
                 $header = '';
                 $token = '';
                 $session_token = '';
                //  メール送信もOKだし返信メールもOKだった
                echo "<div class='form_alert'>
                <h3>お客様へ予約困難のメールを送りました。</h3>
                <p>また、お店にも確認のメールをお送りしました</p>
                <p>確認メールが届かない場合はお客様へお電話で確認ください。</p>
                <a href='setting_index02.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
                </div>";
                }
                else{
                echo "<div class='form_alert'>
                <h3>確認のメールが送信できません</h3>
                <p>ご登録のメールアドレス宛に確認のメールが遅れませんでした</p>
                <p>お手数ですがもう一度予約フォームよりお問い合わせください。</p>
                <a href='setting_index02.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
                </div>";
                  }
               }//メール送信成功      
              // これ以下はバリデーションは成功失敗のelse  
              }else{
                echo "<div class='form_alert'>
                <h3>入力エラーが確認されました</h3>";
                foreach($errors as $error){
                  echo "<p>$error</p>";
                };
                echo "<a href='reserve_schedule.php' class='anime_btn btn_active btn_font01 back_to_top'>再入力する</a></div>";
              }
              }//送信ボタンを押したら  終わり
            
          // セッション確認
          }else{
          echo "<div class='form_alert'>
          <h3>不正な操作です</h3>
          <p>一度送信したのち、リロード等は行わないでください。</p>
          <p>確認メールが届かない場合はお手数ですがもう一度予約フォームよりお問い合わせください。</p>
          <a href='setting_index02' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
          </div>";

          }
          ?>

  <!-- 送信済みここまで -->


  <?php else: ?>
  <!-- 以下通常 -->



  <!-- ここからメール入力 -->



  <section>
    <h2 class="mail_title"><?php echo $reserve_card->getReserverName()?>様への送信内容</h2>
    <!-- 予約フォーム -->

    <div class="reserve_from_body">
      <form method="post" id="form" name="form1" action="" onsubmit="return verifyContactForm();">

        <dl>
          <dt class="step_a">題名</dt>
          <dd class="mail_subject">
            <input type="text" name="mail_title" value='<?php echo $reserve_card->getReservationDate()?>のご予約について'>
          </dd>
        </dl>


        <?php
              $mail_message = $reserve_card->getReserverName(). "様" . "\n\n";            
              
              $mail_message .="この度はご予約の申請ありがとうございます。"."\n";
              $mail_message .="お店の名前と申します。"."\n\n";

              $mail_message .= "大変恐縮ではございますが、以下のご予約に関して". "\n";
               $mail_message .= "既に他のお客様のご予約が入っている". "\n";
               $mail_message .= "または女の子の出勤時間ではないため". "\n";
               $mail_message .= "以下のご予約を承れません。". "\n\n";
               $mail_message .= "ご希望日：" . date('Y年m月d日',strtotime($reserve_card->getReservationDate())) . "\n" ;
               $mail_message .= "ご希望時間：" .date("H:i",strtotime($reserve_card->getStartTime())) . "\n" ;
               $mail_message .= "ご指名：" . $employee_girl_name . "\n" ;
               $mail_message .= "ご利用時間：" . $reserve_card->getPlayTime(). "分コース" . "\n\n\n" ;
               $mail_message .="ーーーーーーーーーーーーーーーー". "\n";
               $mail_message .="ご提案". "\n\n\n";
               $mail_message .="ーーーーーーーーーーーーーーーー". "\n\n\n";
               $mail_message .="株式会社". "\n";
               $mail_message .="予約担当:中村". "\n";
               $mail_message .="電話:". "\n";
               ?>


        <!-- テキストエリアにはパタン属性はない -->
        <dl>
          <dt class="step_a">メール本文</dt>
          <dd>
            <textarea rows=30 name="request" maxlength="1000" id="customerMail"
              onblur="checkTxt(this,'request_text_body')"><?php echo $mail_message ?></textarea>
            <!-- JavaScriptでinputのvalueに入れてる -->
            <input type="hidden" id="request_text_body" name="request_body">
          </dd>
        </dl>

        <div class="step_button_wrap">
          <a href='reserve_schedule.php' onclick="cancelPop(event)" class="reserve_back mail_cancel">キャンセル</a>
          <input type="submit" name="btn_confirm" id="nextButton" class="step_next_before" value="確認">
        </div>


      </form>

      <div class="popoverTemplate">
        <div class="popover">
          <p>メールの内容は破棄されます</p>
          <p>よろしいですか？
          </p>
          <div class="popover_btn">
            <button onclick="move()" class="true_btn">OK</button>
            <button onclick="backSet()">キャンセル</button>
          </div>
        </div>
      </div>


    </div>
  </section>

  <?php endif?>

  </div><!-- content_wrapper -->
  </article>



  <br><br><br><br><br><br><br><br>
  <p>下が確認できないのでスペース</p>
  <?php  echo $mode ;?><br>
  <br><br><br><br><br><br><br><br>





  </main>


  </div><!-- wrapper -->
</body>

</html>