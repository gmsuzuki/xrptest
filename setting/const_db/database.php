<?php
class Database {
    // シングルトンパターン用のプロパティ、型宣言なしで宣言
    private static $pdo = null; // PDOオブジェクトを格納する静的プロパティ

    // コンストラクタを非公開にして、外部からインスタンス化できないようにする
    private function __construct() {
        $dsn = "mysql:host=mysql1.php.starfree.ne.jp;dbname=xrptest_shop;charset=utf8";
        $user = "xrptest_admin";  // ユーザー名
        $pass = "admin0000";  // パスワード
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // エラーモード設定
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC  // デフォルトのフェッチモードを配列に設定
        ];
        
        // PDOオブジェクトの作成
        self::$pdo = new PDO($dsn, $user, $pass, $options);
    }

    // インスタンスが既に存在する場合はそのインスタンスを返し、ない場合は新しく作成するメソッド
    public static function getInstance() {
        if (self::$pdo === null) {
            // PDOインスタンスがない場合に新しく作成
            new self();  // コンストラクタを呼び出すことでインスタンスを作成
        }
        return self::$pdo;  // PDOインスタンスを返す
    }
}

?>