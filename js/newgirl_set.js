var fname,
  lname,
  blood,
  age,
  gheight,
  gbreast,
  gbreastsize,
  gwaist,
  ghip,
  goption,
  gappearance,
  gstyle,
  gplay,
  gcharacteristic,
  gattention;

function _(x) {
  return document.getElementById(x);
}

// 文字入力チェック
function CheckGuestInfo(input) {
  const input_ok = input.checkValidity();
  const alert_span = input.closest("li").getElementsByTagName("em");
  console.log(input_ok);
  if (input_ok) {
    alert_span[0].style.display = "none";
    input.style.backgroundColor = "ffffff";
  } else {
    alert_span[0].style.display = "inline";
    alert_span[0].style.color = "red";
    input.style.backgroundColor = "#ffdddd";
  }
}

// エラー表示最初はしない
var mini = document.getElementsByClassName("mini_alert");
var input_txt = document.getElementById("lastname");

function alert_delete() {
  for (var i = 0; i < mini.length; i++) {
    mini[i].style.display = "none";
    input_txt.style.backgroundColor = "#ffffff";
    input_txt.style.borderColor = "#04384c";
  }
}

// https://www.javadrive.jp/javascript/function/index14.html
// 配列のように引数を使えるが、今はあとまわし

function intCheck(checkvalue, minivalue, maxvalue) {
  if (isNaN(checkvalue) || minivalue > checkvalue || checkvalue > maxvalue) {
    console.log("ng");
    return false;
  } else {
    return true;
  }
}

function alphabetCheck(str) {
  // カップチェック
  const regex = /[A-J]/;
  if (str.length == 1) {
    if (str.match(regex)) {
      console.log("マッチ");
      return true;
    } else {
      console.log("マッチしてない");
      return false;
    }
  } else {
    console.log("なんかへん");
  }
}

function processPhase1() {
  forma = document.getElementById("multiphase");
  const isRequired = forma.checkValidity();
  if (isRequired) {
    fname = _("firstname").value;
    lname = _("lastname").value;
    if (intCheck(_("age").value, 18, 50)) {
      age = _("age").value;
      _("phase1").style.display = "none";
      _("phase2").style.display = "block";
      console.log("名字");
      console.log(fname);
      console.log("名前");
      console.log(lname);
      console.log("年齢");
      console.log(age);
    } else {
      alert("年齢をちゃんと選んでください");
    }
  } else {
    alert("名前のところがおかしいよ");
  }
}

function processPhase2() {
  forma = document.getElementById("multiphase");
  const isRequired = forma.checkValidity();

  if (isRequired) {
    if (
      intCheck(_("girlheight").value, 140, 180) &&
      intCheck(_("breast").value, 70, 120) &&
      alphabetCheck(_("breastsize").value) &&
      intCheck(_("waist").value, 50, 100) &&
      intCheck(_("hip").value, 60, 120)
    ) {
      gheight = _("girlheight").value;
      gbreast = _("breast").value;
      gbreastsize = _("breastsize").value;
      gwaist = _("waist").value;
      ghip = _("hip").value;
      _("phase2").style.display = "none";
      _("phase3").style.display = "block";
      console.log("身長");
      console.log(gheight);
      console.log("バスト");
      console.log(gbreast);
      console.log("カップ");
      console.log(gbreastsize);
      console.log("ウエスト");
      console.log(gwaist);
      console.log("ヒップ");
      console.log(ghip);
    } else {
      alert("ちゃんと選んでください");
    }
  }
}
// checkbox
function processPhase3() {
  const optarr = [];
  const chkopp = document.multiphase.play_option;
  for (let i = 0; i < chkopp.length; i++) {
    if (chkopp[i].checked) {
      optarr.push(chkopp[i].value);
    }
  }
  if (optarr.some(isNaN)) {
    console.log(optarr);
    alert("ちゃんと入力してください");
  } else {
    // 配列に可能オプション番号を入れた
    goption = optarr;
    console.log(goption);
    _("phase3").style.display = "none";
    _("phase4").style.display = "block";
  }
}

// こまかくしたので次へをなおす

// SELECTのみだとおもったらラジオボタンだった
// ラジオボタンのバリデーションから始まります
// _("appearance").value これがiD指定なのでとれません

