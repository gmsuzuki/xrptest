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

            <!-- フォーム,送り先、方法を設定 -->
            <h3>送る先のphpファイルまだ決めてない</h3>
            <h3>ポストで送る名前決まってない</h3>

            <br>
            <?php if ($_GET['setting'] === "shop") {
                echo "正規のルートから来ました";
            }
            ?>

            <!-- データの送り先 -->
            <form action="sent.php?setting=shop_info" method="POST" enctype="multipart/form-data">


                <!-- １０MBまで -->
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
                <!-- 店舗番号をこっそり送る -->
                <input type="hidden" name="shop_no" value="0">

                <!-- 設定項目 -->

                <h2>許可登録のバナー関係</h2>
                <input type="file" name="shop_banner_permission" id="inp-preview1" onChange="imgPreView(event, 'preview1')">
                <div id="preview1"></div>


                <h2>お店のバナー</h2>
                <h3>小サイズ　88x31</h3>
                <input type="file" id="inp-preview1" onChange="imgPreView(event, 'preview1')">
                <div id="preview1"></div>

                <h3>中サイズ　200x40</h3>
                <input type="file" id="inp-preview1" onChange="imgPreView(event, 'preview1')">
                <div id="preview1"></div>

                <h3>大サイズ　468x60</h3>
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