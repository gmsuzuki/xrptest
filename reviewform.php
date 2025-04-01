<?php
//  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // $url = 'complete.php';
      // header('Location:' . $url );
      // exit;
    // }

// 変数の初期化
$page_flag = 0;

if( !empty($_POST['btn_confirm']) ) {
          
    session_start();
    // 二重送信防止用トークンの発行
    $token = uniqid('', true);;
    //トークンをセッション変数にセット
    $_SESSION['token'] = $token;
	$page_flag = 1;
          

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

  <!-- 共通 -->
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/header.css" />
  <link rel="stylesheet" type="text/css" href="css/accordion.css" />
  <link rel="stylesheet" type="text/css" href="css/footer.css" />
  <!-- ページ毎 -->
  <!-- <link rel="stylesheet" type="text/css" href="css/reserve.css" /> -->
  <link rel="stylesheet" type="text/css" href="css/review.css" />
  <!-- 特殊？ -->
  <link rel="stylesheet" type="text/css" href="css/under_nav.css" />



  <!--javascript-->
  <script src="js/script.js" defer></script>
  <script src="js/header.js" defer></script>
  <script src="js/accordion.js" defer></script>
  <script src="js/fadein.js" defer></script>
  <script src="js/popup.js" defer></script>
  <script src="js/text_count.js" defer></script>
  <script src="js/review_form.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- <script src="js/form_submit.js" defer></script> -->


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
    require_once( dirname(__FILE__). '/data.php');
    ?>
    <!------------------>

    <?php
    
    // 女子スタッフ
    require_once( dirname(__FILE__). '/setting/class/girl_class.php');
    require_once( dirname(__FILE__). '/setting/data/girl_data.php');

    // スタッフprofile
    foreach($sample_names as $sample_name){
    $staffList[] = new girlProfilelManager($sample_name);
    }
    // スタッフの画像
    foreach($sample_pics as $sample_pic){
       $girlNumber = $sample_pic['girlNumber'];
    // girlImageManagerのインスタンスを作成
    $staffPicList[] = new girlImageManager($girlNumber, $sample_pic);
      }




if (isset($_GET['reviewed']) && !empty($_GET['reviewed'])) {
    $review_staff_no = $_GET['reviewed'];
    $staff_found = false;

    foreach ($staffList as $staff) {
        if ($staff->getGirlNumber() == $review_staff_no) {
            $her_name = $staff->getGirlName();
            $her_img = getGirlImageByNumber($staffPicList, $staff->getGirlNumber());
            $staff_found = true;
            break;
        }
    }

    if (!$staff_found) {
        $error = "エラー: 指定されたスタッフが見つかりません。";
    }
    } else {
        $error = "エラー: スタッフ番号が指定されていません。";
    }

    ?>


    <main id="main">


      <!-- 口コミの注意事項 -->
      <div class="popup" id="js-popup">
        <div class="popup-inner">
          <div class="close-btn" id="js-close-btn">
            <i class="fas fa-times-circle"></i>
          </div>
          <h2 class="netreserve_attention_title">口コミ投稿の注意事項</h2>
          <div class="description attension">
            <h3>投稿に際しては必ず以下のガイドラインをご確認ください。</h3>
            <ul class="guideline">
              <li>実際に利用されていない場合の投稿を禁止します</li>
              <li>記号の多用、日本語以外での記述を禁止します</li>
              <li>お店や女の子への誹謗中傷を禁止します</li>
              <li>事実確認が困難な内容の投稿を禁止します</li>
              <li>プライバシーの侵害に配慮してください</li>
              <li>著作権を侵害する投稿を禁止します</li>
              <li>60日以内の体験談を投稿してください</li>
              <li>同じ体験に対して複数回口コミを投稿することを禁止します</li>
            </ul>
            <ul class="guideline_attention">
              <li>以上のガイドラインに反する投稿は掲載できません。</li>
              <li>非掲載となった場合、その理由は説明しておりません。</li>
              <li>一度承認、掲載された場合でも、その後非掲載となる場合があります。</li>
              <li>記載された内容の意図が変わらない範囲での誤字、脱字等の編集をする場合があります。</li>
            </ul>
          </div>
        </div>
        <div class="black-background" id="js-black-bg"></div>
      </div>

      <!-- ここまで口コミの注意事項 -->

      <article id="reserve" class="under_space">
        <div class="content_wrapper">
          <h1 class="fixpage_title"><span>Review Form</span></h1>
          <h3 class="block_title_caption">口コミ投稿フォーム</h3>


          <!-- 確認画面 -->
          <?php if( $page_flag === 1 ): ?>
          <!-- セッションにトークン入れる -->

          <p class="check_attention">
            お客様のご入力頂いた内容の入力確認になります。
            <br>下記の内容で口コミを投稿しますがよろしいでしょうか？
          </p>

          <div class="reserve_check_form">
            <form method="post" id="form" name="review_form2" action="" onsubmit="return verifyContactForm();">

              <!-- ここからプレビュー的にやってみる -->
              <!-- 女の子の -->
              <section class="reviewed_head under_space">
                <h2 class="girl_content_head">
                  <!-- 口コミから来てる？　それとも女のこのページ？ -->
                  <?php $select_played_girl = filter_input(INPUT_GET, 'reviewed')?>
                  <?php if($select_played_girl == null){
                    $select_played_girl = filter_input(INPUT_POST, 'played_girl');
                  } ?>
                  <!-- ちゃんといる人を選んでるよね？ -->


                  <!-- これは事前にチェックされてね？ -->
                  <?php if($staff_found) :?>

                  <div class="reviewed_girl">

                    <img src='<?php echo $her_img?>' alt="">

                  </div>
                  <p class="reviewed_girl_title"><?php echo $her_name?>さんへの口コミ
                  </p>
                  <!-- なんかエラーです -->
                  <?php else :?>
                  <h3>指定された情報がまちがっています</h3>
                  <?php endif ?>
                </h2>
                <input type="hidden" name="played_girl" value="<?php echo $select_played_girl ?>">






                <!-- 実際の画面の感じにする -->
                <section class="review_card">
                  <div class="review_header content_wrapper">

                    <section class="writen_by card">
                      ご連絡先<span class="hidden_alert">口コミ画面に表示されることはありません</span>
                      <h3><?php echo $_POST['customer_mail'];?></h3>
                      <input type="hidden" name="customer_mail" value="<?php echo $_POST['customer_mail']; ?>">
                      <ul class="review_present">
                        <li>★割引クーポンやお得な特典をお送りさせて頂く場合があります</li>
                        <li>★ご投稿に対して質問等させて頂く場合があります</li>
                      </ul>
                    </section>


                    <!-- ---------ここから------- -->

                    <section class="review_body card">
                      <div class="review_header">

                        <!-- 個別　どうやってひょうじするか？ -->
                        <div class="review-card">
                          <div class="user-info">
                            <img class='user-thumb' src="img/user_face.png" alt="">

                            <div>
                              <div class="user-name"> <?php echo $_POST['reviewer_name'];?></div> <input type="hidden"
                                name="reviewer_name" value="<?php echo $_POST['reviewer_name']; ?>">
                              <div class="review-meta">来店日:
                                <?php $re_date =filter_input(INPUT_POST,'played_date') ?>
                                <?php echo date('Y年m月d日',strtotime($re_date))?>
                                <input type="hidden" name="played_date" value="<?php echo $_POST['played_date']; ?>">
                              </div>
                            </div>
                          </div>

                          <?php
                          $check_stars = [];
                          for ($i = 1; $i <= 5; $i++) { $check_stars[$i]=!empty($_POST["check{$i}_star"]) ?
                            $_POST["check{$i}_star"] : 0; }?>


                          <div class="review-content">
                            <div class="rating-box">
                              <div class="review-meta">コース: <?php echo $_POST['played_time']?>分コース</div>
                              <div>項目１:
                                <span class="stars" style='--rating: <?php echo $check_stars[1]?>;'></span>
                              </div>
                              <div>項目２:
                                <span class="stars" style='--rating: <?php echo $check_stars[2]?>;'></span>
                              </div>
                              <div>項目３:
                                <span class="stars" style='--rating: <?php echo $check_stars[3]?>;'></span>
                              </div>
                              <div>項目４:
                                <span class="stars" style='--rating: <?php echo $check_stars[4]?>;'></span>
                              </div>
                              <div>項目５:
                                <span class="stars" style='--rating: <?php echo $check_stars[5]?>;'></span>
                              </div>
                            </div>
                            <div class="chart-box">
                              <canvas id="ratingChart"></canvas>
                            </div>
                          </div>

                          <div class="review-title"><?php echo $_POST['review_title']?></div>
                          <div class="review-comment"><?php echo nl2br($_POST['review_body']);?>
                            <!-- textareaをinputに変更 -->
                          </div>
                          <input type="hidden" name="review_title" value="<?php echo $_POST['review_title']; ?>">
                          <input type="hidden" name="review_text_body" value="<?php echo $_POST['review_body']; ?>">


                          <p>ご利用日
                            <span>
                              <?php $re_date =filter_input(INPUT_POST,'played_date') ?>
                              <?php echo date('Y年m月d日',strtotime($re_date))?>
                              <input type="hidden" name="played_date" value="<?php echo $_POST['played_date']; ?>">
                            </span>
                          </p>

                        </div>

                      </div>
                    </section>


                  </div>
                </section>
                <!-- ここまで実際の画面の感じにする -->


                <div class="check_form_submit">
                  <input type="button" value="戻る" onclick="history.back()" class="form_back">
                  <input type="submit" name="btn_submit" value="投稿する" class="form_next">
                </div>
                <!-- セッション送る -->
                <input type="hidden" name="token" value="<?php echo $token;?>">
              </section>
            </form>
          </div>
          <!-- 確認画面ここまで -->

          <!-- 送信済み -->
          <?php elseif( $page_flag === 2 ): ?>
          <p id="form">疑似idフォームがないとjsがこける</p>

          <?php
          // POSTされたトークンとセッション変数のトークンの比較
          if($token != "" && $token == $session_token) {
          //エスケープ処理やデータチェックを行う関数のファイルの読み込み
            require 'libs/validation.php';
 
          //POSTされたデータを変数に格納（値の初期化とデータの整形：前後にあるホワイトスペースを削除）
          // 投稿者名  reviewer_name
          $apply_reviewer_name = trim( filter_input(INPUT_POST, 'reviewer_name') );
          // 投稿者連絡先 customer_mail
          $apply_customer_mail = trim( filter_input(INPUT_POST, 'customer_mail') );
          // 指名 played_girl
          $apply_played_girl = trim( filter_input(INPUT_POST, 'played_girl') );
          // プレイ日時   played_date
          $aplly_played_date = trim( filter_input(INPUT_POST, 'played_date') );
          // コース   played_time
          $aplly_played_time = trim( filter_input(INPUT_POST, 'played_time') );
          // 評価 check1-5_star
          $aplly_check1_star = trim( filter_input(INPUT_POST, 'check1_star') );
          $aplly_check2_star = trim( filter_input(INPUT_POST, 'check2_star') );
          $aplly_check3_star = trim( filter_input(INPUT_POST, 'check3_star') );
          $aplly_check4_star = trim( filter_input(INPUT_POST, 'check4_star') );
          $aplly_check5_star = trim( filter_input(INPUT_POST, 'check5_star') );
          // 口コミタイトル reviewe_title
          $aplly_review_title = trim( filter_input(INPUT_POST, 'review_title') );
          // 口コミ本文
          $aplly_review_text_body = trim( filter_input(INPUT_POST, 'review_text_body') );
          
          //送信ボタンが押された場合の処理
          if (isset($_POST['btn_submit'])) {

          //POSTされたデータをチェック
          $_POST = checkInput( $_POST );

          //エラーメッセージを保存する配列の初期化
          $errors = array();

          //値の検証
          // 名前
          if ( $apply_reviewer_name == '' ) {
          $errors['apply_reviewer_name'] = '*お名前は必須項目です。';
          //制御文字でないことと文字数をチェック
          } elseif ( preg_match( '/\A[[:^cntrl:]]{1,20}\z/u', $apply_reviewer_name ) == 0 ) {
          $errors['apply_reviewer_name'] = '*お名前は20文字以内でお願いします。';
          }
          // メール
          if ( $apply_customer_mail == '' ) {
          $errors['apply_customer_mail'] = '*メールアドレスは必須です。';
          } else { //メールアドレスを正規表現でチェック
          $pattern = '/\A([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}\z/uiD';
          if ( !preg_match( $pattern, $apply_customer_mail ) ) {
          $errors['apply_customer_mail'] = '*メールアドレスの形式が正しくありません。';
          }
          }
          // 指名
          if ( $apply_played_girl == ''){
           $errors['apply_played_girl'] = '担当指名が未入力です。';  
          }
          // 予約日時
          if( $aplly_played_date == '' ){
             $errors['aplly_played_date'] = '予約日時が未入力です';
          }
          // プレイ時間
          if( $aplly_played_time == ''){
             $errors['aplly_played_time'] = 'プレイ時間が未入力です。';
          }
          // 口コミタイトル
          if ( $aplly_review_title == '' ) {
          $errors['aplly_review_title'] = '口コミタイトルが未入力です';
          //制御文字でないことと文字数をチェック
          } elseif ( preg_match( '/\A[[:^cntrl:]]{1,20}\z/u', $aplly_review_title ) == 0 ) {
          $errors['aplly_review_title'] = '*口コミタイトルは20文字以内でお願いします。';
          }

          // 口コミ本文
          if ( $aplly_review_text_body == '' ) {
          $errors['aplly_review_text_body'] = '口コミ本文が未入力です';
          //制御文字でないことと文字数をチェック
          } elseif ( preg_match( '/\A[[:^cntrl:]]{1,1000}\z/u', $aplly_review_text_body ) == 0 ) {
          $errors['aplly_review_text_body'] = '口コミ本文に問題があります';
          }


          //エラーがなく且つ POST でのリクエストの場合
          if (empty($errors) && $_SERVER['REQUEST_METHOD']==='POST') {

            // ------------------------------
            // ここからサーバー書き込みになるとおもう
            // ------------------------------



                //メール送信の結果判定
                if ( $result ) {
                  
                $_POST = array(); //空の配列を代入し、すべてのPOST変数を消去
                //変数の値も初期化
                $apply_reviewer_name = '';
                $apply_customer_mail = '';
                $apply_played_girl = '';
                $aplly_played_date = '';
                $aplly_played_time = '';
                $aplly_check1_star = '';
                $aplly_check2_star = '';
                $aplly_check3_star = '';
                $aplly_check4_star = '';
                $aplly_check5_star = '';
                $aplly_review_title = '';
                $aplly_review_text_body = '';

          //  サーバー書き込みがOKだったら

                echo "<div class='form_alert'>
                <h3>口コミを投稿しました</h3>
                <p>スタッフ確認のうえ、掲載させていただきます</p>
                <a href='top.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
                </div>";
                }
                else{
                echo "<div class='form_alert'>
                ドルリザルトに何も入ってないんだからそりゃこっちがくるよね
                <h3>サーバーに遅れませんでした</h3>
                <p>お手数ですがしばらく経ってからもう一度投稿をお願いします。</p>
                <a href='top.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
                </div>";
                  }
              

              // これ以下はバリデーションは成功失敗のelse  
              }else{
                echo "<div class='form_alert'>
                <h3>入力エラーが確認されました</h3>";
                foreach($errors as $error){
                  echo "<p>$error</p>";
                };
                echo "<a href='reviewform.php' class='anime_btn btn_active btn_font01 back_to_top'>再入力する</a></div>";
              }
              }//送信ボタンを押したら  終わり
            
          // セッション確認
          }else{
          echo "<div class='form_alert'>
          <h3>不正な操作です</h3>
          <p>一度送信したのち、リロード等は行わないでください。</p>
          <a href='top.php' class='anime_btn btn_active btn_font01 back_to_top'>トップページへ戻る</a>
          </div>";

          }
          ?>

          <!-- 送信済みここまで -->


          <?php else: ?>
          <!-- 以下通常 -->



          <!-- 口コミフォーム -->

          <div class="review_from_body">
            <form method="post" id="form" name="review_form1" action="" onsubmit="return verifyContactForm();">

              <!-- 女の子から飛んだ場合 -->
              <?php if(isset($_GET['reviewed'])):?>
              <div class="review_head under_space">
                <h2 class="girl_content_head">
                  <figure class="reviewed_girl">
                    <img src='<?php echo $her_img?>' alt="">
                  </figure>
                  <figcaption class="reviewed_girl_title"><?php echo $her_name?>さんへの口コミを書く
                  </figcaption>
                </h2>

                <input type="hidden" name="played_girl" value='<?php echo $review_staff_no?>'>


              </div>
              <?php else :?>
              <!-- 女の子から飛んでない場合 -->
              <div class="review_item_wrap reviewed_bg_pink">
                <dl class="played_program_item">
                  <dt>遊んだ女の子<em>必須</em></dt>
                  <select name="played_girl" required>
                    <option value="" hidden>選択</option>
                    <?php foreach ($staffList as $staff):?>
                    <option value="<?php echo $staff->getGirlNumber()?>">
                      <?php echo $staff->getGirlName() ?>
                    </option>

                    <?php endforeach ?>
                  </select>
                </dl>
              </div>
              <?php echo $_get['reviewed']?>

              <?php endif?>

              <!-- 遊んだ情報 -->


              <!-- コース -->
              <div class=" review_item_wrap review_girl_item">

                <!-- 利用コース -->
                <dl class="played_program_item">
                  <dt>ご利用コース<em>必須</em></dt>
                  <select name="played_time" required>
                    <option value="" hidden>ご利用コース</option>
                    <?php for($i = 60; $i < 361; $i+=30) : ?>
                    <?php echo '<option value="'.$i.'">' ?>
                    <?php echo "{$i}分" ?>
                    </option>
                    <?php endfor ?>
                    <option value="360分以上">360分以上のロングコース</option>
                  </select>
                </dl>

                <!-- ご利用日 -->
                <dl class="played_date_item">
                  <dt>ご利用日時<em>必須</em></dt>
                  <label class="date-edit">
                    <input id="played_date_form" type="date" name="played_date" max="<?php echo date('Y-m-d'); ?>"
                      required>
                  </label>
                </dl>
              </div>

              <!-- 評価1 -->
              <div class="review_item_wrap">
                <?php $counter += 1 ?>
                <?php foreach($reviews_question as $review_question) :?>
                <dl class="review_item_card">
                  <dt><?php echo $review_question[0]?>
                    <p class="review_tips"><?php echo $review_question[1]?></p>
                  </dt>
                  <dd class="stars_radio">
                    <?php for($i = 5; $i > 0; $i = $i-1): ?>
                    <input id='check<?php echo $counter ?>_star<?php echo $i ?>' type="radio"
                      name="check<?php echo $counter ?>_star" value='<?php echo $i ?>'
                      <?php if($i == 5){echo 'required';} ?> />
                    <label for="check<?php echo $counter ?>_star<?php echo $i ?>">★</label>
                    <?php endfor ?>
                  </dd>
                </dl>
                <?php $counter += 1 ?>
                <?php endforeach ?>
              </div>


              <!-- 口コミタイトル -->
              <div class="review_item_wrap">
                <dl>
                  <dt>
                    口コミのタイトル<em>必須</em>
                    <span class="mini_alert">記号は使えません</span>
                  </dt>
                  <dd>
                    <p id="review_title_count">残り：32文字</p>
                    <input type="text" id="review_title" name="review_title" maxlength="32" placeholder="32文字以内でお願いします"
                      required onblur="CheckGuestInfo(this)" required
                      pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,32}"
                      oninput="CountStr('review_title_count',value,32)">
                  </dd>
                </dl>


                <!-- テキストエリアにはパターン属性はない -->

                <dl class="review_text_body">
                  <dt>口コミ本文<em>必須</em>
                    <p id="not_enough" class="review_limit">文字数がたりません。(100文字以上、1,000文字以内)</p>
                  </dt>
                  <dd>
                    <textarea rows=7 name="review_body" minlength="100" maxlength="1000" placeholder="ご自由にお願いします。"
                      onblur="checkTxt(this,'review_text_body')" required
                      oninput="CountStrNow('review_count',value,100,1000)"></textarea>
                    <input type="hidden" id="review_text_body" name="review_text_body">
                    <p id="review_count">現在:0/1000</p>
                  </dd>
                </dl>
              </div>


              <!-- 投稿者名 -->
              <div class="review_item_wrap reviewed_bg_blue">
                <dl class="review_item_card">
                  <dt>
                    投稿者名<em>必須</em>
                    <span class="mini_alert">記号は使えません</span>
                  </dt>
                  <dd><input type="text" id="reviewer_name" name="reviewer_name" maxlength="20"
                      placeholder="20文字以内（例）武田優" required onblur="CheckGuestInfo(this)"
                      pattern="^(?=.*\S.*$)[^\x21-\x2C\x2E\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]{1,20}">
                  </dd>
                </dl>

                <p>★メールアドレスを入力しませんか？</p>
                <p>登録されるとオトクな情報やクーポンが届きます。</p>



                <dl class="review_mailinglist">
                  <dt>メールアドレス
                    <p class="review_tips">他者に公開されることはございません。</p>
                    <span class="mini_alert">ご登録できない形式です</span>
                  </dt>
                  <dd><input type="text" name="customer_mail" placeholder="メールアドレス" id="mail1"
                      onblur="CheckGuestEmail(this)" pattern="^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$">
                  </dd>
                </dl>

                <dl class="review_mailinglist">
                  <dt class="review_tips">メールアドレス(確認)
                    <span class="mini_alert">メールアドレスが異なります</span>
                  </dt>
                  <dd><input type="text" disabled name="customer_mail_check" placeholder="メールアドレス(確認)" id="mail2"
                      onblur="SameCheck(this)"></dd>
                </dl>


              </div>



              <div class="submit">
                <input type="submit" name="btn_confirm" disabled id="submit_button" value="入力が完了していません"
                  class="sendButton btn_active ">
              </div>

            </form>


          </div>





          <?php endif?>

        </div><!-- content_wrapper -->
      </article>



      <?php
        require_once( dirname(__FILE__). '/parts/accordion.php');
      ?>





    </main>

    <?php
      require_once( dirname(__FILE__). '/parts/footer.php');
    ?>

  </div><!-- wrapper -->


  <script>
  const ctx = document.getElementById('ratingChart').getContext('2d');
  new Chart(ctx, {
    type: 'radar',
    data: {
      labels: ['項目１', '項目２', '項目３', '項目４', '項目５'],
      datasets: [{
        data: [
          <?php echo $check_stars[1]?>,
          <?php echo $check_stars[2]?>,
          <?php echo $check_stars[3]?>,
          <?php echo $check_stars[4]?>,
          <?php echo $check_stars[5]?>
        ],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        r: {
          min: 0,
          max: 5,
          ticks: {
            stepSize: 1,
            display: false // メモリの数字を非表示
          }
        }
      }
    }
  });
  </script>



</body>

</html>