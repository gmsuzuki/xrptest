<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="css/reset.css">

  <style>
  body {
    background-color: #f5f5f5;
    color: #916774;
  }

  h2 {
    margin: 30px;
    text-align: center;
    font-size: 1.5rem;
  }


  h3 {
    display: inline-block;
    background-color: #b28d99;
    padding: 1rem;
    text-align: left;
    margin-bottom: 2rem;
    color: white;
  }

  .h3_l {
    background-color: #cc2864;
  }

  .h3_d {
    background-color: #28c3cc;
  }

  section {
    padding: 5%;
    margin-bottom: 30px;
    background-color: #ecebe6;
  }

  .section_m {
    background-color: #ecebe6;
  }

  .section_l {
    color: #cc2864;
    background-color: #f8f7f1;
  }

  .section_d {
    background-color: #d7e5d6;
  }

  .section_o {
    background-color: #cacad0;
  }


  input {
    width: 100%;
  }

  input[type="radio"] {
    display: none;
  }

  .radio_label:checked+label {
    background-color: pink;
  }

  .radio_select_list {
    display: block;
    width: 48%;
    height: 2rem;
    text-align: center;
    margin: 15px 0;
  }

  .tag_label_txt {
    display: block;
    text-align: center;
    width: 100%;
    line-height: 2.5rem;
    border-radius: 2rem;
    border: 1px solid #666;
  }

  p,
  .eatname {
    font-size: 1.2rem;
    text-align: center;
    line-height: 2.6rem;
    letter-spacing: 0.08em;
  }

  ul {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 100%;
  }


  .eatlist {
    margin-bottom: 2rem;
  }

  .submit_btn {
    width: 90%;
    margin: 0 auto;
  }

  #back_btn,
  #submit_button {
    width: 100%;
    display: inline-block;
    padding: 10px 20px;
    font-size: 1.8rem;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 30px;
    transition: background-color 0.3s ease;
    cursor: pointer;
    background-color: #b90808;
    color: white;

  }

  dl {
    text-align: center;
    margin-top: 1rem;
  }

  dt {
    background-color: #ffe3b0;
    line-height: 2rem;
  }

  dd {
    margin-top: .5rem;
    margin-bottom: 1rem;
  }

  .comment {
    margin-top: 1rem;
    text-align: center;
  }

  .comment span {
    padding: .5rem;
    line-height: 2rem;
    text-align: center;
    color: blue;
    font-weight: bold;
  }


  .attention {
    color: red;
    margin-top: 2rem;
  }

  .getp {
    width: 80%;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 30px;
    font-size: 1.5rem;
    line-height: 3rem;
    text-align: center;
  }
  </style>

</head>


