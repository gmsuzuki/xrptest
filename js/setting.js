// 画像プレビュー

function imgPreView(event, targetId, sizeLimit) {
  if (event.target.files[0]) {
    // ファイルを入れる
    let file = event.target.files[0];

    if (file.size > sizeLimit) {
      alert("ファイルサイズは1MB以下にしてください"); // エラーメッセージを表示
      let obj = document.getElementById("inp-" + targetId);
      // クリア
      obj.value = "";
    } else {
      // プレビューを表示する場所を入れる
      let field = document.getElementById(targetId);
      // ファイルリーダーセット
      let reader = new FileReader();
      // プレビューにinputを入れておく
      let preview = document.getElementById(targetId);

      // プレビューイメージにプレビュー画像入れておく、入っていたら消すため
      let previewImage = document.getElementById("previewImage-" + targetId);

      // figureタグをセット
      let figure = document.createElement("figure");
      // inputタグをセットして設定する
      let rmBtn = document.createElement("input");
      rmBtn.type = "button";
      rmBtn.name = "rmv-" + targetId;
      rmBtn.value = "削除";
      rmBtn.onclick = function () {
        let element = document
          .getElementById("previewImage-" + targetId)
          .remove();
        let obj = document.getElementById("inp-" + targetId);
        // クリア
        obj.value = "";
        // 中身だけじゃなく全消ししてinputを書き直す方法もある
      };
      // もしすでにプレビューに画像があれば消す
      if (previewImage != null) {
        preview.removeChild(previewImage);
      }
      //  ファイルリーダー読み込み終わったらイベント
      reader.onload = function (event) {
        // img設定
        let img = document.createElement("img");
        img.setAttribute("src", reader.result);
        //  img.setAttribute("id", "previewImage-"+targetId);
        // figureタグをセット
        figure.setAttribute("id", "previewImage-" + targetId);
        // fieldにfigure設置
        field.appendChild(figure);
        // figureタグの中にimg 消去ボタン
        figure.appendChild(img);
        figure.appendChild(rmBtn);
      };
      //  ファイルの中身があれば
      if (file) {
        reader.readAsDataURL(file);
      }
    }
  } else {
    // キャンセルで消えた場合
    let preview = document.getElementById(targetId);
    let previewImage = document.getElementById("previewImage-" + targetId);
    preview.removeChild(previewImage);
  }
}

// ーーーーーーーーーーーーーーーーーーーーーー
// 文字カウント
// ーーーーーーーーーーーーーーーーーーーーーー

function CountStr(id, str, max) {
  const restr = str.replace(/\s+/g, "");
  // document.getElementById(id).innerHTML = "文字数：" +(max - restr.length) + "文字";
  document.getElementById(id).innerHTML =
    "残り：" + (max - restr.length) + "文字";

  if (max - restr.length < 0) {
    document.getElementById(id).style = "color: red;";
  }
}
