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
  <script src="../js/set_basic.js" defer></script>
  <script src="../js/error_set.js" defer></script>
  <script src="../js/set_form_input_check.js" defer></script>
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

          <ul class="progressbar">
            <?php for( $i = 0; $i < 10; $i++) :?>
            <?php if($i==0):?>
            <?php echo "<li id='status_1' class='active'>1</li>" ?>
            <?php else:?>
            <li id="status_<?php echo $i +1 ?>"><?php echo $i +1 ?></li>
            <?php endif ?>
            <?php endfor ?>
          </ul>

          <!-- イベントコピペ -->
          <form id="multiphase" name="multiphase" onsubmit="return false" class="new_girl_form">


            <div id="phase1" class="bace_wrap">


              <h2 class="step_q">①お店で使う名前を決めてください</h2>
              <ul id="girl_input">
                <li class="step_wrap">
                  <span class="step_a">名字</span>
                  <em class="mini_alert">記号は使えません</em>
                  <input type="text" id="firstname" name="firstname" maxlength="10" onblur="CheckGuestInfo(this)"
                    pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,10}"
                    placeholder="10文字以内（省略可能）" class="">
                </li>
                <li class="step_wrap">
                  <span class="step_a">名前</span>
                  <em class="mini_alert">記号は使えません</em>
                  <input type="text" required id="lastname" name="lastname" maxlength="10" onblur="CheckGuestInfo(this)"
                    pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,10}" placeholder="10文字以内（必須）"
                    class="cancel_alert">
                </li>
                <li class="step_wrap">
                  <span class="step_a">年齢</span>
                  <select name="age" id="age" required>
                    <?php for( $i = 18; $i < 50; $i ++) :?>
                    <option value='<?php echo $i ?>'><?php echo $i ?></option>
                    <?php endfor ?>
                  </select>
                </li>
              </ul>
              <div class="step_button_wrap">
                <button onclick="location.href='setting_index02.php'" class="step_back">キャンセル</button>
                <button onclick="processPhase1()" class="step_next">次へ</button>
              </div>
            </div>


            <div id="phase2" class="bace_wrap">
              <h2 class="step_q">②スリーサイズを入力してください</h2>
              <ul class="threesize_ul">
                <li class="step_wrap">
                  <span class="step_a">身長</span>
                  <select name="girlheight" id="girlheight" required>
                    <?php for( $i = 140; $i <= 180; $i++) :?>
                    <?php if( $i == 160) :?>
                    <option selected value='<?php echo $i ?>'><?php echo $i ?></option>
                    <?php else :?>
                    <option value='<?php echo $i ?>'><?php echo $i ?></option>
                    <?php endif ?>
                    <?php endfor ?>
                  </select>
                </li>

                <li class="step_wrap">
                  <span class="step_a">バスト</span>
                  <select name="breast" id="breast" required>
                    <?php for( $i = 70; $i <= 120; $i++) :?>
                    <?php if( $i == 85) :?>
                    <option selected value='<?php echo $i ?>'><?php echo $i ?></option>
                    <?php else :?>
                    <option value='<?php echo $i ?>'><?php echo $i ?></option>
                    <?php endif ?>
                    <?php endfor ?>
                  </select>
                </li>

                <li class="step_wrap">
                  <span class="step_a">カップ</span>
                  <select name="breastsize" id="breastsize" required>
                    <option value="A">Aカップ</option>
                    <option value="B">Bカップ</option>
                    <option value="C">Cカップ</option>
                    <option value="D">Dカップ</option>
                    <option value="E">Eカップ</option>
                    <option value="F">Fカップ</option>
                    <option value="G">Gカップ</option>
                    <option value="H">Hカップ</option>
                    <option value="I">Iカップ</option>
                    <option value="J">Jカップ</option>
                    <option value="K">Kカップ</option>
                  </select>
                </li>

                <li class="step_wrap">
                  <span class="step_a">ウエスト</span>
                  <select name="waist" id="waist" required>
                    <?php for( $i = 50; $i <= 100; $i++) :?>
                    <?php if( $i == 60) :?>
                    <option selected value='<?php echo $i ?>'><?php echo $i ?></option>
                    <?php else :?>
                    <option value='<?php echo $i ?>'><?php echo $i ?></option>
                    <?php endif ?>
                    <?php endfor ?>
                  </select>
                </li>

                <li class="step_wrap">
                  <span class="step_a">ヒップ</span>
                  <select name="hip" id="hip" required>
                    <?php for( $i = 60; $i <= 120; $i++) :?>
                    <?php if( $i == 85) :?>
                    <option selected value='<?php echo $i ?>'><?php echo $i ?></option>
                    <?php else :?>
                    <option value='<?php echo $i ?>'><?php echo $i ?></option>
                    <?php endif ?>
                    <?php endfor ?>
                  </select>
                </li>
              </ul>

              <div class="step_button_wrap">
                <button onclick="buck_processPhase(2)" class="step_back">戻る</button>
                <button onclick="processPhase2()" class="step_next">次へ</button>
              </div>
            </div>


            <div id="phase3" class="bace_wrap">
              <h2 class="step_q">③可能なオプションを選択してください</h2>
              <span id="span1"></span>

              <ul class="option_tag_ul">
                <!--チェックボックス01-->
                <?php foreach( $options as $key=> $option) :?>
                <li class="step_list_wrap">
                  <input type="checkbox" id='play_option<?php echo $key?>' name="play_option"
                    value='<?php echo $option ?>'>
                  <label for='play_option<?php echo $key?>' class="boxcheck"><?php echo $option ?></label>
                </li>
                <?php endforeach ?>
              </ul>

              <div class="step_button_wrap">
                <button onclick="buck_processPhase(3)" class="step_back">戻る</button>
                <button onclick="processPhase3()" class="step_next">次へ</button>
              </div>

            </div>


            <!-- スタイル -->
            <div id="phase4" class="bace_wrap">
              <h2 class="step_q">④あなたのスタイルは？</h2>

              <p class="step_a">体型</p>

              <ul class="girl_tag_ul">
                <!-- 最初の値をなしする -->
                <?php foreach($girls_style as $num => $girl_style) :?>
                <li class="girl_tag_radio_list">

                  <?php if($num == 0) :?>
                  <input type="radio" id='girl_style_tag_<?php echo $num ?>' name='girl_style'
                    value='<?php echo $girl_style ?>' class="radio_label_01" checked>
                  <?php else :?>
                  <input type="radio" id='girl_style_tag_<?php echo $num ?>' name='girl_style'
                    value='<?php echo $girl_style ?>' class="radio_label_01">
                  <?php endif ?>

                  <label class="girl_tag_label_txt"
                    for='girl_style_tag_<?php echo $num ?>'><?php echo $girl_style ?></label>
                </li>
                <?php endforeach ?>
              </ul>

              <div class="step_button_wrap">
                <button onclick="buck_processPhase(4)" class="step_back">戻る</button>
                <button onclick="processPhase4()" class="step_next">次へ</button>
              </div>

            </div>



            <!-- 外見 -->
            <div id="phase5" class="bace_wrap">
              <h2 class="step_q">⑤あなたの外見のタイプは？</h2>

              <p class="step_a">外見</p>

              <ul class="girl_tag_ul">
                <!-- 最初の値を選択済みに -->
                <?php foreach($girls_appearance as $num => $girl_appearance) :?>
                <li class="girl_tag_radio_list">

                  <?php if($num == 0 ):?>
                  <input type="radio" id='girl_appearance_tag_<?php echo $num ?>' name='girl_appearance'
                    value='<?php echo $girl_appearance ?>' class="radio_label_01" checked>
                  <?php else :?>
                  <input type="radio" id='girl_appearance_tag_<?php echo $num ?>' name='girl_appearance'
                    value='<?php echo $girl_appearance ?>' class="radio_label_01">
                  <?php endif ?>
                  <label class="girl_tag_label_txt"
                    for='girl_appearance_tag_<?php echo $num ?>'><?php echo $girl_appearance ?></label>
                </li>

                <?php endforeach ?>
              </ul>


              <div class="step_button_wrap">
                <button onclick="buck_processPhase(5)" class="step_back">戻る</button>
                <button onclick="processPhase5()" class="step_next">次へ</button>
              </div>

            </div>


            <!-- プレイスタイル -->
            <div id="phase6" class="bace_wrap">
              <h2 class="step_q">⑥あなたのプレイスタイルを決めましょう</h2>

              <p class="step_a">プレイスタイル</p>
              <ul class="girl_tag_ul">

                <?php foreach($girls_play as $num => $girl_play) :?>
                <li class="girl_tag_radio_list">
                  <?php if( $num == 0) :?>
                  <input type="radio" checked id='girl_play_tag_<?php echo $num ?>' name='girl_play'
                    value='<?php echo $girl_play ?>' class="radio_label_01">
                  <?php else :?>
                  <input type="radio" id='girl_play_tag_<?php echo $num ?>' name='girl_play'
                    value='<?php echo $girl_play ?>' class="radio_label_01">
                  <?php endif ?>
                  <label class="girl_tag_label_txt"
                    for='girl_play_tag_<?php echo $num ?>'><?php echo $girl_play ?></label>
                </li>
                <?php endforeach ?>

              </ul>

              <div class="step_button_wrap">
                <button onclick="buck_processPhase(6)" class="step_back">戻る</button>
                <button onclick="processPhase6()" class="step_next">次へ</button>
              </div>

            </div>


            <!-- 趣味 -->
            <div id="phase7" class="bace_wrap">
              <h2 class="step_q">⑦あなたの趣味は？</h2>

              <p class="step_a">趣味</p>
              <ul class="girl_tag_ul">

                <?php foreach($girls_characteristic as $num => $girl_characteristic) :?>
                <li class="girl_tag_radio_list">
                  <?php if( $num == 0 ) :?>
                  <input type="radio" checked id='girl_characteristic_tag_<?php echo $num ?>' name='girl_characteristic'
                    value='<?php echo $girl_characteristic ?>' class="radio_label_02">
                  <?php else :?>
                  <input type="radio" id='girl_characteristic_tag_<?php echo $num ?>' name='girl_characteristic'
                    value='<?php echo $girl_characteristic ?>' class="radio_label_02">
                  <?php endif ?>
                  <label class="girl_tag_label_txt"
                    for='girl_characteristic_tag_<?php echo $num ?>'><?php echo $girl_characteristic ?></label>
                </li>
                <?php endforeach ?>

              </ul>

              <div class="step_button_wrap">
                <button onclick="buck_processPhase(7)" class="step_back">戻る</button>
                <button onclick="processPhase7()" class="step_next">次へ</button>
              </div>

            </div>


            <!-- プラスアルファ -->
            <div id="phase8" class="bace_wrap">
              <h2 class="step_q">⑧プラスアルファ要素はありますか？</h2>

              <p class="step_a">プラスアルファ</p>
              <ul class="girl_tag_ul">

                <?php foreach($girls_plus as $num => $girl_plus) :?>
                <li class="girl_tag_radio_list">
                  <input type="checkbox" id='girl_plus_tag_<?php echo $num ?>' name='girl_plus'
                    value='<?php echo $girl_plus ?>'>
                  <label for='girl_plus_tag_<?php echo $num ?>' class="boxcheck"><?php echo $girl_plus ?></label>
                </li>
                <?php endforeach ?>

              </ul>

              <div class="step_button_wrap">
                <button onclick="buck_processPhase(8)" class="step_back">戻る</button>
                <button onclick="processPhase8()" class="step_next">次へ</button>
              </div>

            </div>




            <!-- 秘密 -->
            <div id="phase9" class="bace_wrap">
              <h2 class="step_q">⑨特記事項を教えて下さい</h2>

              <p class="step_a">秘密</p>
              <ul class="girl_tag_ul">
                <!-- 最初の値をなしする -->
                <?php foreach($girls_secret as $num => $girl_secret ) :?>
                <li class="girl_tag_radio_list">
                  <input type="checkbox" id='girl_secret_tag_<?php echo $num ?>' name='girl_secret'
                    value='<?php echo $girl_secret ?>'>
                  <label for='girl_secret_tag_<?php echo $num ?>' class="boxcheck"><?php echo $girl_secret ?></label>
                </li>
                <?php endforeach ?>
              </ul>


              <div class="step_button_wrap">
                <button onclick="buck_processPhase(9)" class="step_back">戻る</button>
                <button onclick="processPhase9()" class="step_next">次へ</button>
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
                <span id="display_goption"></span>
                <ul id="option_list" class="option_wrap set_data">
                </ul>
              </section>


              <section class="set_wrap">
                <h3 class="set_tag">#あなたのタグ</h3>
                <h4 class="set_tag_middle">外見</h4>
                <ul class="tag_wrap set_data">
                  <li id="display_gappearance" class="tag_wrap"></li>
                </ul>
                <h4 class="set_tag_middle">体型</h4>
                <ul class="tag_wrap set_data">
                  <li id="display_gstyle" class="tag_wrap"></li>
                </ul>
                <h4 class="set_tag_middle">プレイスタイル</h4>
                <ul class="tag_wrap set_data">
                  <li id="display_gplay" class="tag_wrap">い</li>
                </ul>
                <h4 class="set_tag_middle">趣味</h4>
                <ul class="tag_wrap set_data">
                  <li id="display_gcharacteristic" class="tag_wrap"></li>
                </ul>
              </section>


              <section class="set_wrap">
                <h3 class="set_tag">#特記</h3>
                <span id="display_gplus"></span>
                <ul id="plus_list" class="plus_wrap set_data">
                </ul>
              </section>

              <section class="set_wrap">
                <h3 class="set_tag">#秘密</h3>
                <ul id="secret_list" class="secret_wrap set_data">
                </ul>
              </section>



              <div class="step_button_wrap">
                <button onclick="buck_processPhase(10)" class="step_back">戻る</button>
                <button onclick="processPhase10()" class="step_next">登録へ</button>
              </div>

            </div>


            <!-- ーーーーーーーーーーーーーーーーーーーーーー -->




          </form>




          <!-- イベントここまで -->




        </div><!-- content_wrapper -->


      </article>



    </main>

  </div><!-- wrapper -->



</body>

</html>