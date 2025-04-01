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
  <link rel="stylesheet" type="text/css" href="css/event.css" />


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

  // 最新情報info
    require_once( dirname(__FILE__). '/setting/class/info_class.php');
    require_once( dirname(__FILE__). '/setting/data/info_data.php');

    $info_instances = []; // 空の配列を初期化
    foreach ($info_list as $info_item) {
    $info_instances[] = new InfoManager($info_item); // 新しいインスタンスを配列に追加
    }

    // is_visible が true のものだけを抽出
    $visible_instances = array_filter($info_instances, function($instance) {
    return $instance->getIsVisible();
    });

    // 最新順にソート
    usort($visible_instances, function($a, $b) {
    return strtotime($b->getInfoTime()) - strtotime($a->getInfoTime());
    });

    // 最新の3つを取得
    $info_naw = array_slice($visible_instances, 0, 3);

    // イベント
    // InfoTypeが1のものだけを抽出
    $type1_instances = array_filter($visible_instances, function($instance) {
    return $instance->getInfoType() == 1;
    });

    // 最大6件まで取得
    $event_naw = array_slice($type1_instances, 0, 6);


  
    // 女子スタッフ
    require_once( dirname(__FILE__). '/setting/class/girl_class.php');
    require_once( dirname(__FILE__). '/setting/data/girl_data.php');
    require_once( dirname(__FILE__). '/setting/class/attendance_class.php');
    require_once( dirname(__FILE__). '/setting/data/attendance_data.php');
    require_once( dirname(__FILE__). '/setting/class/schedule_girl_class.php');

    // スタッフprofile
    foreach($sample_names as $sample_name){
    $staffList[] = new girlProfilelManager($sample_name);
    }
    // スタッフの画像
    foreach($sample_pics as $sample_pic){
       $girlNumber = $sample_pic['girlNumber'];
    // girlImageManagerのインスタンスを作成
    $staffPicList[] = new girlImageManager($girlNumber, $sample_pic);
      }
    

    // 最新順にソート
    usort($staffList, function($a, $b) {
    return strtotime($b->getRegistrationDate()) - strtotime($a->getRegistrationDate());
    });

    // 今日の日付を取得
    $today = new DateTime();

    // 1ヶ月前の日付を計算
    $oneMonthBefore = new DateTime();
    $oneMonthBefore->modify('-1 month');

    // $newgirl 配列を初期化
    $newgirl = [];

    // $girlProfiles 配列をループ
    foreach ($staffList as $profile) {
    // $registrationDate を DateTime オブジェクトに変換
    $registrationDate = new DateTime($profile->getRegistrationDate());

    // $registrationDate が今日から1ヶ月以内かどうかをチェック
    if ($registrationDate >= $oneMonthBefore && $registrationDate <= $today) {
        // 条件を満たす場合、$newgirl 配列に追加
        $newgirl[] = $profile;
    }
    }


    // $allscheduleはすべてのスケジュール
    $allschedule = [];
    //今日の出勤リスト
    $todayschedulelist = [];
    

    foreach ($scheduleArray as $schedule) {
    $allschedule[] = new InputAttendanceReserve($schedule); // 配列に追加
    }


    foreach($allschedule as $dayobj){
      // attendanceWorkDay を DateTime オブジェクトに変換
      $attendanceWorkDay = new DateTime( $dayobj->getAttendanceWorkDay());
      if($today -> format('Y-m-d') == $attendanceWorkDay->format('Y-m-d')){
      $todayschedulelist[] =  $dayobj;
      }}

 
 // girlSnsManager のインスタンスを作成
$girlsSns = []; // インスタンスを格納する配列

foreach ($sample_sns_lists as $data) {
    // girlNumber と SNS データを渡してインスタンス化
    $girlsSns[] = new girlSnsManager($data['girlNumber'], $data);
}


// girlTagManager のインスタンスを作成
$girlsTags = []; // インスタンスを格納する配列

foreach ($sample_tag as $tag) {
    // girlNumber と SNS データを渡してインスタンス化
    $girlsTags[] = new girlTagManager($tag['girlNumber'], $tag);

}


