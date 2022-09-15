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
  <link rel="stylesheet" type="text/css" href="css/girl_list.css" />
  <link rel="stylesheet" type="text/css" href="css/news.css" />
  <link rel="stylesheet" type="text/css" href="css/top.css" />

  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />

  <!--javascript-->
  <script src="js/swiper.min.js" defer></script>
  <script src="js/swiper_conf.js" defer></script>
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
    require_once( dirname(__FILE__). '/data.php');
    ?>
    <!------------------>


    <main id="main">


      <!-- スワイパー① -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <!-- foreach で数だけ取る -->
          <div class="swiper-slide">
            <a href="girls.php" class="swipe_a">
              <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
              <img src="img/sw01.jpeg" alt="">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="staff/staff00.php?name=test" class="swipe_a">
              <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
              <img src="img/sw02.jpeg" alt="">
            </a>
          </div>
          <div class="swiper-slide">
            <a href="staff/staff00.php?name=test" class="swipe_a">
              <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
              <img src="img/sw03.jpeg" alt="">
            </a>
          </div>
        </div>

        <!-- <div class="swiper-button-next next1"></div> -->
        <!-- <div class="swiper-button-prev prev1"></div> -->
        <div class="swiper-pagination page1"></div>
      </div>

      <!-- スワイパー①ここまで -->


      <!-- 最新ニュース -->
      <section id="whats_new" class="container under_space scroll-up">
        <div class="content_wrapper">

          <h2 class="block_title"><span>News</span></h2>
          <h3 class="block_title_caption">最新情報</h3>
          <ul class="topics">
            <!-- 最新３記事 -->
            <!-- イチ記事 -->
            <?php  $x = 1; $num = 3;?>
            <?php foreach($news_list as $news) :?>
            <?php if( $x > $num ) :?>
            <?php break ?>
            <?php else :?>
            <li class="topic">
              <div class="news_data">
                <time><?php echo $news[0]?></time>
                <span class="news_kinds"><?php echo $news[1]?></span>
              </div>
              <div class="news_top_title">
                <a href="" class="block_wrap_a">
                  <?php echo $news[2] ?>
                </a>
              </div>
            </li>
            <?php endif ?>
            <?php $x++ ?>

            <?php endforeach ?>
            <!-- ------- -->
          </ul>

          <div class="goto_list">
            <a href="newslist.php">
              <i class="fas fa-chevron-circle-right"></i><span>一覧を見る</span></a>
          </div>


        </div>
      </section>

      <!-- バナーリスト -->


      <section id="pic_bunner_area" class="under_space scroll-up">
        <div class="content_wrapper">

          <div class="swiper8 picbunnerSwiper">
            <ul class="swiper-wrapper">

              <!-- 一枚目 -->
              <?php foreach($picbunners as $picbunner) :?>
              <li class="swiper-slide pic_bunner_box">
                <a href="<?php echo $picbunner[1] ?>" class="">
                  <img src="<?php echo $picbunner[0]?>" alt="">
                </a>
              </li>

              <?php endforeach ?>

            </ul>
            <div class="swiper-pagination page8"></div>
          </div>

        </div>
      </section>




      <!-- 即 -->

      <section id="right_away" class="container content_bg_grey under_space scroll-up">
        <div class="content_wrapper">
          <!-- タウンの仕様がよくわからないのでサイズ指定は後回し -->
          <h2 class="block_title"><span>Right away</span></h2>
          <h3 class="block_title_caption">今すぐのご案内状況</h3>

          <iframe class="dto-sw2" id="dto-sw2-218"
            src="https://www.dto.jp/shop/6471/standby-widget-v2?mr=5&amp;l=10&amp;fc=000000&amp;if=dto-sw2-17569"
            width="100%" frameborder="0" scrolling="no" style="height: 290px;"></iframe>
          <script type="text/javascript">
          (function() {
            var _d = document.createElement('script');
            _d.src = 'https://www.dto.jp/js/dto.standby-widget-v2-52.js';
            _d.type = 'text/javascript';
            document.getElementsByTagName('head')[0].appendChild(_d);
          })();
          </script>

        </div>
      </section>

      <!-- おわり即 -->




      <!-- Event -->
      <section id="events" class="container under_space scroll-up">
        <div class="content_wrapper">

          <h2 class="block_title"><span>Event</span></h2>
          <h3 class="block_title_caption">イベント</h3>
          <ul class="event_list">
            <!-- イチ記事 -->
            <li class="event">
              <div class="banner_max event_banner">
                <a href="">
                  <img src="img/468x60.png" alt="">
                </a>
              </div>
            </li>
            <!-- --- -->

            <!-- イチ記事 -->
            <li class="event">
              <div class="banner_max event_banner">
                <a href="">
                  <img src="img/468x60.png" alt="">
                </a>
              </div>
            </li>
            <!-- --- -->
          </ul>

          <div class="goto_list button_small">
            <a href="" class="btn_color_red btn_active btn_font01">一覧へ</a>
          </div>

        </div>
      </section>

      <!-- 日記 -->
      <section id="diary" class="container content_bg_grey under_space scroll-up">
        <div class="content_wrapper">
          <!-- タウンの仕様がよくわからないのでサイズ指定は後回し -->
          <h2 class="block_title"><span>Diary</span></h2>
          <h3 class="block_title_caption">スタッフ日記</h3>

          <iframe class="dto-dw4" id="dto-dw4-218"
            src="https://www.dto.jp/shop/218/diary-widget-v4?l=11&amp;fc=000000&amp;if=dto-dw4-17569" width="100%"
            frameborder="0" scrolling="no"></iframe>
          <script type="text/javascript">
          (function() {
            var _d = document.createElement('script');
            _d.src = 'https://www.dto.jp/js/dto.diary-widget-v4-2.js';
            _d.type = 'text/javascript';
            document.getElementsByTagName('head')[0].appendChild(_d);
          })();
          </script>

        </div>
      </section>

      <!-- --- -->

      <!-- 本日の出勤 -->
      <section id="today_staff" class="under_space scroll-up content_bg_black">
        <div class="content_wrapper">
          <h2 class="block_title"><span>Today Staff</span></h2>
          <h3 class="block_title_caption">2022/03/29の出勤</h3>


          <!-- ここからスタッフカード -->
          <div class="staff_bg">
            <ul class="today_staff_wrap">

              <!-- foreachdeで回します -->
              <?php foreach($sample_names as $sample_name) :?>

              <!-- 1人目 -->
              <li class="staff_card">

                <!-- アイコン -->
                <!-- 今すぐとか -->
                <p class="staff_state_mark fukidashi_green">即ご案内</p>


                <a href="girls.php" class="today_staff_card block_wrap_a">
                  <!-- 写真 -->
                  <div class="staff_photo_area">
                    <figure class="staff_photo">
                      <img src='<?php echo $sample_name[1] ?>' alt="">
                    </figure>
                  </div>
                  <!-- 時間 -->
                  <p class="time_area"><i class="fas fa-clock"></i>
                    12:00~22:00</p>
                  <!-- 属性 -->
                  <div class="girl_types">
                    <span class="girl_type btn_color_blue">新人</span>
                    <span class="girl_type btn_color_pink">体験入店</span>
                    <span class="girl_type btn_color_red">人気No1</span>
                    <span class="girl_type btn_color_pink">やさしい</span>
                  </div>

                  <!-- profile -->

                  <span class="staff_name_age"><?php echo $sample_name[0]?></span>
                  <span class="staff_name_age">(<?php echo $sample_name[2]?>)</span>
                  <span class="bodysize">
                    <?php echo 'T/'.$sample_name[3].'&nbsp;B/'.$sample_name[4].'('.$sample_name[5].')&nbsp;H/'.$sample_name[6]?>
                  </span>

                  <!-- sns -->
                  <div class="staff_original_contents">
                    <a href=""><i class="fab fa-twitter twitter_color"></i></a>
                    <a href=""><i class="fas fa-pen-nib diary_color"></i></a>
                    <a href=""><i class="fas fa-video video_color"></i></a>
                    <a href=""><i class="fas fa-camera gravure_color"></i></a>
                  </div>



                </a>
              </li>
              <?php endforeach ?>
            </ul>
            <div class="goto_list button">
              <a href="scheduleweek.php" class="anime_btn btn_active btn_font01">週間スケジュール</a>
            </div>
          </div>

        </div><!-- コンテントラッパー閉じる -->

      </section>

      <!-- --- -->


      <!-- 新人またはピックアップ -->

      <section id="new_face" class="content_bg_pink under_space scroll-up">
        <div class="content_wrapper">
          <h2 class="block_title"><span>New Face</span></h2>
          <h3 class="block_title_caption">新人スタッフ</h3>
          <div class="swiper_custom_parent">
            <div class="swiper2 glSwiper">
              <div class="swiper-wrapper">
                <!-- foreach で数だけ取る -->
                <div class="swiper-slide girl-slide">
                  <a href="staff/staff00.php?name=test" class="swipe_a">
                    <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                    <img src="img/newface01.jpeg" alt="">
                    <div class="staff_data">
                      <p class="name_age">
                        <span class="name">名 前</span>
                        <span class="age">(20)</span>
                      </p>
                      <p class="body_size">
                        T/165&nbsp;B88(F)&nbsp;W60&nbsp;H88
                      </p>
                    </div>
                  </a>
                </div>
                <!-- ２人目 -->
                <div class="swiper-slide girl-slide">
                  <a href="staff/staff00.php?name=test" class="swipe_a">
                    <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                    <img src="img/newface02.jpeg" alt="">
                    <div class="staff_data">
                      <p class="name_age">
                        <span class="name">名前</span>
                        <span class="age">(20)</span>
                      </p>
                      <p class="body_size">
                        T/165&nbsp;B88(F)&nbsp;W60&nbsp;H88
                      </p>
                    </div>
                  </a>
                </div>
                <!-- 3人目 -->
                <div class="swiper-slide girl-slide">
                  <a href="staff/staff00.php?name=test" class="swipe_a">
                    <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                    <img src="img/newface03.jpeg" alt="">
                    <div class="staff_data">
                      <p class="name_age">
                        <span class="name">名前</span>
                        <span class="age">(20)</span>
                      </p>
                      <p class="body_size">
                        T/165&nbsp;B88(F)&nbsp;W60&nbsp;H88
                      </p>
                    </div>
                  </a>
                </div>

              </div>
              <div class="swiper-pagination page2"></div>
            </div>





          </div>
        </div>
      </section><!-- 新人終わり -->


      <!-- クチコミ -->

      <section id="reviews" class="container under_space scroll-up">

        <div class="content_wrapper">
          <h2 class="block_title"><span>Reviews</span></h2>
          <h3 class="block_title_caption">クチコミ情報</h3>


          <ul class="staff_review_wrap">

            <!-- クチコミ1 -->
            <li class="staff_review">
              <a href="" class="staff_review_content block_wrap_a">
                <div class="staff_review_bg">
                  <img src="img/concept00.jpeg" alt="">
                  <div class="assessment">
                    <p class="stars" style="--rating: 3.3;"></p>
                  </div>
                </div>
                <div class="staff_review_title">
                  <p>あいうえおかきくけこさしすせそたちつてとなにぬねのはまやらわ</p>
                </div>
                <div class="reviewer_data">
                  <p class="reviewer_name">名前たろう様</p>
                  <p class="date_use">ご利用日2020年1月1日</p>
                </div>
              </a>
            </li>

            <!-- クチコミ2 -->
            <li class="staff_review">
              <a href="" class="staff_review_content block_wrap_a">
                <div class="staff_review_bg">
                  <img src="img/concept01.jpeg" alt="">
                  <div class="assessment">
                    <p class="stars" style="--rating: 3.3;"></p>
                  </div>
                </div>
                <div class="staff_review_title">
                  <p>あいうえおかきくけこさしすせそたちつてとなにぬねのはまやらわ</p>
                </div>
                <div class="reviewer_data">
                  <p class="reviewer_name">名前たろう様</p>
                  <p class="date_use">ご利用日2020年1月1日</p>
                </div>
              </a>
            </li>

            <!-- クチコミ3 -->
            <li class="staff_review">
              <a href="" class="staff_review_content block_wrap_a">
                <div class="staff_review_bg">
                  <img src="img/concept02.jpeg" alt="">
                  <div class="assessment">
                    <p class="stars" style="--rating: 3.3;"></p>
                  </div>
                </div>
                <div class="staff_review_title">
                  <p>あいうえおかきくけこさしすせそたちつてとなにぬねのはまやらわ</p>
                </div>
                <div class="reviewer_data">
                  <p class="reviewer_name">名前たろう様</p>
                  <p class="date_use">ご利用日2020年1月1日</p>
                </div>
              </a>
            </li>

            <!-- クチコミ4 -->
            <li class="staff_review">
              <a href="#" class="staff_review_content block_wrap_a">
                <div class="staff_review_bg">
                  <img src="img/concept00.jpeg" alt="">
                  <div class="assessment">
                    <p class="stars" style="--rating: 3.3;"></p>
                  </div>
                </div>
                <div class="staff_review_title">
                  <p>あいうえおかきくけこさしすせそたちつてとなにぬねのはまやらわ</p>
                </div>
                <div class="reviewer_data">
                  <p class="reviewer_name">名前たろう様</p>
                  <p class="date_use">ご利用日2020年1月1日</p>
                </div>
              </a>
            </li>


          </ul>

          <div class="goto_list button_small">
            <a href="reviewlist.php" class="btn_color_red btn_active btn_font01">一覧へ</a>
          </div>

      </section>

      <!-- 注意点 -->

      <!-- クーポン作る -->


      <section id="coupon_area" class="content_bg_grey container under_space scroll-up">
        <div class="content_wrapper">

          <h2 class="block_title"><span>Coupon</span></h2>
          <h3 class="block_title_caption">お得なクーポン</h3>
          <div class="swiper3 couponSwiper">
            <div class="swiper-wrapper">

              <!-- 一枚目 -->
              <div class="swiper-slide coupon">
                <a href="" class="btn btn-coupon">
                  <span class="coupon_name">ご新規割引クーポン</span>
                  <span class="coupon_price">10%OFF</span>
                </a>
              </div>

              <!-- ２枚目 -->
              <div class="swiper-slide coupon">
                <a href="" class="btn btn-coupon">
                  <span class="coupon_name">今日だけクーポン</span>
                  <span class="coupon_price">2%OFF</span>
                </a>
              </div>

              <!-- ３枚目 -->
              <div class="swiper-slide coupon">
                <a href="" class="btn btn-coupon">
                  <span class="coupon_name">ご新規割引クーポン</span>
                  <span class="coupon_price">3%OFF</span>
                </a>
              </div>


            </div>
            <div class="swiper-pagination page3"></div>
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
      <a href="girls.php">
        <h1>上から出る場合。</h1>
      </a>




      <div class="font-test">
        <h1>フォントテスト</h1>
        あいうえおかきくけこさしすせそ
        tati
        abcdefghijklmnopqrstuvwxyz
        家でやりました
        ネットでやりました
      </div>
      <br>
      <a href="staff/staff00.php">staff</a>
      <br>
      <a href="newmember.php">登録</a>



      <br>

      <!-- Slider main container -->
      <!-- swiperはここ参照 -->
      <a href="https://garigaricode.com/swiper/" target="blank">ここわかりやすい</a>

      <h4>スワイパーテスト</h4>


      <a href="https://tech.pjin.jp/blog/developer/">php vba</a>

      <div>
        datefmt_set_calendar
      </div>

      <!---------------------------------------------------->


      <br>
      <br>





      <br>
      <br>



      <!-- Slider main container -->
      <h4>スワイパーテスト3複数段</h4>
      <div class="swiper4 newsSwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide news-slide">slide 1</div>
          <div class="swiper-slide news-slide">Slide 2</div>
          <div class="swiper-slide news-slide">Slide 3</div>
          <div class="swiper-slide news-slide">slide 4</div>
          <div class="swiper-slide news-slide">slide 5</div>
          <div class="swiper-slide news-slide">slide 6</div>
          <div class="swiper-slide news-slide">slide 7</div>
          <div class="swiper-slide news-slide">slide 8</div>
          <div class="swiper-slide news-slide">slide 9</div>
        </div>

        <div class="swiper-button-next next4"></div>
        <div class="swiper-button-prev prev4"></div>
        <div class="swiper-pagination page4"></div>
      </div>


      <br>
      <br>
      <br>
      <br>
      <br>


      <br>
      <br>
      <br>
      <br>
      dddd
      アップできるかな？
      新しいマックですよ
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