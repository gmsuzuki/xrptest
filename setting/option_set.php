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
<h1>オプション設定</h1>

<!-- フォーム,送り先、方法を設定 -->
<h3>送る先のphpファイルまだ決めてない</h3>
<h3>ポストで送る名前決まってない</h3>
<form action="sent.php" method="POST" enctype="multipart/form-data">
<!-- １０MBまで -->
<input type="hidden" name="MAX_FILE_SIZE" value="10485760">


<!-- 設定項目 -->


<h2>項目</h2>

<label><input type="radio" name="option">コスチューム</label>
<label><input type="radio" name="option">オプション</label>

<!-- requiredは必須 maxlength最大長さ -->
<h3>名称</h3>
    <input type="text" name="newgirl" required maxlength="8">

<h3>画像</h3>
    <input type="file" id="inp-preview1" onChange="imgPreView(event, 'preview1')">
    <div id="preview1"></div>



<input type="submit" value="アップロード">

</form>

<div class="setting_btn">
    <a href="setting_index.php">設定topへ戻る</a>
</div>











</main>


</div>
</body>
</html>