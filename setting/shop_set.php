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
  <link rel="stylesheet" type="text/css" href="../css/old_set_style.css" />
  <script src="../js/setting.js" defer></script>


</head>

<body id="body">


  <div id="wrapper">


    <main>
      <div id="all_top">
        <h1>文章と画像を上げるサンプル</h1>

        <a href="https://code-kitchen.dev/css/invalid/" class="test_bnt">入力フォームのバリデーション参考</a>
        <a href="https://code-kitchen.dev/html/template/" class="test_bnt">入力完了</a>
        <a href="https://esaura.jp/ux-blog/how-to-create-entry-form" class="test_bnt">入力欄参考</a>
        <!-- フォーム,送り先、方法を設定 -->
        <div class="memo">
          <h3>送る先のphpファイルまだ決めてないです</h3>
          <h3>ポストで送る名前決まってない</h3>
        </div>

      </div>

      <div class="root">
        <?php if ($_GET['setting'] === "shop") {
        echo "正規のルートから来ました<br><br>";
      }
      ?>
      </div>

      <!-- 入力をクリアするボタンを押したら -->
      <?php
      if ($_POST['clear']) {
        session_start();
        $_SESSION = array();
      }
      ?>
      <!-- クリア終わり -->


      <!-- ここから本格的にスタート -->
      <?php
      //定数読み込み、画像サイズとか
      require_once('const_set.php');
      // 文章バリデーション読み込み
      require_once('text_validate.php');
      // 画像のバリデーション読み込み
      require_once('image_validate.php');


      // セッションスタートしてる
      session_start();

      // 戻るボタンでエラーしないように
      header('Expires:-1');
      header('Cache-Control:');
      header('Pragma:');

      // 入力モードにする
      $mode = 'input';
      // エラー配列を作る
      $errmessage = array();


