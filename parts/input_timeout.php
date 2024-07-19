<?php

// セッションタイムアウトの設定
$timeout_duration = 1800; // 30分

// セッションタイムアウトのチェック
if (isset($_SESSION['last_activity'])) {
    // 経過時間を計算
    $time_since_last_activity = time() - $_SESSION['last_activity'];

    if ($time_since_last_activity > $timeout_duration) {
        // セッションタイムアウトの場合
        session_unset(); // セッション変数をクリア
        session_destroy(); // セッションを終了

        // ユーザーにタイムアウトを通知してログインページにリダイレクト
        echo "<p>長時間入力が完了しませんでした。最初のページに移行します。</p>";
        echo "<script>
        setTimeout(function() {
            window.location.href = 'setting_index02.php';
        }, 1000);
        </script>";
        exit();
    }
}

// セッションIDのチェック
if ($_SESSION['session_id'] !== session_id()) {
    echo "<p>他の人の介入がありました。最初のページに移行します。</p>";
    echo "<script>
    setTimeout(function() {
        window.location.href = 'setting_index02.php';
    }, 2000);
    </script>";
    exit();
}

// セッションがアクティブな場合、最終アクティブ時間を更新
$_SESSION['last_activity'] = time();

// test01.phpを通過したことを示すフラグを設定
$_SESSION['visited_test01'] = true;
?>