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
  <link rel="stylesheet" type="text/css" href="css/review.css" />
  <link rel="stylesheet" type="text/css" href="css/girl_list.css" />
  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />

  <!--javascript-->
  <script src="js/script.js" defer></script>
  <script src="js/header.js" defer></script>
  <script src="js/accordion.js" defer></script>
  <script src="js/loading.js" defer></script>
  <script src="js/expansion.js" defer></script>

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

      <article id="review" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Review</span></h1>
          <h3 class="block_title_caption">お客様の声</h3>


          <section class="under_space">
            <div class="banner_max event_banner under_half_space">
              <img src="img/review_discount.png" alt="口コミ割引">
            </div>
            <figure class="reviewed_girl gradient-border">
              <img src="img/concept00.jpeg" alt="">
              <figcaption class="reviewed_girl_data">

                <ul class="row_girl_data">
                  <li class="name_age">
                    <span class="staff_name">
                      <?php echo $_GET['review'] ?>さん
                    </span>
                    <span class="staff_age">(20)</span>
                  </li>
                  <li class="bodysize">
                    <p>T/155&nbsp;B/88(F)&nbsp;H/92</p>
                  </li>
                  <li class="shop_comment">お店からのイチオシコメント</li>
                  <li>コメント数　10</li>
                  <li>☆☆☆☆☆</li>
                </ul>
              </figcaption>
            </figure>
            <p class="button_arrow review_button">
              <a href="" class="btn_color_pink btn_font01">
                <?php echo $_GET['review'] ?>さんの口コミを書く
              </a>
            </p>

        </div><!-- content_wrapper -->
        </section>

        <!-- ここから口コミ -->

        <!-- データ持ってきてる -->

        <?php
          class Reviewers
          {
              private $name;
              private $review_comment;
              public function __construct(
                $name,
                $review_comment,
                $comment_count
                )
              {
                  $this->name = $name;
                  $this->review_comment = $review_comment;
                  $this->comment_count = $comment_count;
              }
              public function getName()
              {
                  return $this->name;
              }
              public function getComment()
              {
                  return $this->review_comment;
              }
              public function getComment_count()
              {
                  return $this->comment_count;
              }
            }
          // とりあえず３人ほど作っておく

          $tanaka = new Reviewers("田中","とても良かった",3);
          $yoshida = new Reviewers("佐竹","良かったかもしれない",4);
          $yamada = new Reviewers("森本","すげーまずかった",10);

          $reviews =[$tanaka,$yoshida,$yamada];
          
          ?>

        <?php foreach($reviews as $review) :?>
        <!--レビューカード  -->
        <section class="review_card">
          <div class="review_header content_wrapper under_space">
            <figure class="reviewer">
              <a href="">
                <span class="user_icon">
                  <img src="img/user_face.png" alt="">
                </span>
                <figcaption class="reviewer_data">
                  <h2 class="user_name">
                    <?php echo $review->getName() ?>さん
                  </h2>
                  <span class="comment_count">
                    口コミ履歴(<?php echo $review->getComment_count() ?>)
                  </span>

                </figcaption>
              </a>
            </figure>

            <section class="review_body">
              <div class="review_header">
                <p>訪問日
                  <span>2000年1月1日
                  </span>
                </p>
                <p class="stars" style="--rating: 3.3;">3.3</p>
                <ul class="review_rate">
                  <li>項目1<span>5</span></li>
                  <li>項目2<span>5</span></li>
                  <li>項目3<span>5</span></li>
                  <li>項目4<span>5</span></li>
                  <li>項目5<span>5</span></li>
                </ul>
                <div class="review_main">
                  <h3 class="review_title"><?php echo $review->getComment() ?></h3>
                  <p class="review_text">
                    あいうえおかきくけこさしすせそたちつてとなにぬねの<br>
                    あいうえおかきくけこさしすせそたちつてとなにぬねの<br>
                    あいうえおかきくけこさしすせそたちつてとなにぬねの<br>
                    あいうえおかきくけこさしすせそたちつてとなにぬねの<br>
                  </p>
                  <div class="review_footer">
                    <p>掲載日時<span>2000年1月1日</span></p>
                  </div>
                </div>
                <div class="review_reply">
                  <h3 class="reply_title">お店からの返信コメント</h3>
                  <p class="reply_text">
                    あいうえおかきくけこさしすせそたちつてとなにぬねの<br>
                    あいうえおかきくけこさしすせそたちつてとなにぬねの<br>
                    あいうえおかきくけこさしすせそたちつてとなにぬねの<br>
                    あいうえおかきくけこさしすせそたちつてとなにぬねの<br>
                  </p>
                  <div class="reply_footer">
                    <p>掲載日時<span>2000年1月1日</span></p>
                  </div>

                </div>
            </section>

            <div class="goto_list button_small">
              <a href="eventlist.php" class="btn_color_red btn_active btn_font01">一覧へ</a>
            </div>

          </div><!-- content_wrapper -->

        </section>
        <?php endforeach ?>







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