<?php
// save_member.php
require_once 'const_db/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームからのデータを取得
    $userName = $_POST['userName'];
    
    // 画像の処理（ファイルをサーバーに保存）
    if ($_FILES['userImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '/home/xrptest/xrptest.starfree.jp/public_html/img/';
        $uploadedFile = $uploadDir . basename($_FILES['userImage']['name']);
        
        // ファイルを指定のディレクトリに移動
        if (move_uploaded_file($_FILES['userImage']['tmp_name'], $uploadedFile)) {
            $userImage = $uploadedFile;  // ファイルのパス
        } else {
            echo "画像のアップロードに失敗しました。";
            exit;
        }
    } else {
        echo "画像ファイルのアップロードエラー: " . $_FILES['userImage']['error'];
        exit;
    }
    
    // 承認フラグ (チェックボックス)
    $approval = isset($_POST['approval']) ? 1 : 0;

    try {
        // データベース接続
        $pdo = Database::getInstance();
        
        // SQLクエリを準備
        $stmt = $pdo->prepare("INSERT INTO member (userName, userImage, approval) VALUES (:userName, :userImage, :approval)");
        
        // バインドパラメータ
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':userImage', $userImage);
        $stmt->bindParam(':approval', $approval, PDO::PARAM_INT);
        
        // クエリ実行
        $stmt->execute();
        
        echo "新しいメンバーが追加されました。";
    } catch (PDOException $e) {
        echo "データベースエラー: " . $e->getMessage();
    }
}
?>