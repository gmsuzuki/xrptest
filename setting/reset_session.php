<?php
// セッションを開始または再開
session_start();

// セッションを破棄してリセット
session_unset();  // セッション変数を破棄
session_destroy();  // セッションを完全に破棄

// 他の処理やリダイレクトなどを行うこともできます

// レスポンスを返す（オプション）
echo "Session has been reset.";  // レスポンスメッセージの例

header("Location: new_event_set.php");
exit;

?>

<p><a href="new_set_event.php">戻っていこう</a></p>