<body>

  <?php 
      // セッションスタートしてる
      session_start();

      // 戻るボタンでエラーしないように
      header('Expires:-1');
      header('Cache-Control:');
      header('Pragma:');

      // 入力モードにする
      $mode = 'input';

      if(isset($_POST['confirm']) && $_POST['confirm']){
          $mode = 'confirm';
        }
      if(isset($_POST['back'])){
          $mode = 'input';
        }
      
  ?>


  <!-- 入力 -->
  <?php if ($mode == 'input') : ?>



  <h2>たんぱく質確認</h2>

  <form action="" method="POST" id="form">
    <section class="section_m">
      <h3>朝ごはん</h3>

      <p class="eatname">ゴールドスタンダード</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="gold00" checked name="goldstn_m" value="0" class="radio_label">
          <label for="gold00" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="gold01" name="goldstn_m" value="1" class="radio_label">
          <label for="gold01" class="tag_label_txt">１</label>
        </li>
      </ul>

      <p>プロティンsavas</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="savas01" checked name="savas_m" value="0" class="radio_label">
          <label for="savas01" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="savas02" name="savas_m" value="1" class="radio_label">
          <label for="savas02" class="tag_label_txt">１</label>
        </li>
      </ul>



      <p>卵</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="egg01" checked name="egg_m" value="0" class="radio_label">
          <label for="egg01" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="egg02" name="egg_m" value="1" class="radio_label">
          <label for="egg02" class="tag_label_txt">１</label>
        </li>
      </ul>


      <p>納豆</p>

      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="nntu01" checked name="nntu_m" value="0" class="radio_label">
          <label for="nntu01" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="nntu02" name="nntu_m" value="1" class="radio_label">
          <label for="nntu02" class="tag_label_txt">１</label>
        </li>
      </ul>

    </section>


    <section class="section_l">
      <h3 class="h3_l">昼ごはん</h3>
      <p>ささみ</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="ssm01" checked name="ssm_l" value="0" class="radio_label">
          <label for="ssm01" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="ssm02" name="ssm_l" value="1" class="radio_label">
          <label for="ssm02" class="tag_label_txt">１</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="ssm03" name="ssm_l" value="2" class="radio_label">
          <label for="ssm03" class="tag_label_txt">2</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="ssm04" name="ssm_l" value="3" class="radio_label">
          <label for="ssm04" class="tag_label_txt">3</label>
        </li>
      </ul>

      <p>とりむね1/2</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="chickenb01_l" checked name="chickenb_l" value="0" class="radio_label">
          <label for="chickenb01_l" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="chickenb02_l" name="chickenb_l" value="1" class="radio_label">
          <label for="chickenb02_l" class="tag_label_txt">１</label>
        </li>
      </ul>


      <p>卵</p>

      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="egg01_l" checked name="egg_l" value="0" class="radio_label">
          <label for="egg01_l" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="egg02_l" name="egg_l" value="1" class="radio_label">
          <label for="egg02_l" class="tag_label_txt">１</label>
        </li>
      </ul>


    </section>



    <section class="section_d">
      <h3 class="h3_d">夜ごはん</h3>
      <p>レバー（コンビニ計算）</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="liver01" checked name="liver_d" value="0" class="radio_label">
          <label for="liver01" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="liver02" name="liver_d" value="1" class="radio_label">
          <label for="liver02" class="tag_label_txt">１</label>
        </li>
      </ul>


      <p>とりむね1/2</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="chickenb01_d" checked name="chickenb_d" value="0" class="radio_label">
          <label for="chickenb01_d" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="chickenb02_d" name="chickenb_d" value="1" class="radio_label">
          <label for="chickenb02_d" class="tag_label_txt">１</label>
        </li>
      </ul>

      <p>牛ステーキ1/2</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="beef01_d" checked name="beef_d" value="0" class="radio_label">
          <label for="beef01_d" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="beef02_d" name="beef_d" value="1" class="radio_label">
          <label for="beef02_d" class="tag_label_txt">１</label>
        </li>
      </ul>

      <p>ささみ</p>

      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="ssm01_d" checked name="ssm_d" value="0" class="radio_label">
          <label for="ssm01_d" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="ssm02_d" name="ssm_d" value="1" class="radio_label">
          <label for="ssm02_d" class="tag_label_txt">１</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="ssm03_d" name="ssm_d" value="2" class="radio_label">
          <label for="ssm03_d" class="tag_label_txt">2</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="ssm04_d" name="ssm_d" value="3" class="radio_label">
          <label for="ssm04_d" class="tag_label_txt">3</label>
        </li>
      </ul>

      <p>納豆</p>

      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="nntu03" checked name="nntu_d" value="0" class="radio_label">
          <label for="nntu03" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="nntu04" name="nntu_d" value="1" class="radio_label">
          <label for="nntu04" class="tag_label_txt">１</label>
        </li>
      </ul>



      <p>卵</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="egg01_d" checked name="egg_d" value="0" class="radio_label">
          <label for="egg01_d" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="egg02_d" name="egg_d" value="1" class="radio_label">
          <label for="egg02_d" class="tag_label_txt">１</label>
        </li>
      </ul>




    </section>


    <section class="section_o">
      <h3>ジムなど追加</h3>

      <p class="eatname">ゴールドスタンダード</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="gold00_d" checked name="goldstn_d" value="0" class="radio_label">
          <label for="gold00_d" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="gold01_d" name="goldstn_d" value="1" class="radio_label">
          <label for="gold01_d" class="tag_label_txt">１</label>
        </li>
      </ul>

      <p>プロティンsavas</p>
      <ul class="eatlist">
        <li class="radio_select_list">
          <input type="radio" id="savas01_d" checked name="savas_d" value="0" class="radio_label">
          <label for="savas01_d" class="tag_label_txt">0</label>
        </li>
        <li class="radio_select_list">
          <input type="radio" id="savas02_d" name="savas_d" value="1" class="radio_label">
          <label for="savas02_d" class="tag_label_txt">１</label>
        </li>
      </ul>


    </section>

    <div class="submit_btn">
      <input type="submit" id="submit_button" name="confirm" value="計算">
    </div>


  </form>

  <!-- 確認画面 -->
  <?php elseif ($mode == 'confirm') : ?>

  <h2>計算結果</h2>
  <form action="">

    <?php $gscount = $_POST['goldstn_m'] + $_POST['goldstn_d'] ?>
    <?php $svcount = $_POST['savas_m'] + $_POST['savas_d'] ?>
    <?php $protein=  $gscount * 24 + $svcount *20 ?>
    <?php $ssmcount = $_POST['ssm_l'] + $_POST['ssm_d'] ?>
    <?php $chbcount = $_POST['chickenb_l'] + $_POST['chickenb_d']  ?>
    <?php $livercount = $_POST['liver_d']  ?>
    <?php $beefcount = $_POST['beef_d']?>
    <?php $meet = $ssmcount *10 + $chbcount *25 + $livercount*18 +$beefcount*14 ?>
    <?php $eggcount = $_POST['egg_m'] + $_POST['egg_l'] + $_POST['egg_d'] ?>
    <?php $nttcount = $_POST['nntu_m'] + $_POST['nntu_d'] ?>
    <?php $others = $eggcount *7 + $nttcount *7 ?>


    <section>
      <h3>合計</h3>
      <?php $dayeat= $protein + $meet + $others ?>
      <div class="getp">
        <?php echo $dayeat ?>グラム
      </div>
      <div class="comment">
        <?php if($dayeat < 50) :?>
        <span>全然駄目。食事またはプロテイン２杯</span>
        <?php elseif($dayeat < 60) :?>
        <span>プロテインとなにかもう一つ必要</span>
        <?php elseif($dayeat < 70) :?>
        <span>プロテイン一杯分足りないよ</span>
        <?php elseif($dayeat < 80) :?>
        <span>もう一声、ヨーグルト食べたら？</span>
        <?php elseif($dayeat <= 90) :?>
        <span>一日分クリア！でも理想は100g</span>
        <?php elseif($dayeat >= 91) :?>
        <span>クリアー</span>
        <?php endif ?>
        <br>
        <?php if($livercount == 0 ):?>
        <span class="attention">レバー食べてないじゃん</span>
        <?php endif ?>

      </div>


    </section>



    <section>

      <p>摂取量</p>
      <dl>
        <dt>プロテイン</dt>
        <dd>
          <?php echo $protein ?>
        </dd>
        <dt>肉</dt>
        <dd>
          <?php echo $meet ?>
        </dd>
        <dt>卵納豆</dt>
        <dd>
          <?php echo $others ?>
        </dd>
    </section>

    <div class="submit_btn">
      <input type="submit" id="back_btn" name="back" value="戻る">
    </div>
  </form>

  <?php endif ?>


  <br>
  <br>
  <p>広告を下にするためのスペース</p><br><br><br><br><br><br><br>

</body>

</html>