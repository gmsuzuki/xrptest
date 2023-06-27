<?php
//  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // $url = 'complete.php';
      // header('Location:' . $url );
      // exit;
    // }

// 変数の初期化
$page_flag = 0;
// 確認を押した
if( !empty($_POST['btn_confirm']) ) {
          
    session_start();
    // 二重送信防止用トークンの発行
    $token = uniqid('', true);;
    //トークンをセッション変数にセット
    $_SESSION['token'] = $token;
	$page_flag = 1;
          
// 送信を押した
} elseif( !empty($_POST['btn_submit']) ) {


    session_start();
    // POSTされたトークンを取得
    $token = isset($_POST["token"]) ? $_POST["token"] : "";
    // セッション変数のトークンを取得
    $session_token = isset($_SESSION["token"]) ? $_SESSION["token"] : "";
    // セッション変数のトークンを削除
    unset($_SESSION["token"]);
	
  $page_flag = 2;

}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />
</head>

<body id="body">


  <div id="wrapper">
    <!-- header読み込み -->


    <main id="main">



      <!-- 結局セッションで確認画面を出す形が一番いい -->

      <!-- 確認画面 -->
      <?php if( $page_flag === 1 ): ?>
      <!-- セッションにトークン入れる -->

      <p class="check_attention">投稿内容</p>

      <p>確認画面</p>
      <form>
        <div class="check_form_submit">
          <input type="button" value="戻る" class="form_back">
          <input type="submit" name="btn_submit" value="投稿する" class="form_next">
        </div>
        <!-- セッション送る -->
        <input type="hidden" name="token" value="<?php echo $token;?>">
        </section>
      </form>

      <p>テスト</p>

      <a href="new_event_set.php">もどります</a>



      <!-- 送信済み -->
      <?php elseif( $page_flag === 2 ): ?>

      <?php else: ?>



      <article id="setting_index" class="under_space">
        <div class="content_wrapper">


          <!-- イベントコピペ -->
          <form id="form" method="POST" action="" name="new_event_form" class="new_girl_form">


            <div id="phase1" class="bace_wrap">


              <h2 class="step_q">投稿の入力</h2>
              <a href="test.php">てすとにむかう</a>




              <dl class="new_staff_set_ul">
                <dt class="step_a">題名</dt>
                <span id="not_enough">必須</span>
                <span class="mini_alert">記号は使えません</span>
                <dd class="step_wrap">
                  <input type="text" id="new_post_title" name="new_post_title">
                </dd>


                <dt class="step_a">内容</dt>
                <span id="not_enough">必須</span>
                <dd class="step_wrap">

                  <textarea name="" id="" cols="30" rows="10"></textarea>

                  <input type="hidden" id="new_post_body" name="new_post_body">

                  <p id="post_body_count" class="count_num">現在:0/1000</p>
                </dd>

              </dl>


              <!-- <input type="submit" name="btn_confirm" disabled id="submit_button" value="未入力あり" class="step_next"> -->
              <!-- <input type="submit" name="btn_confirm" id="submit_button" value="未入力あり" class="step_next"> -->
              <input type="submit">
            </div>



          </form>




          <!-- イベントここまで -->


          <?php endif ?>

        </div><!-- content_wrapper -->


      </article>



    </main>

  </div><!-- wrapper -->



</body>

</html>