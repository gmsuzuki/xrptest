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
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/myswiper.css">
  <!-- 共通 -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />
  <link rel="stylesheet" type="text/css" href="css/accordion.css" />
  <link rel="stylesheet" type="text/css" href="css/footer.css" />
  <!-- ページ毎 -->
  <link rel="stylesheet" type="text/css" href="css/girls_profile.css" />
  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />



  <!-- javascript -->
  <script src="js/swiper.min.js" defer></script>
  <script src="js/swiper_conf.js" defer></script>
  <script src="js/script.js" defer></script>
  <script src="js/accordion.js" defer></script>
  <script src="js/fadein.js" defer></script>
  <script src="js/header_sp.js" defer></script>
  <script src="js/under_nav.js" defer></script>
  <!-- SP画面転換時のインパクトのときは、onloadをまとめてheader_spへ -->
  <!-- <script src="js/loading.js" defer></script> -->
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

    <!-- 特殊ヘッダー -->
    <?php require_once("header_girl.php") ?>
    <!------------------>

    <main>

      <article id="girls_profile">

        <!-- スワイパー① -->
        <div class="swiper mySwiper girl_profile_imgs">
          <div class="swiper-wrapper">
            <!-- foreach で数だけ取る -->
            <div class="swiper-slide">
              <a href="staff/staff00.php?name=test" class="swipe_a">
                <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                <img src="img/girl01.jpeg" alt="" class="profile_img">
              </a>
            </div>
            <div class="swiper-slide">
              <a href="staff/staff00.php?name=test" class="swipe_a">
                <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                <img src="img/girl02.jpeg" alt="">
              </a>
            </div>
            <div class="swiper-slide">
              <a href="staff/staff00.php?name=test" class="swipe_a">
                <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                <img src="img/girl03.jpeg" alt="">
              </a>
            </div>
          </div>

          <div class="swiper-button-next next1 swiper_arrow"></div>
          <div class="swiper-button-prev prev1 swiper_arrow"></div>
          <div class="swiper-pagination page1"></div>
        </div>

        <!-- スワイパー①ここまで -->

        <!-- ここからprofileデータ -->
        <section id="girls_data" class="container under_space">
          <div class="content_wrapper">

            <!-- 新人とか -->
            <span class="girls_special_tag anime_text_bg">
              新人
            </span>
            <!-- 名前　年齢 -->
            <div class="girls_basic_plofile">
              <div class="basic_plofile_left">
                <h1 class="girl_name_age">
                  <span class="girl_name">江口 寿史</span>
                  <span class="girl_age">(20)</span>
                </h1>
                <p>T/165&nbsp;B88(F)&nbsp;W60&nbsp;H88</p>
              </div>
              <div class="girl_ather_service">
                <span class="girl_sns">twitter</span>
                <span class="girl_sns">diary</span>
                <span class="girl_sns">movie</span>
              </div>
            </div>

            <div class="girls_name_age_type under_space">
              <p>#タイプ</p>
              <div class="girls_play_type">
                <span class="play_type_tag">aaaaa</span>
                <span class="play_type_tag">bbbbb</span>
                <span class="play_type_tag">ccccc</span>
                <span class="play_type_tag">ddddd</span>
                <span class="play_type_tag">eeeee</span>
                <span class="play_type_tag">aaaaa</span>
                <span class="play_type_tag">bbbbb</span>
              </div>
            </div>

          </div><!-- content_wrapperここまで -->
        </section>


        <!-- 店長コメント -->

        <section id="shop_comment" class="under_space scroll-up">
          <div class="content_wrapper">
            <h2 class="block_title"><span>Comment</span></h2>
            <h3 class="block_title_caption">お店からの一言</h3>
            <div class="shop_comment_text">
              <p class="girl_catchphrase">#キャッチフレーズ</p>
              キラ星のごとく馬橋に現れたショートボブが似合う
              パッチリ二重お目目はもちろんのこと、カワイイお顔立ちに心ときめいちゃいます。
              性格もおっとりしているので居心地もよく
              会話をしていてもリラックスできると思いますよ。
              若さ溢れるモチモチの美肌、そしてツンと主張しているEカップ美乳
              思わずどこもかしこも吸い付きたくなりますね～
              20歳にしてこの業界に入ってプレイも勉強中ですが
              責めて敏感、責められて御奉仕に没頭と
              責めても責められてもどちらもお楽しみ頂けると思います♪
              フレッシュな子とのお時間を是非とも味わって下さいませ♪
            </div>
          </div>
        </section>



        <!-- アンケート -->

        <section id="girl_enquete" class="under_space scroll-up">
          <div class="content_wrapper">
            <h2 class="block_title"><span>En quete</span></h2>
            <h3 class="block_title_caption">アンケート</h3>
            <ul class="girl_enquete_list">
              <li>
                <span class="question">どこ生まれ？</span>
                <span class="anser">地球の日本</span>
              </li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>

          </div>
        </section>



        <!-- ムービー -->
        <!-- 再生回数をアナリティクスで数えるようにする -->
        <section id="girl_video" class="under_space scroll-up">
          <div class="content_wrapper">
            <h2 class="block_title"><span>Video</span></h2>
            <h3 class="block_title_caption">動画</h3>
            <video muted="" controls autoplay="" loop="" width="100%">
              <source src="./data/video02.mp4" type="video/mp4">
            </video>
          </div>
        </section>


        <!-- スケジュール -->

        <!-- スタッフのスケジュール -->
        <section id="girl_schedule" class="under_space scroll-up">
          <div class="content_wrapper">
            <h2 class="block_title"><span>Schedule</span></h2>
            <h3 class="block_title_caption">今週のスケジュール</h3>

            <!-- ここからスケジュール表 -->
            <ul class="weekly_schedule_list">
              <li>
                <span class="date">04月1日(月)</span>
                <span class="time">10:00~19:00</span>
              </li>
              <li>
                <span class="date">04月1日(月)</span>
                <span class="time">10:00~19:00</span>
              </li>
              <li>
                <span class="date">04月1日(月)</span>
                <span class="time">10:00~19:00</span>
              </li>
              <li>
                <span class="date">04月1日(月)</span>
                <span class="time">10:00~19:00</span>
              </li>
              <li>
                <span class="date">04月1日(月)</span>
                <span class="time">10:00~19:00</span>
              </li>
              <li>
                <span class="date">04月1日(月)</span>
                <span class="time">10:00~19:00</span>
              </li>
              <li>
                <span class="date">04月1日(月)</span>
                <span class="time">10:00~19:00</span>
              </li>
            </ul>


          </div> <!-- コンテントラッパーここまで -->

        </section>



        <br>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <a href="index.php">
          <h1>トップへ戻る</h1>
        </a>

        <a href="https://mdesign-y.com/frontend/197/" target="blank">
          フェードインさせる方法
        </a>


        <h1>
          バックグランドURLを固定する場合
          バックグラウンドカバーをするとおかしくなる
          回避方法
          <a href="https://web.runland.co.jp/blog_cate2/post-3558">
            これです
          </a>
        </h1>

        <div id="testdes">test</div>
        <br>
        <br>

      </article>
      <!-- profileここまで -->

      <?php require_once("under_nav.php"); ?>
      <br>
      <br>
      <br>
      <br>

      <?php
      require_once("accordion.php");
      ?>

    </main>

    <?php
    require_once("footer.php");
    ?>

  </div>
  <!-- wrapper ここまで -->


</body>

</html>