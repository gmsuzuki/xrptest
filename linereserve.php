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
  <script src="js/loading.js" defer></script>
  <script src="js/fadein.js" defer></script>

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
    ?>
    <!------------------>


    <main id="main">



      <!-- LINE予約 -->
      <article id="linereserve" class="container under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>LINE Reserve</span></h1>
          <h3 class="block_title_caption">LINEでご予約</h3>
          <section class="line_box">
            <h2><span>LINE</span>でご予約が可能になりました。</h2>
            <p>当店ではラインでの予約受付を始めました！</p>
            <p>スマートフォンでは下記のボタンをクリックしてライン登録</p>
            <a href="" class="mobile_line_btn"><img src="img/line_f_btn.png" alt=""></a>
            <p>パソコンからはQRコードを読み込んで登録するだけでＯＫ！</p>
            <img src="img/lineqr.jpeg" class="pc_line_btn">
          </section>

          <section id="line_reserve_procedure" class="under_space">
            <div class="content_wrapper">
              <h2>LINE予約の手順</h2>

              <div class="line_reserve_contents_list">

                <div class="line_reserve_contents_list_inner">
                  <h4 class="line_reserve_contents_title"><span>Step1</span> ラインで登録</h4>
                  <span>
                    <p>LINEをご登録頂き同時にお名前お電話番号ご利用日時、ご利用場所をお伝えください。</p>
                  </span>
                </div>
                <div class="line_reserve_contents_list_inner">
                  <h4 class="line_reserve_contents_title"><span>Step2</span> ご指名をライン</h4>
                  <span>
                    <p>ご指名の女の子名をお伝えください。<br>
                      ※フリーでのご利用希望のお客様はフリーとお伝えください。</p>
                  </span>
                </div>
                <div class="line_reserve_contents_list_inner">
                  <h4 class="line_reserve_contents_title"><span>Step3</span> ご利用料金を返信</h4>
                  <span>
                    <p>ご希望の内容にてご予約が可能でしたら、こちらからご利用料金詳細を返信させて頂きます。</p>
                  </span>
                </div>
                <div class="line_reserve_contents_list_inner">
                  <h4 class="line_reserve_contents_title"><span>Step4</span> 合意の返信を頂きます</h4>
                  <span>
                    <p>ご利用料金詳細に合意の旨のご返信をいただきましたら、ご予約成立となります。</p>
                  </span>
                </div>
                <div class="line_reserve_contents_list_inner">
                  <h4 class="line_reserve_contents_title"><span>Step5</span> 予約確認の連絡をお願いします</h4>
                  <span>
                    <p>1時間以上先のご予約の場合一時間前に確認の連絡をお願いします。<br>
                      ご新規のお客様には一度お電話をお願いしております。<br>
                      一時間前の連絡が難しい場合は事前にご相談ください。</p>
                  </span>
                </div>
                <div class="line_reserve_contents_list_inner">
                  <h4 class="line_reserve_contents_title"><span>Step6</span> ご指定の場所に向かいます</h4>
                  <span>
                    <p>お迎えの必要なホテルなどの場合はドライバーさんの携帯電話もしくはお店の電話からご連絡を差し上げます。<br>
                    </p>
                  </span>
                </div>
                <p class="line_reserve_attention">
                  体調不良などの理由によりご予約いただいたスタッフが
                  ご案内できなくなってしまう場合がございます。<br>
                  その場合、弊社からLINEにてご連絡を差し上げますので、予めご了承の上、ご予約下さい。
                </p>

              </div>
            </div>
          </section>
          <section id="line_reserve_terms" class="under_space">
            <div class="content_wrapper">
              <h2>LINE予約利用規約</h2>
              <p>
                LINEでの受付、お問い合わせは14:30～翌4:00までとなっております。<br>
                LINEご登録の際には必ず【お名前、お電話番号、ご利用場所】をLINEにてお伝えください。<br>
                ご自宅でのご利用の際は、ご自宅住所も併せてお伝えください。<br>
                ご連絡は必ずご本人様からのご連絡に限らせていただきます。<br>
                上記の規約違反があった場合、当店の利用禁止、ならびにご予約いただいた料金の全額を
                ご請求させて頂きますのでご注意下さい。<br>
              </p>


            </div>

          </section>

      </article>




      <!---------------------------------------------------->


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