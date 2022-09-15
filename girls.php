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
    <?php
        require_once( dirname(__FILE__). '/parts/header_girl.php');
        require_once( dirname(__FILE__). '/data.php');
     ?>
    <!------------------>

    <main id="main">

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

            <div class="girls_basic_plofile">
              <p class="girls_special_tag anime_text_bg_pink">新 人</p>

              <p class="girl_punchline">ストップひばりくんで有名な！</p>
              <!-- 新人とか -->
              <div class="girl_name_sns">
                <h1>江口寿史 <span class="san_chan">さん</span></h1>
                <ul class="sns_mark_list">
                  <li class="circle_icon"><a href=""><i class="fab fa-twitter twitter_color"></i></a></li>
                  <li class="circle_icon"><a href=""><i class="fas fa-pen-nib diary_color"></i></a></li>
                  <li class="circle_icon"><a href=""><i class="fas fa-video video_color"></i></a></li>
                  <li class="circle_icon"><a href=""><i class="fas fa-camera gravure_color"></i></a></li>
                </ul>
              </div>
              <ul class="girl_age_size_review">
                <p>
                  <i class="fas fa-birthday-cake"></i>
                  年齢:<span class="girl_age">20</span>歳
                </p>

                <div>
                  <i class="fas fa-female"></i>
                  スリーサイズ:
                  <span class="girl_age">165</span>
                  <span class="girl_bust">88</span>
                  <span class="girl_cup">(F)</span>
                  <span class="girl_west">60</span>
                  <span class="girl_hip">88</span>
                </div>
                <p>
                  <i class="fas fa-comment"></i>
                  口コミ
                  <span>10</span>
                </p>
              </ul>


            </div> <!-- profileここまで -->
          </div><!-- content_wrapperここまで -->
        </section>



        <!-- スタッフのスケジュール -->
        <section id="girl_schedule" class="under_space scroll-up">
          <div class="content_wrapper">
            <h2 class="block_title"><span>Schedule</span></h2>
            <h3 class="block_title_caption">今週のスケジュール</h3>
          </div> <!-- コンテントラッパーここまで -->

          <div class="swiper6 scheduleSwiper schedule_box">
            <!-- <div class="swiper-wrapper"> -->

            <!-- <div class="swiper-wrapper"> -->


            <ul class="swiper-wrapper">
              <?php for($i = 0; $i < 7; $i ++) : ?>
              <!-- 曜日で背景色を変える -->
              <?php if($today->format("w") == 0) :?>
              <li class="swiper-slide schedule_day_tip week_sun">

                <!-- 土曜日なら -->
                <?php elseif($today->format("w") == 6) :?>
              <li class="swiper-slide schedule_day_tip week_sat">
                <?php else :?>
                <!-- 平日なら -->
              <li class="swiper-slide schedule_day_tip">
                <?php endif ?>
                <!-- ーーーー背景色ここまで-------- -->
                <a href="" class="btn">
                  <p class="schedule_date">
                    <?php echo "{$today->format('m/d')}" ?>
                    (<?php echo $week_name[$today->format("w")];?>)
                  </p>
                  <div class="attendance_time">
                    <span>00:00</span>
                    ~
                    <span>00:00</span>
                  </div>
                  <span class="block_anime girl_reserve_btn">
                    予約する
                  </span>
                </a>
              </li>
              <?php $today->modify("+1 day") ;?>
              <?php endfor ?>
            </ul>

            <!-- </div> -->
          </div>

        </section>



        <!-- スタッフキャラター -->
        <section id="girl_contents" class="under_space">
          <div class="content_wrapper">
            <h2 class="girl_content_head">
              <figure class="girl_content_img">
                <img src="img/girl03.jpeg" alt="">
              </figure>
              <span class="girl_content_title">江口寿史さんについて</span>
            </h2>
          </div>


          <section class="girl_characteristic under_space">
            <h3 class="girl_tag_title">#type</h3>
            <!-- リスト -->
            <ul>
              <li class="play_type_tag anime_text_bg_blue">ナンバー・ワン</li>
              <li class="play_type_tag anime_text_bg_blue">熱心</li>
              <li class="play_type_tag  anime_text_bg_pink">まじめ</li>
              <li class="play_type_tag  anime_text_bg_pink ">やる気</li>
            </ul>
          </section>




          <section class="girl_qanda under_space">
            <!-- <h3 class="play_type_tag_title">#Q&A</h3> -->
            <!-- 質問リスト -->

            <div class="swiper7 qandaSwiper">
              <div class="swiper-wrapper">
                <?php $qnum = 1 ?>

                <?php foreach($sample_qandas as $key => $sample_qanda) :?>

                <!-- 一枚目 -->
                <div class="swiper-slide">
                  <div class="q_list">
                    <h3 class="girl_tag_title question_title"><span>#Q.</span><?php echo $qnum ?></h3>
                    <div class="q_item">
                      <p class="qanda_question"><?php echo $key ?></p>
                      <p class="qanda_answer"><?php echo $sample_qanda ?></p>
                    </div>
                  </div>
                </div>
                <?php $qnum ++ ?>
                <?php endforeach ?>
              </div>
            </div>

          </section>

          <!-- 店長コメント -->
          <section id="shop_comment" class="under_space scroll-up">
            <div class="content_wrapper">
              <h2 class="review_content_head">
                <figure class="review_content_img">
                  <img src="img/staff.jpeg" alt="">
                </figure>
                <span class="shop_comment_title">店長から一言</span>
              </h2>

              <div class="shop_comment_text omit_wrap_size">
                <div class="readmore_wrapper"></div>
                <p>
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
                </p>
              </div>
              <button class="omit_btn" type=”button” onclick="open_omit(this)">
              </button>

            </div>

          </section>





          <!-- オプション -->

          <section id="girl_option" class="under_space">
            <div class="content_wrapper">
              <h3 class="girl_tag_title"><span>#option</span></h3>

              <ul class="girl_option_list">

                <li class="option_card">
                  <p class="option_q">オプション名</p>
                  <p class="option_a">○</p>
                </li>
                <li class="option_card">
                  <p class="option_q">オプション名</p>
                  <p class="option_a">○</p>
                </li>
                <li class="option_card">
                  <p class="option_q">オプション名</p>
                  <p class="option_a">○</p>
                </li>
                <li class="option_card">
                  <p class="option_q">オプション名</p>
                  <p class="option_a">○</p>
                </li>
                <li class="option_card option_ng">
                  <p class="option_q option_ng">スペシャル</p>
                  <p class="option_a option_ng">ｘ</p>
                </li>
              </ul>

            </div>
          </section>


          <!-- ムービー -->
          <!-- 再生回数をアナリティクスで数えるようにする -->
          <section id="girl_video" class="under_space">
            <div class="content_wrapper">
              <h3 class="girl_tag_title pic_title">#video</h3>
              <div class="video_wrapper">
                <video preload=“none” muted controls loop playsinline poster="./img/movie_pic.jpeg" width="100%"
                  height="100%">
                  <source src="./data/video02.mp4" type="video/mp4">
                </video>
              </div>
            </div>
          </section>



          <!-- グラビア -->
          <section id="girl_gravure" class="under_space">
            <div class="content_wrapper">
              <h3 class="girl_tag_title gravure pic_title ">#gravure</h3>

              <div class="swiper9 gravureSwiper">
                <div class="swiper-wrapper">

                  <?php foreach($sample_girl_gravures as $key => $sample_girl_gravure) :?>

                  <!-- 一枚目 -->
                  <ul class="swiper-slide">
                    <li class="gravure_card">
                      <figure>
                        <img src='<?php echo $sample_girl_gravure ?>' alt="">
                        <figcaption><?php echo $key ?></figcaption>
                      </figure>
                    </li>
                  </ul>

                  <?php endforeach ?>
                </div>
              </div>


            </div>
          </section>



        </section><!-- 全体のセクション -->


        <!-- TWITTER -->

        <section id="girls_sns" class="block_anime under_space scroll-up">
          <div class="content_wrapper timeline_space">
            <h2 class="block_title"><span>SNS</span></h2>
            <h3 class="block_title_caption">Social Networking Service</h3>
            <section class="twitter_area">
              <h3 class="girl_tag_title sns_title">#twitter</h3>
              <div class="twitter_wrapper">
                <a class="twitter-timeline" data-chrome="noheader nofooter"
                  href="https://twitter.com/kinoshita07?ref_src=twsrc%5Etfw" data-tweet-limit="5">
                  Tweets by kinoshita07</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </section>
            <!-- スタッフ日記 -->
            <section class="diary_area">
              <h3 class="girl_tag_title sns_title">#diary</h3>
              <div class="diary_wrap">
                <iframe class="dto-dw4" id="dto-dw4-6471-2973418" width="100%" frameborder="0" scrolling="no"
                  src="https://www.dto.jp/shop/218/diary-widget-v4?g=3766115&amp;dt=1&amp;l=11&amp;fc=000000&amp;if=dto-dw4-218-3766115"
                  style="height: 230px;"></iframe>
              </div>
            </section>

          </div>
        </section>




        <section id="girls_review" class="under_space scroll-up">
          <div class="content_wrapper">
            <h2 class="block_title"><span>Review</span></h2>
            <h3 class="block_title_caption">レビュー</h3>

            <!-- pickupコメント -->
            <section id="pickup_recommend" class="under_space scroll-up">
              <div class="content_wrapper">
                <h3 class="girl_tag_title review_title">#pick up</h3>
                <h2 class="pickup_recommend_head">
                  <figure class="pickup_recommend_img">
                    <img src="img/guest.jpeg" alt="">
                  </figure>
                  <span class="pickup_recommend_name"><?php echo $reviews[0][0]?></span>
                </h2>

                <div class="pickup_recommend_contents">
                  <p class="fukidashi_red staff_state_mark">pick up</p>
                  <p class="pickup_recommend_title"><?php echo $reviews[0][5]?></p>
                  <p class="stars review_fav" style="--rating: <?php echo $reviews[0][4]?>;">
                    <?php echo $reviews[0][4]?></p>
                  <span class="date_of_use"><?php echo $reviews[0][2]?></span>
                  <p class="pickup_recommend_text"><?php echo $reviews[0][6]?></p>
                </div>

              </div>

            </section>


            <!-- クチコミ -->
            <section id="customer_review" class="under_space scroll-up">
              <h3 class="girl_tag_title review_title">#review</h3>
              <a href="">
                <h3 class="block_title_caption">江口さんへのクチコミ
                  <span>(<?php echo count($reviews) ?>)</span>
                </h3>
              </a>
              <div class="girl_review_list">
                <?php foreach($reviews as $review) :?>
                <!-- レビュー -->
                <dl class="girl_review_wrap">
                  <dt class="girl_review_head">
                    <p class="reviewer_name"><?php echo $review[0] ?></p>
                    <p class="stars review_fav" style="--rating: <?php echo $review[4]?>;">
                      <?php echo $review[4]?></p>
                    <p class="review_date"><?php echo $review[3] ?></p>
                  </dt>
                  <dd class="girl_review_body">
                    <div class="review_content">
                      <p class="visit_date"><span><?php echo $review[2] ?></span>ご利用</p>
                      <p>
                        <?php echo $review[6] ?>
                      </p>
                    </div>
                  </dd>
                </dl>
                <?php endforeach ?>

              </div>
              <!-- レビューリストここまで -->
              <div class="button goto_review_write">
                <a href="" class="anime_btn btn_active btn_font01">クチコミを投稿する</a>
              </div>

          </div>

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
          require_once( dirname(__FILE__). '/parts/accordion.php');
      ?>

    </main>

    <?php
        require_once( dirname(__FILE__). '/parts/footer.php');
    ?>

  </div>
  <!-- wrapper ここまで -->


</body>

</html>