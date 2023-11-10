<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Script-Type" content="text/javascript">
  <!--サイトの説明 -->

  <style>
  input {
    width: 200px;
    height: 100px;
    font-size: 2rem;
  }
  </style>
  <!--css javascript-->

  <!-- これinputのときだけ読み込む -->
</head>


<body id="body">





  <?php 
//メールの宛先（To）のメールアドレス;
define('MAIL_TO', "clips124@yahoo.co.jp");
//メールの宛先（To）の名前  
define('MAIL_TO_NAME', "予約フォームからの連絡");

//Return-Pathに指定するメールアドレス
// define('MAIL_RETURN_PATH', 'clips124@yahoo.co.jp');
// define('MAIL_RETURN_PATH', 'clips124@sv1.star.ne.jp');
define('MAIL_RETURN_PATH', 'clips124@sv1.php.starfree.ne.jp');

//自動返信の返信先名前（自動返信を設定する場合）
define('AUTO_REPLY_NAME', '自動返信');

// 予約メールのfromのアドレス
// define('MAIL_FROM', 'clips124@sv1.star.ne.jp');
define('MAIL_FROM', 'clips124@sv1.php.starfree.ne.jp');
// define('MAIL_FROM', 'clips124@yahoo.co.jp');

$subject = 'テストメールです';
$mail_body = 'とりあえずyahooメールに送るよ予約できねーよ！';

$e_name = "田中ひろせ";


?>

  <h1>メールテスト</h1>
  <a href="setting_index02.php">
    <h2>トップへ</h2>
  </a>


  <form method="post">
    <input type="submit" value="メール" style="height: 100px;">
  </form>


  <?php if($_SERVER['REQUEST_METHOD']==='POST'){


          //--------sendmail------------
          //メールの宛先（名前<メールアドレス> の形式）。値は mailvars.php に記載
            $mailTo = mb_encode_mimeheader(MAIL_TO_NAME) ."<" . MAIL_TO. ">" ;
             //Return-Pathに指定するメールアドレス
              $returnMail=MAIL_RETURN_PATH; 

              // //mbstringの日本語設定
              mb_language( 'ja' ); mb_internal_encoding( 'UTF-8' );

              //送信者情報（From ヘッダー）の設定
              $header="From: " . mb_encode_mimeheader($e_name) ."<" . MAIL_FROM. ">\n" ;
              // エンベロープ "From" を設定
              $headers .= "Reply-To: " . MAIL_FROM . "\r\n"; // オプション


              $headers .= "MIME-Version: 1.0\r\n";
              $headers .= "Content-type: text/plain; charset=utf-8\r\n";

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
                  $ar_body = '自動的に返信する';
                  
                //自動返信メールを送信（送信結果を変数 $result2 に代入）
                if ( ini_get( 'safe_mode' ) ) {
                  // $result2 = mb_send_mail( $e_customer_mail , $ar_subject, $ar_body , $ar_header  );
                  } else {
                  // $result2 = mb_send_mail( $e_customer_mail , $ar_subject, $ar_body , $ar_header , '-f' . $returnMail );
                }
                // 事実上　$result　$result２が成功したら
                if ($result2){

                //  メール送信もOKだし返信メールもOKだった
                echo "<div class='form_alert'>
                <h3>ご予約の希望を承りました</h3>
                <p>ご登録のメールアドレスに確認のメールをお送りしました</p>
                <p>確認メールが届かない場合はお手数ですがもう一度予約フォームよりお問い合わせください。</p>
                <a href='top.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
                </div>";
                }
                else{
                echo "<div class='form_alert'>
                <h3>確認のメールが送信できません</h3>
                <p>ご登録のメールアドレス宛に確認のメールが送れませんでした</p>
                <p>お手数ですがもう一度予約フォームよりお問い合わせください。</p>
                <a href='top.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
                </div>";
                  }
               }//メール送信成功      
              // これ以下はバリデーションは成功失敗のelse  
              }
         
          ?>

  <!-- 送信済みここまで -->




</body>