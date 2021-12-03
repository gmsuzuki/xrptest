<!DOCTYPE html>
<html lang="ja">








<!--
    参考

    https://takablog06.com/php_post_comprehend/

 -->




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--サイトの説明 -->
    <title>testページ</title>
    <meta name="description" content="就職用ホームページです" />

    <!--リンク関連-->
    <link rel="canonical" href="正規化するURL" />


    <!--css javascript-->
    <link rel="stylesheet" href="../css/reset.css">


</head>

<!-- ここでどこからのセッティングなのか？判断できる -->
<?php if ($_GET['setting'] === "shop_info") {
    echo "shopいじる";
}

// var_dump($_POST);

?>



<!-- どこからわかったら、requireで読み込むとしてとりあえず、shopinfo -->

<?php

// classを定義しておこう

class Testw
{
    private $shop_name;
    private $shop_description;

    // コンストラクト
    public function __construct($shop_name, $shop_description)
    {
        $this->shop_name = htmlspecialchars($shop_name, ENT_QUOTES, 'UTF-8');
        $this->shop_description  = htmlspecialchars($shop_description, ENT_QUOTES, 'UTF-8');
    }

    public function getShopName()
    {
        return $this->shop_name;
    }

    public function getShopDescription()
    {
        return $this->shop_description;
    }
}

?>

<?php

$tanaka = new Testw($_POST['shop_name'], $_POST['shop_description']);

echo $tanaka->getShopName();

echo "<br>";
echo "<br>";
echo "<br>";
$staff_name = $_POST['shop_name'];

$staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
echo "ここからはクラス外";
echo "<br>";
echo $staff_name;
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo $_POST['shop_name'];
echo "<br>";
echo "<br>";
echo "<br>";
?>



<!-- login -->
<?php
require_once('db_connect.php');
?>


<?php


try {
    $staff_name = $_POST['newgirl'];
    $staff_pass = $_POST['pass'];

    $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
    $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');


    //データベースに接続
    $dbh = db_connect();
    //PDOでの例外エラーを詳細にするためのオプション
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //sql
    $sql = "INSERT INTO `mst_staff` (name, pass) VALUES (?, ?)";
    $stmt = $dbh->prepare($sql);
    $date[] = $staff_name;
    $date[] = $staff_pass;
    $stmt->execute($date);

    //接続終了
    $dbh = null;

    print $staff_name;
    print 'さんを追加';
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}

?>



<!-- データ受け取る -->
<?php

//画像データを受け取る

class Staff
{

    // 変数定義
    private $filename;
    private $temp_path;
    private $file_err;
    private $filesize;
    private $upload_dir;

    // コンストラクト
    public function __construct($file, $upload_dir)
    {
        $filename = basename($file['name']);
        $this->filename = $filename;
        $this->temp_path = $file['tmp_name'];
        $this->file_err = $file['error'];
        $this->filesize = $file['size'];
        $this->upload_dir = $upload_dir;
    }

    // ゲットネーム
    public function getName()
    {
        return $this->filename;
    }

    // バリデーション

    public function check_staff_img($staff)
    {
        $img_uperr = array();
        if ($staff->filesize > 10485760 || $staff->file_err == 2) {
            $img_uperr[] = 'ファイルサイズは10MB以下にしてください';
        }
        $allow_ext = array('jpg', 'jpeg', 'png', 'gif');
        $file_ext = pathinfo($staff->filename, PATHINFO_EXTENSION);

        if (!in_array(strtolower($file_ext), $allow_ext)) {
            $img_uperr[] = '画像ファイルを選択してください';
        }
        if (!is_uploaded_file($staff->temp_path)) {
            $img_uperr[] = 'ファイルが選択されていません';
        }
        if (count($img_uperr) > 0) {
            return $img_uperr;
        } else {
            if (move_uploaded_file($staff->temp_path, $staff->upload_dir . 'test.jpg')) {
                echo 'アップしました';
            } else {
                echo '保存に失敗しました';
            }
        }
    }
};

?>



<?php
// 受け取り
$file = $_FILES['img'];
//インスタンス
$staff = new Staff($file, '/home/xrptest/xrptest.starfree.jp/public_html/img/');
// ファイルアップ、エラーチェックファンクション
$abc = $staff->check_staff_img($staff);
// 結果を表示
if (isset($abc)) {
    foreach ($abc as $ab) {
        echo $ab;
        echo '<br>';
    };
}

?>











</body>

</html>