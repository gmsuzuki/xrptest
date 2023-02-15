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
      <h1>お店のバナー</h1>
    </main>

    <div class="form_wrap">
      <section class="form_section section1">
        <header class="form_section_header">
          <div class="step">
            <p class="progress"><span></span></p>
          </div>
        </header>
        <div class="form_section__body">
          <h2>Q1.あなたのお名前を教えてください</h2>
          <div class="form_section-item form_section__name">
            <input type="text" placeholder="姓" class="form-item sei">
            <input type="text" placeholder="名" class="form-item mei">
          </div>
        </div>
        <div class="form_section__btn">
          <ul>
            <li class="fas" style="visibility:hidden;"><a href="#1"><i class="fas fa-arrow-circle-left"></i></a></li>
            <li class="fas"><a href="#2"><i class="fas fa-arrow-circle-right"></i></a></li>
          </ul>
        </div>
      </section>
      <section class="form_section section2">
        <header class="form_section_header">
          <div class="step">
            <p class="progress"><span></span></p>
          </div>
        </header>
        <div class="form_section__body">
          <h2>Q２.あなたの性別を教えてください</h2>
          <div class="form__section-item form_section__sex">
            <div class="sex_wrap">
              <span class="radio_wrap">

                <label>
                  <input value="女性" type="radio" name="sex" class="radio form-item">女性
                </label>
              </span>
              <span class="radio_wrap">
                <label>
                  <input value="男性" type="radio" name="sex" class="radio form-item">男性
                </label>
              </span>
            </div>
          </div>
        </div>
        <div class="form_section__btn">
          <ul>
            <li class="fas"><a href="#1"><i class="fas fa-arrow-circle-left"></i></a></li>
            <li class="fas"><a href="#3"><i class="fas fa-arrow-circle-right"></i></a></li>
          </ul>
        </div>
      </section>
      <section class="form_section section3">
        <header class="form_section_header">
          <div class="step">
            <p class="progress"><span></span></p>
          </div>
        </header>
        <div class="form_section__body">
          <h2>Q３.質問があればどうぞ！
          </h2>
          <div class="form__section-item form_section__question">
            <textarea id="kanso" class="form-item" name="kanso" cols="40" rows="10" maxlength="20"
              placeholder="ご質問を記入ください"></textarea>
          </div>
        </div>
        <div class="form_section__btn">
          <ul>
            <li class="fas"><a href="#2"><i class="fas fa-arrow-circle-left"></i></a></li>
            <li class="fas"><a href="#4"><i class="fas fa-arrow-circle-right"></i></a></li>
          </ul>
        </div>
      </section>
      <section class="form_section section4">
        <header class="form_section_header">
          <div class="step">
            <p class="progress"><span></span></p>
          </div>
        </header>
        <div class="form_section__body">
          <h2>結果
          </h2>
          <div class="form__section-item form_section__result">
            <dl>
              <dt>Q1.あなたのお名前を教えてください</dt>
              <dd id="q1"><span id="q1-1">入力されていません</span>　<span id="q1-2"></span></dd>
              <dt>Q２.あなたの性別を教えてください</dt>
              <dd id="q2">入力されていません</dd>
              <dt>Q３.質問があればどうぞ！</dt>
              <dd id="q3">入力されていません</dd>
            </dl>
          </div>
        </div>
        <div class="form_section__btn">
          <ul>
            <li class="fas"><a href="#3"><i class="fas fa-arrow-circle-left"></i></a></li>
            <li class="fas" style="visibility:hidden;"><a href="#4"><i class="fas fa-arrow-circle-right"></i></a></li>
          </ul>
        </div>
      </section>
    </div>








  </div>
</body>

</html>