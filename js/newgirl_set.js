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
  gplus,
  gsecret;

// 送信OK

// ここから。なんかいい感じにできる方法はあるかな？
// ファイルを分けるべきな気がしてきた
// 申請ボタンのcssからはじめるかな

// https://www.javadrive.jp/javascript/function/index14.html
// 配列のように引数を使えるが、今はあとまわし

// 入った数字がへんになってないか？
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

// 配列をliにして子要素の末尾に追加
function arrLi(ul_id, checkArr) {
  let list = document.getElementById(ul_id);
  for (let i = 0; i < checkArr.length; i++) {
    // 追加する要素を作成
    var li = document.createElement("li");
    li.innerHTML = checkArr[i];
    // 末尾に追加
    list.appendChild(li);
  }
}

// 入れたliを消す関数
function deleteli(parent_id) {
  let parent = document.getElementById(parent_id);
  while (parent.firstChild) {
    parent.removeChild(parent.firstChild);
  }
}

function processPhase1() {
  // forma = document.getElementById("multiphase");
  // const isRequired = forma.checkValidity();
  if (formCheck()) {
    fname = _("firstname").value;
    lname = _("lastname").value;
    if (intCheck(_("age").value, 18, 50)) {
      age = _("age").value;
      _("phase1").style.display = "none";
      _("phase2").style.display = "block";
      // プログレスバー色付
      _("status_2").classList.toggle("active");
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
  if (formCheck()) {
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
      // プログレスバー色付
      _("status_3").classList.toggle("active");
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
  if (formCheck()) {
    // 配列作る
    const optarr = [];
    // checkboxの選択肢をすべて入れる
    const chkopp = document.multiphase.play_option;
    for (let i = 0; i < chkopp.length; i++) {
      // 入れた選択肢をチェックしてたら配列に入れる
      if (chkopp[i].checked) {
        optarr.push(chkopp[i].value);
      }
    }
    // 配列に可能オプション番号を入れた
    goption = optarr;
    console.log(goption);
    _("phase3").style.display = "none";
    _("phase4").style.display = "block";
    // プログレスバー色付
    _("status_4").classList.toggle("active");
  } else {
    alert("変なことした？");
  }
}

function processPhase4() {
  const allStyle = document.getElementsByName("girl_style");
  const lenStyle = allStyle.length;
  const checkedStyle = radioCheck(allStyle, lenStyle);

  if (formCheck()) {
    gstyle = checkedStyle;
    _("phase4").style.display = "none";
    _("phase5").style.display = "block";
    // プログレスバー色付
    _("status_5").classList.toggle("active");
    console.log(gstyle);
  } else {
    alert("このページ入力がおかしい");
  }
}

function processPhase5() {
  const allAppearance = document.getElementsByName("girl_appearance");
  const lenAppearance = allAppearance.length;
  const checkedAppearance = radioCheck(allAppearance, lenAppearance);
  if (formCheck()) {
    gappearance = checkedAppearance;
    _("phase5").style.display = "none";
    _("phase6").style.display = "block";
    // プログレスバー色付
    _("status_6").classList.toggle("active");
    console.log(gappearance);
  } else {
    alert("このページの入力がおかしい");
  }
}

function processPhase6() {
  // プレイ
  const allPlay = document.getElementsByName("girl_play");
  // プレイの個数
  const lenPlay = allPlay.length;
  // プレイ選んだ個数
  const checkedPlay = radioCheck(allPlay, lenPlay);
  if (formCheck()) {
    gplay = checkedPlay;
    _("phase6").style.display = "none";
    _("phase7").style.display = "block";
    // プログレスバー色付
    _("status_7").classList.toggle("active");
    console.log(gplay);
  } else {
    alert("このページの入力がおかしい");
  }
}

function processPhase7() {
  //趣味
  const allCharacteristic = document.getElementsByName("girl_characteristic");
  // 趣味の個数
  const lenCharacteristic = allCharacteristic.length;
  // 趣味選んだ個数
  const checkedCharacteristic = radioCheck(
    allCharacteristic,
    lenCharacteristic
  );

  if (formCheck()) {
    gcharacteristic = checkedCharacteristic;
    _("phase7").style.display = "none";
    _("phase8").style.display = "block";
    // プログレスバー色付
    _("status_8").classList.toggle("active");
    console.log(gcharacteristic);
  } else {
    alert("この前のページの入力がおかしい");
  }
}

// checkbox
// プラスアルファ
function processPhase8() {
  if (formCheck()) {
    // 配列作る
    const plusarr = [];
    // checkboxの選択肢をすべて入れる
    const chkplus = document.multiphase.girl_plus;
    for (let i = 0; i < chkplus.length; i++) {
      // 入れた選択肢をチェックしてたら配列に入れる
      if (chkplus[i].checked) {
        plusarr.push(chkplus[i].value);
      }
    }

    // 配列に可能オプション番号を入れた
    gplus = plusarr;
    console.log(gplus);
    _("phase8").style.display = "none";
    _("phase9").style.display = "block";
    // プログレスバー色付
    _("status_9").classList.toggle("active");
  } else {
    alert("変なことした？");
  }
}

// // checkbox
// function processPhase8() {
//   if (formCheck()) {
//     // 配列作る
//     const plusarr = [];
//     // checkboxの選択肢をすべて入れる
//     const chkplus = document.multiphase.girl_plus;
//     for (let i = 0; i < chkplus.length; i++) {
//       // 入れた選択肢をチェックしてたら配列に入れる
//       if (chkplus[i].checked) {
//         plusarr.push(chkplus[i].value);
//       }
//     }
//     // 数字以外のものが入ってないか？
//     if (plusarr.some(isNaN)) {
//       console.log(plusarr);
//       alert("ちゃんと入力してください");
//     } else {
//       // 配列に可能オプション番号を入れた
//       gplus = plusarr;
//       console.log(gplus);
//       _("phase8").style.display = "none";
//       _("phase9").style.display = "block";
//     }
//   } else {
//     alert("変なことした？");
//   }
// }

// 秘密
function processPhase9() {
  if (formCheck()) {
    const secretarr = [];
    // checkboxの選択肢をすべて入れる
    const chksecret = document.multiphase.girl_secret;
    for (let i = 0; i < chksecret.length; i++) {
      // 入れた選択肢をチェックしてたら配列に入れる
      if (chksecret[i].checked) {
        secretarr.push(chksecret[i].value);
      }
    }

    let swich_display_fname = _("display_fname");
    // 配列に可能オプション番号を入れた
    gsecret = secretarr;
    console.log(gsecret);
    _("phase9").style.display = "none";
    _("show_all_data").style.display = "block";
    // プログレスバー色付
    _("status_10").classList.toggle("active");
    // 名字がある場合
    if (fname.length !== 0) {
      swich_display_fname.style.display = "block";
      swich_display_fname.innerHTML = fname;
      // _("display_fname").innerHTML = fname;
    } else {
      swich_display_fname.style.display = "none";
    }
    _("display_lname").innerHTML = lname;
    _("display_age").innerHTML = age;

    _("display_gheight").innerHTML = gheight;
    _("display_gbreast").innerHTML = gbreast;
    _("display_gbreastsize").innerHTML = gbreastsize;
    _("display_gwaist").innerHTML = gwaist;
    _("display_ghip").innerHTML = ghip;
    // オプション
    if (goption.length !== 0) {
      arrLi("option_list", goption);
      // _("display_goption").innerHTML = goption;
    } else {
      _("option_list").innerHTML =
        "<li style='color:red; background-color:grey;'>特になし</li>";
    }
    // タグ
    _("display_gappearance").innerHTML = gappearance;
    _("display_gstyle").innerHTML = gstyle;
    _("display_gplay").innerHTML = gplay;
    _("display_gcharacteristic").innerHTML = gcharacteristic;
    // プラス
    if (gplus.length !== 0) {
      arrLi("plus_list", gplus);
      // _("display_gplus").innerHTML = gplus;
    } else {
      _("plus_list").innerHTML =
        "<li style='color:red; background-color:grey;'>特になし</li>";
    }
    //秘密
    if (gsecret.length !== 0) {
      arrLi("secret_list", gsecret);
      // _("display_gsecret").innerHTML = gsecret;
    } else {
      // _("display_gsecret").innerHTML = "<em style='color:red'>特になし</em>";
      _("secret_list").innerHTML =
        "<li style='color:red; background-color:grey;'>特になし</li>";
    }
  } else {
    alert("変なことした？");
  }
}

// 戻るボタン
function buck_processPhase(x) {
  if (x == 10) {
    _("show_all_data").style.display = "none";

    deleteli("option_list");
    deleteli("plus_list");
    deleteli("secret_list");
  } else {
    _("phase" + x).style.display = "none";
  }
  _("status_" + x).classList.toggle("active");
  _("phase" + (x - 1)).style.display = "block";
}

window.addEventListener("load", alert_delete());
