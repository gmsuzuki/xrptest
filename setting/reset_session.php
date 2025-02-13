<?php
// セッションを開始または再開
session_start();

// 予約系
unset($_SESSION['reserveGirlNum']);
// 客ナンバー
unset($_SESSION["reserve_customer_number"]);
// name
unset($_SESSION["reserve_customer_name"]);
// mail
unset($_SESSION["reserve_customer_mail"] );
// phone
unset($_SESSION["reserve_customer_phone"]);
// プレイ時間
unset($_SESSION["play_time"]);
unset($_SESSION["other_course_time"]);
// 日時
unset($_SESSION["reserve_input_day"]);

// これをするとログイン関連まで消えるのでやめる方向で
// セッションを破棄してリセット
session_unset();  // セッション変数を破棄
session_destroy();  // セッションを完全に破棄

// 他の処理やリダイレクトなどを行うこともできます

// レスポンスを返す（オプション）
echo "Session has been reset.";  // レスポンスメッセージの例

// header("Location: setting_index02.php");
header("Location: setting_index02.php");
exit;

?>

<p><a href="new_set_event.php">戻っていこう</a></p>