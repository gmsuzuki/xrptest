<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--サイトの説明 -->
  <title>設定ページ</title>
  <meta name="description" content="就職用ホームページです" />


  <!--css javascript-->
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" type="text/css" href="../css/set_style.css" />
  <script src="../js/setting.js" defer></script>


</head>

<body id="body">
  <div id="wrapper">
    <main>

      <h1>新人登録</h1>

      <!-- フォーム,送り先、方法を設定 -->
      <h3>送る先のphpファイルまだ決めてない</h3>
      <h3>ポストで送る名前決まってない</h3>
      <br>
      <br>




      <div class="tabs">
        <!-- タブ設定 -->
        <input id="all" type="radio" name="tab_item" checked>
        <label class="tab_item" for="all">プロフィール</label>

        <input id="new_enquete" type="radio" name="tab_item">
        <label class="tab_item" for="new_enquete">アンケート</label>

        <input id="new_picture" type="radio" name="tab_item">
        <label class="tab_item" for="new_picture">写真</label>



        <div class="tab_content" id="all_content">

          <h2>プロフィール登録</h2>


          <h2>名前</h2>
          <input type="text" name="newgirl" required maxlength="8">
          <h2>入店日</h2>
          <input type="date">
          <h2>年齢</h2>
          <input type="number" min="18">
          <h2>サイズ</h2>

          <h3>b</h3>
          <input type="text">

          <p>
            <select name="カップ">

              <?php
              $caps=["A","B","C","D","E","F","G","H","I","J","K以上"];
              foreach($caps as $cap){
                echo "<option value='{$cap}'>{$cap}</option>";
            }
            ?>
            </select>
          </p>

          <h3>w</h3>
          <input type="text">
          <h3>h</h3>
          <input type="text">

          <h3>オプション１</h3>
          <h3><a href="https://qiita.com/4cres/items/26154314959dcccbfd34">セキュリティ</a></h3>

          <?php
$options1 = [
    "１できる？",
    "２できる？",
    "３できる？",
    "４できる？",
    "５できる？",
    "６できる？",
    "７できる？",
];
foreach($options1 as $key => $option1){
    echo "<p><label for='option1{$key}'>{$option1}</label>";
    echo "<input type='checkbox' name='option1{$key}' id='option1{$key}' checked='checked' value='OK'></p>";
}

?>

          <h3>オプション２</h3>


          <?php
$options2 = [
    "１できる？",
    "２できる？",
    "３できる？",
    "４できる？",
    "５できる？",
    "６できる？",
    "７できる？",
];

foreach($options2 as $key => $option2){
    echo "<p><label for='option2{$key}'>{$option2}</label>";
    echo "<input type='checkbox' name='option1{$key}' id='option2{$key}' value='OK'></p>";
}

?>




        </div>
        <!-- プロフィールここまで -->

        <div class="tab_content" id="enquete_content">

          <h2>アンケート</h2>

          <?php
$questions=[
    "血液型は？",
    "出身地は",
    "一人暮らし？",
    "車好き？",
    "犬？猫？",
    "和食？",
    "洋食？",
];
foreach($questions as $key => $question){
    echo "<h3>{$question}</h3>";
    echo "<input type='text' name='質問{$key}'>";
}

?>

          <h3>コメント</h3>
          <textarea type="text" name="textarea" placeholder="comment" cols="30" rows="5"></textarea>


        </div>


        <div class="tab_content" id="picture_content">
          <h2>写真登録</h2>

          <!-- <form action="sent.php" method="POST" enctype="multipart/form-data"> -->
          <!-- １０MBまで -->
          <input type="hidden" name="MAX_FILE_SIZE" value="10485760">


          <!-- 設定項目 -->




          <?php
for( $i = 1; $i < 6; $i++){
    echo "<h3>画像{$i}</h3>";
    echo "<input type='file' id='inp-preview{$i}'"
    . 'onChange="imgPreView(event'
    .','
    . "'preview{$i}')"
    .'">';
    echo "<div id='preview{$i}'></div>\n";
}
?>


          <!-- <input type="submit" value="アップロード"> -->

          </form>

        </div>


      </div><!-- タブ閉じます -->















      <div class="setting_btn">
        <a href="setting_index.php">設定topへ戻る</a>
      </div>











    </main>


  </div>
</body>

</html>