// review
    require_once( dirname(__FILE__). '/setting/data/review_data.php');
    require_once( dirname(__FILE__). '/setting/class/review_class.php');

    ?>



    <!------------------>


    <main id="main">



      <!-- スワイパー① -->
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <!-- foreach で数だけ取る -->
          <?php foreach($sw_events as $sw_event) :?>
          <div class="swiper-slide">

            <a href='information.php?infoid=<?php echo $sw_event->getEventId() ?>' class="swipe_a">
              <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
              <img src='<?php echo $sw_event->getEventImg() ?>' alt="">
            </a>
          </div>
          <?php endforeach ?>
        </div>

        <!-- <div class="swiper-button-next next1"></div> -->
        <!-- <div class="swiper-button-prev prev1"></div> -->
        <div class="swiper-pagination page1"></div>
      </div>

      <!-- スワイパー①ここまで -->





      <!-- 最新ニュース -->
      <section id="whats_new" class="container under_space scroll-up">
        <div class="content_wrapper">

          <h2 class="block_title"><span>Information</span></h2>
          <h3 class="block_title_caption">最新情報</h3>
          <ul class="topics">
            <!-- 最新３記事 -->
            <!-- イチ記事 -->

            <?php foreach($info_naw as $news) :?>
            <a href="information.php?infoid=<?php echo $news -> getInfoId()?>" class="block_wrap_a">
              <li class="topic">
                <div class="news_data">
                  <time><?php echo $news->getInfoDate()?></time>
                  <span class="news_kinds" style="background-color:<?php echo $news->getInfoColor()?>">
                    <?php echo $news->getInfoTitleBody()?>
                  </span>
                </div>
                <div class="news_top_title">

                  <?php echo $news->getInfoTitle() ?>

                </div>
              </li>
            </a>
            <?php endforeach ?>
            <!-- ------- -->
          </ul>

          <div class="goto_list">
            <a href="infolist.php">
              <i class="fas fa-chevron-circle-right"></i><span>一覧を見る</span></a>
          </div>


        </div>
      </section>

      <!-- バナーリスト -->


      <section id="pic_bunner_area" class="under_space scroll-up">
        <div class="content_wrapper">

          <div class="swiper8 picbunnerSwiper">
            <ul class="swiper-wrapper">


              <!-- スワイパーに持ってくるデータをどうするか？ -->

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
            <?php foreach($event_naw as $event) :?> <li>
              <a href="information.php?infoid=<?php echo $event->getInfoId() ?>">
                <img src="<?php echo $event->getInfoImg() ?>" alt="">
                <div class="event_title">
                  <p><?php echo $event->getInfoTitle() ?></p>
                </div>
              </a>
            </li>
            <?php endforeach ?>

          </ul>


          <div class="goto_list">
            <a href="eventlist.php">
              <i class="fas fa-chevron-circle-right"></i><span>一覧を見る</span></a>
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
          <h3 class="block_title_caption"><?php echo "{$today->format('m/d')}" ;?>
            <?php echo $week_name[$today->format("w")] ;?>の出勤　全<?php echo count($todayschedulelist)?>名</h3>


          <!-- ここからスタッフカード -->
          <div class="staff_bg">
            <ul class="staff_wrap">
              <?php if (is_array($todayschedulelist) && count($todayschedulelist) > 0): ?>
              <?php foreach ($todayschedulelist as $todayschedule): ?>
              <?php
                $profile_this = findGirlByAttendanceNo($todayschedule->getAttendanceGirlNum(), $staffList);
                $profile_tag = getGirlTagByNumber($todayschedule->getAttendanceGirlNum(),$girlsTags);
              
                $profile_sns = getGirlSnsByNumber($todayschedule->getAttendanceGirlNum(),$girlsSns);
                $panel_instances = new SchedulePanel();
     
                $panel_instances->setHerProfile($profile_this);
                $panel_instances->setPanelStarttime($todayschedule->getWorkStartTime());
                $panel_instances->setPanelEndtime($todayschedule->getWorkEndTime());

                $panel_instances->setHerTag($profile_tag);
     

                $panel_instances->setHerSns($profile_sns);
  
      // Check for new girl
      if (!empty($newgirl)) {
        foreach ($newgirl as $checknew) {
          if ($checknew->getGirlNumber() == $profile_this->getGirlNumber()) {
            $panel_instances->setPanelNewgirl(true);
            break;
          }
        }
      }
      ?>

              <li class="staff_card">



                <!-- アイコン -->
                <p class="staff_state_mark fukidashi_green">即ご案内</p>
                <?php if ($panel_instances->getPanelNewgirl()): ?>
                <div class="staff_card_wrap">
                  <span class="tag new_cast">新人</span>
                  <?php endif; ?>
                  <a href="girls.php?girlNo=<?php echo $profile_this->getGirlNumber()?>"
                    class="staff_card_link block_wrap_a">
                    <!-- 写真 -->
                    <div class="staff_photo_area">
                      <figure class="staff_photo">
                        <?php $image = getGirlImageByNumber($staffPicList, $profile_this->getGirlNumber()); ?>
                        <img src="<?php echo $image ?>" alt="">
                      </figure>
                    </div>
                    <!-- 時間 -->
                    <p class="time_area"><i class="fas fa-clock"></i>
                      <?php echo substr($panel_instances->getPanelStarttime(), 0, 5); ?>~
                      <?php echo substr($panel_instances->getPanelEndtime(), 0, 5); ?>
                    </p>
                    <!-- 属性 -->
                    <div class="girl_types">
                      <?php if ($panel_instances->getPanelTrialShift()): ?>
                      <span class="girl_type btn_color_blink">体験入店</span>
                      <?php endif?>
                      <span class="girl_type btn_color_red">

                        <?php echo $panel_instances->getPanelTag()?>
                      </span>

                    </div>
                    <!-- profile -->
                    <span class="staff_name_age"><?php echo $profile_this->getGirlName(); ?></span>
                    <span class="staff_name_age">(<?php echo $profile_this->getGirlAge(); ?>)</span><br>
                    <span class="bodysize"><?php echo $profile_this->getProfileDescription(); ?></span>
                    <!-- sns -->


                    <div class="staff_original_contents">

                      <?php if( $panel_instances -> getPanelSns01() != null):?>
                      <a href="<?php echo $panel_instances->getPanelSns01()?>"><i
                          class="fab fa-twitter twitter_color"></i></a>
                      <?php endif?>
                      <?php if( $panel_instances -> getPanelSns02() != false) :?>
                      <a href="<?php echo $panel_instances->getPanelSns02()?>">
                        <i class="fab fa-instagram video_color"></i>
                        <?php endif?>
                    </div>
                  </a>
                  <?php if ($panel_instances->getPanelNewgirl()): ?>
                </div>
                <?php endif; ?>
              </li>
              <?php endforeach; ?>

              <?php else: ?>
              <li class="staff_card">
                <h3>出勤者はいません</h3>
              </li>
              <?php endif; ?>
            </ul>

          </div>
          <div class="goto_list_w">
            <a href="scheduleweek.php">
              <i class="fas fa-chevron-circle-right"></i><span>週間スケジュール</span></a>
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

                <?php foreach($newgirl as $profiledata):?>

                <?php $image = getGirlImageByNumber($staffPicList, $profiledata->getGirlNumber());?>

                <div class="swiper-slide girl-slide">
                  <a href="staff/staff00.php?name=test" class="swipe_a">
                    <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                    <img src="<?php echo $image ?>" alt="">
                    <div class="staff_data">
                      <p class="name_age">
                        <span class="name"><?php echo $profiledata->getGirlName()?></span>
                        <span class="age">(<?php echo $profiledata->getGirlAge()?>)</span>
                      </p>
                      <p class="body_size">
                        <?php echo $profiledata->getProfileDescription()?>
                      </p>
                    </div>
                  </a>
                </div>
                <?php endforeach?>

              </div>
              <div class="swiper-pagination page2"></div>
            </div>





          </div>
        </div>
      </section><!-- 新人終わり -->


      <!-- クチコミ -->
      <?php
      $today = new DateTime(); // 今日の日付
      $oneMonthAgo = (clone $today)->modify('-1 month'); // 1ヶ月前の日付

      // playDate が条件に一致するものをフィルタリング
      $filteredApprovalPendings = array_filter($approvalPendings, function ($item) use ($today, $oneMonthAgo) {
      $playDate = DateTime::createFromFormat('Y-m-d', $item['playDate']);
      return $playDate >= $oneMonthAgo && $playDate <= $today;
      });

      $new_review_data = []; // 配列を初期化

      foreach ($filteredApprovalPendings as $filteredApprovalPending) {
      $review = new ReviewManager($filteredApprovalPending);
      if ($review->getApproval()) { // getApproval() が true のものだけ追加
        $new_review_data[] = $review;
      }
      }
      ?>



      <section id="reviews" class="container under_space scroll-up">

        <div class="content_wrapper">
          <h2 class="block_title"><span>New Reviews</span></h2>
          <h3 class="block_title_caption">新着クチコミ</h3>

          <div class="swiper10 newreviewSwiper">
            <ul class="swiper-wrapper">

              <?php foreach($new_review_data as $new_review) :?>


              <?php $profile_this =findGirlByAttendanceNo($new_review->getEmployeeNumber(), $staffList);?>

              <?php $image = getGirlImageByNumber($staffPicList, $new_review->getEmployeeNumber()); ?>

              <!-- クチコミ1 -->
              <li class="swiper-slide staff_review">

                <a href='review.php?review=<?php echo $new_review->getReviewNumber() ?>'
                  class="staff_review_content block_wrap_a">
                  <div class="staff_review_bg">
                    <!-- 画像 -->
                    <figure class="subtitles_img">
                      <img src='<?php echo $image ?>' alt="">
                      <!-- 名前 -->
                      <figcaption>
                        <?php echo $profile_this->getGirlName() ?>(<?php echo $profile_this->getGirlAge()?>)
                      </figcaption>
                    </figure>
                    <!-- タイトル -->
                    <div class="staff_review_title">
                      <p><?php echo $new_review->getReviewTitle() ?></p>
                    </div>
                    <!-- 評価星 -->
                    <div class="assessment">

                      <p class="total_evaluation"><span class="stars"
                          style='--rating: <?php echo $new_review->calculateAverageRate()?>;'>
                        </span>
                      </p>
                    </div>
                    <!-- 評価本文 -->
                    <p class="staff_review_text">
                      <?php echo $new_review->getReviewBody() ?>
                    </p>
                  </div>
                  <div class="reviewer_data">
                    <p class="date_use">掲載日:<?php echo $new_review->getPlayDate() ?></p>
                  </div>
                </a>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="goto_list">
            <a href="reviewlist.php">
              <i class="fas fa-chevron-circle-right"></i><span>一覧へ</span></a>
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