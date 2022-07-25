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
  <link rel="stylesheet" type="text/css" href="css/system.css" />
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
    ?>
    <!------------------>


    <main id="main">


      <article id="system" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>system</span></h1>
          <h3 class="block_title_caption">ご利用システム</h3>
          <!-- トップの宣伝 -->
          <section id="pickup_course" class="under_space">
            <h2 class="banner_max"><img src="img/price.png" alt="おすすめコース"></h2>
          </section>
          <!-- 料金表 -->
          <section id="price_lists">
            <h2 class="block_title"><span>Price List</span></h2>
            <h3 class="block_title_caption">料金表</h3>
            <!-- コース料金 -->
            <div class="course_price_lists">
              <h3 class="price_caption anime_text_bg_pink">コース料金</h3>
              <dl class="course_price">
                <dt>70分</dt>
                <dd>13,200円
                  <span>(税抜 12,000円)</span>
                  <span class="attention">馬橋・松戸・北松戸・新松戸 ４駅限定</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>90分</dt>
                <dd>15,400円
                  <span>(税抜 14,000円)</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>120分</dt>
                <dd>20,900円
                  <span>(税抜 19,000円)</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>150分</dt>
                <dd>26,400円
                  <span>(税抜 24,000円)</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>180分</dt>
                <dd>31,900円
                  <span>(税抜 29,000円)</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>210分</dt>
                <dd>37,400円
                  <span>(税抜 34,000円)</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>240分</dt>
                <dd>42,900円
                  <span>(税抜 39,000円)</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>270分</dt>
                <dd>48,400円
                  <span>(税抜 44,000円)</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>300分</dt>
                <dd>53,900円
                  <span>(税抜 49,000円)</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>330分</dt>
                <dd>59,400円
                  <span>(税抜 54,000円)</span>
                </dd>
              </dl>
              <dl class="course_price">
                <dt>360分</dt>
                <dd>64,900円
                  <span>(税抜 59,000円)</span>
                </dd>
              </dl>
            </div>
            <div class="price_comment under_space">
              ※注意事項をここに書く
            </div>
            <!-- その他の料金 -->
            <div class="other_price_lists">
              <h3 class="price_caption anime_text_bg_blue">その他の料金</h3>
              <dl class="other_price">
                <dt>入会金</dt>
                <dd>無料</dd>
              </dl>
              <dl class="other_price">
                <dt>指名料</dt>
                <dd>無料</dd>
              </dl>
              <dl class="other_price">
                <dt>本指名料</dt>
                <dd>無料</dd>
              </dl>
              <dl class="other_price">
                <dt>延長料金</dt>
                <dd>20分 6,600円
                  <span>(税抜 6,000円)</span>
                </dd>
              </dl>
              <div class="price_comment under_space">
                ※注意事項をここに書く
              </div>
            </div>
            <!-- 交通費 -->
            <div class="carfare_lists">
              <h3 class="price_caption anime_text_bg_blue">交通費</h3>
              <div class="carfare_flex">
                <dl class="carfare">
                  <dt class="carfare_color_yellow">
                    1,000円<span>(税込み)</span>
                  </dt>
                  <dd>松戸駅・北松戸駅・馬橋駅・新松戸駅・北小金駅</dd>
                </dl>
                <dl class="carfare">
                  <dt class="carfare_color_orange">
                    2,000円<span>(税込み)</span>
                  </dt>
                  <dd>柏駅・南柏駅・北柏駅・五香駅・綾瀬駅・北千住駅・三郷駅・八柱駅</dd>
                </dl>
                <dl class="carfare">
                  <dt class="carfare_color_red">
                    3,000円<span>(税込み)</span>
                  </dt>
                  <dd>西船橋駅・船橋駅</dd>
                </dl>
              </div>
            </div>
            <div class="price_comment under_space">
              ※注意事項をここに書く
            </div>


          </section>
        </div>

        <!-- プレイリスト -->
        <section id="service_lists" class="content_bg_grey">
          <div class="content_wrapper">
            <h2 class="block_title"><span>Service List</span></h2>
            <h3 class="block_title_caption">サービス内容</h3>
            <!-- 基本プレイ -->
            <h3 class="price_caption anime_text_bg_pink">基本サービス</h3>
            <div class="basic_play_lists">

              <ul class="basic_play">
                <?php for($i=0; $i<10; $i++):?>
                <?php echo "<li>プレイ{$i}</li>" ?>
                <?php endfor?>
              </ul>
              <div class="price_comment under_space">
                ※注意事項をここに書く
              </div>
            </div>
            <!-- オプションプレイ -->
            <h3 class="price_caption anime_text_bg_blue">オプション</h3>
            <div class="option_play_lists">
              <dl class="option_price">
                <dt>オプション名
                </dt>
                <dd>1,000円
                  <span>(税込)</span>
                </dd>
              </dl>
              <div class="price_comment under_space">
                ※注意事項をここに書く
              </div>

            </div>

          </div>
        </section>

        <section id="credit_card" class="content_bg_green">
          <div class="content_wrapper">
            <h2 class="attention">カード決済について</h2>
            <p class="img_auto card_img">
              <img src="img/card.png" alt="">
            </p>
            <ul class="use_card_text under_space">
              <li>クレジットカードご利用のお客様は総額料金(税込み)の２０％の
                手数料がかかります。</li>
              <li>クレジットカードご利用のお客様はご予約後、
                カード会社の認証確認後からとなります。</li>
            </ul>
          </div>
        </section>

        <section id="play_flow" class="content_bg_grey">
          <div class="content_wrapper">
            <h2 class="block_title"><span>Play Flow</span></h2>
            <h3 class="block_title_caption">ご利用の流れ</h3>

            <!--  -->
            <div class="swiper_custom_parent  under_space">
              <div class="swiper5 playSwiper">
                <div class="swiper-wrapper">

                  <div class="swiper-slide play-slide">
                    <div class="play_card">
                      <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                      <img src="img/tel.jpeg" alt="">
                      <div class="play_text">
                        <h4 class="play_text_title">当店にお電話ください
                          <br>00-0000-000
                        </h4>
                        <p>待ち合わせの駅名、ホテルへの移動手段（徒歩、車）をお申し付けください。</p>
                      </div>
                    </div>
                  </div>

                  <!-- 2step -->
                  <div class="swiper-slide play-slide">
                    <div class="play_card">
                      <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                      <img src="img/tel2.jpeg" alt="">
                      <div class="play_text">
                        <h4 class="play_text_title">コンパニオンからお客様へお電話させて頂きます</h4>
                        <p>待ち合わせたお時間に、コンパニオンよりのお電話は非通知でのお電話になります。そのお時間は非通知解除をお願いします。</p>
                      </div>
                    </div>
                  </div>
                  <!-- 3step -->
                  <div class="swiper-slide play-slide">
                    <div class="play_card">
                      <!-- ここの画像がでかくなるとbodyが動くのではみ出したら切る -->
                      <img src="img/hotel.jpeg" alt="">
                      <div class="play_text">
                        <h4 class="play_text_title">コンパニオンと合流後、ご一緒にホテルへ移動しチェックイン</h4>
                        <p>チェックインしてからサービス時間スタート</p>
                        <p>合流後10分～15分以内のホテル御利用とさせて頂いております。超える場合お時間をスタートさせて頂くことがございます。</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-pagination page2"></div>
              </div>

              <div class="swiper-button-next next2 swiper_arrow"></div>
              <div class="swiper-button-prev prev2 swiper_arrow"></div>
            </div>
            <!--  -->
          </div>
        </section>
        <!-- 禁止事項 -->
        <section id="credit_card" class="content_bg_pink">
          <div class="content_wrapper">
            <h2 class="attention">ご利用規約</h2>
            <ul class="prohibited_matter">
              <li>本番行為、本番行為の強要、本番行為の交渉を行う方</li>
              <li>同業者、スカウト行為目的の方</li>
              <li>コンパニオンの嫌がる行為・暴力行為をされる方</li>
              <li>サービス前のコンパニオンとの入浴を拒否される方</li>
              <li>暴力団・暴力団関係者の方</li>
              <li>薬物（覚せい剤・大麻・シンナー等）使用者、またその疑いがある方</li>
              <li>写真、写メールの撮影をされる方</li>
              <li>店外デートの誘い</li>
              <li>変態行為やSM行為</li>
              <li>脅迫行為や大声を出す行為</li>
              <li>お店や他のコンパニオンの誹謗中傷行為</li>
            </ul>
            <div class="prohibited_matter_attention">
              <p>上記事項に該当する方はご利用をお断りします。<br>
                即サービスを中断し退室し、その際、一切返金は致しません。</p>
              <ul class="price_comment under_space">
                <li>※悪質な場合は直ちに警察に通報します。</li>
                <li>※当店はヘルスですので本番行為は絶対禁止しております。</li>
                <li>※本番行為を強要された方はただちに警察に通報致します。</li>
                <li>※お電話頂いた時点で、利用規約に同意したものとみなします。</li>
                <li>※チェンジ・キャンセルは出来ません。</li>
                <li>※盗聴・盗撮は禁止です。</li>

              </ul>
            </div>

          </div>
        </section>



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