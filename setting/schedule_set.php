<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <!--サイトの説明 -->
    <title>設定ページ</title>
    <meta name="description" content="就職用ホームページです" />


    <!--css javascript-->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/set_style.css" /> 
    <script src="../js/setting.js" defer></script>




<body id="body">


<div id="wrapper">




<main>

<h1>スケジュール関連のページ</h1>
<h2><a href="https://ateitexe.com/php-reserve-timetable/">参考</a></h2>
<h2><a href="https://news.mynavi.jp/itsearch/series/devsoft/webpg.html">参考２</a></h2>

<?php


date_default_timezone_set('Asia/Tokyo');

echo date("Y/m/d H:i:s")."\n"; //「2015/03/10 06:00:00」
echo date("Y/m/01") . "\n"; //「2015/03/01」
echo date("Y/m/t") . "\n"; //「2015/03/31」

$w = date("w"); //週番号　０が日曜日
$week_name = array("日", "月", "火", "水", "木", "金", "土");

$today =date("Y/m/d") . "($week_name[$w])\n"; //「2015/03/10(火)」
echo "<br>";
echo $today;
echo "<br>";

echo "<h2>実験</h2>"; 


$date = new DateTime();
echo "今日<br>";
echo $date->format('Y-m-d H:i:s'); // 2014-08-06 21:15:49
echo "<br>";
echo $date->format("w");
echo "<br>";
echo "明日<br>";
echo $date->modify('+1 days')->format('Y-m-d H:i:s');//1日後
echo "<br>";

echo "昨日  <br>";
echo $date->modify('-1 days')->format('Y-m-d H:i:s');//1日前
echo "<br>";


?>

<?php

echo "<br>";
echo "<br>";
echo "<br>";
$date = new DateTime();
echo $date->format('Y-m-d H:i:s'); // 2014-08-06 21:15:49
echo "<br>";
$test = new DateTime('+1 day');
echo $test->format('Y-m-d H:i:s'); // 2014-08-06 21:15:49
$week_name = array("日", "月", "火", "水", "木", "金", "土");
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo $date->format('m-d')."($week_name[$w])\n"; // 2014-08-06 21:15:49

?>








  

</main>


</div>
</body>
</html>