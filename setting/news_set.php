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
<h1>イベント設定</h1>

<!-- フォーム,送り先、方法を設定 -->
<h3>送る先のphpファイルまだ決めてない</h3>
<h3>ポストで送る名前決まってない</h3>
<form action="sent.php" method="POST" enctype="multipart/form-data">
<!-- １０MBまで -->
<!-- acceptアップできるファイル -->
<input type="hidden" name="MAX_FILE_SIZE" value="10485760">


<!-- 設定項目 -->


<h2>イベント画像</h2>
<input type="file" id="inp-preview2" accept="image/jpeg,image/png,image/gif" onChange="imgPreView(event, 'preview2')">
  <div id="preview2"></div>

<h2>内容</h2>
<input type="text">


<br>
<input type="submit" value="アップロード">

</form>



<div class="setting_btn">
    <a href="setting_index.php">設定topへ戻る</a>
</div>






</main>


</div>
</body>
</html>