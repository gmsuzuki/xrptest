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

      <br>
      <br>



      <article id="reserve" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Reserve</span></h1>
          <h3 class="block_title_caption">ネット予約</h3>

          <section class="line_link_banner">
            <h2 class="banner_max">
              <a href="linereserve.php">
                <img src="img/line.jpeg" alt="LINEで予約">
              </a>
            </h2>
            <p>Lineでご予約の方は上記をタップして友達登録お願いします。</p>
          </section>

          <section class="netreserve_attention gradient-border">
            <div class="omit_wrap_size ">
              <div class="readmore_wrapper"></div>
              <h2 class="netreserve_attention_title">ご予約の注意</h2>
              <p class="netreserve_attention_text">
                メールご予約は当店1回以上ご利用された会員様に限ります。
                ご指名が有る場合、出勤表をご確認の上、コンパニオンの名前を入力して下さい。
                インターネット予約では、ご予約日の1週間前の深夜0時から受付開始となります。
                尚、当日のご予約はお電話のみになります。
                360分以上のコースをご希望のお客様は、お手数ですがお電話にてのご確認をお願い致します。
                このフォームではご予約成立とはなりません。ご予約受付後、24時間以内にお返事を お返ししております。その内容を以って、ご予約の成立となります。
                万が一、24時間経過後もお返事のメールが届かない場合は、お手数ですがお電話にてのご確認をお願い致します。
                (迷惑メールフォルダに入っている場合も御座いますので、届いてない場合はご確認下さい。)
                尚、予約が殺到した場合には、下記を理由に選考させていただきます。
                (メルマガ会員様、当店のご利用頻度、地域・時間的な問題、コンパニオンからの苦情の有無(本番強要・店外デート等の勧誘・部屋が汚い等)
                ご利用の携帯電話によっては特定のドメインからのメールの受信を拒否する機能(ドメイン指定受信) が設定されている場合がありますので、 [hips-matsudo.jp]を受信可能にしてから、ご登録下さいませ。
              </p>

            </div>
            <button class="omit_btn" type=”button” onclick="open_omit(this)">
            </button>


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
                  <dd><input type="text" id="guest_name" name="name" maxlength="10" placeholder="20文字以内（例）武田優" required
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
                  <dd><input type="text" name="メールアドレス" placeholder="メールアドレス" id="mail1" required
                      onblur="CheckGuestEmail(this)" pattern="^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$">
                  </dd>
                </dl>

                <dl>
                  <dt>メールアドレス(確認)<em>必須</em>
                    <span class="mini_alert">メールアドレスが異なります</span>
                  </dt>
                  <dd><input type="text" disabled name="メールアドレス(確認)" placeholder="メールアドレス(確認)" id="mail2" required
                      onblur="SameCheck(this)"></dd>
                </dl>


                <dl>
                  <dt>ご利用予定場所<em>必須</em>
                    <span class="mini_alert">記号は使えません</span>
                  </dt>

                  <dd>
                    <label class="play_place">
                      <input class="js-check" checked type="radio" name="plya_place" value="hotel"
                        onclick="formSwitch()">ホテル
                    </label>

                    <label class="play_place">
                      <input class="js-check" type="radio" name="plya_place" value="house" onclick="formSwitch()">ご自宅
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
                    <input id="house_address_input" type="text" name="othertext" placeholder="100文字以内です" size="30"
                      onblur="CheckGuestInfo(this)" pattern="^(?=.*\S.*
                      $)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,100}">
                  </div>
                </dl>

                <!-- ご予約日 -->
                <dl>
                  <dt>ご予約日時<em>必須</em></dt>
                  <p>ご希望日</p>
                  <select class="play_date_time select_check" required name="play_date">
                    <option value="" hidden>ご利用日をお選びください</option>
                    <?php for($i = 0; $i < 7; $i ++) : ?>
                    <?php echo '<option value="'.$today->format('m/d').'">' ?>
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
                    <?php echo '<option value="'.$sample_name.'">' ?>
                    <?php echo $sample_name ?>
                    </option>
                    <?php endforeach ?>

                  </select>
                </dl>

                <!-- オプション -->
                <dl>
                  <dt>オプション</dt>
                  <label class="option_select">
                    <input type="checkbox" value="おにぎり" name="option">
                    おにぎり
                  </label>
                  <label class="option_select">
                    <input type="checkbox" value="のりまき" name="option">
                    のりまき
                  </label>
                  <label class="option_select">
                    <input type="checkbox" value="おいなりさん" name="option">
                    おいなりさん
                  </label>
                </dl>

                <!-- テキストエリアにはパタン属性はない -->
                <dl>
                  <dt>ご質問・ご相談内容
                    <span class="mini_alert">記号は使えません</span>
                  </dt>
                  <dd>
                    <textarea rows=7 name="ご質問・ご相談内容" placeholder="例）電話連絡は18時以降にお願いいたします。"
                      onblur="checkTxt(this)"></textarea>
                  </dd>
                </dl>

                <div class="submit">
                  <input type="submit" disabled id="reserve_button" value="入力が完了していません" class="sendButton btn_active ">
                </div>

              </form>


            </div>
          </section>



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