// submitの種類でifを書いてる
// もし送信・戻るの戻るを押したら
// なにもしない
// 画像をけすならセッションの中身消す
// 確認ボタンが押された
// クラスを作り
// 各種バリデーションチェック
// エラーがないならセッションに入れる
// モードを確認に変更する
// もし送信を押していたら
// サーバ関連
// セッションを消す
// 最初に入ってきた場合
// セッション変数を作る


      // 送信or戻るで戻るインプットに入ってもなにもしない/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
      if (isset($_POST['back']) && $_POST['back']) {

        // 画像関連/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
        // 画像を削除した場合
      } else if (isset($_POST['img_prv_delete']) && $_POST['img_prv_delete']) {

        $_SESSION['shop_permission']['data'] = '';
        $_SESSION['shop_permission']['type'] = '';
        $_SESSION['shop_permission']['width'] = '';
        $_SESSION['shop_permission']['height'] = '';


        // 確認（confirm）ページ/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
      } else if (isset($_POST['confirm']) && $_POST['confirm']) {
        // 文字関連


        // 店名ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
        // クラス作る
        $shop_name = new Check_txt($_POST['shop_name'], Fix::SHOPNAME);

        // 改行消す
        $shop_name_replace = $shop_name->tex_replace();
        // 文字数を表示するためにSessionへ文字数を入れる
        $_SESSION['shop_name']['length'] = $shop_name->get_checkig_txt_length();

        // 長さチェック
        if (!($shop_name->check_length($shop_name_replace) == 'true')) {
          $errmessage[] = $shop_name->get_err_inclass();
          // 規定文字以上をカットして入れる
          $_SESSION['shop_name']['name'] = $shop_name->too_long();
        } else {
          // 改行コード消したやつセット
          $shop_name->set_checking_text($shop_name_replace);
          $_SESSION['shop_name']['name'] = $shop_name->hchars();
        }




        // 店説明ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
        // クラスを作る
        $shop_description = new Check_txt($_POST['shop_description'], Fix::SHOPDISC);

        // 戻るを前提にした処理

        // 文字数を調べる系ーーーーーーーーーーーーーーーー
        // 改行スペースを消す
        $shop_description_all_replace = $shop_description->all_replace();
        // 文字数をSESSIONに入れる
        $_SESSION['shop_description']['length'] = $shop_description->get_checkig_txt_length();
        // 長さチェック
        if (!($shop_description->check_length($shop_description_all_replace) == 'true')) {
          $errmessage[] = $shop_description->get_err_inclass();
          // 規定文字以上はだめ
          $_SESSION['shop_description']['description'] = $shop_description->too_long();
        } else {
          // 編集の可能性があるから改行スペースはそのまま
          $shop_description->set_checking_text($_POST['shop_description']);
          $_SESSION['shop_description']['description'] = $shop_description->hchars();

          // $shop_description->set_checking_text($shop_description_all_replace);
          // $_SESSION['shop_description'] = $shop_description->hchars();
        }


        // 画像関連----------------------------------------
        // 画像が選ばれていれば'tmp_name'は一時保存名
        if (!empty($_FILES['shop_permission']['tmp_name'])) {

          try {
            // 読み込んだバリデーション関数
            check_post($_FILES['shop_permission']);
            check_file_error($_FILES['shop_permission']);
            check_file_size($_FILES['shop_permission'], Fix::MINIMG);
            check_file_type($_FILES['shop_permission']);
          } catch (RuntimeException $e) {
            // エラーメッセージ
            $errmessage[] =  $e->getMessage();
          }




// ここでセッションに画像データ入れてる
// ここでセッションに画像データ入れてる


// ここでセッションに画像データ入れてる
// ここでセッションに画像データ入れてる


          // 何一つ問題エラーメッセージがない場合
          if (empty($errmessage)) {
            setSessionImg('shop_permission', $_FILES['shop_permission']);
          }
        }

        // モードチェンジ　エラーしてたらモード変わらない---------------------
        if ($errmessage) {
          $mode = 'input';
        } else {
          $mode = 'confirm';
        }

        // 送信モード/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_

      } else if (isset($_POST['send']) && $_POST['send']) {

        // データベースコネクト
        require_once('db_connect.php');
        try {
          $shop_name = $_SESSION['shop_name']['name'];
          $shop_description = $_SESSION['shop_description']['description'];

          $shop_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
          $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');


          //データベースに接続
          $dbh = db_connect();
          //PDOでの例外エラーを詳細にするためのオプション
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //sql
          $sql = "INSERT INTO `mst_staff` (name, pass) VALUES (?, ?)";
          $stmt = $dbh->prepare($sql);
          $date[] = $staff_name;
          $date[] = $staff_pass;
          $stmt->execute($date);

          //接続終了
          $dbh = null;

          print $staff_name;
          print 'さんを追加';
        } catch (Exception $e) {
          echo $e->getMessage();
          exit();
        }


        $_SESSION = array();
        // モードチェンジ
        $mode = 'send';
      } else {
        // 初めて入ったとき/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_
        $_SESSION['shop_name']['name'];
        $_SESSION['shop_name']['length'];
        $_SESSION['shop_description']['description'];
        $_SESSION['shop_description']['length'];
        $_SESSION['shop_permission']['data'];
        $_SESSION['shop_permission']['type'];
        $_SESSION['shop_permission']['width'];
        $_SESSION['shop_permission']['height'];
      }

      ?>

      <!------------------------------------
        html
      -------------------------------------->

      <h4 style="color:red">ここはどこでしょう</h4>


      <!-- 入力画面 -->
      <?php if ($mode == 'input') : ?>



      <!-- エラーメッセージがあるなら表示 -->
      <?php
        if ($errmessage) {
          echo "<div class='errmessage'>";
          echo implode('<br>', $errmessage);
          echo '</div>';
        }
        ?>


      <!-- データの送り先 -->
      <!-- <form action="sent.php?setting=shop_info" method="POST" enctype="multipart/form-data"> -->

      <form action="./shop_set.php" method="POST" enctype="multipart/form-data">

        <!-- MAX_FILE_SIZE でアップロードファイルのサイズを制限する（単位：バイト） -->
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo Fix::MINIMG; ?>">
        <!-- 店舗番号をこっそり送る -->
        <input type="hidden" name="shop_no" value="0">

        <!-- 設定項目 -->

        <h2>ホームページタイトル（35字以内推奨〜100文字）</h2>
        <h3>改行はできません</h3>
        <!-- requiredは必須 maxlength最大長さ -->

        <!-- 店の名前 -->
        <?php if ($_SESSION['shop_name']['name']) : ?>
        <p id="shop_name_count1">残り：<?php echo  Fix::SHOPNAME - $_SESSION['shop_name']['length']; ?>文字</p>
        <?php else : ?>
        <p id="shop_name_count1">残り：<?php echo Fix::SHOPNAME ?>文字</p>
        <?php endif ?>
        <input type="text" name="shop_name" required maxlength="100"
          value="<?php echo $_SESSION['shop_name']['name'] ?>"
          oninput="CountStr('shop_name_count1', value,<?php echo Fix::SHOPNAME; ?>)">


        <!-- 店の説明 -->
        <h2>お店の説明（80文字以内推奨〜150文字）</h2>
        <h3>改行、スペースは反映されません</h3>

        <?php if ($_SESSION['shop_description']['description']) : ?>
        <p id="shop_name_count2">残り：<?php echo Fix::SHOPDISC - $_SESSION['shop_description']['length']; ?>文字</p>
        <?php else : ?>
        <p id="shop_name_count2">残り：<?php echo Fix::SHOPDISC; ?> 文字</p>
        <?php endif ?>
        <textarea name="shop_description" cols="30" rows="10" required maxlength="150"
          oninput="CountStr('shop_name_count2', value,<?php echo Fix::SHOPDISC; ?>);"><?php echo $_SESSION['shop_description']['description'] ?></textarea>


        <!-- 許可画像 -->
        <h2>許可登録関係</h2>
        <h3>画像形式</h3>
        <h3>ここだここ</h3>
        <input type="file" name="shop_permission" accept="image/png, image/jpeg, image/gif" id="inp-preview1"
          onChange="imgPreView(event, 'preview1',<?php echo Fix::MINIMG; ?>)">

        <!-- 戻ってきた場合 -->
        <?php if (!empty($_SESSION['shop_permission']['data'])) : ?>

        <div id="preview1">
          <figure id="previewImage-preview1">
            <h3>現在選択中</h3>
            <img
              src="data:<?php echo $_SESSION['shop_permission']['type']; ?>;base64,<?php echo $_SESSION['shop_permission']['data']; ?>">
            <input type="submit" name="img_prv_delete" value="削除">
          </figure>
        </div>

        <?php else : ?>
        <!-- 通常時のプレビュー位置 -->
        <div id="preview1"></div>

        <?php endif; ?>
        <!-- 終わり戻ってきた場合 -->


        <input type="submit" name="confirm" value="確認">
        <input type="submit" name="clear" value="クリア">

      </form>





      <!-- 確認画面 -->
      <?php elseif ($mode == 'confirm') : ?>

      <form action="./shop_set.php" method="POST" enctype="multipart/form-data">

        <br>
        <br>
        <br>
        店舗名：<?php echo $_SESSION['shop_name']['name'] ?><br>
        店舗説明：<?php echo nl2br($_SESSION['shop_description']['description']) ?><br>
        <br>
        <br>
        <br>
        アップ画像
        <!-- 画像をアップしたか？必須でない場合があるので -->

        <?php if (empty($_SESSION['shop_permission']['data'])) : ?>
        <?php echo '画像は選択されていません'; ?>
        <?php else : ?>

        <?php check_vh('shop_permission', Fix::sp_noswipe_bnner_w, Fix::sp_noswipe_bnner_h) ?>


        <img
          src="data:<?php echo $_SESSION['shop_permission']['type']; ?>;base64,<?php echo $_SESSION['shop_permission']['data']; ?>">

        <?php endif; ?>





        <input type="submit" name="back" value="戻る">
        <input type="submit" name="send" value="送信">

      </form>



      <!-- 送信画面 -->
      <?php elseif ($mode == 'send') : ?>

      <?php echo $_POST['shop']['name']; ?>
      <?php echo $_SESSION['shop']['name']; ?>

      <?php else : ?>
      <h3>エラーしてます</h3>

      <?php endif; ?>







      <div class="setting_btn">
        <a href="setting_index.php">設定topへ戻る</a>
      </div>





    </main>


  </div>
</body>

</html>