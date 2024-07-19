<?php
// セッションを開始または再開
session_start();

// 予約系
unset($_SESSION['reserveGirlNum']);


// これをするとログイン関連まで消えるのでやめる方向で
// セッションを破棄してリセット
session_unset();  // セッション変数を破棄
session_destroy();  // セッションを完全に破棄

// 他の処理やリダイレクトなどを行うこともできます

// レスポンスを返す（オプション）
echo "Session has been reset.";  // レスポンスメッセージの例

// header("Location: setting_index02.php");
header("Location: input_reserve_01.php");
exit;

?>

<p><a href="new_set_event.php">戻っていこう</a></p>