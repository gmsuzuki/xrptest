<!-- エラーしたらトップへ -->



<!-- 今使ってない -->


<?php
// エラー発生時に「戻るボタン」を表示し、スクリプトを終了する関数
function showBackButtonAndExit() {
echo '<br><button onclick="location.href=\'top.php\'">トップページへ戻る</button>';
exit; // ここでスクリプト終了
}
?>