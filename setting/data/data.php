<!-- データ持ってきてる -->

<!-- カウントforeach とかにつかう -->
<?php $counter = 0?>

<!-- 日付 -->
<?php
  date_default_timezone_set ('Asia/Tokyo');
  // 今日
  $today = new DateTime('now');
  $week_name = array("日", "月", "火", "水", "木", "金", "土");
  // 営業時間
  $shop_start = clone $today;
  $shop_start ->setTime(10,00,00);
?>

<!-- postでもらってきた日時データかどうか判断 -->
<?php
// 2021/10/08とこんな感じの日時にpostで受けっとった日時はなってるか？
function validateDateFormat($date) {
    $format = 'Y/m/d';
    $dateTime = DateTime::createFromFormat($format, $date);
    return $dateTime && $dateTime->format($format) === $date;
};
//10:00とこんな感じの時間にpostで受け取った時間はなっているか？判断 
function isValidTimeFormat($time) {
    $pattern = '/^(0[0-9]|1[0-9]|2[0-3]):00$/';
    return preg_match($pattern, $time) === 1;
}

?>




<!-- picbunner -->
<?php
$picbunners = [
  ['img/pic_bunner00.png','#'],
  ['img/pic_bunner01.png','#'],
  ['img/pic_bunner02.png','#'],
  ['img/pic_bunner03.png','#'],
  ['img/pic_bunner04.png','#'],
  ['img/pic_bunner05.png','#'],
]
?>


<!-- 利用ホテル -->

<?php 
$hotels = array(
'hotel1' =>['松戸','https://www.google.com/maps/d/embed?mid=1JWZXXQd4QNSoqlmTiDk_0B8oqrbvF8NQ'],
'hotel2' =>['新松戸','https://www.google.com/maps/d/embed?mid=1EoKGNrr6DPs0qepj8L0-p57LjEJO-GcH'],
'hotel3' =>['馬橋','https://www.google.com/maps/d/embed?mid=1UgWbBDAP4gfRZumiAaZz8Z-T4h3MiniX'],
'hotel4' =>['北松戸','https://www.google.com/maps/d/embed?mid=1HhoEih1_YYKIpp-Eqzxat8KNB3yW2i8q'],
'hotel5' =>['柏','https://www.google.com/maps/d/embed?mid=1Zl9G9387hF3XN-DcsEBJchMTqfhulZDf'],
'hotel6' =>['南柏','https://www.google.com/maps/d/embed?mid=1212JJviYmk1qlclqAP_Airc7Nu_rspsW'],
'hotel7' =>['北柏','https://www.google.com/maps/d/embed?mid=1AApytABKq4lxDXeYlmH8KZqDn1E1domg'],
'hotel8' =>['八柱','https://www.google.com/maps/d/embed?mid=1wviEBagFedVZpJf3ItfRr_xnIKIucTmr'],
'hotel9' =>['三郷','https://www.google.com/maps/d/embed?mid=1KmcatTOsv9e1WKWLfvnMp0MCFFbFaNhs']
)

?>