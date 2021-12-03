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
<h1>お店の基本設定</h1>

<!-- フォーム,送り先、方法を設定 -->
<h3>送る先のphpファイルまだ決めてない</h3>
<h3>ポストで送る名前決まってない</h3>
<form action="sent.php" method="POST" enctype="multipart/form-data">
<!-- １０MBまで -->
<input type="hidden" name="MAX_FILE_SIZE" value="10485760">


<!-- 設定項目 -->


<h2>求人女性リンク</h2>
<h3>アドレス</h3>
    <input type="text">
<h3>バナー</h3>
    <input type="file" id="inp-preview2" onChange="imgPreView(event, 'preview2')">
        <div id="preview2"></div>


<h2>求人男性リンク</h2>
<h3>アドレス</h3>
    <input type="text">
<h3>バナー</h3>
    <input type="file" id="inp-preview3" onChange="imgPreView(event, 'preview3')">
        <div id="preview3"></div>



<div class="setting_btn">
    <a href="setting_index.php">設定topへ戻る</a>
</div>


</main>

<!-- wrapper end -->
</div>

</body>
</html>