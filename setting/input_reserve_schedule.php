<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Script-Type" content="text/javascript">
  <!--サイトの説明 -->
  <title>設定ページ</title>
  <meta name="description" content="就職用ホームページです" />


  <!--css javascript-->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />
  <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/event.css" /> -->


  <!-- これinputのときだけ読み込む -->
  <!-- <script src="../js/newevent_set.js" defer></script> -->

</head>

<body id="body">



  <div id="wrapper">
    <!-- header読み込み -->
    <?php
    require_once( dirname(__FILE__). '/../parts/setting_header.php');
    require_once( dirname(__FILE__). '/data/data.php');
    ?>

    <main id="main">
      <article id="setting_index" class="under_space">
        <div class="content_wrapper">

          <div class="demo demo3">
            <h1 class="heading"><span>予約の入力</span></h1>
          </div>

          <div class="progressbar_square">
            <div class="item active">STEP.1<br>指名選択</div>
            <div class="item">STEP.2<br>お客様</div>
            <div class="item">STEP.3<br>予約内容</div>
            <div class="item">STEP.4<br>確認</div>
            <div class="item">STEP.5<br>完了</div>
          </div>


          <!-- 全員 -->
          <div id="all_girl_content" class="staff_bg">



            <?php 
              // ひらがなのCollatorオブジェクトを作成
              $collator = new Collator('ja_JP');
              // ひらがなを比較してソート
              usort($sample_names, function ($a, $b) use ($collator) {
                return $collator->compare($a[2], $b[2]);
              });
              $current_row = '';
             ?>

            <!-- 名前を行ごとにまとめて表示 -->
            <?php foreach ($sample_names as $person):?>

            <?php $name = $person[2];
              $name_k =$person[1];
              $girl_image = $person[3];
              $first_char = mb_substr($name, 0, 1);
              ?>
            <?php if ($first_char !== $current_row):?>

            <?php if($current_row !== ''):?>
            </ul>
            </section>
            <?php endif ?>

            <?php $current_row = $first_char?>
            <section class="staff_wrap">
              <h2 class="kana_title"><?php echo $current_row ?>行</h2>
              <ul class="select_staff_wrap">
                <?php endif?>

                <li class=" staff_select_input">

                  <a href="staff_input_reserve.php?reserveGirlNum=<?php echo $person[0]?>"
                    class="select_staff_input_content">
                    <figure>
                      <img src='../<?php echo $girl_image?>' alt='' class="select_staff_photo">
                    </figure>
                    <figcaption class="girl_name">
                      <?php echo $name_k ?>
                    </figcaption>
                  </a>
                </li>

                <?php endforeach ?>

                <!-- 最後の行の終了タグ -->
                <?php if ($current_row !== '') {
              echo "</ul>";}
            ?>

          </div>


          <a href="setting_index02.php" class="back_index">キャンセル</a>

        </div>
      </article>
    </main>


  </div>
</body>

</html>