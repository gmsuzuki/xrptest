<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--サイトの説明 -->
  <title>設定ページ</title>
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
  <!--アイコン-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--IE用アイコン-->
  <link rel="shortcut icon" href="画像URL（.ico）" type="image/x-icon" />
  <!--スマホアイコン-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--Windows用タイトル設定 winピン留め-->
  <meta name="msapplication-TileImage" content="画像のURL" />
  <meta name="msapplication-TileColor" content="カラーコード" />

  <!--css javascript-->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />

  <!-- <script src="../js/script.js" defer></script> -->
  <!--javascript-->
  <script src="../js/newgirl_set.js" defer></script>

  <!-- フォントオーサム -->
  <!-- 最後はダウンロードしてスピードを出す -->
  <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
     require_once( dirname(__FILE__). '/../data.php');
    ?>



    <main id="main">


      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <!-- イベントコピペ -->
          <form id="multiphase" name="multiphase" onsubmit="return false" class="new_girl_form">

            <div id="phase1" class="bace_wrap">
              <h2 class="step_q">てすと</h2>


              <p class="step_a">体型</p>

              <ul class="girl_tag_ul">
                <?php foreach($girls_style as $num => $girl_style_tag) :?>

                <!-- 最初の値をなしする -->
                <li class="girl_tag_radio_list">
                  <input type="radio" id='girl_style_tag_<?php echo $num ?>' name='girl_stle' value='<?php echo $num ?>'
                    class="girl_tag_label">
                  <label class="girl_tag_label_txt"
                    for='girl_style_tag_<?php echo $num ?>'><?php echo $girl_style_tag ?></label>
                </li>

                <?php endforeach ?>
              </ul>




              <div class="step_button_wrap">
                <button onclick="buck_processPhase(1)" class="step_back">戻る</button>
                <button onclick="testgo(1)" class="step_next">次へ</button>
              </div>

            </div>


            <!-- セールスポイント -->
            <div id="phase2" class="bace_wrap">
              <h2 class="step_q">④あなたの売りを決めましょう</h2>

              <?php $last = array_key_last($girls_tags);?>

              <?php foreach($girls_tags as $key => $girls_tag) :?>
              <p class="step_a"><?php echo $girls_tag[0] ?></p>

              <ul class="girl_tag_ul">
                <?php $first = array_key_first($girls_tag);?>

                <!-- 最初の値をなしとする -->
                <?php foreach($girls_tag as $num => $girl_tag) :?>

                <?php if($num === $first):?>
                <li class="girl_tag_radio_list">
                  <input type="radio" checked id='girl_tag_<?php echo $key.$num ?>' name='<?php echo $key ?>'
                    value='<?php echo $num?>' class="girl_tag_label">
                  <label class="girl_tag_label_txt" for='girl_tag_<?php echo $key.$num ?>'>なし</label>
                </li>
                <?php else :?>
                <!-- 最初の値をなしする -->
                <li class="girl_tag_radio_list">
                  <input type="radio" id='girl_tag_<?php echo $key.$num ?>' name='<?php echo $key ?>'
                    value='<?php echo $num ?>' class="girl_tag_label">
                  <label class="girl_tag_label_txt"
                    for='girl_tag_<?php echo $key.$num ?>'><?php echo $girl_tag ?></label>
                </li>
                <?php endif ?>
                <?php endforeach ?>
              </ul>

              <?php if($key !== $last):?>
              <span class="girl_tag_space"></span>

              <?php endif ?>
              <?php endforeach ?>

              <div class="step_button_wrap">
                <button onclick="buck_processPhase(2)" class="step_back">戻る</button>
                <button onclick="testgo(2)" class="step_next">次へ</button>
              </div>

            </div>



            <!-- プレイスタイル -->
            <div id="phase3" class="bace_wrap">
              <h2 class="step_q">⑤あなたのプレイスタイルを決めましょう</h2>


              <?php $last = array_key_last($girls_types);?>
              <?php foreach($girls_types as $key => $girls_type) :?>
              <p class="step_a"><?php echo $girls_type[0] ?></p>
              <ul class="girl_tag_ul">
                <?php $first = array_key_first($girls_type);?>
                <?php foreach($girls_type as $num => $girl_type) :?>
                <!-- 最初の値をなしとする -->
                <?php if($num === $first):?>
                <li class="girl_tag_radio_list">
                  <input type="radio" checked id='girl_tag_<?php echo $key.$num ?>' name='<?php echo $key ?>'
                    value='<?php echo $num ?>' class="girl_tag_label">
                  <label class="girl_tag_label_txt" for='girl_tag_<?php echo $key.$num ?>'>なし</label>
                </li>
                <?php else :?>
                <!-- 最初の値をなしする -->
                <li class="girl_tag_radio_list">
                  <input type="radio" id='girl_tag_<?php echo $key.$num ?>' name='<?php echo $key ?>'
                    value='<?php echo $num ?>' class="girl_tag_label">
                  <label class="girl_tag_label_txt"
                    for='girl_tag_<?php echo $key.$num ?>'><?php echo $girl_type ?></label>
                </li>
                <?php endif ?>
                <?php endforeach ?>
              </ul>
              <?php if($key !== $last):?>
              <span class="girl_tag_space"></span>
              <?php endif ?>
              <?php endforeach ?>


              <div class="step_button_wrap">
                <button onclick="buck_processPhase(3)" class="step_back">戻る</button>
                <button onclick="testgo(3)" class="step_next">次へ</button>
              </div>

            </div>

            <!-- 秘密 -->
            <div id="phase4" class="bace_wrap">
              <h2 class="step_q">⑥特記事項を教えて下さい</h2>

              <?php $last = array_key_last($girls_secrets);?>
              <?php foreach($girls_secrets as $key => $girls_secret) :?>
              <p class="step_a"><?php echo $girls_secret[0] ?></p>
              <ul class="girl_tag_ul">
                <?php $first = array_key_first($girls_secret);?>
                <?php foreach($girls_secret as $num => $girl_secret) :?>
                <!-- 最初の値をなしとする -->
                <?php if($num === $first):?>
                <li class="girl_tag_radio_list">
                  <input type="radio" checked id='girl_tag_<?php echo $key.$num ?>' name='<?php echo $key ?>'
                    value='<?php echo $num ?>' class="girl_tag_label">
                  <label class="girl_tag_label_txt" for='girl_tag_<?php echo $key.$num ?>'>なし</label>
                </li>
                <?php else :?>
                <!-- 最初の値をなしする -->
                <li class="girl_tag_radio_list">
                  <input type="radio" id='girl_tag_<?php echo $key.$num ?>' name='<?php echo $key ?>'
                    value='<?php echo $num ?>' class="girl_tag_label">
                  <label class="girl_tag_label_txt"
                    for='girl_tag_<?php echo $key.$num ?>'><?php echo $girl_secret ?></label>
                </li>
                <?php endif ?>
                <?php endforeach ?>
              </ul>
              <?php if($key !== $last):?>
              <span class="girl_tag_space"></span>
              <?php endif ?>
              <?php endforeach ?>


              <div class="step_button_wrap">
                <button onclick="buck_processPhase(4)" class="step_back">戻る</button>
                <button onclick="processPhase6()" class="step_next">次へ</button>
              </div>

            </div>



            <!-- ーーーーーーーーーーーーーーーーーーーーーー -->

            <!-- 結果発表 -->
            <div id="show_all_data" class="bace_wrap">
              <h2 class="step_q">これでOK？</h2>

              <div class="rookie_sample_img">
                <img src="../img/rookie.jpeg" alt="">
              </div>

              <section class="set_wrap">
                <h3 class="set_tag">#新人</h3>
                <ul class="set_name set_data">
                  <li id="display_fname" class="first_name"></li>
                  <li id="display_lname"></li>
                  <li><span id="display_age"></span></li>
                </ul>
              </section>


              <!-- 特記もたくさん選択できるようにする -->




              <section class="set_wrap">
                <h3 class="set_tag">#スリーサイズ</h3>

                <ul class="three_size_wrap set_data">
                  <li id="display_gheight"></li>
                  <li>
                    <span id="display_gbreast"></span>
                    <span id="display_gbreastsize"></span>
                  </li>
                  <li id="display_gwaist"></li>
                  <li id="display_ghip"></li>
                </ul>
              </section>

              <section class="set_wrap">
                <h3 class="set_tag">#可能オプション</h3>
                <ul class="option_wrap set_data">
                  <li id="display_goption"></li>
                  <li id="display_goption2"></li>
                  <li id="display_goption3"></li>
                </ul>
              </section>


              <section class="set_wrap">
                <h3 class="set_tag">#あなたのタグ</h3>
                <ul class="tag_wrap set_data">
                  <li id="display_gappearance"></li>
                  <li id="display_gstyle"></li>
                  <li id="display_gplay"></li>
                  <li id="display_gcharacteristic"></li>
                </ul>
              </section>


              <section class="set_wrap">
                <h3 class="set_tag">#特記</h3>
                <ul class="attention_wrap set_data">
                  <li id="display_gattention"></li>
                </ul>
              </section>




              <div class="step_button_wrap">
                <button onclick="buck_processPhase(7)" class="step_back">戻る</button>
                <button onclick="processPhase7()" class="step_next">次へ</button>
              </div>

            </div>


            <!-- ーーーーーーーーーーーーーーーーーーーーーー -->




          </form>




          <!-- イベントここまで -->




        </div><!-- content_wrapper -->


      </article>



    </main>

  </div><!-- wrapper -->

  <!--  -->

  <script>
  function testgo(x) {
    _("phase" + x).style.display = "none";
    _("phase" + (x + 1)).style.display = "block";
  }
  </script>

</body>

</html>