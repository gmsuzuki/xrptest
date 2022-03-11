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

  <!--css javascript-->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/accordion.css" />
  <link rel="stylesheet" type="text/css" href="css/footer.css" />

  <!-- <script src="js/swiper.min.js" defer></script> -->
  <!-- <script src="js/script.js" defer></script> -->
  <script src="js/accordion.js" defer></script>
 <script src="js/loading.js" defer></script>

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

    <div class="shop_fv">


    <main>

      <section id="shop_index" class="block_index">
        <div id="shop_index_heading" class="parts_index">
          <h1>お店の名前</h1>
          <h2>お店の説明</h2>
          <div class="logo_area_index parts_index">
            <img src="img/icon_girl.svg" alt="shop_logo">
          </div>
        </div>

        <div id="rating" class="parts_index">
          <ul>
            <li>
              注意事項が入ります

            </li>
            <li class="button">
              <!-- <a href="top.php" class="enter_index"> -->
                <a href="top.php" class="btn_color_red btn_font00 btn_active">
                入場する
              </a>
            </li>
            <li>
              みたくないひとは
              <a href="https://www.google.com/?hl=ja">
                こちら
              </a>
              から退場
            </li>
          </ul>
        </div>


        <div id="other_service" class="parts_index">
          <ul>
            <li>
              <a href="">
                <img src="img/btn_yes.png" alt="">
              </a>
            </li>
            <li>
              <a href="">
                <img src="img/btn_no.png" alt="">
              </a>
            </li>
          </ul>
        </div>
      </section>

    </div>
      <!-- ここからは文字ベース -->
      <div class="index_wrapper">

        <!-- インフォメーションゾーン -->
        <!-- 新店舗や求人など見せたいものを貼る -->
        <section id="information_index" class="block_index">

          <h2 class="index_head">information</h2>

          <!-- 求人カード -->
          <div id="recruit_index">

            <!-- foreach -->
            <div class="card_index parts_index">
              <a href="">
                <div class="card_index_imgframe">
                  <img src="img/nat2.jpg" alt="">
                </div>
              </a>
            </div>

            <!-- foreach -->
            <div class="card_index parts_index">
              <a href="">
                <div class="card_index_imgframe">
                  <img src="img/200x40.png" alt="">
                </div>
              </a>
            </div>

          </div>
        </section>

        <!-- コンセプトゾーン -->
        <!-- お店の説明を書いて再度サイトへ誘導 -->

        <article id="shop_description_index" class="block_index">
          <h2 class="index_head">About</h2>
          <section id="shop_concept_index">

            <div class="concept_flex">
              <div class="concept_flex_bg0"></div>
              <div class="concept_flex_bg1"></div>
              <div class="concept_flex_bg2"></div>

            </div>

            <div class="concept_box_index">
              <h3 class="concept_head">最高の素材を<br>
                お手軽な価格で
              </h3>
            </div>

            <div class="text_concept_index">
              中身が入ります。中身が入ります。中身が入ります。
              中身が入ります。中身が入ります。中身が入ります。
              中身が入ります。中身が入ります。中身が入ります。
              中身が入ります。中身が入ります。中身が入ります。
            </div>
          </section>

          <div id="separate_line"></div>
          <!-- 別パターン -->
          <!-- ブロック化 -->
          <section id="concept_small_pieces" class="parts_index">
            <div class="concept_left_pieces00">
              <h3 class="concept_head">こだわってます！</h3>
              <div class="text_concept_piece">
                中身が入ります。中身が入ります。中身が入ります。
                中身が入ります。中身が入ります。中身が入ります。
              </div>
            </div>
            <div class="concept_right_pieces00 concept_pieces_bg00">
            </div>
          </section>

          <!-- ブロック化 -->
          <section id="concept_small_pieces" class="parts_index">
            <div class="concept_left_pieces01 concept_pieces_bg01">
            </div>
            <div class="concept_right_pieces01">
              <h3 class="concept_head head_piece01">こだわってます！</h3>
              <div class="text_concept_piece">
                中身が入ります。中身が入ります。中身が入ります。
                中身が入ります。中身が入ります。中身が入ります。
              </div>

            </div>
          </section>


          <div id="separate_line"></div>
          <!-- 再度入り口 -->
          <!-- 入場ボタン -->

          <section id="rating01">
            <h3 class="concept_head rating_head">こだわってますから是非！</h3>
            <div class="button under_space">
            <a href="" class="btn_color_pink btn_font00 btn_active">
              <!-- <div class="concept_entera"> -->
                入場する。
                <span>権利は持ってる</span>
              <!-- </div> -->
            </a>
            </div>
            <!--  -->
            <!-- 退場エリア -->
            <div class="concept_exit">
              <h3 class="concept_exit_head">
                いらないは利用できないです。
                <a href="">退場する。</a>
              </h3>
              <div class="concept_exit_box">
                  <div class="concept_exit_img">
                    <img src="img/88x31.png" alt="under18">
                  </div>
                  <div class="concept_exit_text">注意事項の中身が入ります。中身が入ります。中身が入ります。
                    中身が入ります。中身が入ります。中身が入ります。
                    中身が入ります。中身が入ります。中身が入ります。
                  </div>
              </div>
            </div>
            
            <!--  -->
            <!-- ratingおわり -->
          </section>
        </article>


        <!-- グループに関して -->


        <article id="group_description_index" class="block_index">
          <h2 class="index_head">グループについて</h2>
          <section id="group_concept_index">
            <h3 class="group_head">〇〇グループ</h3>
            <div class="group_concept_box">
              創業１００年。<br>
              関東を中心に現在５００店舗。<br>
              厳選された素材をリーズナブルな価格で。<br>
              これからも皆様に愛されるお店を目指して。<br>
            </div>
          </section>
          <section id="group_recruit_index">
            <div class="card_index parts_index">
              <a href=""></a>
              <div class="card_index_imgframe">
                <img src="img/200x40.png" alt="">
              </div>
              </a>
            </div>

            <div class="card_index parts_index">
              <a href=""></a>
              <div class="card_index_imgframe">
                <img src="img/200x40.png" alt="">
              </div>
              </a>
            </div>

          </section>
        </article>



        <?php
        require_once("accordion.php");
        ?>


      </div>
      <!-- 文字ゾーンindex_wrapperここまで -->


    </main>

    <?php
    require_once("footer.php");
    ?>


  </div> <!-- wrapper -->

</body>

</html>