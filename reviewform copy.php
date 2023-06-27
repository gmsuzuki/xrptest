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
  <!-- <link rel="stylesheet" type="text/css" href="css/reserve.css" /> -->
  <link rel="stylesheet" type="text/css" href="css/review.css" />
  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />



  <!--javascript-->
  <script src="js/script.js" defer></script>
  <script src="js/header.js" defer></script>
  <script src="js/accordion.js" defer></script>
  <script src="js/fadein.js" defer></script>
  <script src="js/review_form.js" defer></script>


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


      <!-- 口コミの注意事項 -->
      <div class="popup" id="js-popup">
        <div class="popup-inner">
          <div class="close-btn" id="js-close-btn">
            <i class="fas fa-times-circle"></i>
          </div>
          <h2 class="netreserve_attention_title">口コミ投稿の注意事項</h2>
          <div class="description attension">
            <h3>投稿に際しては必ず以下のガイドラインをご確認ください。</h3>
            <ul class="guideline">
              <li>実際に利用されていない場合の投稿を禁止します</li>
              <li>記号の多用、日本語以外での記述を禁止します</li>
              <li>お店や女の子への誹謗中傷を禁止します</li>
              <li>事実確認が困難な内容の投稿を禁止します</li>
              <li>プライバシーの侵害に配慮してください</li>
              <li>著作権を侵害する投稿を禁止します</li>
              <li>60日以内の体験談を投稿してください</li>
              <li>同じ体験に対して複数回口コミを投稿することを禁止します</li>
            </ul>
            <ul class="guideline_attention">
              <li>以上のガイドラインに反する投稿は掲載できません。</li>
              <li>非掲載となった場合、その理由は説明しておりません。</li>
              <li>一度承認、掲載された場合でも、その後非掲載となる場合があります。</li>
              <li>記載された内容の意図が変わらない範囲での誤字、脱字等の編集をする場合があります。</li>
            </ul>
          </div>
        </div>
        <div class="black-background" id="js-black-bg"></div>
      </div>

      <!-- ここまで口コミの注意事項 -->


      <article id="reserve" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Review Form</span></h1>
          <h3 class="block_title_caption">口コミ投稿フォーム</h3>

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
                <dd><?php echo $_POST['nomination_select_check'];?></dd>
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




          <!-- 予約フォーム -->

          <div class="review_from_body">
            <form method="post" id="form" name="form1" action="" onsubmit="return verifyContactForm();">

              <!-- 投稿者名 -->
              <dl class="review_item_wrap">
                <dt>
                  投稿者名<em>必須</em>
                  <span class="mini_alert">記号は使えません</span>
                </dt>
                <dd><input type="text" id="reviewer_name" name="reviewer_name" maxlength="20" placeholder="20文字以内（例）武田優"
                    required onblur="CheckGuestInfo(this)"
                    pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,20}">
                </dd>
              </dl>
              <div class="review_item_wrap">
                <dl>
                  <dt>メールアドレス
                    <p class="review_tips">他者に公開されることはございません。</p>
                    <span class="mini_alert">ご登録できない形式です</span>
                  </dt>
                  <dd><input type="text" name="customer_mail" placeholder="メールアドレス" id="mail1"
                      onblur="CheckGuestEmail(this)" pattern="^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$">
                  </dd>
                </dl>

                <dl>
                  <dt class="review_tips">メールアドレス(確認)
                    <span class="mini_alert">メールアドレスが異なります</span>
                  </dt>
                  <dd><input type="text" disabled name="customer_mail_check" placeholder="メールアドレス(確認)" id="mail2"
                      onblur="SameCheck(this)"></dd>
                </dl>
              </div>

              <!-- 指名 -->
              <div class="review_item_wrap review_girl_item">
                <dl class="played_program_item">
                  <dt>遊んだ女の子<em>必須</em></dt>
                  <select name="played_girl" required>
                    <option value="" hidden>選択</option>
                    <?php foreach($sample_names as $sample_name) : ?>
                    <?php echo '<option value="'.$sample_name[0].'">' ?>
                    <?php echo $sample_name[0] ?>
                    </option>
                    <?php endforeach ?>
                  </select>
                </dl>

                <!-- 利用コース -->
                <dl class="played_program_item">
                  <dt>ご利用コース<em>必須</em></dt>
                  <select name="played_time" required>
                    <option value="" hidden>ご利用コース</option>
                    <?php for($i = 60; $i < 361; $i+=30) : ?>
                    <?php echo '<option value="'.$i.'">' ?>
                    <?php echo "{$i}分" ?>
                    </option>
                    <?php endfor ?>
                    <option value="360分以上">360分以上のロングコース</option>
                  </select>
                </dl>

                <!-- ご利用日 -->
                <dl class="played_date_item">
                  <dt>ご利用日時<em>必須</em></dt>
                  <label class="date-edit">
                    <input id="played_date_form" type="date" name="played_date" max="<?php echo date('Y-m-d'); ?>"
                      required>
                  </label>
                </dl>

              </div>

              <!-- 評価1 -->
              <div class="review_item_wrap">
                <dl class="review_item_card">
                  <dt>項目１
                    <p class="review_tips">項目１の説明文</p>
                  </dt>
                  <dd class="stars">
                    <input id="check1_star5" type="radio" name="check1_star" value="5" required />
                    <label for="check1_star5">★</label>
                    <input id="check1_star4" type="radio" name="check1_star" value="4" />
                    <label for="check1_star4">★</label>
                    <input id="check1_star3" type="radio" name="check1_star" value="3" />
                    <label for="check1_star3">★</label>
                    <input id="check1_star2" type="radio" name="check1_star" value="2" />
                    <label for="check1_star2">★</label>
                    <input id="check1_star1" type="radio" name="check1_star" value="1" />
                    <label for="check1_star1">★</label>
                  </dd>
                </dl>

                <!-- 評価２ -->
                <dl class="review_item_card">
                  <dt>項目2</dt>
                  <dd class="stars">
                    <input id="check2_star5" type="radio" name="check2_star" value="5" required />
                    <label for="check2_star5">★</label>
                    <input id="check2_star4" type="radio" name="check2_star" value="4" />
                    <label for="check2_star4">★</label>
                    <input id="check2_star3" type="radio" name="check2_star" value="3" />
                    <label for="check2_star3">★</label>
                    <input id="check2_star2" type="radio" name="check2_star" value="2" />
                    <label for="check2_star2">★</label>
                    <input id="check2_star1" type="radio" name="check2_star" value="1" />
                    <label for="check2_star1">★</label>
                  </dd>
                </dl>
                <!-- 評価3 -->
                <dl class="review_item_card">
                  <dt>項目3</dt>
                  <dd class="stars">
                    <input id="check3_star5" type="radio" name="check3_star" value="5" required />
                    <label for="check3_star5">★</label>
                    <input id="check3_star4" type="radio" name="check3_star" value="4" />
                    <label for="check3_star4">★</label>
                    <input id="check3_star3" type="radio" name="check3_star" value="3" />
                    <label for="check3_star3">★</label>
                    <input id="check3_star2" type="radio" name="check3_star" value="2" />
                    <label for="check3_star2">★</label>
                    <input id="check3_star1" type="radio" name="check3_star" value="1" />
                    <label for="check3_star1">★</label>
                  </dd>
                </dl>
                <!-- 評価4 -->
                <dl class="review_item_card">
                  <dt>項目4</dt>
                  <dd class="stars">
                    <input id="check4_star5" type="radio" name="check4_star" value="5" required />
                    <label for="check4_star5">★</label>
                    <input id="check4_star4" type="radio" name="check4_star" value="4" />
                    <label for="check4_star4">★</label>
                    <input id="check4_star3" type="radio" name="check4_star" value="3" />
                    <label for="check4_star3">★</label>
                    <input id="check4_star2" type="radio" name="check4_star" value="2" />
                    <label for="check4_star2">★</label>
                    <input id="check4_star1" type="radio" name="check4_star" value="1" />
                    <label for="check4_star1">★</label>
                  </dd>
                </dl>
                <!-- 評価5 -->
                <dl class="review_item_card">
                  <dt>項目5</dt>
                  <dd class="stars">
                    <input id="check5_star5" type="radio" name="check5_star" value="5" required />
                    <label for="check5_star5">★</label>
                    <input id="check5_star4" type="radio" name="check5_star" value="4" />
                    <label for="check5_star4">★</label>
                    <input id="check5_star3" type="radio" name="check5_star" value="3" />
                    <label for="check5_star3">★</label>
                    <input id="check5_star2" type="radio" name="check5_star" value="2" />
                    <label for="check5_star2">★</label>
                    <input id="check5_star1" type="radio" name="check5_star" value="1" />
                    <label for="check5_star1">★</label>
                  </dd>
                </dl>

              </div>
              <!-- 口コミタイトル -->
              <div class="review_item_wrap">
                <dl>
                  <dt>
                    口コミのタイトル<em>必須</em>
                    <span class="mini_alert">記号は使えません</span>
                  </dt>
                  <dd>
                    <p id="review_title_count">残り：32文字</p>
                    <input type="text" id="review_title" name="review_title" maxlength="32" placeholder="32文字以内でお願いします"
                      required onblur="CheckGuestInfo(this)" required
                      pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,20}"
                      oninput="CountStr('review_title_count',value,32)">
                  </dd>
                </dl>


                <!-- テキストエリアにはパターン属性はない -->

                <dl class="review_text_body">
                  <dt>口コミ本文<em>必須</em>
                    <p id="not_enough" class="review_limit">文字数がたりません。(100文字以上、1,000文字以内)</p>
                  </dt>
                  <dd>
                    <textarea rows=7 name="review_body" minlength="100" maxlength="1000" placeholder="ご自由にお願いします。"
                      onblur="checkTxt(this)" oninput="CountStrNow('review_count',value,1000)"></textarea>
                    <input type="hidden" id="request_text_body" name="request_body">
                    <p id="review_count">現在:0/1000</p>
                  </dd>
                </dl>
              </div>
              <div class="submit">
                <input type="submit" name="btn_confirm" disabled id="review_button" value="入力が完了していません"
                  class="sendButton btn_active ">
              </div>

            </form>


          </div>


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