function radioCheck(checkradio, len) {
  var radioarr;
  for (let i = 0; i < len; i++) {
    if (checkradio.item(i).checked) {
      radioarr = checkradio.item(i).value;
    }
  }
  return radioarr;
}

function processPhase4() {
  forma = document.getElementById("multiphase");
  const isRequired = forma.checkValidity();

  const allStyle = document.getElementsByName("style");
  const lenStyle = allStyle.length;
  const checkedStyle = radioCheck(allStyle, lenStyle);

  if (isRequired) {
    if (intCheck(checkedStyle, 0, lenStyle)) {
      gstyle = checkedStyle;
      _("phase4").style.display = "none";
      _("phase5").style.display = "block";
      console.log(gstyle);
    } else {
      alert("ちゃんと入力してください");
    }
  } else {
    alert("このページの前の入力がおかしい");
  }
}

function processPhase5() {
  forma = document.getElementById("multiphase");
  const isRequired = forma.checkValidity();
  const allAppearance = document.getElementsByName("appearance");
  const lenAppearance = allAppearance.length;
  const checkedAppearance = radioCheck(allAppearance, lenAppearance);

  if (isRequired) {
    if (intCheck(checkedAppearance, 0, lenAppearance)) {
      gappearance = checkedAppearance;
      _("phase5").style.display = "none";
      _("phase6").style.display = "block";
      console.log(gappearance);
    } else {
      alert("ちゃんと入力してください");
    }
  } else {
    alert("この前のページの入力がおかしい");
  }
}

function processPhase6() {
  // フォームを入れる
  forma = document.getElementById("multiphase");
  // フォームのバリデーション結果
  const isRequired = forma.checkValidity();
  // プレイ
  const allPlay = document.getElementsByName("play");
  // 趣味
  const allCharacteristic = document.getElementsByName("characteristic");
  // プレイの選んだ個数
  const lenPlay = allPlay.length;
  // 趣味の選んだ個数
  const lenCharacteristic = allCharacteristic.length;
  const checkedPlay = radioCheck(allPlay, lenPlay);
  const checkedCharacteristic = radioCheck(
    allCharacteristic,
    lenCharacteristic
  );

  if (isRequired) {
    if (
      intCheck(checkedPlay, 0, lenPlay) &&
      intCheck(checkedCharacteristic, 0, lenCharacteristic)
    ) {
      gplay = checkedPlay;
      gcharacteristic = checkedCharacteristic;
      _("phase5").style.display = "none";
      _("phase6").style.display = "block";
      console.log(gplay);
      console.log(gcharacteristic);
    } else {
      alert("ちゃんと入力してください");
    }
  }
}

function processPhase6() {
  forma = document.getElementById("multiphase");
  const isRequired = forma.checkValidity();
  const allAttention = document.getElementsByName("attention");
  const lenAttention = allAttention.length;
  const checkedAttention = radioCheck(allAttention, lenAttention);

  if (isRequired) {
    if (intCheck(checkedAttention, 0, lenAttention)) {
      gattention = checkedAttention;
      _("phase6").style.display = "none";
      _("show_all_data").style.display = "block";
      _("display_fname").innerHTML = fname;
      _("display_lname").innerHTML = lname;
      _("display_age").innerHTML = age;

      _("display_gheight").innerHTML = gheight;
      _("display_gbreast").innerHTML = gbreast;
      _("display_gbreastsize").innerHTML = gbreastsize;
      _("display_gwaist").innerHTML = gwaist;
      _("display_ghip").innerHTML = ghip;
      // オプション
      _("display_goption").innerHTML = goption;
      // タグ
      _("display_gappearance").innerHTML = gappearance;
      _("display_gstyle").innerHTML = gstyle;
      _("display_gplay").innerHTML = gplay;
      _("display_gcharacteristic").innerHTML = gcharacteristic;
      // 注意
      _("display_gattention").innerHTML = gattention;

      console.log(gattention);
    } else {
      alert("ちゃんと入力してください");
    }
  }
}

// 戻るボタン
function buck_processPhase(x) {
  if (x == 7) {
    _("show_all_data").style.display = "none";
  } else {
    _("phase" + x).style.display = "none";
  }
  _("phase" + (x - 1)).style.display = "block";
}

window.addEventListener("load", alert_delete());
