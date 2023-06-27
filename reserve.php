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
    $token = uniqid('', true);;
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
  <!--サイトの説明 -->
  <title>testページ</title>
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
  <!--ファビコンアイコン-->
  <link rel="icon" href="/favicon.ico" id="favicon">
  <!--IE用アイコン-->
  <link rel="shortcut icon" href="画像URL（.ico）" type="image/x-icon" />
  <!--スマホアイコン-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--Windows用タイトル設定 winピン留め-->
  <meta name="msapplication-TileImage" content="画像のURL" />
  <meta name="msapplication-TileColor" content="カラーコード" />

  <!--css-->
  <!-- リセット -->
  <link rel="stylesheet" href="css/reset.css">
  <!-- ローディング -->
  <link rel="stylesheet" type="text/css" href="css/loading.css" />
  <!-- swiper css は先読み -->

  <!-- 共通 -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />
  <link rel="stylesheet" type="text/css" href="css/accordion.css" />
  <link rel="stylesheet" type="text/css" href="css/footer.css" />
  <!-- ページ毎 -->
  <link rel="stylesheet" type="text/css" href="css/reserve.css" />
  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />



  <!--javascript-->
  <script src="js/script.js" defer></script>
  <script src="js/header.js" defer></script>
  <script src="js/accordion.js" defer></script>
  <script src="js/fadein.js" defer></script>
  <script src="js/popup.js" defer></script>
  <script src="js/reserve_form.js" defer></script>

  <!-- フォントオーサム -->
  <!-- 最後はダウンロードしてスピードを出す -->
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

</head>

