var userType, userId, userPass;

// パスワード二重チェック
function SameCheckPass(input) {
  const pass = document.getElementById("staff_new_login_pass").value; //パスワード１の値を取得
  const passConfirm = input.value; //確認用フォームの値を取得(引数input)
  // alert表示用
  const email_alert_span = input.closest("li").getElementsByTagName("em");
  if (pass != passConfirm) {
    email_alert_span[0].style.display = "inline";
    input.style.backgroundColor = "#ffdddd";
  } else {
    email_alert_span[0].style.display = "none";
    input.style.backgroundColor = "#ffffff";
  }
}

function processPhase1() {
  // forma = document.getElementById("multiphase");
  // const isRequired = forma.checkValidity();

  const work_select = document.getElementsByName("staff_cast");
  const lenselect = work_select.length;
  const checked_user_type = radioCheck(work_select, lenselect);

  if (formCheck()) {
    userType = checked_user_type;
    userId = _("staff_new_login_id").value;
    userPass = _("staff_new_login_pass").value;
    _("phase1").style.display = "none";
    _("phase2").style.display = "block";
    if (userType == 1) {
      _("user_type").innerHTML = "キャスト";
    } else if (userType == 2) {
      _("user_type").innerHTML = "スタッフ";
    } else {
      _("user_type").innerHTML = "エラー";
    }
    _("user_id").innerHTML = userId;
    _("user_pass").innerHTML = userPass;
  } else {
    alert("名前のところがおかしいよ");
  }
}

// 確認画面
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
function buck_2step() {
  _("phase2").style.display = "none";
  _("phase1").style.display = "block";
}

window.addEventListener("load", alert_delete());
