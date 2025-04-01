<?php
require_once 'const_db/database.php';

$pdo = Database::getInstance(); // DBインスタンス取得

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageName = $_POST['imageName'] ?? '';  // 画像名
    $staffId = $_POST['staffId'] ?? '';  // スタッフ番号
    $uploadDir = '/home/xrptest/xrptest.starfree.jp/public_html/img/tesimg/'; // 保存先ディレクトリ
    $fileExtension = pathinfo($_FILES['staffImage']['name'], PATHINFO_EXTENSION); // 元のファイルの拡張子を取得
    $newFileName = 'sample.' . $fileExtension; // 新しいファイル名を 'sample' に変更

    $filePath = $uploadDir . $newFileName; // フルパス

    // アップロード処理
    if (move_uploaded_file($_FILES['staffImage']['tmp_name'], $filePath)) {
        try {
            // データベースに登録
            $stmt = $pdo->prepare("INSERT INTO imgtest (imageName, staffImage, staffId) VALUES (?, ?, ?)");
            $stmt->execute([$imageName, $filePath, $staffId]);
            
            echo "画像を保存しました！";
        } catch (Exception $e) {
            echo "エラー: " . $e->getMessage();
        }
    } else {
        echo "画像のアップロードに失敗しました。";
    }
} else {
    echo "不正なアクセスです。";
}
?>