<body id="body">

  <!-- ローディング画面 -->
  <div id="loading-wrapper">
    <div class="loader"></div>
    <p>Loading...</p>
  </div>
  <!-- コンテンツ部分 -->

  <div id="wrapper">


    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/parts/header.php');
    require_once( dirname(__FILE__). '/data.php');
    ?>
    <!------------------>

    <main id="main">

      <div class="popup" id="js-popup">
        <div class="popup-inner">
          <div class="close-btn" id="js-close-btn">
            <i class="fas fa-times-circle"></i>
          </div>

          <h2 class="netreserve_attention_title">ご予約の注意</h2>
          <p class="netreserve_attention_text">
            メールご予約は当店1回以上ご利用された会員様に限ります。<br>
            ご指名が有る場合、出勤表をご確認の上、コンパニオンの名前を入力して下さい。<br>
            インターネット予約では、ご予約日の1週間前の深夜0時から受付開始となります。<br>
            尚、当日のご予約はお電話のみになります。<br>
            360分以上のコースをご希望のお客様は、お手数ですがお電話にてのご確認をお願い致します。<br>
            このフォームではご予約成立とはなりません。<br>
            ご予約受付後、24時間以内にお返事を お返ししております。<br>
            その内容を以って、ご予約の成立となります。<br>
            万が一、24時間経過後もお返事のメールが届かない場合は、お手数ですがお電話にてのご確認をお願い致します。<br>
            (迷惑メールフォルダに入っている場合も御座いますので、届いてない場合はご確認下さい。)<br>
            尚、予約が殺到した場合には、下記を理由に選考させていただきます。<br>
            (メルマガ会員様、当店のご利用頻度、地域・時間的な問題、コンパニオンからの苦情の有無(本番強要・店外デート等の勧誘・部屋が汚い等)
            ご利用の携帯電話によっては特定のドメインからのメールの受信を拒否する機能(ドメイン指定受信) が設定されている場合がありますので、
            [hips-matsudo.jp]を受信可能にしてから、ご登録下さいませ。<br>
          </p>


        </div>
        <div class="black-background" id="js-black-bg"></div>
      </div>




      <article id="reserve" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Reserve</span></h1>
          <h3 class="block_title_caption">ネット予約</h3>

          <!-- 確認画面 -->
          <?php if( $page_flag === 1 ): ?>
          <!-- セッションにトークン入れる -->

          <p class="check_attention">
            お客様のご入力頂いた内容の入力確認になります。
            <br>下記の内容でご予約を承りますがよろしいでしょうか？
          </p>
          <div class="reserve_check_form">
            <form method="post" id="form" name="form1" action="" onsubmit="return verifyContactForm();">
              <dl>
                <dt class="test">お名前</dt>
                <dd><?php echo $_POST['name']; ?></dd>
                <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
              </dl>
              <dl>
                <dt>電話番号</dt>
                <dd><?php echo $_POST['phone'];?></dd>
                <input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>">
              </dl>
              <dl>
                <dt>メールアドレス</dt>
                <dd><?php echo $_POST['customer_mail'];?></dd>
                <input type="hidden" name="customer_mail" value="<?php echo $_POST['customer_mail']; ?>">
              </dl>
              <dl>
                <dt>ご利用予定場所</dt>
                <!-- ホテルか？家か？ -->
                <dd>
                  <?php $play_place = $_POST['play_place']; ?>
                  <!-- ホテルだったら -->
                  <?php if ($play_place == '1') :?>
                  <?php echo 'ホテル' ?>
                  <input type="hidden" name="play_place" value="<?php echo $play_place; ?>">
                  <!-- ご自宅 -->
                  <?php elseif ($play_place == '2') :?>
                  <?php echo 'ご自宅'; ?>
                  <input type="hidden" name="play_place" value="<?php echo $play_place; ?>">
                  <!-- 場所の選択が変だった場合、３を渡して次のエラーチェックで引っ掛ける -->
                  <?php else :?>
                  <input type="hidden" name="play_place" value="3" ; ?>">
                  <?php endif ?>
                </dd>
              </dl>
              <!-- エリアか？住所か？ -->
              <dl>
                <dt>
                  <?php if($play_place == '1') :?>
                  <?php echo 'ご希望エリア</dt><dd>'.$_POST['hotel_area'].'</dd>'; ?>
                  <input type="hidden" name="hotel_area" value="<?php echo $_POST['hotel_area']; ?>">
                  <?php elseif($play_place == '2') :?>
                  <?php echo 'ご住所</dt><dd>' .$_POST['customer_address'].'</dd>'; ?>
                  <input type="hidden" name="customer_address" value="<?php echo $_POST['customer_address']; ?>">
                  <?php else:?>
                  <?php echo '入力ミス'; ?>
                  <?php endif ?>
                </dt>
              </dl>
              <!-- ご予約日 -->
              <p>ご予約内容</p>
              <dl>
                <dt>ご希望日</dt>
                <dd><?php echo $_POST['play_date'];?></dd>
                <input type="hidden" name="play_date" value="<?php echo $_POST['play_date']; ?>">
              </dl>
              <dl>
                <dt>ご希望スタート時間</dt>
                <dd><?php echo $_POST['play_daytime'];?></dd>
                <input type="hidden" name="play_daytime" value="<?php echo $_POST['play_daytime']; ?>">
              </dl>
              <dl>
                <dt>ご調整可能時間</dt>
                <dd><?php echo $_POST['adjustment'];?></dd>
                <input type="hidden" name="adjustment" value="<?php echo $_POST['adjustment']; ?>">
              </dl>

              <dl>
                <dt>ご利用コース</dt>
                <dd><?php echo $_POST['playtime_select_check'];?>分</dd>
                <input type="hidden" name="playtime_select_check"
                  value="<?php echo $_POST['playtime_select_check']; ?>">
              </dl>
              <!-- 指名 -->
              <dl>
                <dt>ご指名</dt>
                <dd><?php echo $sample_names[$_POST['nomination_select_check']][1];?></dd>
                <input type="hidden" name="nomination_select_check"
                  value="<?php echo $_POST['nomination_select_check']; ?>">
              </dl>
              <!-- オプション -->
              <dl>
                <dt>オプション</dt>
                <!-- オプションが選ばれていれば -->
                <?php if (isset($_POST['option']) && is_array($_POST['option'])):?>
                <!-- オプションをint化した -->
                <?php $option = $_POST["option"];?>
                <?php $option = array_map('intval', $option); ?>
                <!-- 選んだオプションをforeachですべて表示 -->
                <?php foreach ( $option as $option_num) :?>
                <?php echo '<dd>'.$options[$option_num].'</dd>';?>
                <!-- 選んだオプションをinputですべてだす -->
                <input type="hidden" name="option[]" value="<?php echo $option_num; ?>">
                <?php endforeach ?>
                <?php else :?>
                <?php echo '<dd>なし</dd>'; ?>
                <?php endif ?>
              </dl>
              <!-- テキストエリアにはパタン属性はない -->
              <dl>
                <dt>ご質問・ご相談内容</dt>
                <dd><?php echo $_POST['request'];?></dd>
                <!-- textareaをinputに変更 -->
                <input type="hidden" name="request_body" value="<?php echo $_POST['request_body']; ?>">
              </dl>

              <div class="check_form_submit">
                <input type="button" value="戻る" onclick="history.back()" class="form_back">
                <input type="submit" name="btn_submit" value="送信" class="form_next">
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
            require 'libs/validation.php';
 
          //POSTされたデータを変数に格納（値の初期化とデータの整形：前後にあるホワイトスペースを削除）
          $e_name = trim( filter_input(INPUT_POST, 'name') );
          $e_phone = trim( filter_input(INPUT_POST, 'phone') );
          $e_customer_mail = trim( filter_input(INPUT_POST, 'customer_mail') );
          // 遊ぶ場所
          $e_play_place = trim( filter_input(INPUT_POST, 'play_place') );
          // ホテルのとき
          if($e_play_place == '1'){
            $e_hotel_area = trim( filter_input(INPUT_POST, 'hotel_area') );
            $e_customer_address =""; 
          // 自宅のとき
          }elseif($e_play_place == '2'){
            $e_hotel_area = "";
            $e_customer_address = trim( filter_input(INPUT_POST, 'customer_address') ); 
          }
          $e_play_date = trim( filter_input(INPUT_POST, 'play_date') );
          $e_play_daytime = trim( filter_input(INPUT_POST, 'play_daytime') );
          $e_adjustment = trim( filter_input(INPUT_POST, 'adjustment') );
          $e_playtime_select_check = trim( filter_input(INPUT_POST, 'playtime_select_check') );
          $e_nomination_select_check = trim( filter_input(INPUT_POST, 'nomination_select_check') );
          // オプションは配列
          if (is_array($_POST['option']) ){
            $e_option = filter_input(INPUT_POST, 'option', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            }
          // 要望
          if (isset($_POST['request_body']) ){
          $e_request_body = trim( filter_input(INPUT_POST, 'request_body') );
          }

          //送信ボタンが押された場合の処理
          if (isset($_POST['btn_submit'])) {

          //POSTされたデータをチェック
          $_POST = checkInput( $_POST );

          //エラーメッセージを保存する配列の初期化
          $errors = array();
          //値の検証
          // 名前
          if ( $e_name == '' ) {
          $errors['e_name'] = '*お名前は必須項目です。';
          //制御文字でないことと文字数をチェック
          } elseif ( preg_match( '/\A[[:^cntrl:]]{1,20}\z/u', $e_name ) == 0 ) {
          $errors['e_name'] = '*お名前は20文字以内でお願いします。';
          }
        //  電話番号を数値へ
          if ( $e_phone == ''){
          $errors['e_phone'] = '*お電話番号は必須項目です。';
          } elseif (preg_match( '/^0[0-9]{9,10}\z/', $e_phone ) == 0 ) {
          $errors['e_phone'] = '電話番号の形式が正しくありません。';
          }
          // メール
          if ( $e_customer_mail == '' ) {
          $errors['e_customer_mail'] = '*メールアドレスは必須です。';
          } else { //メールアドレスを正規表現でチェック
          $pattern = '/\A([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}\z/uiD';
          if ( !preg_match( $pattern, $e_customer_mail ) ) {
          $errors['e_customer_mail'] = '*メールアドレスの形式が正しくありません。';
          }
          }
          // 場所
          if ( $e_play_place == '' ){
          $errors['e_play_place'] = '場所が選ばれていません。';
          }elseif (preg_match( '/^[12]{1}\z/', $e_play_place ) == 0){
          $errors['e_play_place'] = '場所が選ばれていません。';
          }
          // 場所詳細
          if( $e_play_place == '1' && $e_hotel_area == ''){
             $errors['e_hotel_area'] = 'ホテルエリアが選ばれていません。';
          }elseif( $e_play_place == '2' && $e_customer_address == ''){
             $errors['e_customer_address'] = 'ご自宅住所が記入されていません。';
          }
          // 予約日時
          if( $e_play_date == '' || $e_play_daytime == '' || $e_adjustment == ''){
             $errors['e_play_date'] = '予約日時が未入力です';
          }
          // プレイ時間
          if( $e_playtime_select_check == ''){
             $errors['e_playtime_select_check'] = 'プレイ時間が未入力です。';
          }
          // 指名
          if ( $e_nomination_select_check == ''){
           $errors['nomination_select_check'] = '担当指名が未入力です。';  
          }
          // オプション最大９個
          if (is_array( $e_option ) ){
            foreach( $e_option as $e_option_checked){
              if( preg_match( '/^[0-9]{1}\z/', $e_option_checked ) == 0 ) {
              $errors['option'] = 'オプションで引っかかってる';
              }
            }
          }
          // 要望
          if ( $e_request_body !== '' && preg_match( '/\A[\r\n\t[:^cntrl:]]{1,1000}\z/u', $e_request_body ) == 0 ) {
          $errors['body'] = '要望に問題あり';
          } 
        
          //エラーがなく且つ POST でのリクエストの場合
          if (empty($errors) && $_SERVER['REQUEST_METHOD']==='POST') {      

          //メールアドレス等を記述したファイルの読み込み
          require 'libs/maildata.php';
          //メール本文の組み立て
          $subject = h($e_name) . "様からのご予約";
          $mail_body = 'ネット予約からの送信' . "\n\n";

          $mail_body .= "お名前： " .h($e_name) . "\n";
          $mail_body .= "お電話番号： " . h($e_phone) . "\n" ;
          $mail_body .= "Email： " . h($e_customer_mail) . "\n\n" ;
          if( $e_play_place == '1' ){
            $mail_body .= "ご利用予定場所： " . h('ホテル') . "\n" ;
            $mail_body .= "ご希望エリア： " . h($e_hotel_area) . "\n\n" ;
          }elseif($e_play_place == '2'){
            $mail_body .= "ご利用予定場所： " . h('ご自宅') . "\n" ;
            $mail_body .= "ご住所： " . h($e_customer_address) . "\n\n" ;
          }
          $mail_body .= "ご希望日： " . h($e_play_date) . "\n" ;
          $mail_body .= "ご希望スタート時間： " . h($e_play_daytime) . "\n" ;
          $mail_body .= "ご調整可能時間： " . h($e_adjustment) . "\n\n" ;

          $mail_body .= "ご指名： " . h($e_nomination_select_check) . "\n" ;
          $mail_body .= "ご利用コース： " . h($e_playtime_select_check) . "分コース\n" ;
          if (is_array($e_option)){
            foreach($e_option as $option_chip){
            $mail_body .= "オプション： " . h($option_chip) . "\n" ;
            }
          }else{
            $mail_body .= "オプション： " . h('なし') . "\n" ;
          }

          $mail_body .= "＜お問い合わせ内容＞" . "\n" . h($e_request_body);

          //--------sendmail------------
          //メールの宛先（名前<メールアドレス> の形式）。値は mailvars.php に記載
            $mailTo = mb_encode_mimeheader(MAIL_TO_NAME) ."<" . MAIL_TO. ">" ;
             //Return-Pathに指定するメールアドレス
              $returnMail=MAIL_RETURN_PATH; 
              // //mbstringの日本語設定
              mb_language( 'ja' ); mb_internal_encoding( 'UTF-8' );
               //送信者情報（From ヘッダー）の設定
              $header="From: " . mb_encode_mimeheader($e_name) ."<" . MAIL_FROM. ">\n" ;
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
                  $ar_subject = 'ご予約自動返信メール';
                  //本文
                  $ar_body = $e_name." 様\n\n";
                  $ar_body .= "この度は、お問い合わせ頂き誠にありがとうございます。" . "\n\n";
                  $ar_body .= "下記の内容でお問い合わせを受け付けました。\n\n";
                  $ar_body .= "お問い合わせ日時：" . date("Y年m月d日 D H時i分") . "\n\n";
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
                 $e_phone = '';
                 $e_customer_mail = '';
                 $e_play_place = '';
                 $e_hotel_area = '';
                 $e_customer_address = '';
                 $e_play_date = '';
                 $e_play_daytime = '';
                 $e_adjustment = '';
                 $e_playtime_select_check = '';
                 $e_nomination_select_check = '';
                 $e_option = '';
                 $e_request_body = '';
                 $mailTo = '';
                 $subject = '';
                 $mail_body = '';
                 $header = '';
                 $token = '';
                 $session_token = '';
                //  メール送信もOKだし返信メールもOKだった
                echo "<div class='form_alert'>
                <h3>ご予約承りました</h3>
                <p>ご登録のメールアドレスに確認のメールをお送りしました</p>
                <p>確認メールが届かない場合はお手数ですがもう一度予約フォームよりお問い合わせください。</p>
                <a href='top.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
                </div>";
                }
                else{
                echo "<div class='form_alert'>
                <h3>確認のメールが送信できません</h3>
                <p>ご登録のメールアドレス宛に確認のメールが遅れませんでした</p>
                <p>お手数ですがもう一度予約フォームよりお問い合わせください。</p>
                <a href='top.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
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
                echo "<a href='reserve.php' class='anime_btn btn_active btn_font01 back_to_top'>再入力する</a></div>";
              }
              }//送信ボタンを押したら  終わり
            
          // セッション確認
          }else{
          echo "<div class='form_alert'>
          <h3>不正な操作です</h3>
          <p>一度送信したのち、リロード等は行わないでください。</p>
          <p>確認メールが届かない場合はお手数ですがもう一度予約フォームよりお問い合わせください。</p>
          <a href='top.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
          </div>";

          }
          ?>

          <!-- 送信済みここまで -->


          <?php else: ?>
          <!-- 以下通常 -->






          <section class="line_link_banner">
            <h2 class="banner_max">
              <a href="linereserve.php">
                <img src="img/line.jpeg" alt="LINEで予約">
              </a>
            </h2>
            <p>Lineでご予約の方は上記をタップして友達登録お願いします。</p>
          </section>


          <section>
            <h2 class=" block_title"><span>Reserve Form</span></h2>
            <h3 class="block_title_caption">予約フォーム</h3>
            <!-- 予約フォーム -->

            <div class="reserve_from_body">
              <form method="post" id="form" name="form1" action="" onsubmit="return verifyContactForm();">
                <dl>
                  <dt class="test">
                    お名前<em>必須</em>
                    <span class="mini_alert">記号は使えません</span>
                  </dt>
                  <dd><input type="text" id="guest_name" name="name" maxlength="20" placeholder="20文字以内（例）武田優" required
                      onblur="CheckGuestInfo(this)"
                      pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,20}">
                  </dd>
                </dl>
                <dl>
                  <dt>電話番号<em>必須</em>
                    <span class="mini_alert">数字以外は使えません</span>
                  </dt>
                  <dd>
                    <input type="tel" id="guest_phone" name="phone" placeholder="ハイフンなし（例）09012345678" required
                      onblur="CheckGuestInfo(this)" pattern="^0[0-9]{9,10}$">
                  </dd>
                </dl>
                <dl>
                  <dt>メールアドレス<em>必須</em>
                    <span class="mini_alert">ご登録できない形式です</span>
                  </dt>
                  <dd><input type="text" name="customer_mail" placeholder="メールアドレス" id="mail1" required
                      onblur="CheckGuestEmail(this)" pattern="^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$">
                  </dd>
                </dl>

                <dl>
                  <dt>メールアドレス(確認)<em>必須</em>
                    <span class="mini_alert">メールアドレスが異なります</span>
                  </dt>
                  <dd><input type="text" disabled name="customer_mail_check" placeholder="メールアドレス(確認)" id="mail2"
                      required onblur="SameCheck(this)"></dd>
                </dl>


                <dl>
                  <dt>ご利用予定場所<em>必須</em>
                    <span class="mini_alert">記号は使えません</span>
                  </dt>

                  <dd>
                    <label class="play_place">
                      <input class="js-check" checked type="radio" name="play_place" value="1"
                        onclick="formSwitch()">ホテル
                    </label>

                    <label class="play_place">
                      <input class="js-check" type="radio" name="play_place" value="2" onclick="formSwitch()">ご自宅
                    </label>
                  </dd>

                  <!-- ホテルの場所 -->

                  <div id="hotel_list">
                    <div class="form-check">
                      <span class="play_place_title">ご利用駅</span>
                      <?php foreach($hotels as $index => $hotel ): ?>
                      <label class="play_place_select">
                        <input class="form-check-input" type="radio" value="<?php echo $hotel[0] ?>" name="hotel_area" <?php if($index == 'hotel1'){
                          echo "checked";} ?>>
                        <?php echo $hotel[0] ?>
                      </label>
                      <?php endforeach ?>
                    </div>
                  </div>

                  <!-- 住所 -->
                  <div id="house_address" class="play_place_title">ご住所
                    <input id="house_address_input" type="text" name="customer_address" placeholder="100文字以内です"
                      size="30" onblur="CheckGuestInfo(this)"
                      pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,100}">
                  </div>
                </dl>

                <!-- ご予約日 -->
                <dl>
                  <dt>ご予約日時<em>必須</em></dt>
                  <p>ご希望日</p>
                  <select class="play_date_time select_check" required name="play_date">
                    <option value="" hidden>ご利用日をお選びください</option>

                    <?php for($i = 0; $i < 7; $i ++) : ?>
                    <?php echo '<option value="'.$today->format('m/d').'('.$week_name[$today->format("w")].')">' ?>
                    <?php echo "{$today->format('m/d')}" ?>
                    (<?php echo $week_name[$today->format("w")];?>)
                    </option>
                    <?php $today->modify("+1 day") ;?>
                    <?php endfor ?>
                  </select>

                  <p>ご希望スタート時間</p>
                  <select class="play_date_time select_check" required name="play_daytime">
                    <option value="" hidden>ご希望スタート時間をお選びください</option>
                    <option value="特になし">特になし</option>
                    <?php for($i = 0; $i < 27; $i ++) : ?>
                    <?php echo '<option value="'.$shop_start->format('H:i').'">' ?>
                    <?php echo "{$shop_start->format('H:i')}" ?>
                    </option>
                    <?php $shop_start->modify("+30 minute") ;?>
                    <?php endfor ?>
                  </select>

                  <p>ご調整可能時間</p>
                  <select class="play_date_time select_check" required name="adjustment">
                    <option value="" hidden>調整可能時間をお選びください
                    </option>
                    <option value="調整不可">調整不可</option>
                    <option value="後ろ1時間">後1時間</option>
                    <option value="後ろ2時間">後2時間</option>
                    <option value="後ろ2時間以上">後2時間以上</option>
                    <option value="前1時間">前1時間</option>
                    <option value="前2時間">前2時間</option>
                    <option value="前2時間以上">前2時間以上</option>
                    <option value="前後1時間">前後1時間</option>
                    <option value="前後2時間以上">前後2時間以上</option>
                  </select>
                </dl>
                <dl>
                  <dt>ご利用コース<em>必須</em></dt>
                  <select name="playtime select_check" required>
                    <option value="" hidden>ご利用コース</option>
                    <?php for($i = 60; $i < 361; $i+=30) : ?>
                    <?php echo '<option value="'.$i.'">' ?>
                    <?php echo "{$i}分" ?>
                    </option>
                    <?php endfor ?>
                    <option value="360分以上">360分以上のロングコース</option>
                  </select>
                </dl>

                <!-- 指名 -->
                <dl>
                  <dt>ご指名<em>必須</em></dt>
                  <select name="nomination select_check" required>
                    <option value="" hidden>選択</option>
                    <option value="フリー">フリー</option>
                    <?php foreach($sample_names as $sample_name) : ?>
                    <?php echo '<option value="'.$sample_name[0].'">' ?>
                    <?php echo $sample_name[1] ?>
                    </option>
                    <?php endforeach ?>

                  </select>
                </dl>

                <!-- オプション -->
                <dl>
                  <dt>オプション</dt>
                  <?php foreach ($options as $num => $option_select) :?>
                  <label class="option_select">
                    <input type="checkbox" value="<?php echo $num ?>" name="option[]">
                    <?php echo $option_select ?>
                  </label>
                  <?php endforeach ?>
                </dl>

                <!-- テキストエリアにはパタン属性はない -->
                <dl>
                  <dt>ご質問・ご相談内容(1,000文字以内)
                  </dt>
                  <dd>
                    <textarea rows=7 name="request" maxlength="1000" placeholder="例）電話連絡は18時以降にお願いいたします。"
                      onblur="checkTxt(this)"></textarea>
                    <!-- JavaScriptでinputのvalueに入れてる -->
                    <input type="hidden" id="request_text_body" name="request_body">
                  </dd>
                </dl>

                <div class="submit">
                  <input type="submit" name="btn_confirm" disabled id="reserve_button" value="入力が完了していません"
                    class="sendButton btn_active ">
                </div>

              </form>


            </div>
          </section>

          <?php endif?>

        </div><!-- content_wrapper -->
      </article>



      <?php
        require_once( dirname(__FILE__). '/parts/accordion.php');
      ?>





    </main>

    <?php
      require_once( dirname(__FILE__). '/parts/footer.php');
    ?>

  </div><!-- wrapper -->
</body>

</html>