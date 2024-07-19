<!DOCTYPE html>
<html lang="ja">
<main id="main">
  <article id="setting_index" class="under_space">
    <div class="content_wrapper">

      <div class="demo demo3">
        <h1 class="heading"><span>予約の入力</span></h1>
      </div>



      <?php
      // セッションスタートしてる
      session_start();
      //セッションID保存 
      $_SESSION['session_id'] = session_id(); 
      // 戻るボタンでエラーしないように
      header('Expires:-1');
      header('Cache-Control:');
      header('Pragma:');
  
        // ボタンがクリックされた場合の処理
      if (isset($_POST['clearSession'])) {
      // セッションをクリア
      session_unset();
      session_destroy();
      session_start(); // 新しいセッションを開始
      }

  
  ?>


      <div class="progressbar_square">
        <div class="item active">STEP.1<br>お客様</div>
        <div class="item">STEP.2<br>指名選択</div>
        <div class="item">STEP.3<br>予約内容</div>
        <div class="item">STEP.4<br>確認</div>
        <div class="item">STEP.5<br>完了</div>
      </div>


      <?php echo $_SESSION['session_id']?>
      <form method="post">
        <button type="submit" name="clearSession">clearセッション</button>
      </form>
      <div class="staff_input_wrap">

        <h2>予約するお客様は？</h2>

        <ul class="radio_select_ul">
          <li class="girl_tag_radio_list">
            <input type="radio" id="cast_check" name="check_member" value='1' class="radio_label_01"
              onchange="showHideElement()">
            <label class="girl_tag_label_txt" for="cast_check">会員</label>
          </li>
          <li class="girl_tag_radio_list">
            <input type="radio" id="staff_check" name="check_member" value='2' class="radio_label_02"
              onchange="showHideElement()">
            <label class="girl_tag_label_txt" for="staff_check">ご新規</label>
          </li>


        </ul>

      </div>
      <?php if($_POST['search_no']){echo $_POST['search_no'];} ?>



      <div class="staff_input_wrap">
        <div class="member_serch_wrap" id="memberSearch">
          <div class="staff_input_title">
            <h2>会員番号</h2>
            <p id="alert_number"></p>
          </div>

          <form method="post" action="staff_input_reserve.php" class="member_search_from">
            <label>
              <input type="text" name="search_no" id="search_no" class="staff_input_area" placeholder="会員番号入力"
                onBlur="validateInput()">

            </label>
            <button type="submit" aria-label="会員検索" class="search_button"></button>



            <?php
              // フォームからの入力値
              $search_no = isset($_POST['search_no']) ? $_POST['search_no'] : '';
              // 全角数字を半角数字に変換
              $search_no = mb_convert_kana($search_no, 'n', 'UTF-8');
              // 入力された数字を検索
              $found_person = null;
              $search_executed = false; // 検索が実行されたかどうかのフラグ
              if ($search_no !== '') {
              foreach ($people_basics as $person) {
                if ($person['no'] == $search_no) {
                  $found_person = $person;
                  $search_executed = true; // 検索が実行されたことを記録
                  break;
                }else{
                  $search_executed = true; // 検索が実行されたことを記録
                }
                
              }
            }
              ?>
          </form>




          <a href="setting_index02.php" class="back_index">キャンセル</a>

        </div>
  </article>
</main>


</div>
</body>

</html>