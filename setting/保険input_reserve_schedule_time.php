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
  <script src="../js/form_permission.js" defer></script>
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

          <div class="demo demo3">
            <h1 class="heading"><span>予約の入力</span></h1>
          </div>

          <div class="progressbar_square">
            <div class="item active">STEP.1<br>指名選択</div>
            <div class="item active">STEP.2<br>開始時間</div>
            <div class="item">STEP.3<br>予約内容</div>
            <div class="item">STEP.4<br>確認</div>
            <div class="item">STEP.5<br>完了</div>
          </div>



          <div class="request_wrap">
            <figure class="request_img">
              <img src="../img/newface01.jpeg" alt="">
            </figure>
            <figcaption class="request_img_caption">
              三浦　恵美 </figcaption>

          </div>



          <div class="request_wrap">

            <form method="post" action="input_reserve_schedule_time.php" class="request_from">
              <h2>予約するお客様は？</h2>

              <ul class="radio_select_ul">
                <li class="girl_tag_radio_list">
                  <input type="radio" checked id="cast_check" name="staff_cast" value='1' class="radio_label_01">
                  <label class="girl_tag_label_txt" for="cast_check">会員</label>
                </li>
                <li class="girl_tag_radio_list">
                  <input type="radio" id="staff_check" name="staff_cast" value='2' class="radio_label_02">
                  <label class="girl_tag_label_txt" for="staff_check">ご新規</label>
                </li>
              </ul>

          </div>
          <div class="request_wrap">

            <label for="search_no">会員検索</label>
            <input type="number" name="search_no" id="search_no" required>
            <button type="submit">検索</button>

          </div>
          <?php
              // フォームからの入力値
              $search_no = isset($_POST['search_no']) ? $_POST['search_no'] : '';
              // 入力された数字を検索
              $found_person = null;
              foreach ($people_basics as $person) {
                if ($person['no'] == $search_no) {
                  $found_person = $person;
                  break;
                }
              }

              // 該当する人物が見つかった場合は名前を表示
              if ($found_person) {
                echo '<p>該当する人物の名前: ' . $found_person['name'] . '</p>';
              } else {
                echo '<p>該当する人物は見つかりませんでした。</p>';
              }
              ?>




          <figure class="request_img">
            <img src="../img/newface01.jpeg" alt="">
          </figure>
          <figcaption class="request_img_caption">
            三浦　恵美 </figcaption>




          <br><br><br><br><br><br><br><br>
          <p>下が確認できないのでスペース</p>
          <?php  echo $mode ;?><br>
          <br><br><br><br><br><br><br><br>

    </main>


  </div>
</body>

</html>