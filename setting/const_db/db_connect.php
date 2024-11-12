<!-- データサーバーログイン -->

<!-- 参考
https://qiita.com/jinto/items/bfcd727cf2435cebc27c -->


<?php

// データベースへの接続に必要な変数を指定
// ホスト 'mysql1.php.starfree.ne.jp';
// ユーザーネーム 'xrptest_admin';
// パスワード 'admin0000';
// データベース名 'xrptest_shop';
 

define('DB_USERNAME', 'xrptest_admin');
define('DB_PASSWORD', 'admin0000');
define('DSN', 'mysql:host=mysql1.php.starfree.ne.jp;dbname=xrptest_shop;charset=utf8');

function db_connect(){
$pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD,
        // レコード列名をキーとして取得させる
        [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);
        // 接続チェック
if (!$pdo) {
    die('データベースの接続に失敗しました。');
  }
return $pdo;

};

?>
