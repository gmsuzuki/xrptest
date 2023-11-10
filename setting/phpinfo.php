<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Script-Type" content="text/javascript">
  <!--サイトの説明 -->

  <style>
  </style>
  <!--css javascript-->

  <!-- これinputのときだけ読み込む -->
</head>


<body id="body">

  <a href="setting_index02.php">トップへ</a>
  <h1>自動メール送信について</h1>

  <section>
    <h2>php自動メール生成について</h2>
    <p>予約など自動返信等のとき</p>
    <p>phpでメールを生成してお客や店に送信する</p>
    <p>でもそのメールがなりすまし等で迷惑メールになる可能性がある</p>

  </section>

  <section>
    <h2>どんなチェックをしているのか</h2>
    <div>
      Yahoo!メールでは、なりすましメール対策として、<br>送信元のドメインを認証する技術である<br>
      「SPF」「DKIM」「DMARC」「DomainKeys」を利用しています。<br>
    </div>

    <ul>
      <li><a
          href="https://www.kagoya.jp/howto/it-glossary/mail/spf/#:~:text=SPF%E3%83%AC%E3%82%B3%E3%83%BC%E3%83%89%E3%81%A8%E3%81%AF%E3%80%81%E3%81%9D%E3%81%AE,%E3%83%AC%E3%82%B3%E3%83%BC%E3%83%89%E3%82%92%E7%85%A7%E5%90%88%E3%81%97%E3%81%BE%E3%81%99%E3%80%82"
          target="_blank">SPF</a>
        <a href="https://inaba-serverdesign.jp/blog/20230710/mail-spf-web-form.html">その他</a>
        <br>
        簡単に言うとメールの情報があっているか？サーバーに確認に行く
      </li>
      <li>
        <a href="https://www.cuenote.jp/fc/security/dkim.html">DKIM</a>
      </li>
      <li>
        <a href="https://www.proofpoint.com/jp/threat-reference/dmarc">dmarc</a>
      </li>
    </ul>
  </section>

  <section>
    <h2>対処</h2>
    <ul>
      <li>
        エンベロープFromアドレス設定<br>
        エンベロープFromアドレスのドメインのDNSで、SPFレコードに、<br>
        送信メールサーバーの情報を登録する。<br>
        「SPFレコードにないサーバーからメールが届いた場合<br>
        、それはニセモノなので、スパムメール扱いしてください！」という宣言<br>
      </li>
      <li>
        具体的には、エンベロープ "From" を設定するには、<br>
        mail() 関数の代わりに、PHPMailer や SwiftMailer<br>
        のようなライブラリを使用して、<br>
        SMTPサーバーを介してメールを送信することが一般的です。<br>

      </li>
    </ul>
  </section>
  <p>ミドルウェアを使おう</p>
  <a href="https://qiita.com/e__ri/items/857b12e73080019e00b5">PHPMailer</a>

  <br><br><br><br><br><br><br><br>

</body>